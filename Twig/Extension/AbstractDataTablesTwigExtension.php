<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Twig\Extension;

use Twig_Extension;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesColumn;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesWrapper;
use WBW\Library\Core\Utility\Argument\StringUtility;

/**
 * Abstract DataTables Twig extension.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Twig\Extension
 * @abstract
 */
abstract class AbstractDataTablesTwigExtension extends Twig_Extension {

    /**
     * Constructor.
     */
    public function __construct() {
        // NOTHING TO DO.
    }

    /**
     * Displays a DataTables column.
     *
     * @param DataTablesColumn $dtColumn The column.
     * @return string Returns the DataTables column.
     */
    private function dataTablesColumn(DataTablesColumn $dtColumn, $scopeRow = false) {

        // Check if the column is visible.
        if (false === $dtColumn->getVisible()) {
            return "";
        }

        // Initialize the template.
        $template = "            <th%attributes%>%innerHTML%</th>";

        // Initialize the attributes.
        $attributes = [];

        $attributes["scope"] = true === $scopeRow ? "row" : null;
        $attributes["class"] = $dtColumn->getClassname();
        $attributes["width"] = $dtColumn->getWidth();

        // Initialize the parameters.
        $innerHTML = $dtColumn->getTitle();

        // Return the HTML.
        return StringUtility::replace($template, ["%attributes%", "%innerHTML%"], [preg_replace("/^\ $/", "", " " . StringUtility::parseArray($attributes)), $innerHTML]);
    }

    /**
     * Displays a DataTables footer.
     *
     * @param DataTablesWrapper $dtWrapper The wrapper.
     * @return string Returns the DataTables footer.
     */
    private function dataTablesTFoot(DataTablesWrapper $dtWrapper) {

        // Initialize the template.
        $template = "    <tfoot>\n        <tr>\n%innerHTML%        </tr>\n    </tfoot>\n";

        // Initialize the parameters.
        $innerHTML = "";
        foreach ($dtWrapper->getColumns() as $dtColumn) {
            $column = $this->dataTablesColumn($dtColumn);
            if ("" === $column) {
                continue;
            }
            $innerHTML .= $column . "\n";
        }

        // Return the HTML.
        return "" === $innerHTML ? "" : StringUtility::replace($template, ["%innerHTML%"], [$innerHTML]);
    }

    /**
     * Displays a DataTables header.
     *
     * @param DataTablesWrapper $dtWrapper The wrapper.
     * @return string Returns the DataTables header.
     */
    private function dataTablesTHead(DataTablesWrapper $dtWrapper) {

        // Initialize the templates.
        $template = "    <thead>\n        <tr>\n%innerHTML%        </tr>\n    </thead>\n";

        // Count the columns.
        $count = count($dtWrapper->getColumns());

        // Initialize the parameters.
        $innerHTML = "";
        for ($i = 0; $i < $count; ++$i) {
            $dtColumn = array_values($dtWrapper->getColumns())[$i];
            $column   = $this->dataTablesColumn($dtColumn, 0 === $i);
            if ("" === $column) {
                continue;
            }
            $innerHTML .= $column . "\n";
        }

        // Return the HTML.
        return "" === $innerHTML ? "" : StringUtility::replace($template, ["%innerHTML%"], [$innerHTML]);
    }

    /**
     * Displays a DataTables table.
     *
     * @param DataTablesWrapper $dtWrapper The wrapper.
     * @param string $class The class.
     * @param boolean $includeTHead Include thead ?.
     * @param boolean $includeTFoot Include tfoot ?
     * @returns string Returns the DataTables table.
     */
    protected function dataTablesTable(DataTablesWrapper $dtWrapper, $class, $includeTHead, $includeTFoot) {

        // Initialize the template.
        $template = "<table %attributes%>\n%innerHTML%</table>";

        // Initialize the attributes.
        $attributes = [];

        $attributes["class"] = ["table", $class];
        $attributes["id"]    = "dt" . $dtWrapper->getName();

        // Initialize the parameters.
        $thead = true === $includeTHead ? $this->dataTablesTHead($dtWrapper) : "";
        $tfoot = true === $includeTFoot ? $this->dataTablesTFoot($dtWrapper) : "";

        // Return the HTML.
        return StringUtility::replace($template, ["%attributes%", "%innerHTML%"], [StringUtility::parseArray($attributes), $thead . $tfoot]);
    }

}

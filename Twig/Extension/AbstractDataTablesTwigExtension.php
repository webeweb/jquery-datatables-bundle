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
use WBW\Bundle\JQuery\DataTablesBundle\Helper\DataTablesWrapperHelper;
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
     * jQuery DataTables.
     *
     * @var string
     */
    const JQUERY_DATATABLES = <<< 'EOTXT'
<script type="text/javascript">
    $(document).ready(function () {
        var %var% = $("%selector%").DataTable({
            ajax: {
                type: "%method%",
                url: "%url%"
            },
            columns: %columns%,
            language: {
                url: "/bundles/jquerydatatables/datatables-i18n-1.10.16/%language%.json"
            },
            order: %order%,
            processing: %processing%,
            serverSide: %serverSide%
        });
    });
</script>
EOTXT;

    /**
     * Constructor.
     */
    protected function __construct() {
        // NOTHING TO DO.
    }

    /**
     * Displays a jQuery DataTables.
     *
     * @param DataTablesWrapper $dtWrapper The wrapper.
     * @param string $selector The selector.
     * @param string $language The language.
     * @return string Returns the jQuery DataTables.
     */
    protected function jQueryDataTables(DataTablesWrapper $dtWrapper, $selector, $language) {

        // Get the options.
        $dtOptions = DataTablesWrapperHelper::getOptions($dtWrapper);

        // Initialize the parameters.
        $var        = DataTablesWrapperHelper::getName($dtWrapper);
        $method     = $dtOptions["ajax"]["method"];
        $url        = $dtOptions["ajax"]["url"];
        $columns    = json_encode($dtOptions["columns"]);
        $orders     = json_encode($dtOptions["order"]);
        $processing = $dtOptions["processing"];
        $serverSide = $dtOptions["serverSide"];

        //
        $searches = ["%var%", "%selector%", "%method%", "%url%", "%columns%", "%language%", "%order%", "%processing%", "%serverSide%"];
        $replaces = [$var, null === $selector ? "#" . $var : $selector, $method, $url, $columns, $language, $orders, $processing, $serverSide];

        // Return the Javascript.
        return StringUtility::replace(self::JQUERY_DATATABLES, $searches, $replaces);
    }

    /**
     * Render a DataTables.
     *
     * @param DataTablesWrapper $dtWrapper The wrapper.
     * @param string $class The class.
     * @param boolean $includeTHead Include thead ?.
     * @param boolean $includeTFoot Include tfoot ?
     * @returns string Returns the rendered DataTables.
     */
    protected function renderDataTables(DataTablesWrapper $dtWrapper, $class, $includeTHead, $includeTFoot) {

        // Initialize the template.
        $template = "<table %attributes%>\n%innerHTML%</table>";

        // Initialize the attributes.
        $attributes = [];

        $attributes["class"] = ["table", $class];
        $attributes["id"]    = DataTablesWrapperHelper::getName($dtWrapper);

        // Initialize the parameters.
        $thead = true === $includeTHead ? $this->renderDataTablesTHead($dtWrapper) : "";
        $tfoot = true === $includeTFoot ? $this->renderDataTablesTFoot($dtWrapper) : "";

        // Return the HTML.
        return StringUtility::replace($template, ["%attributes%", "%innerHTML%"], [StringUtility::parseArray($attributes), $thead . $tfoot]);
    }

    /**
     * Render a DataTables column.
     *
     * @param DataTablesColumn $dtColumn The column.
     * @return string Returns the rendered DataTables column.
     */
    private function renderDataTablesColumn(DataTablesColumn $dtColumn, $scopeRow = false) {

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
     * Render a DataTables footer.
     *
     * @param DataTablesWrapper $dtWrapper The wrapper.
     * @return string Returns the rendered DataTables footer.
     */
    private function renderDataTablesTFoot(DataTablesWrapper $dtWrapper) {

        // Initialize the template.
        $template = "    <tfoot>\n        <tr>\n%innerHTML%        </tr>\n    </tfoot>\n";

        // Initialize the parameters.
        $innerHTML = "";
        foreach ($dtWrapper->getColumns() as $dtColumn) {
            $column = $this->renderDataTablesColumn($dtColumn);
            if ("" === $column) {
                continue;
            }
            $innerHTML .= $column . "\n";
        }

        // Return the HTML.
        return "" === $innerHTML ? "" : StringUtility::replace($template, ["%innerHTML%"], [$innerHTML]);
    }

    /**
     * Render a DataTables header.
     *
     * @param DataTablesWrapper $dtWrapper The wrapper.
     * @return string Returns the rendered DataTables header.
     */
    private function renderDataTablesTHead(DataTablesWrapper $dtWrapper) {

        // Initialize the templates.
        $template = "    <thead>\n        <tr>\n%innerHTML%        </tr>\n    </thead>\n";

        // Count the columns.
        $count = count($dtWrapper->getColumns());

        // Initialize the parameters.
        $innerHTML = "";
        for ($i = 0; $i < $count; ++$i) {
            $dtColumn = array_values($dtWrapper->getColumns())[$i];
            $column   = $this->renderDataTablesColumn($dtColumn, 0 === $i);
            if ("" === $column) {
                continue;
            }
            $innerHTML .= $column . "\n";
        }

        // Return the HTML.
        return "" === $innerHTML ? "" : StringUtility::replace($template, ["%innerHTML%"], [$innerHTML]);
    }

}

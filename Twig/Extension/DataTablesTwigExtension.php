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

use Twig_SimpleFunction;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesWrapper;
use WBW\Library\Core\Utility\Argument\ArrayUtility;

/**
 * DataTables Twig extension.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Twig\Extension
 */
class DataTablesTwigExtension extends AbstractDataTablesTwigExtension {

    /**
     * Service name.
     *
     * @var string
     */
    const SERVICE_NAME = "webeweb.bundle.datatablesbundle.twig.extension.datatables";

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Displays a DataTables HTML.
     *
     * @param DataTablesWrapper $dtWrapper The wrapper.
     * @param array $args The arguments.
     * @return string Returns the DataTables HTML.
     */
    public function dataTablesHTMLFunction(DataTablesWrapper $dtWrapper, array $args = []) {
        return $this->dataTablesTable($dtWrapper, ArrayUtility::get($args, "class"), ArrayUtility::get($args, "thead", true), ArrayUtility::get($args, "tfoot", true));
    }

    /**
     * Get the Twig functions.
     *
     * @return array Returns the Twig functions.
     */
    public function getFunctions() {
        return [
            new Twig_SimpleFunction("dataTablesHTML", [$this, "dataTablesHTMLFunction"], ["is_safe" => ["html"]]),
        ];
    }

}

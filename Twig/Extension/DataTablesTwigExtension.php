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
use WBW\Library\Core\Helper\Argument\ArrayHelper;

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
    const SERVICE_NAME = "webeweb.datatablesbundle.twig.extension.datatables";

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Get the Twig functions.
     *
     * @return array Returns the Twig functions.
     */
    public function getFunctions() {
        return [
            new Twig_SimpleFunction("jQueryDataTables", [$this, "jQueryDataTablesFunction"], ["is_safe" => ["html"]]),
            new Twig_SimpleFunction("renderDataTables", [$this, "renderDataTablesFunction"], ["is_safe" => ["html"]]),
        ];
    }

    /**
     * Displays a jQuery DataTables.
     *
     * @param DataTablesWrapper $dtWrapper The wrapper.
     * @param array $args The arguments.
     * @return string Returns the jQuery DataTables.
     */
    public function jQueryDataTablesFunction(DataTablesWrapper $dtWrapper, array $args = []) {
        return $this->jQueryDataTables($dtWrapper, ArrayHelper::get($args, "selector"), ArrayHelper::get($args, "language", "English"));
    }

    /**
     * Render a DataTables.
     *
     * @param DataTablesWrapper $dtWrapper The wrapper.
     * @param array $args The arguments.
     * @return string Returns the rendered DataTables.
     */
    public function renderDataTablesFunction(DataTablesWrapper $dtWrapper, array $args = []) {
        return $this->renderDataTables($dtWrapper, ArrayHelper::get($args, "class"), ArrayHelper::get($args, "thead", true), ArrayHelper::get($args, "tfoot", true));
    }

}

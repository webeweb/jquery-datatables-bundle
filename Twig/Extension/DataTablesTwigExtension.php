<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Twig\Extension;

use Twig_Environment;
use Twig_SimpleFilter;
use Twig_SimpleFunction;
use WBW\Bundle\CoreBundle\Twig\Extension\RendererTwigExtension;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesWrapperInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Helper\DataTablesWrapperHelper;
use WBW\Library\Core\Argument\ArrayHelper;
use WBW\Library\Core\Exception\FileSystem\FileNotFoundException;

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
    const SERVICE_NAME = "webeweb.jquery_datatables.twig.extension";

    /**
     * Constructor.
     *
     * @param Twig_Environment $twigEnvironment The Twig environment.
     * @param RendererTwigExtension $rendererTwigExtension The renderer Twig extension.
     */
    public function __construct(Twig_Environment $twigEnvironment, RendererTwigExtension $rendererTwigExtension) {
        parent::__construct($twigEnvironment, $rendererTwigExtension);
    }

    /**
     * Get the Twig filters.
     *
     * @return Twig_SimpleFilter[] Returns the Twig filters.
     */
    public function getFilters() {
        return [
            new Twig_SimpleFilter("jQueryDataTablesName", [$this, "jQueryDataTablesNameFunction"], ["is_safe" => ["html"]]),
            new Twig_SimpleFilter("jQueryDTName", [$this, "jQueryDataTablesNameFunction"], ["is_safe" => ["html"]]),
        ];
    }

    /**
     * Get the Twig functions.
     *
     * @return array Returns the Twig functions.
     */
    public function getFunctions() {
        return [
            new Twig_SimpleFunction("jQueryDataTables", [$this, "jQueryDataTablesFunction"], ["is_safe" => ["html"]]),
            new Twig_SimpleFunction("jQueryDT", [$this, "jQueryDataTablesFunction"], ["is_safe" => ["html"]]),

            new Twig_SimpleFunction("renderDataTables", [$this, "renderDataTablesFunction"], ["is_safe" => ["html"]]),
            new Twig_SimpleFunction("renderDT", [$this, "renderDataTablesFunction"], ["is_safe" => ["html"]]),

            new Twig_SimpleFunction("jQueryDataTablesStandalone", [$this, "jQueryDataTablesStandaloneFunction"], ["is_safe" => ["html"]]),
            new Twig_SimpleFunction("jQueryDTStandalone", [$this, "jQueryDataTablesStandaloneFunction"], ["is_safe" => ["html"]]),

            new Twig_SimpleFunction("jQueryDataTablesName", [$this, "jQueryDataTablesNameFunction"], ["is_safe" => ["html"]]),
            new Twig_SimpleFunction("jQueryDTName", [$this, "jQueryDataTablesNameFunction"], ["is_safe" => ["html"]]),
        ];
    }

    /**
     * Displays a jQuery DataTables.
     *
     * @param DataTablesWrapperInterface $dtWrapper The wrapper.
     * @param array $args The arguments.
     * @return string Returns the jQuery DataTables.
     * @throws FileNotFoundException Throws a file not found exception if the language file does not exist.
     */
    public function jQueryDataTablesFunction(DataTablesWrapperInterface $dtWrapper, array $args = []) {
        return $this->jQueryDataTables($dtWrapper, ArrayHelper::get($args, "selector"), ArrayHelper::get($args, "language"));
    }

    /**
     * Displays a jQuery DataTables name.
     *
     * @param DataTablesWrapperInterface $dtWrapper The wrapper.
     * @return string Returns the jQuery DataTables name.
     */
    public function jQueryDataTablesNameFunction(DataTablesWrapperInterface $dtWrapper) {
        return DataTablesWrapperHelper::getName($dtWrapper);
    }

    /**
     * Displays a jQuery DataTables "Standalone".
     *
     * @param array $args The arguments.
     * @return string Returns the jQuery DataTables "Standalone".
     * @throws FileNotFoundException Throws a file not found exception if the language file does not exist.
     */
    public function jQueryDataTablesStandaloneFunction(array $args = []) {
        return $this->jQueryDataTablesStandalone(ArrayHelper::get($args, "selector", ".table"), ArrayHelper::get($args, "language"), ArrayHelper::get($args, "options", []));
    }

    /**
     * Render a DataTables.
     *
     * @param DataTablesWrapperInterface $dtWrapper The wrapper.
     * @param array $args The arguments.
     * @return string Returns the rendered DataTables.
     */
    public function renderDataTablesFunction(DataTablesWrapperInterface $dtWrapper, array $args = []) {
        return $this->renderDataTables($dtWrapper, ArrayHelper::get($args, "class"), ArrayHelper::get($args, "thead", true), ArrayHelper::get($args, "tfoot", true));
    }
}

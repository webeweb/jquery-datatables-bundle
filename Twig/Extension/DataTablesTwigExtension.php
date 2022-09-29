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

use Symfony\Component\Filesystem\Exception\FileNotFoundException;
use Twig\TwigFilter;
use Twig\TwigFunction;
use WBW\Bundle\JQuery\DataTablesBundle\Api\DataTablesWrapperInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Helper\DataTablesWrapperHelper;
use WBW\Library\Types\Helper\ArrayHelper;

/**
 * DataTables Twig extension.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Twig\Extension
 */
class DataTablesTwigExtension extends AbstractDataTablesTwigExtension {

    /**
     * Service name.
     *
     * @var string
     */
    const SERVICE_NAME = "wbw.jquery.datatables.twig.extension";

    /**
     * Get the Twig filters.
     *
     * @return TwigFilter[] Returns the Twig filters.
     */
    public function getFilters(): array {

        return [
            new TwigFilter("jQueryDataTablesName", [$this, "jQueryDataTablesNameFunction"], ["is_safe" => ["html"]]),
            new TwigFilter("jQueryDTName", [$this, "jQueryDataTablesNameFunction"], ["is_safe" => ["html"]]),
        ];
    }

    /**
     * Get the Twig functions.
     *
     * @return TwigFunction[] Returns the Twig functions.
     */
    public function getFunctions(): array {

        return [
            new TwigFunction("jQueryDataTables", [$this, "jQueryDataTablesFunction"], ["is_safe" => ["html"]]),
            new TwigFunction("jQueryDT", [$this, "jQueryDataTablesFunction"], ["is_safe" => ["html"]]),

            new TwigFunction("jQueryDataTablesName", [$this, "jQueryDataTablesNameFunction"], ["is_safe" => ["html"]]),
            new TwigFunction("jQueryDTName", [$this, "jQueryDataTablesNameFunction"], ["is_safe" => ["html"]]),

            new TwigFunction("jQueryDataTablesOptions", [$this, "jQueryDataTablesOptionsFunction"], ["is_safe" => ["html"]]),
            new TwigFunction("jQueryDTOptions", [$this, "jQueryDataTablesOptionsFunction"], ["is_safe" => ["html"]]),

            new TwigFunction("jQueryDataTablesStandalone", [$this, "jQueryDataTablesStandaloneFunction"], ["is_safe" => ["html"]]),
            new TwigFunction("jQueryDTStandalone", [$this, "jQueryDataTablesStandaloneFunction"], ["is_safe" => ["html"]]),

            new TwigFunction("renderDataTables", [$this, "renderDataTablesFunction"], ["is_safe" => ["html"]]),
            new TwigFunction("renderDT", [$this, "renderDataTablesFunction"], ["is_safe" => ["html"]]),
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
    public function jQueryDataTablesFunction(DataTablesWrapperInterface $dtWrapper, array $args = []): string {
        return $this->jQueryDataTables($dtWrapper, ArrayHelper::get($args, "selector"), ArrayHelper::get($args, "language"));
    }

    /**
     * Displays a jQuery DataTables name.
     *
     * @param DataTablesWrapperInterface $dtWrapper The wrapper.
     * @return string Returns the jQuery DataTables name.
     */
    public function jQueryDataTablesNameFunction(DataTablesWrapperInterface $dtWrapper): string {
        return DataTablesWrapperHelper::getName($dtWrapper);
    }

    /**
     * Displays a jQuery DataTables options.
     *
     * @param DataTablesWrapperInterface $dtWrapper The wrapper.
     * @return array Returns the jQuery DataTables options.
     */
    public function jQueryDataTablesOptionsFunction(DataTablesWrapperInterface $dtWrapper): array {
        return DataTablesWrapperHelper::getOptions($dtWrapper);
    }

    /**
     * Displays a jQuery DataTables "Standalone".
     *
     * @param array $args The arguments.
     * @return string Returns the jQuery DataTables "Standalone".
     * @throws FileNotFoundException Throws a file not found exception if the language file does not exist.
     */
    public function jQueryDataTablesStandaloneFunction(array $args = []): string {
        return $this->jQueryDataTablesStandalone(ArrayHelper::get($args, "selector", ".table"), ArrayHelper::get($args, "language"), ArrayHelper::get($args, "options", []));
    }

    /**
     * Render a DataTables.
     *
     * @param DataTablesWrapperInterface $dtWrapper The wrapper.
     * @param array $args The arguments.
     * @return string Returns the rendered DataTables.
     */
    public function renderDataTablesFunction(DataTablesWrapperInterface $dtWrapper, array $args = []): string {
        return $this->renderDataTables($dtWrapper, ArrayHelper::get($args, "class"), ArrayHelper::get($args, "thead", true), ArrayHelper::get($args, "tfoot", true));
    }
}

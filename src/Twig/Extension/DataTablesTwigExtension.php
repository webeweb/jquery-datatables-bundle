<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Twig\Extension;

use Symfony\Component\Filesystem\Exception\FileNotFoundException;
use Twig\TwigFilter;
use Twig\TwigFunction;
use WBW\Bundle\DataTablesBundle\Helper\DataTablesWrapperHelper;
use WBW\Bundle\DataTablesBundle\Model\DataTablesWrapperInterface;
use WBW\Library\Types\Helper\ArrayHelper;

/**
 * DataTables Twig extension.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Twig\Extension
 */
class DataTablesTwigExtension extends AbstractDataTablesTwigExtension {

    /**
     * Service name.
     *
     * @var string
     */
    public const SERVICE_NAME = "wbw.datatables.twig.extension.datatables";

    /**
     * Display a DataTables name.
     *
     * @param DataTablesWrapperInterface $dtWrapper The wrapper.
     * @return string Returns the DataTables name.
     */
    public function dataTablesNameFunction(DataTablesWrapperInterface $dtWrapper): string {
        return DataTablesWrapperHelper::getName($dtWrapper);
    }

    /**
     * Display a DataTables options.
     *
     * @param DataTablesWrapperInterface $dtWrapper The wrapper.
     * @return array<string,mixed> Returns the DataTables options.
     */
    public function dataTablesOptionsFunction(DataTablesWrapperInterface $dtWrapper): array {
        return DataTablesWrapperHelper::getOptions($dtWrapper);
    }

    /**
     * Get the Twig filters.
     *
     * @return TwigFilter[] Returns the Twig filters.
     */
    public function getFilters(): array {

        return [
            new TwigFilter("dataTablesName", [$this, "dataTablesNameFunction"], ["is_safe" => ["html"]]),
            new TwigFilter("dtName", [$this, "dataTablesNameFunction"], ["is_safe" => ["html"]]),
        ];
    }

    /**
     * Get the Twig functions.
     *
     * @return TwigFunction[] Returns the Twig functions.
     */
    public function getFunctions(): array {

        return [
            new TwigFunction("dataTablesName", [$this, "dataTablesNameFunction"], ["is_safe" => ["html"]]),
            new TwigFunction("dtName", [$this, "dataTablesNameFunction"], ["is_safe" => ["html"]]),

            new TwigFunction("dataTablesOptions", [$this, "dataTablesOptionsFunction"], ["is_safe" => ["html"]]),
            new TwigFunction("dtOptions", [$this, "dataTablesOptionsFunction"], ["is_safe" => ["html"]]),

            new TwigFunction("hDataTables", [$this, "hDataTablesFunction"], ["is_safe" => ["html"]]),
            new TwigFunction("hDT", [$this, "hDataTablesFunction"], ["is_safe" => ["html"]]),

            new TwigFunction("jDataTables", [$this, "jDataTablesFunction"], ["is_safe" => ["html"]]),
            new TwigFunction("jDT", [$this, "jDataTablesFunction"], ["is_safe" => ["html"]]),

            new TwigFunction("jDataTablesStandalone", [$this, "jDataTablesStandaloneFunction"], ["is_safe" => ["html"]]),
            new TwigFunction("jDTStandalone", [$this, "jDataTablesStandaloneFunction"], ["is_safe" => ["html"]]),
        ];
    }

    /**
     * Display an HTML DataTables.
     *
     * @param DataTablesWrapperInterface $dtWrapper The wrapper.
     * @param array<string,mixed> $args The arguments.
     * @return string Returns the rendered HTML DataTables.
     */
    public function hDataTablesFunction(DataTablesWrapperInterface $dtWrapper, array $args = []): string {
        return $this->hDataTables($dtWrapper, ArrayHelper::get($args, "class"), ArrayHelper::get($args, "thead", true), ArrayHelper::get($args, "tfoot", true));
    }

    /**
     * Display a javascript DataTables.
     *
     * @param DataTablesWrapperInterface $dtWrapper The wrapper.
     * @param array<string,mixed> $args The arguments.
     * @return string Returns the javascript DataTables.
     * @throws FileNotFoundException Throws a file not found exception if the language file does not exist.
     */
    public function jDataTablesFunction(DataTablesWrapperInterface $dtWrapper, array $args = []): string {
        return $this->jDataTables($dtWrapper, ArrayHelper::get($args, "selector"), ArrayHelper::get($args, "language"));
    }

    /**
     * Display a javascript DataTables "Standalone".
     *
     * @param array<string,mixed> $args The arguments.
     * @return string Returns the DataTables "Standalone".
     * @throws FileNotFoundException Throws a file not found exception if the language file does not exist.
     */
    public function jDataTablesStandaloneFunction(array $args = []): string {
        return $this->jDataTablesStandalone(ArrayHelper::get($args, "selector", ".table"), ArrayHelper::get($args, "language"), ArrayHelper::get($args, "options", []));
    }
}

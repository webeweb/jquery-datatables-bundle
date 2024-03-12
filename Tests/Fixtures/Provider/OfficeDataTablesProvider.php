<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Provider;

use WBW\Bundle\JQuery\DataTablesBundle\Api\DataTablesColumnInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Api\DataTablesOptionsInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Api\DataTablesResponseInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Factory\DataTablesFactory;
use WBW\Bundle\JQuery\DataTablesBundle\Provider\DataTablesCSVExporterInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Provider\DataTablesEditorInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Provider\DataTablesProviderInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Provider\DataTablesRouterInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Entity\Office;

/**
 * Office DataTables provider.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Provider
 */
class OfficeDataTablesProvider implements DataTablesProviderInterface, DataTablesRouterInterface {

    /**
     * {@inheritDoc}
     */
    public function getCSVExporter(): ?DataTablesCSVExporterInterface {
        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function getColumns(): array {

        $dtColumns = [];

        $dtColumns[] = DataTablesFactory::newColumn("name", "Name");
        $dtColumns[] = DataTablesFactory::newColumn("actions", "Actions")->setOrderable(false)->setSearchable(false);

        return $dtColumns;
    }

    /**
     * {@inheritDoc}
     */
    public function getEditor(): ?DataTablesEditorInterface {
        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function getEntity(): string {
        return Office::class;
    }

    /**
     * {@inheritDoc}
     */
    public function getMethod(): string {
        return "POST";
    }

    /**
     * {@inheritDoc}
     */
    public function getName(): string {
        return "office";
    }

    /**
     * {@inheritDoc}
     */
    public function getOptions(): ?DataTablesOptionsInterface {
        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function getPrefix(): string {
        return "o";
    }

    /**
     * {@inheritDoc}
     */
    public function getUrl(): string {
        return "url";
    }

    /**
     * {@inheritDoc}
     */
    public function getView(): ?string {
        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function renderColumn(DataTablesColumnInterface $dtColumn, $entity): ?string {

        $output = null;

        switch ($dtColumn->getData()) {

            case "actions":
                $output = "";
                break;

            case "name":
                $output = $entity->getName();
                break;
        }

        return $output;
    }

    /**
     * {@inheritDoc}
     */
    public function renderRow(string $dtRow, $entity, int $rowNumber) {

        $output = null;

        switch ($dtRow) {

            case DataTablesResponseInterface::DATATABLES_ROW_ATTR:
                break;

            case DataTablesResponseInterface::DATATABLES_ROW_CLASS:
                $output = (0 === $rowNumber % 2 ? "even" : "odd");
                break;

            case DataTablesResponseInterface::DATATABLES_ROW_DATA:
                $output = ["pkey" => $entity->getId()];
                break;

            case DataTablesResponseInterface::DATATABLES_ROW_ID:
                $output = "office_" . $entity->getId();
                break;
        }

        return $output;
    }
}

<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Fixtures\Provider;

use WBW\Bundle\DataTablesBundle\Factory\DataTablesFactory;
use WBW\Bundle\DataTablesBundle\Model\DataTablesColumnInterface;
use WBW\Bundle\DataTablesBundle\Model\DataTablesOptionsInterface;
use WBW\Bundle\DataTablesBundle\Model\DataTablesResponseInterface;
use WBW\Bundle\DataTablesBundle\Provider\DataTablesCsvExporterInterface;
use WBW\Bundle\DataTablesBundle\Provider\DataTablesEditorInterface;
use WBW\Bundle\DataTablesBundle\Provider\DataTablesProviderInterface;
use WBW\Bundle\DataTablesBundle\Provider\DataTablesRouterInterface;
use WBW\Bundle\DataTablesBundle\Tests\Fixtures\Entity\Office;

/**
 * Office DataTables provider.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Fixtures\Provider
 */
class OfficeDataTablesProvider implements DataTablesProviderInterface, DataTablesRouterInterface {

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
    public function getCsvExporter(): ?DataTablesCsvExporterInterface {
        return null;
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

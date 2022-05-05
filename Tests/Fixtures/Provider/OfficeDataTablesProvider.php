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
     * {@inheritdoc}
     */
    public function getCSVExporter(): ?DataTablesCSVExporterInterface {
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getColumns(): array {

        $dtColumns = [];

        $dtColumns[] = DataTablesFactory::newColumn("name", "Name");
        $dtColumns[] = DataTablesFactory::newColumn("actions", "Actions")->setOrderable(false)->setSearchable(false);

        return $dtColumns;
    }

    /**
     * {@inheritdoc}
     */
    public function getEditor(): ?DataTablesEditorInterface {
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getEntity(): string {
        return Office::class;
    }

    /**
     * {@inheritdoc}
     */
    public function getMethod(): string {
        return "POST";
    }

    /**
     * {@inheritdoc}
     */
    public function getName(): string {
        return "office";
    }

    /**
     * {@inheritdoc}
     */
    public function getOptions(): ?DataTablesOptionsInterface {
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getPrefix(): string {
        return "o";
    }

    /**
     * {@inheritdoc}
     */
    public function getUrl(): string {
        return "url";
    }

    /**
     * {@inheritdoc}
     */
    public function getView(): ?string {
        return null;
    }

    /**
     * {@inheritdoc}
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
     * {@inheritdoc}
     */
    public function renderRow(string $dtRow, $entity, int $rowNumber) {

        $output = null;

        switch ($dtRow) {

            case self::DATATABLES_ROW_ATTR:
                break;

            case self::DATATABLES_ROW_CLASS:
                $output = (0 === $rowNumber % 2 ? "even" : "odd");
                break;

            case self::DATATABLES_ROW_DATA:
                $output = ["pkey" => $entity->getId()];
                break;

            case self::DATATABLES_ROW_ID:
                $output = "office_" . $entity->getId();
                break;
        }

        return $output;
    }
}

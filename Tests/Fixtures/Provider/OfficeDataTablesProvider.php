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

use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesColumnInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Factory\DataTablesFactory;
use WBW\Bundle\JQuery\DataTablesBundle\Provider\DataTablesProviderInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Provider\DataTablesRouterInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Entity\Office;
use WBW\Library\Core\Network\HTTP\HTTPInterface;

/**
 * Office DataTables provider.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Provider
 */
class OfficeDataTablesProvider implements DataTablesProviderInterface, DataTablesRouterInterface {

    /**
     * {@inheritDoc}
     */
    public function getCSVExporter() {
        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function getColumns() {

        $dtColumns = [];

        $dtColumns[] = DataTablesFactory::newColumn("name", "Name");
        $dtColumns[] = DataTablesFactory::newColumn("actions", "Actions")->setOrderable(false)->setSearchable(false);

        return $dtColumns;
    }

    /**
     * {@inheritDoc}
     */
    public function getEditor() {
        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function getEntity() {
        return Office::class;
    }

    /**
     * {@inheritDoc}
     */
    public function getMethod() {
        return HTTPInterface::HTTP_METHOD_POST;
    }

    /**
     * {@inheritDoc}
     */
    public function getName() {
        return "office";
    }

    /**
     * {@inheritDoc}
     */
    public function getOptions() {
        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function getPrefix() {
        return "o";
    }

    /**
     * {@inheritDoc}
     */
    public function getUrl() {
        return "url";
    }

    /**
     * {@inheritDoc}
     */
    public function getView() {
        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function renderColumn(DataTablesColumnInterface $dtColumn, $entity) {

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
    public function renderRow($dtRow, $entity, $rowNumber) {

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

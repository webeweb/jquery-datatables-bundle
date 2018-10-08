<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Factory;

use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesOrder;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesOrderInterface;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesSearch;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesSearchInterface;
use WBW\Library\Core\Argument\BooleanHelper;

/**
 * DataTables factory.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Factory
 */
class DataTablesFactory {

    /**
     * Create an order.
     *
     * @param array $rawOrder The raw order.
     * @return DataTablesOrderInterface Returns the order.
     */
    public function newOrder(array $rawOrder) {

        // Initialize an order.
        $dtOrder = new DataTablesOrder();

        // Determines if the raw order is valid.
        if (false === array_key_exists(DataTablesOrderInterface::DATATABLES_PARAMETER_COLUMN, $rawOrder)) {
            return $dtOrder;
        }
        if (false === array_key_exists(DataTablesOrderInterface::DATATABLES_PARAMETER_DIR, $rawOrder)) {
            return $dtOrder;
        }

        // Set the order.
        $dtOrder->setColumn(intval($rawOrder[DataTablesOrderInterface::DATATABLES_PARAMETER_COLUMN]));
        $dtOrder->setDir($rawOrder[DataTablesOrderInterface::DATATABLES_PARAMETER_DIR]);

        // Return the order.
        return $dtOrder;
    }

    /**
     * Create orders.
     *
     * @param array $rawOrders The raw orders.
     * @return DataTablesOrderInterface[] Returns the orders.
     */
    public function newOrders(array $rawOrders) {

        // Initialize the orders.
        $dtOrders = [];

        // Handle each raw order.
        foreach ($rawOrders as $current) {

            // Add the order.
            $dtOrders[] = static::newOrder($current);
        }

        // Return the orders.
        return $dtOrders;
    }

    /**
     * Creates a search.
     *
     * @param array $rawSearch The raw search.
     * @return DataTablesSearchInterface Returns the search.
     */
    public static function newSearch(array $rawSearch) {

        // Initialize a search.
        $dtSearch = new DataTablesSearch();

        // Determines if the raw search is valid.
        if (false === array_key_exists(DataTablesSearchInterface::DATATABLES_PARAMETER_REGEX, $rawSearch)) {
            return $dtSearch;
        }
        if (false === array_key_exists(DataTablesSearchInterface::DATATABLES_PARAMETER_VALUE, $rawSearch)) {
            return $dtSearch;
        }

        // Set the search.
        $dtSearch->setRegex(BooleanHelper::parseString($rawSearch[DataTablesSearchInterface::DATATABLES_PARAMETER_REGEX]));
        $dtSearch->setValue($rawSearch[DataTablesSearchInterface::DATATABLES_PARAMETER_VALUE]);

        // Return the search.
        return $dtSearch;
    }

}

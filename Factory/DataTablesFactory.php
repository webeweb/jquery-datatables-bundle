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

use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\HttpFoundation\Request;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesColumn;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesColumnInterface;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesEnumerator;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesOrder;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesOrderInterface;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesRequest;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesRequestInterface;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesResponse;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesResponseInterface;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesSearch;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesSearchInterface;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesWrapper;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesWrapperInterface;
use WBW\Library\Core\Argument\BooleanHelper;
use WBW\Library\Core\Network\HTTP\HTTPInterface;

/**
 * DataTables factory.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Factory
 */
class DataTablesFactory {

    /**
     * Copy a parameter bag.
     *
     * @param ParameterBag $src The source.
     * @param ParameterBag $dst The destination.
     * @return void
     */
    protected static function copyParameterBag(ParameterBag $src, ParameterBag $dst) {
        foreach ($src->keys() as $current) {
            if (true === in_array($current, DataTablesEnumerator::enumParameters())) {
                continue;
            }
            $dst->set($current, $src->get($current));
        }
    }

    /**
     * Determines if a raw column is valid.
     *
     * @param array $rawColumn The raw column.
     * @return bool Returns true in case of success, false otherwise.
     */
    protected static function isValidRawColumn(array $rawColumn) {
        if (false === array_key_exists(DataTablesColumnInterface::DATATABLES_PARAMETER_DATA, $rawColumn)) {
            return false;
        }
        if (false === array_key_exists(DataTablesColumnInterface::DATATABLES_PARAMETER_NAME, $rawColumn)) {
            return false;
        }
        return true;
    }

    /**
     * Determines if a raw order is valid.
     *
     * @param array $rawOrder The raw order.
     * @return bool Returns true in case of success, false otherwise.
     */
    protected static function isValidRawOrder(array $rawOrder) {
        if (false === array_key_exists(DataTablesOrderInterface::DATATABLES_PARAMETER_COLUMN, $rawOrder)) {
            return false;
        }
        if (false === array_key_exists(DataTablesOrderInterface::DATATABLES_PARAMETER_DIR, $rawOrder)) {
            return false;
        }
        return true;
    }

    /**
     * Determines if a raw search is valid.
     *
     * @param array $rawSearch The raw search.
     * @return bool Returns true in case of success, false otherwise.
     */
    protected static function isValidRawSearch(array $rawSearch) {
        if (false === array_key_exists(DataTablesSearchInterface::DATATABLES_PARAMETER_REGEX, $rawSearch)) {
            return false;
        }
        if (false === array_key_exists(DataTablesSearchInterface::DATATABLES_PARAMETER_VALUE, $rawSearch)) {
            return false;
        }
        return true;
    }

    /**
     * Create a new column instance.
     *
     * @param string $data The column data.
     * @param string $name The column name.
     * @param string $cellType The column cell type.
     * @return DataTablesColumnInterface Returns a column.
     */
    public static function newColumn($data, $name, $cellType = DataTablesColumnInterface::DATATABLES_CELL_TYPE_TD) {

        // Initialize a column.
        $dtColumn = new DataTablesColumn();
        $dtColumn->getMapping()->setColumn($data);
        $dtColumn->setCellType($cellType);
        $dtColumn->setData($data);
        $dtColumn->setName($name);
        $dtColumn->setTitle($name);

        // Return the column.
        return $dtColumn;
    }

    /**
     * Create a new response.
     *
     * @param DataTablesWrapperInterface $wrapper The wrapper.
     * @return DataTablesResponseInterface Returns a response.
     */
    protected static function newResponse(DataTablesWrapperInterface $wrapper) {

        // Initialize a response.
        $dtResponse = new DataTablesResponse();
        $dtResponse->setDraw($wrapper->getRequest()->getDraw());
        $dtResponse->setWrapper($wrapper);

        // Return the response.
        return $dtResponse;
    }

    /**
     * Create a new wrapper.
     *
     * @param string $url The URL.
     * @param string $name The name.
     * @return DataTablesWrapperInterface Returns a wrapper.
     */
    public static function newWrapper($url, $name) {
        return new DataTablesWrapper($url, $name);
    }

    /**
     * Parse a raw column.
     *
     * @param array $rawColumn The raw column.
     * @param DataTablesWrapperInterface $wrapper The wrapper.
     * @return DataTablesColumnInterface Returns the column.
     */
    protected static function parseColumn(array $rawColumn, DataTablesWrapperInterface $wrapper) {

        // Determines if the raw column is valid.
        if (false === static::isValidRawColumn($rawColumn)) {
            return null;
        }

        // Get the column.
        $dtColumn = $wrapper->getColumn($rawColumn[DataTablesColumnInterface::DATATABLES_PARAMETER_DATA]);

        // Check the column.
        if (null === $dtColumn) {
            return null;
        }
        if ($dtColumn->getName() !== $rawColumn[DataTablesColumnInterface::DATATABLES_PARAMETER_NAME]) {
            return null;
        }
        if (false === $dtColumn->getSearchable()) {
            $dtColumn->setSearch(static::parseSearch([])); // Set a default search.
            return $dtColumn;
        }

        // Set the search.
        $dtColumn->setSearch(static::parseSearch($rawColumn[DataTablesColumnInterface::DATATABLES_PARAMETER_SEARCH]));

        // Return the column.
        return $dtColumn;
    }

    /**
     * Parse a raw columns.
     *
     * @param array $rawColumns The raw columns.
     * @param DataTablesWrapperInterface $wrapper The wrapper.
     * @return DataTablesColumnInterface[] Returns the columns.
     */
    protected static function parseColumns(array $rawColumns, DataTablesWrapperInterface $wrapper) {

        // Initialize the columns.
        $dtColumns = [];

        // Handle each column.
        foreach ($rawColumns as $current) {

            // Parse the column.
            $dtColumn = static::parseColumn($current, $wrapper);

            // Check the column.
            if (null === $dtColumn) {
                continue;
            }

            // Add the column.
            $dtColumns[] = $dtColumn;
        }

        // Returns the columns.
        return $dtColumns;
    }

    /**
     * Parse a raw order.
     *
     * @param array $rawOrder The raw order.
     * @return DataTablesOrderInterface Returns the order.
     */
    protected static function parseOrder(array $rawOrder) {

        // Initialize an order.
        $dtOrder = new DataTablesOrder();

        // Determines if the raw order is valid.
        if (false === static::isValidRawOrder($rawOrder)) {
            return $dtOrder;
        }

        // Set the order.
        $dtOrder->setColumn(intval($rawOrder[DataTablesOrderInterface::DATATABLES_PARAMETER_COLUMN]));
        $dtOrder->setDir($rawOrder[DataTablesOrderInterface::DATATABLES_PARAMETER_DIR]);

        // Return the order.
        return $dtOrder;
    }

    /**
     * Parse raw orders.
     *
     * @param array $rawOrders The raw orders.
     * @return DataTablesOrderInterface[] Returns the orders.
     */
    protected static function parseOrders(array $rawOrders) {

        // Initialize the orders.
        $dtOrders = [];

        // Handle each raw order.
        foreach ($rawOrders as $current) {
            $dtOrders[] = static::parseOrder($current);
        }

        // Return the orders.
        return $dtOrders;
    }

    /**
     * Parse a request.
     *
     * @param DataTablesWrapperInterface $wrapper The wrapper.
     * @param Request $request The request.
     * @return DataTablesRequestInterface Returns the request.
     */
    protected static function parseRequest(DataTablesWrapperInterface $wrapper, Request $request) {

        // Initialize a request.
        $dtRequest = new DataTablesRequest();

        // Copy the parameter bags.
        static::copyParameterBag($request->query, $dtRequest->getQuery());
        static::copyParameterBag($request->request, $dtRequest->getRequest());

        // Get the parameter bag.
        if (HTTPInterface::HTTP_METHOD_GET === $request->getMethod()) {
            $parameterBag = $request->query;
        } else {
            $parameterBag = $request->request;
        }

        // Get the request parameters.
        $columns = null !== $parameterBag->get(DataTablesRequestInterface::DATATABLES_PARAMETER_COLUMNS) ? $parameterBag->get(DataTablesRequestInterface::DATATABLES_PARAMETER_COLUMNS) : [];
        $orders  = null !== $parameterBag->get(DataTablesRequestInterface::DATATABLES_PARAMETER_ORDER) ? $parameterBag->get(DataTablesRequestInterface::DATATABLES_PARAMETER_ORDER) : [];
        $search  = null !== $parameterBag->get(DataTablesRequestInterface::DATATABLES_PARAMETER_SEARCH) ? $parameterBag->get(DataTablesRequestInterface::DATATABLES_PARAMETER_SEARCH) : [];

        // Set the request.
        $dtRequest->setColumns(static::parseColumns($columns, $wrapper));
        $dtRequest->setDraw($parameterBag->getInt(DataTablesRequestInterface::DATATABLES_PARAMETER_DRAW));
        $dtRequest->setLength($parameterBag->getInt(DataTablesRequestInterface::DATATABLES_PARAMETER_LENGTH));
        $dtRequest->setOrder(static::parseOrders($orders));
        $dtRequest->setSearch(static::parseSearch($search));
        $dtRequest->setStart($parameterBag->getInt(DataTablesRequestInterface::DATATABLES_PARAMETER_START));
        $dtRequest->setWrapper($wrapper);

        // Return the request.
        return $dtRequest;
    }

    /**
     * Parse a raw search.
     *
     * @param array $rawSearch The raw search.
     * @return DataTablesSearchInterface Returns the search.
     */
    protected static function parseSearch(array $rawSearch) {

        // Initialize a search.
        $dtSearch = new DataTablesSearch();

        // Determines if the raw search is valid.
        if (false === static::isValidRawSearch($rawSearch)) {
            return $dtSearch;
        }

        // Set the search.
        $dtSearch->setRegex(BooleanHelper::parseString($rawSearch[DataTablesSearchInterface::DATATABLES_PARAMETER_REGEX]));
        $dtSearch->setValue($rawSearch[DataTablesSearchInterface::DATATABLES_PARAMETER_VALUE]);

        // Return the search.
        return $dtSearch;
    }

    /**
     * Parse a request.
     *
     * @param DataTablesWrapperInterface $wrapper The wrapper.
     * @param Request $request The request.
     * @return void
     */
    public static function parseWrapper(DataTablesWrapperInterface $wrapper, Request $request) {
        $wrapper->setRequest(static::parseRequest($wrapper, $request));
        $wrapper->setResponse(static::newResponse($wrapper));
    }

}

<?php

/*
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
use Symfony\Component\Security\Core\User\UserInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Api\DataTablesColumnInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Api\DataTablesOptionsInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Api\DataTablesOrderInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Api\DataTablesRequestInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Api\DataTablesResponseInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Api\DataTablesSearchInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Api\DataTablesWrapperInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Model\DataTablesColumn;
use WBW\Bundle\JQuery\DataTablesBundle\Model\DataTablesEnumerator;
use WBW\Bundle\JQuery\DataTablesBundle\Model\DataTablesOptions;
use WBW\Bundle\JQuery\DataTablesBundle\Model\DataTablesOrder;
use WBW\Bundle\JQuery\DataTablesBundle\Model\DataTablesRequest;
use WBW\Bundle\JQuery\DataTablesBundle\Model\DataTablesResponse;
use WBW\Bundle\JQuery\DataTablesBundle\Model\DataTablesSearch;
use WBW\Bundle\JQuery\DataTablesBundle\Model\DataTablesWrapper;
use WBW\Bundle\JQuery\DataTablesBundle\Provider\DataTablesProviderInterface;
use WBW\Library\Types\Helper\ArrayHelper;
use WBW\Library\Types\Helper\BooleanHelper;

/**
 * DataTables factory.
 *
 * @author webeweb <https://github.com/webeweb>
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
    protected static function copyParameterBag(ParameterBag $src, ParameterBag $dst): void {

        foreach ($src->keys() as $current) {

            if (true === in_array($current, DataTablesEnumerator::enumParameters())) {
                continue;
            }

            $dst->set($current, ArrayHelper::get($src->all(), $current));
        }
    }

    /**
     * Determine if a raw column is valid.
     *
     * @param array $rawColumn The raw column.
     * @return bool Returns true in case of success, false otherwise.
     */
    protected static function isValidRawColumn(array $rawColumn): bool {

        if (false === array_key_exists(DataTablesColumnInterface::DATATABLES_PARAMETER_DATA, $rawColumn)) {
            return false;
        }

        if (false === array_key_exists(DataTablesColumnInterface::DATATABLES_PARAMETER_NAME, $rawColumn)) {
            return false;
        }

        return true;
    }

    /**
     * Determine if a raw order is valid.
     *
     * @param array $rawOrder The raw order.
     * @return bool Returns true in case of success, false otherwise.
     */
    protected static function isValidRawOrder(array $rawOrder): bool {

        if (false === array_key_exists(DataTablesOrderInterface::DATATABLES_PARAMETER_COLUMN, $rawOrder)) {
            return false;
        }

        if (false === array_key_exists(DataTablesOrderInterface::DATATABLES_PARAMETER_DIR, $rawOrder)) {
            return false;
        }

        return true;
    }

    /**
     * Determine if a raw search is valid.
     *
     * @param array $rawSearch The raw search.
     * @return bool Returns true in case of success, false otherwise.
     */
    protected static function isValidRawSearch(array $rawSearch): bool {

        if (false === array_key_exists(DataTablesSearchInterface::DATATABLES_PARAMETER_REGEX, $rawSearch)) {
            return false;
        }

        if (false === array_key_exists(DataTablesSearchInterface::DATATABLES_PARAMETER_VALUE, $rawSearch)) {
            return false;
        }

        return true;
    }

    /**
     * Create a column.
     *
     * @param string $data The column data.
     * @param string $name The column name.
     * @param string $cellType The column cell type.
     * @return DataTablesColumnInterface Returns the column.
     */
    public static function newColumn(string $data, string $name, string $cellType = DataTablesColumnInterface::DATATABLES_CELL_TYPE_TD): DataTablesColumnInterface {

        $dtColumn = new DataTablesColumn();
        $dtColumn->getMapping()->setColumn($data);
        $dtColumn->setCellType($cellType);
        $dtColumn->setData($data);
        $dtColumn->setName($name);
        $dtColumn->setTitle($name);

        return $dtColumn;
    }

    /**
     * Create an options.
     *
     * @return DataTablesOptionsInterface Returns the options.
     */
    public static function newOptions(): DataTablesOptionsInterface {
        return new DataTablesOptions();
    }

    /**
     * Create a response.
     *
     * @param DataTablesWrapperInterface $wrapper The wrapper.
     * @return DataTablesResponseInterface Returns the response.
     */
    protected static function newResponse(DataTablesWrapperInterface $wrapper): DataTablesResponseInterface {

        $dtResponse = new DataTablesResponse();
        $dtResponse->setDraw($wrapper->getRequest()->getDraw());
        $dtResponse->setWrapper($wrapper);

        return $dtResponse;
    }

    /**
     * Create a wrapper.
     *
     * @param string $url The URL.
     * @param DataTablesProviderInterface $provider The provider.
     * @param UserInterface|null $user The user.
     * @return DataTablesWrapperInterface Returns the wrapper.
     */
    public static function newWrapper(string $url, DataTablesProviderInterface $provider, UserInterface $user = null): DataTablesWrapperInterface {

        $dtWrapper = new DataTablesWrapper();
        $dtWrapper->getMapping()->setPrefix($provider->getPrefix());
        $dtWrapper->setMethod($provider->getMethod());
        $dtWrapper->setProvider($provider);
        $dtWrapper->setUser($user);
        $dtWrapper->setUrl($url);

        return $dtWrapper;
    }

    /**
     * Parse a raw column.
     *
     * @param array $rawColumn The raw column.
     * @param DataTablesWrapperInterface $wrapper The wrapper.
     * @return DataTablesColumnInterface|null Returns the column.
     */
    protected static function parseColumn(array $rawColumn, DataTablesWrapperInterface $wrapper): ?DataTablesColumnInterface {

        if (false === DataTablesFactory::isValidRawColumn($rawColumn)) {
            return null;
        }

        $dtColumn = $wrapper->getColumn($rawColumn[DataTablesColumnInterface::DATATABLES_PARAMETER_DATA]);
        if (null === $dtColumn) {
            return null;
        }
        if ($dtColumn->getName() !== $rawColumn[DataTablesColumnInterface::DATATABLES_PARAMETER_NAME]) {
            return null;
        }
        if (false === $dtColumn->getSearchable()) {
            $dtColumn->setSearch(DataTablesFactory::parseSearch([])); // Set a default search.
            return $dtColumn;
        }

        $dtColumn->setSearch(DataTablesFactory::parseSearch($rawColumn[DataTablesColumnInterface::DATATABLES_PARAMETER_SEARCH]));

        return $dtColumn;
    }

    /**
     * Parse the raw columns.
     *
     * @param array $rawColumns The raw columns.
     * @param DataTablesWrapperInterface $wrapper The wrapper.
     * @return DataTablesColumnInterface[] Returns the columns.
     */
    protected static function parseColumns(array $rawColumns, DataTablesWrapperInterface $wrapper): array {

        $dtColumns = [];

        foreach ($rawColumns as $current) {

            $dtColumn = DataTablesFactory::parseColumn($current, $wrapper);
            if (null === $dtColumn) {
                continue;
            }

            $dtColumns[] = $dtColumn;
        }

        return $dtColumns;
    }

    /**
     * Parse a raw order.
     *
     * @param array $rawOrder The raw order.
     * @return DataTablesOrderInterface Returns the order.
     */
    protected static function parseOrder(array $rawOrder): DataTablesOrderInterface {

        $dtOrder = new DataTablesOrder();

        if (false === DataTablesFactory::isValidRawOrder($rawOrder)) {
            return $dtOrder;
        }

        $dtOrder->setColumn(intval($rawOrder[DataTablesOrderInterface::DATATABLES_PARAMETER_COLUMN]));
        $dtOrder->setDir($rawOrder[DataTablesOrderInterface::DATATABLES_PARAMETER_DIR]);

        return $dtOrder;
    }

    /**
     * Parse the raw orders.
     *
     * @param array $rawOrders The raw orders.
     * @return DataTablesOrderInterface[] Returns the orders.
     */
    protected static function parseOrders(array $rawOrders): array {

        $dtOrders = [];

        foreach ($rawOrders as $current) {
            $dtOrders[] = DataTablesFactory::parseOrder($current);
        }

        return $dtOrders;
    }

    /**
     * Parse a request.
     *
     * @param DataTablesWrapperInterface $wrapper The wrapper.
     * @param Request $request The request.
     * @return DataTablesRequestInterface Returns the request.
     */
    protected static function parseRequest(DataTablesWrapperInterface $wrapper, Request $request): DataTablesRequestInterface {

        $dtRequest = new DataTablesRequest();

        DataTablesFactory::copyParameterBag($request->query, $dtRequest->getQuery());
        DataTablesFactory::copyParameterBag($request->request, $dtRequest->getRequest());

        if ("GET" === $request->getMethod()) {
            $parameterBag = $request->query;
        } else {
            $parameterBag = $request->request;
        }

        // Get the request parameters.
        $columns = ArrayHelper::get($parameterBag->all(), DataTablesRequestInterface::DATATABLES_PARAMETER_COLUMNS, []);
        $orders  = ArrayHelper::get($parameterBag->all(), DataTablesRequestInterface::DATATABLES_PARAMETER_ORDER, []);
        $search  = ArrayHelper::get($parameterBag->all(), DataTablesRequestInterface::DATATABLES_PARAMETER_SEARCH, []);

        // Set the request.
        $dtRequest->setColumns(DataTablesFactory::parseColumns($columns, $wrapper));
        $dtRequest->setDraw($parameterBag->getInt(DataTablesRequestInterface::DATATABLES_PARAMETER_DRAW));
        $dtRequest->setLength($parameterBag->getInt(DataTablesRequestInterface::DATATABLES_PARAMETER_LENGTH));
        $dtRequest->setOrder(DataTablesFactory::parseOrders($orders));
        $dtRequest->setSearch(DataTablesFactory::parseSearch($search));
        $dtRequest->setStart($parameterBag->getInt(DataTablesRequestInterface::DATATABLES_PARAMETER_START));
        $dtRequest->setWrapper($wrapper);

        return $dtRequest;
    }

    /**
     * Parse a raw search.
     *
     * @param array $rawSearch The raw search.
     * @return DataTablesSearchInterface Returns the search.
     */
    protected static function parseSearch(array $rawSearch): DataTablesSearchInterface {

        $dtSearch = new DataTablesSearch();

        if (false === DataTablesFactory::isValidRawSearch($rawSearch)) {
            return $dtSearch;
        }

        $dtSearch->setRegex(BooleanHelper::parseString($rawSearch[DataTablesSearchInterface::DATATABLES_PARAMETER_REGEX]));
        $dtSearch->setValue($rawSearch[DataTablesSearchInterface::DATATABLES_PARAMETER_VALUE]);

        return $dtSearch;
    }

    /**
     * Parse a request.
     *
     * @param DataTablesWrapperInterface $wrapper The wrapper.
     * @param Request $request The request.
     * @return void
     */
    public static function parseWrapper(DataTablesWrapperInterface $wrapper, Request $request): void {
        $wrapper->setRequest(DataTablesFactory::parseRequest($wrapper, $request));
        $wrapper->setResponse(DataTablesFactory::newResponse($wrapper));
    }
}

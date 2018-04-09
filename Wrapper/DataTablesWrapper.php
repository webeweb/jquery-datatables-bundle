<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DatatablesBundle\Wrapper;

use Symfony\Component\HttpFoundation\Request;
use WBW\Bundle\JQuery\DatatablesBundle\Column\DataTablesColumn;
use WBW\Bundle\JQuery\DatatablesBundle\Mapping\DataTablesMapping;
use WBW\Bundle\JQuery\DatatablesBundle\Request\DataTablesRequest;
use WBW\Bundle\JQuery\DatatablesBundle\Response\DataTablesResponse;
use WBW\Library\Core\HTTP\HTTPMethodInterface;

/**
 * DataTables wrapper.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DatatablesBundle\Wrapper
 * @final
 */
final class DataTablesWrapper implements HTTPMethodInterface {

    /**
     * Columns.
     *
     * @var DataTablesColumn[]
     */
    private $columns;

    /**
     * Mapping.
     *
     * @var DataTablesMapping
     */
    private $mapping;

    /**
     * Method.
     *
     * @var string
     */
    private $method;

    /**
     * Order.
     *
     * @var array
     */
    private $order;

    /**
     * Processing.
     *
     * @var boolean
     */
    private $processing;

    /**
     * Request.
     *
     * @var DataTablesRequest
     */
    private $request;

    /**
     * Response.
     *
     * @var DataTablesResponse
     */
    private $response;

    /**
     * Route.
     *
     * @var string
     */
    private $route;

    /**
     * Route arguments.
     *
     * @var array
     */
    private $routeArguments;

    /**
     * Server side.
     *
     * @var boolean
     */
    private $serverSide;

    /**
     * Constructor.
     *
     * @param string $prefix The prefix.
     * @param string $method The method.
     * @param string $route The route.
     * @param array $routeArguments The route arguments.
     */
    public function __construct($prefix, $method, $route, array $routeArguments = []) {
        $this->mapping = new DataTablesMapping();
        $this->mapping->setPrefix($prefix);

        $this->setColumns([]);
        $this->setMethod($method);
        $this->setOrder([]);
        $this->setProcessing(true);
        $this->setRoute($route);
        $this->setRouteArguments($routeArguments);
        $this->setServerSide(true);
    }

    /**
     * Add a column.
     *
     * @param DataTablesColumn $column The column.
     * @return DataTablesWrapper Returns the DataTables wrapper.
     */
    public function addColumn(DataTablesColumn $column) {
        $this->columns[$column->getName()] = $column;
        if (null === $column->getMapping()->getPrefix()) {
            $this->columns[$column->getName()]->getMapping()->setPrefix($this->mapping->getPrefix());
        }
        return $this;
    }

    /**
     * Get a column.
     *
     * @param string $name The column name.
     * @return DataTablesColumn Returns the DataTables column in case of success, null otherwise.
     */
    public function getColumn($name) {
        if (true === array_key_exists($name, $this->columns)) {
            return $this->columns[$name];
        }
        return null;
    }

    /**
     * Get the columns.
     *
     * @return DataTablesColumn[] Returns the columns.
     */
    public function getColumns() {
        return $this->columns;
    }

    /**
     * Get the mapping.
     *
     * @return DataTablesMapping The mapping.
     */
    public function getMapping() {
        return $this->mapping;
    }

    /**
     * Get the method.
     *
     * @return string Returns the method.
     */
    public function getMethod() {
        return $this->method;
    }

    /**
     * Get the order.
     *
     * @return array Returns the order.
     */
    public function getOrder() {
        return $this->order;
    }

    /**
     * Get the processing.
     *
     * @return boolean Returns the processing.
     */
    public function getProcessing() {
        return $this->processing;
    }

    /**
     * Get the request.
     *
     * @return DataTablesRequest The request.
     */
    public function getRequest() {
        return $this->request;
    }

    /**
     * Get the response.
     *
     * @return DataTablesResponse Returns the response.
     */
    public function getResponse() {
        return $this->response;
    }

    /**
     * Get the route.
     *
     * @return string Returns the route.
     */
    public function getRoute() {
        return $this->route;
    }

    /**
     * Get the route arguments.
     *
     * @return array Returns the route arguments.
     */
    public function getRouteArguments() {
        return $this->routeArguments;
    }

    /**
     * Get the server side.
     *
     * @return boolean Returns the server side.
     */
    public function getServerSide() {
        return $this->serverSide;
    }

    /**
     * Parse a request.
     *
     * @param Request $request The request.
     */
    public function parse(Request $request) {
        $this->request  = new DataTablesRequest($request);
        $this->response = new DataTablesResponse($this->request);
    }

    /**
     * Remove a column.
     *
     * @param DataTablesColumn $column The column.
     * @return DataTablesWrapper Returns the DataTables wrapper.
     */
    public function removeColumn(DataTablesColumn $column) {
        if (true === array_key_exists($column->getName(), $this->columns)) {
            $this->columns[$column->getName()]->getMapping()->setPrefix(null);
            unset($this->columns[$column->getName()]);
        }
        return $this;
    }

    /**
     * Set the columns.
     *
     * @param DataTablesColumn[] $columns The columns.
     * @return DataTablesWrapper Returns the DataTables wrapper.
     */
    private function setColumns(array $columns) {
        $this->columns = $columns;
        return $this;
    }

    /**
     * Set the method.
     *
     * @param string $method The method.
     * @return DataTablesWrapper Returns the DataTables wrapper.
     */
    public function setMethod($method) {
        switch ($method) {
            case self::METHOD_GET:
            case self::METHOD_POST:
                $this->method = $method;
                break;
            default:
                $this->method = self::METHOD_GET;
        }
        return $this;
    }

    /**
     * Set the order.
     *
     * @param array $order The order.
     * @return DataTablesWrapper Returns the DataTables wrapper.
     */
    public function setOrder(array $order) {
        $this->order = $order;
        return $this;
    }

    /**
     * Set the processing.
     *
     * @param boolean $processing The processing.
     * @return DataTablesWrapper Returns the DataTables wrapper.
     */
    public function setProcessing($processing) {
        switch (true) {
            case (false === $processing):
            case (true === $processing):
                $this->processing = $processing;
                break;
            default:
                $this->processing = true;
                break;
        }
        return $this;
    }

    /**
     * Set the route.
     *
     * @param string $route The route.
     * @return DataTablesWrapper Returns the DataTables wrapper.
     */
    public function setRoute($route) {
        $this->route = $route;
        return $this;
    }

    /**
     * Set the route arguments.
     *
     * @param array $routeArguments The route arguments.
     * @return DataTablesWrapper Returns the DatTables wrapper.
     */
    public function setRouteArguments(array $routeArguments) {
        $this->routeArguments = $routeArguments;
        return $this;
    }

    /**
     * Set the server side.
     *
     * @param boolean $serverSide The server side.
     * @return DataTablesWrapper Returns the DataTables wrapper.
     */
    public function setServerSide($serverSide) {
        switch (true) {
            case (false === $serverSide):
            case (true === $serverSide):
                $this->serverSide = $serverSide;
                break;
            default:
                $this->serverSide = true;
                break;
        }
        return $this;
    }

}

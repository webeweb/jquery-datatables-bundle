<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\API;

use Symfony\Component\HttpFoundation\Request;
use WBW\Bundle\JQuery\DataTablesBundle\Provider\DataTablesProviderInterface;
use WBW\Library\Core\Network\HTTP\HTTPInterface;

/**
 * DataTables wrapper.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\API
 */
class DataTablesWrapper implements HTTPInterface {

    /**
     * Columns.
     *
     * @var DataTablesColumn[]
     */
    private $columns;

    /**
     * Mapping.
     *
     * @var DataTablesMappingInterface
     */
    private $mapping;

    /**
     * Method.
     *
     * @var string
     */
    private $method;

    /**
     * Name.
     *
     * @var string
     */
    private $name;

    /**
     * Options.
     *
     * @var DataTablesOptions
     */
    private $options;

    /**
     * Order.
     *
     * @var array
     */
    private $order;

    /**
     * Processing.
     *
     * @var bool
     */
    private $processing;

    /**
     * Provider.
     *
     * @var DataTablesProviderInterface
     */
    private $provider;

    /**
     * Request.
     *
     * @var DataTablesRequestInterface
     */
    private $request;

    /**
     * Response.
     *
     * @var DataTablesResponseInterface
     */
    private $response;

    /**
     * Server side.
     *
     * @var bool
     */
    private $serverSide;

    /**
     * URL.
     *
     * @var string
     */
    private $url;

    /**
     * Constructor.
     *
     * @param string $method The method.
     * @param string $url The URL.
     * @param string $name The name.
     */
    public function __construct($method, $url, $name) {
        $this->setMapping(new DataTablesMapping());

        $this->setColumns([]);
        $this->setMethod($method);
        $this->setName($name);
        $this->setOrder([]);
        $this->setProcessing(true);
        $this->setServerSide(true);
        $this->setUrl($url);
    }

    /**
     * Add a column.
     *
     * @param DataTablesColumn $column The column.
     * @return DataTablesWrapper Returns this wrapper.
     */
    public function addColumn(DataTablesColumn $column) {
        if (null === $column->getMapping()->getPrefix()) {
            $column->getMapping()->setPrefix($this->mapping->getPrefix());
        }
        $this->columns[$column->getData()] = $column;
        return $this;
    }

    /**
     * Get a column.
     *
     * @param string $data The column data.
     * @return DataTablesColumn Returns the column in case of success, null otherwise.
     */
    public function getColumn($data) {
        if (true === array_key_exists($data, $this->columns)) {
            return $this->columns[$data];
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
     * @return DataTablesMappingInterface Returns the mapping.
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
     * Get the name.
     *
     * @return string Returns the name.
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Get the options.
     *
     * @return DataTablesOptions Returns the options.
     */
    public function getOptions() {
        return $this->options;
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
     * @return bool Returns the processing.
     */
    public function getProcessing() {
        return $this->processing;
    }

    /**
     * Get the provider.
     *
     * @return DataTablesProviderInterface Returns the provider.
     */
    public function getProvider() {
        return $this->provider;
    }

    /**
     * Get the request.
     *
     * @return DataTablesRequestInterface The request.
     */
    public function getRequest() {
        return $this->request;
    }

    /**
     * Get the response.
     *
     * @return DataTablesResponseInterface Returns the response.
     */
    public function getResponse() {
        return $this->response;
    }

    /**
     * Get the server side.
     *
     * @return bool Returns the server side.
     */
    public function getServerSide() {
        return $this->serverSide;
    }

    /**
     * Get the URL.
     *
     * @return string Returns the URL.
     */
    public function getUrl() {
        return $this->url;
    }

    /**
     * Parse a request.
     *
     * @param Request $request The request.
     * @return DataTablesWrapper Returns this wrapper.
     */
    public function parse(Request $request) {
        $this->request  = DataTablesRequest::parse($this, $request);
        $this->response = DataTablesResponse::parse($this, $this->request);
        return $this;
    }

    /**
     * Remove a column.
     *
     * @param DataTablesColumn $column The column.
     * @return DataTablesWrapper Returns this wrapper.
     */
    public function removeColumn(DataTablesColumn $column) {
        if (true === array_key_exists($column->getData(), $this->columns)) {
            $this->columns[$column->getData()]->getMapping()->setPrefix(null);
            unset($this->columns[$column->getData()]);
        }
        return $this;
    }

    /**
     * Set the columns.
     *
     * @param DataTablesColumn[] $columns The columns.
     * @return DataTablesWrapper Returns this wrapper.
     */
    private function setColumns(array $columns) {
        $this->columns = $columns;
        return $this;
    }

    /**
     * Set the method.
     *
     * @param string $method The method.
     * @return DataTablesWrapper Returns this wrapper.
     */
    public function setMethod($method) {
        $this->method = (true === in_array($method, [self::HTTP_METHOD_GET, self::HTTP_METHOD_POST]) ? $method : self::HTTP_METHOD_POST);
        return $this;
    }

    /**
     * Set the mapping.
     *
     * @param DataTablesMappingInterface $mapping The mapping
     * @return DataTablesWrapper Returns this wrapper.
     */
    protected function setMapping(DataTablesMappingInterface $mapping) {
        $this->mapping = $mapping;
        return $this;
    }

    /**
     * Set the name.
     *
     * @param string $name The name.
     * @return DataTablesWrapper Returns this wrapper.
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     * Set the options.
     *
     * @param DataTablesOptions $options The options.
     * @return DataTablesWrapper Returns this wrapper.
     */
    public function setOptions(DataTablesOptions $options) {
        $this->options = $options;
        return $this;
    }

    /**
     * Set the order.
     *
     * @param array $order The order.
     * @return DataTablesWrapper Returns this wrapper.
     */
    public function setOrder(array $order) {
        $this->order = $order;
        return $this;
    }

    /**
     * Set the processing.
     *
     * @param bool $processing The processing.
     * @return DataTablesWrapper Returns this wrapper.
     */
    public function setProcessing($processing) {
        $this->processing = (false === $processing ? false : true);
        return $this;
    }

    /**
     * Set the provider.
     *
     * @param DataTablesProviderInterface $provider The provider.
     * @return DataTablesWrapper Returns this wrapper.
     */
    public function setProvider(DataTablesProviderInterface $provider) {
        $this->provider = $provider;
        return $this;
    }

    /**
     * Set the server side.
     *
     * @param bool $serverSide The server side.
     * @return DataTablesWrapper Returns this wrapper.
     */
    public function setServerSide($serverSide) {
        $this->serverSide = (false === $serverSide ? false : true);
        return $this;
    }

    /**
     * Set the URL.
     *
     * @param string $url The UTL.
     * @return DataTablesWrapper Returns this wrapper.
     */
    public function setUrl($url) {
        $this->url = $url;
        return $this;
    }

}

<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\API;

use WBW\Bundle\JQuery\DataTablesBundle\Provider\DataTablesProviderInterface;
use WBW\Library\Core\Network\HTTP\HTTPInterface;

/**
 * DataTables wrapper.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\API
 */
class DataTablesWrapper implements DataTablesWrapperInterface, HTTPInterface {

    /**
     * Columns.
     *
     * @var DataTablesColumnInterface[]
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
     * Options.
     *
     * @var DataTablesOptionsInterface
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
     */
    public function __construct() {
        $this->setColumns([]);
        $this->setMapping(new DataTablesMapping());
        $this->setMethod(HTTPInterface::HTTP_METHOD_POST);
        $this->setOrder([]);
        $this->setProcessing(true);
        $this->setServerSide(true);
    }

    /**
     * {@inheritdoc}
     */
    public function addColumn(DataTablesColumnInterface $column) {
        if (null === $column->getMapping()->getPrefix()) {
            $column->getMapping()->setPrefix($this->mapping->getPrefix());
        }
        $this->columns[$column->getData()] = $column;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getColumn($data) {
        if (true === array_key_exists($data, $this->columns)) {
            return $this->columns[$data];
        }
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getColumns() {
        return $this->columns;
    }

    /**
     * {@inheritdoc}
     */
    public function getMapping() {
        return $this->mapping;
    }

    /**
     * {@inheritdoc}
     */
    public function getMethod() {
        return $this->method;
    }

    /**
     * {@inheritdoc}
     */
    public function getOptions() {
        return $this->options;
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder() {
        return $this->order;
    }

    /**
     * {@inheritdoc}
     */
    public function getProcessing() {
        return $this->processing;
    }

    /**
     * {@inheritdoc}
     */
    public function getProvider() {
        return $this->provider;
    }

    /**
     * {@inheritdoc}
     */
    public function getRequest() {
        return $this->request;
    }

    /**
     * {@inheritdoc}
     */
    public function getResponse() {
        return $this->response;
    }

    /**
     * {@inheritdoc}
     */
    public function getServerSide() {
        return $this->serverSide;
    }

    /**
     * {@inheritdoc}
     */
    public function getUrl() {
        return $this->url;
    }

    /**
     * Remove a column.
     *
     * @param DataTablesColumnInterface $column The column.
     * @return DataTablesWrapperInterface Returns this wrapper.
     */
    public function removeColumn(DataTablesColumnInterface $column) {
        if (true === array_key_exists($column->getData(), $this->columns)) {
            $this->columns[$column->getData()]->getMapping()->setPrefix(null);
            unset($this->columns[$column->getData()]);
        }
        return $this;
    }

    /**
     * Set the columns.
     *
     * @param DataTablesColumnInterface[] $columns The columns.
     * @return DataTablesWrapperInterface Returns this wrapper.
     */
    private function setColumns(array $columns) {
        $this->columns = $columns;
        return $this;
    }

    /**
     * Set the method.
     *
     * @param string $method The method.
     * @return DataTablesWrapperInterface Returns this wrapper.
     */
    public function setMethod($method) {
        $this->method = (true === in_array($method, [self::HTTP_METHOD_GET, self::HTTP_METHOD_POST]) ? $method : self::HTTP_METHOD_POST);
        return $this;
    }

    /**
     * Set the mapping.
     *
     * @param DataTablesMappingInterface $mapping The mapping
     * @return DataTablesWrapperInterface Returns this wrapper.
     */
    public function setMapping(DataTablesMappingInterface $mapping) {
        $this->mapping = $mapping;
        return $this;
    }

    /**
     * Set the options.
     *
     * @param DataTablesOptionsInterface $options The options.
     * @return DataTablesWrapperInterface Returns this wrapper.
     */
    public function setOptions(DataTablesOptionsInterface $options) {
        $this->options = $options;
        return $this;
    }

    /**
     * Set the order.
     *
     * @param array $order The order.
     * @return DataTablesWrapperInterface Returns this wrapper.
     */
    public function setOrder(array $order) {
        $this->order = $order;
        return $this;
    }

    /**
     * Set the processing.
     *
     * @param bool $processing The processing.
     * @return DataTablesWrapperInterface Returns this wrapper.
     */
    public function setProcessing($processing) {
        $this->processing = (false === $processing ? false : true);
        return $this;
    }

    /**
     * Set the provider.
     *
     * @param DataTablesProviderInterface $provider The provider.
     * @return DataTablesWrapperInterface Returns this wrapper.
     */
    public function setProvider(DataTablesProviderInterface $provider) {
        $this->provider = $provider;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setRequest(DataTablesRequestInterface $request) {
        $this->request = $request;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setResponse(DataTablesResponseInterface $response) {
        $this->response = $response;
        return $this;
    }

    /**
     * Set the server side.
     *
     * @param bool $serverSide The server side.
     * @return DataTablesWrapperInterface Returns this wrapper.
     */
    public function setServerSide($serverSide) {
        $this->serverSide = (false === $serverSide ? false : true);
        return $this;
    }

    /**
     * Set the URL.
     *
     * @param string $url The UTL.
     * @return DataTablesWrapperInterface Returns this wrapper.
     */
    public function setUrl($url) {
        $this->url = $url;
        return $this;
    }

}

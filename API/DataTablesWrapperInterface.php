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

use WBW\Bundle\JQuery\DataTablesBundle\Provider\DataTablesProviderInterface;

/**
 * DataTables wrapper interface.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\API
 */
interface DataTablesWrapperInterface {

    /**
     * Add a column.
     *
     * @param DataTablesColumnInterface $column The column.
     * @return DataTablesWrapperInterface Returns this wrapper.
     */
    public function addColumn(DataTablesColumnInterface $column);

    /**
     * Get a column.
     *
     * @param string $data The column data.
     * @return DataTablesColumnInterface Returns the column in case of success, null otherwise.
     */
    public function getColumn($data);

    /**
     * Get the columns.
     *
     * @return DataTablesColumnInterface[] Returns the columns.
     */
    public function getColumns();

    /**
     * Get the mapping.
     *
     * @return DataTablesMappingInterface Returns the mapping.
     */
    public function getMapping();

    /**
     * Get the method.
     *
     * @return string Returns the method.
     */
    public function getMethod();

    /**
     * Get the options.
     *
     * @return DataTablesOptionsInterface Returns the options.
     */
    public function getOptions();

    /**
     * Get the order.
     *
     * @return array Returns the order.
     */
    public function getOrder();

    /**
     * Get the processing.
     *
     * @return bool Returns the processing.
     */
    public function getProcessing();

    /**
     * Get the provider.
     *
     * @return DataTablesProviderInterface Returns the provider.
     */
    public function getProvider();

    /**
     * Get the request.
     *
     * @return DataTablesRequestInterface The request.
     */
    public function getRequest();

    /**
     * Get the response.
     *
     * @return DataTablesResponseInterface Returns the response.
     */
    public function getResponse();

    /**
     * Get the server side.
     *
     * @return bool Returns the server side.
     */
    public function getServerSide();

    /**
     * Get the URL.
     *
     * @return string Returns the URL.
     */
    public function getUrl();

    /**
     * Set the request.
     *
     * @param DataTablesRequestInterface $request The request.
     * @return DataTablesWrapperInterface Returns this wrapper.
     */
    public function setRequest(DataTablesRequestInterface $request);

    /**
     * Set the response.
     *
     * @param DataTablesResponseInterface $response The response.
     * @return DataTablesWrapperInterface Returns this wrapper.
     */
    public function setResponse(DataTablesResponseInterface $response);
}

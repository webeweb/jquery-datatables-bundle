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

use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * DataTables request interface.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\API
 */
interface DataTablesRequestInterface {

    /**
     * Parameter "columns".
     *
     * @var string
     */
    const DATATABLES_PARAMETER_COLUMNS = "columns";

    /**
     * Parameter "draw".
     *
     * @var string
     */
    const DATATABLES_PARAMETER_DRAW = "draw";

    /**
     * Parameter "length".
     *
     * @var string
     */
    const DATATABLES_PARAMETER_LENGTH = "length";

    /**
     * Parameter "order".
     *
     * @var string
     */
    const DATATABLES_PARAMETER_ORDER = "order";

    /**
     * Parameter "search".
     *
     * @var string
     */
    const DATATABLES_PARAMETER_SEARCH = "search";

    /**
     * Parameter "search".
     *
     * @var string
     */
    const DATATABLES_PARAMETER_START = "start";

    /**
     * Get a column.
     *
     * @param string $data The column data.
     * @return array Returns the column in case of success, null otherwise.
     */
    public function getColumn($data);

    /**
     * Get the columns.
     *
     * @return DataTablesColumn[] Returns the columns.
     */
    public function getColumns();

    /**
     * Get the draw.
     *
     * @return int Returns the draw.
     */
    public function getDraw();

    /**
     * Get the length.
     *
     * @return int Returns the length.
     */
    public function getLength();

    /**
     * Get the order.
     *
     * @return DataTablesOrderInterface[] Returns the order.
     */
    public function getOrder();

    /**
     * Get the query.
     *
     * @return ParameterBag Returns the query.
     */
    public function getQuery();

    /**
     * Get the request.
     *
     * @return ParameterBag Returns the request.
     */
    public function getRequest();

    /**
     * Get the search.
     *
     * @return DataTablesSearchInterface Returns the search.
     */
    public function getSearch();

    /**
     * Get the start.
     *
     * @return int Returns the start.
     */
    public function getStart();

    /**
     * Get the wrapper.
     *
     * @return DataTablesWrapper Returns the wrapper.
     */
    public function getWrapper();
}

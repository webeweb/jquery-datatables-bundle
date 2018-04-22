<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DatatablesBundle\API;

use Symfony\Component\HttpFoundation\Request;
use WBW\Library\Core\IO\HTTPInterface;

/**
 * DataTables request.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DatatablesBundle\API
 */
class DataTablesRequest implements HTTPInterface {

    /**
     * Columns.
     *
     * @var DataTablesColumn[]
     */
    private $columns;

    /**
     * Draw.
     *
     * @var integer
     */
    private $draw;

    /**
     * Length.
     *
     * @var integer
     */
    private $length;

    /**
     * Order.
     *
     * @var DataTablesOrder[]
     */
    private $order;

    /**
     * Search.
     *
     * @var DataTablesSearch
     */
    private $search;

    /**
     * Start.
     *
     * @var integer
     */
    private $start;

    /**
     * Wrapper.
     *
     * @var DataTablesWrapper
     */
    private $wrapper;

    /**
     * Constructor.
     */
    protected function __construct() {
        $this->setColumns([]);
        $this->setDraw(0);
        $this->setLength(10);
        $this->setOrder([]);
        $this->setStart(0);
    }

    /**
     * Get a column.
     *
     * @param string $data The column data.
     * @return array Returns the column in case of success, null otherwise.
     */
    public function getColumn($data) {
        foreach ($this->columns as $current) {
            if ($data === $current->getData()) {
                return $current;
            }
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
     * Get the draw.
     *
     * @return integer Returns the draw.
     */
    public function getDraw() {
        return $this->draw;
    }

    /**
     * Get the length.
     *
     * @return integer Returns the length.
     */
    public function getLength() {
        return $this->length;
    }

    /**
     * Get the order.
     *
     * @return DataTablesOrder[] Returns the order.
     */
    public function getOrder() {
        return $this->order;
    }

    /**
     * Get the search.
     *
     * @return DatTablesSearch Returns the search.
     */
    public function getSearch() {
        return $this->search;
    }

    /**
     * Get the start.
     *
     * @return integer Returns the start.
     */
    public function getStart() {
        return $this->start;
    }

    /**
     * Get the wrapper.
     *
     * @return DataTablesWrapper Returns the wrapper.
     */
    public function getWrapper() {
        return $this->wrapper;
    }

    /**
     * Parse a request.
     *
     * @param DataTablesWrapper $wrapper The wrapper.
     * @param Request $request The request.
     * @return DataTablesRequest Returns the DataTables request.
     */
    public static function parse(DataTablesWrapper $wrapper, Request $request) {

        // Initialize a DataTables request.
        $dtRequest = new DataTablesRequest();

        // Get the parameter bag.
        if (self::HTTP_METHOD_GET === $request->getMethod()) {
            $parameterBag = $request->query;
        } else {
            $parameterBag = $request->request;
        }

        // Get the request parameters.
        $columns = null !== $parameterBag->get("columns") ? $parameterBag->get("columns") : [];
        $orders  = null !== $parameterBag->get("order") ? $parameterBag->get("order") : [];
        $search  = null !== $parameterBag->get("search") ? $parameterBag->get("search") : [];

        // Set the DataTables request.
        $dtRequest->setColumns(DataTablesColumn::parse($columns, $wrapper));
        $dtRequest->setDraw(intval($parameterBag->get("draw")));
        $dtRequest->setLength(intval($parameterBag->get("length")));
        $dtRequest->setOrder(DataTablesOrder::parse($orders));
        $dtRequest->setSearch(DataTablesSearch::parse($search));
        $dtRequest->setStart(intval($parameterBag->get("start")));
        $dtRequest->setWrapper($wrapper);

        // Return the DataTables request.
        return $dtRequest;
    }

    /**
     * Set the columns.
     *
     * @param DataTablesColumns $columns The columns.
     * @return DataTablesRequest Returns this DataTables request.
     */
    protected function setColumns($columns) {
        $this->columns = $columns;
        return $this;
    }

    /**
     * Set the draw.
     *
     * @param integer $draw The draw.
     * @return DataTablesRequest Returns this DataTables request.
     */
    protected function setDraw($draw) {
        $this->draw = $draw;
        return $this;
    }

    /**
     * Set the length.
     *
     * @param integer $length The length.
     * @return DataTablesRequest Returns this DataTables request.
     */
    protected function setLength($length) {
        $this->length = $length;
        return $this;
    }

    /**
     * Set the order.
     *
     * @param DataTablesOrder[] $order The order.
     * @return DataTablesRequest Returns this DataTables request.
     */
    protected function setOrder($order) {
        $this->order = $order;
        return $this;
    }

    /**
     * Set the search.
     *
     * @param DataTablesSearch $search The search.
     * @return DataTablesRequest Returns this DataTables request.
     */
    protected function setSearch(DataTablesSearch $search) {
        $this->search = $search;
        return $this;
    }

    /**
     * Set the start.
     *
     * @param integer $start The start.
     * @return DataTablesRequest Returns this DataTables request.
     */
    protected function setStart($start) {
        $this->start = $start;
        return $this;
    }

    /**
     * Set the wrapper.
     *
     * @param DataTablesWrapper $wrapper The wrapper.
     * @return DataTablesRequest Returns this DataTables request.
     */
    protected function setWrapper(DataTablesWrapper $wrapper) {
        $this->wrapper = $wrapper;
        return $this;
    }

}

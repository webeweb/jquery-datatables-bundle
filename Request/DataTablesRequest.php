<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DatatablesBundle\Request;

use Symfony\Component\HttpFoundation\Request;

/**
 * DataTables request.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DatatablesBundle\Request
 * @final
 */
final class DataTablesRequest {

    /**
     * Columns.
     *
     * @var array
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
     * @var array
     */
    private $order;

    /**
     * Search.
     *
     * @var array
     */
    private $search;

    /**
     * Start.
     *
     * @var integer
     */
    private $start;

    /**
     * Constructor.
     */
    private function __construct() {

        // Initialize.
        $this->setColumns([]);
        $this->setOrder([]);
        $this->setSearch([]);
    }

    /**
     * Get a column.
     *
     * @param string $name The column name.
     * @return array Returns the column in case of success, null otherwise.
     */
    public function getColumn($name) {
        $output = null;
        foreach ($this->columns as $column) {
            if ($column["name"] === $name) {
                $output = $column;
                break;
            }
        }
        return $output;
    }

    /**
     * Get the columns.
     *
     * @return array Returns the columns.
     */
    public function getColumns() {
        return $this->columns;
    }

    /**
     * Get the draw.
     *
     * @return integer Returns the draw.
     */
    public final function getDraw() {
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
     * @return array Returns the order.
     */
    public function getOrder() {
        return $this->order;
    }

    /**
     * Get the search.
     *
     * @return array Returns the search.
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
     * Create a DataTables request.
     *
     * @param Request $request The request.
     * @return DataTablesRequest Returns a DataTables request.
     */
    public static function newInstance(Request $request) {

        // Initialize the DataTables request.
        $instance = new DataTablesRequest();

        // Get the parameter bag.
        if ("GET" === $request->getMethod()) {
            $parameterBag = $request->query;
        } else {
            $parameterBag = $request->request;
        }

        // Set the DataTables request.
        $instance->setColumns(null !== $parameterBag->get("columns") ? $parameterBag->get("columns") : []);
        $instance->setDraw(intval($parameterBag->get("draw")));
        $instance->setLength(intval($parameterBag->get("length")));
        $instance->setOrder(null !== $parameterBag->get("order") ? $parameterBag->get("order") : []);
        $instance->setSearch(null !== $parameterBag->get("search") ? $parameterBag->get("search") : []);
        $instance->setStart(intval($parameterBag->get("start")));

        // Return the DataTables request.
        return $instance;
    }

    /**
     * Set the columns.
     *
     * @param array $columns The columns.
     * @return DataTablesRequest Returns the DataTables request.
     */
    private function setColumns(array $columns) {
        $this->columns = $columns;
        return $this;
    }

    /**
     * Set the draw.
     *
     * @param integer $draw The draw.
     * @return DataTablesRequest Returns the DataTables request.
     */
    public function setDraw($draw) {
        $this->draw = $draw;
        return $this;
    }

    /**
     * Set the length.
     *
     * @param integer $length The length.
     * @return DataTablesRequest Returns the DataTables request.
     */
    private function setLength($length) {
        $this->length = $length;
        return $this;
    }

    /**
     * Set the order.
     *
     * @param array $order The order.
     * @return DataTablesRequest Returns the DataTables request.
     */
    private function setOrder(array $order) {
        $this->order = $order;
        return $this;
    }

    /**
     * Set the search.
     *
     * @param array $search The search.
     * @return DataTablesRequest Returns the DataTables request.
     */
    private function setSearch(array $search) {
        $this->search = $search;
        return $this;
    }

    /**
     * Set the start.
     *
     * @param integer $start The start.
     * @return DataTablesRequest Returns the DataTables request.
     */
    private function setStart($start) {
        $this->start = $start;
        return $this;
    }

}

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
use WBW\Library\Core\HTTP\HTTPMethodInterface;

/**
 * DataTables request.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DatatablesBundle\Request
 * @final
 */
final class DataTablesRequest implements HTTPMethodInterface {

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
     *
     * @param Request $request The request.
     */
    public function __construct(Request $request) {

        // Set the attributes.
        $this->setColumns([]);
        $this->setOrder([]);
        $this->setSearch([]);

        // Parse the request.
        $this->parse($request);
    }

    /**
     * Get a column.
     *
     * @param string $name The column name.
     * @return array Returns the column in case of success, null otherwise.
     */
    public function getColumn($name) {
        foreach ($this->columns as $current) {
            if ($name === $current["name"]) {
                return $current;
            }
        }
        return null;
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
     * Parse a request.
     *
     * @param Request $request The request.
     * @return void
     */
    private function parse(Request $request) {

        // Get the parameter bag.
        if (self::METHOD_GET === $request->getMethod()) {
            $parameterBag = $request->query;
        } else {
            $parameterBag = $request->request;
        }

        // Set the DataTables request.
        $this->setColumns(null !== $parameterBag->get("columns") ? $parameterBag->get("columns") : []);
        $this->setDraw(intval($parameterBag->get("draw")));
        $this->setLength(intval($parameterBag->get("length")));
        $this->setOrder(null !== $parameterBag->get("order") ? $parameterBag->get("order") : []);
        $this->setSearch(null !== $parameterBag->get("search") ? $parameterBag->get("search") : []);
        $this->setStart(intval($parameterBag->get("start")));
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

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
use Symfony\Component\HttpFoundation\Request;
use WBW\Bundle\JQuery\DataTablesBundle\Helper\DataTablesRequestHelper;
use WBW\Library\Core\Network\HTTP\HTTPInterface;

/**
 * DataTables request.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\API
 */
class DataTablesRequest implements DataTablesRequestInterface, HTTPInterface {

    /**
     * Columns.
     *
     * @var DataTablesColumn[]
     */
    private $columns;

    /**
     * Draw.
     *
     * @var int
     */
    private $draw;

    /**
     * Length.
     *
     * @var int
     */
    private $length;

    /**
     * Order.
     *
     * @var DataTablesOrderInterface[]
     */
    private $order;

    /**
     * Query.
     *
     * @var ParameterBag
     */
    private $query;

    /**
     * Request.
     *
     * @var ParameterBag
     */
    private $request;

    /**
     * Search.
     *
     * @var DataTablesSearchInterface
     */
    private $search;

    /**
     * Start.
     *
     * @var int
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
        $this->setQuery(new ParameterBag());
        $this->setRequest(new ParameterBag());
        $this->setStart(0);
    }

    /**
     * {@inheritdoc}
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
     * {@inheritdoc}
     */
    public function getColumns() {
        return $this->columns;
    }

    /**
     * {@inheritdoc}
     */
    public function getDraw() {
        return $this->draw;
    }

    /**
     * {@inheritdoc}
     */
    public function getLength() {
        return $this->length;
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
    public function getQuery() {
        return $this->query;
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
    public function getSearch() {
        return $this->search;
    }

    /**
     * {@inheritdoc}
     */
    public function getStart() {
        return $this->start;
    }

    /**
     * {@inheritdoc}
     */
    public function getWrapper() {
        return $this->wrapper;
    }

    /**
     * Parse a request.
     *
     * @param DataTablesWrapper $wrapper The wrapper.
     * @param Request $request The request.
     * @return DataTablesRequestInterface Returns the request.
     */
    public static function parse(DataTablesWrapper $wrapper, Request $request) {

        // Initialize a request.
        $dtRequest = new DataTablesRequest();

        // Recopy the parameter bags.
        static::recopy($request->query, $dtRequest->getQuery());
        static::recopy($request->request, $dtRequest->getRequest());

        // Get the parameter bag.
        if (self::HTTP_METHOD_GET === $request->getMethod()) {
            $parameterBag = $request->query;
        } else {
            $parameterBag = $request->request;
        }

        // Get the request parameters.
        $columns = null !== $parameterBag->get(self::DATATABLES_PARAMETER_COLUMNS) ? $parameterBag->get(self::DATATABLES_PARAMETER_COLUMNS) : [];
        $orders  = null !== $parameterBag->get(self::DATATABLES_PARAMETER_ORDER) ? $parameterBag->get(self::DATATABLES_PARAMETER_ORDER) : [];
        $search  = null !== $parameterBag->get(self::DATATABLES_PARAMETER_SEARCH) ? $parameterBag->get(self::DATATABLES_PARAMETER_SEARCH) : [];

        // Set the request.
        $dtRequest->setColumns(DataTablesColumn::parse($columns, $wrapper));
        $dtRequest->setDraw($parameterBag->getInt(self::DATATABLES_PARAMETER_DRAW));
        $dtRequest->setLength($parameterBag->getInt(self::DATATABLES_PARAMETER_LENGTH));
        $dtRequest->setOrder(DataTablesOrder::parse($orders));
        $dtRequest->setSearch(DataTablesSearch::parse($search));
        $dtRequest->setStart($parameterBag->getInt(self::DATATABLES_PARAMETER_START));
        $dtRequest->setWrapper($wrapper);

        // Return the request.
        return $dtRequest;
    }

    /**
     * Recopy.
     *
     * @param ParameterBag $request The request.
     * @param ParameterBag $bag The bag.
     * @return void
     */
    protected static function recopy(ParameterBag $request, ParameterBag $bag) {
        foreach ($request->keys() as $current) {
            if (true === in_array($current, DataTablesRequestHelper::dtParameters())) {
                continue;
            }
            $bag->set($current, $request->get($current));
        }
    }

    /**
     * Set the columns.
     *
     * @param DataTablesColumn[] $columns The columns.
     * @return DataTablesRequestInterface Returns this request.
     */
    protected function setColumns(array $columns) {
        $this->columns = $columns;
        return $this;
    }

    /**
     * Set the draw.
     *
     * @param int $draw The draw.
     * @return DataTablesRequestInterface Returns this request.
     */
    protected function setDraw($draw) {
        $this->draw = $draw;
        return $this;
    }

    /**
     * Set the length.
     *
     * @param int $length The length.
     * @return DataTablesRequestInterface Returns this request.
     */
    protected function setLength($length) {
        $this->length = $length;
        return $this;
    }

    /**
     * Set the order.
     *
     * @param DataTablesOrderInterface[] $order The order.
     * @return DataTablesRequestInterface Returns this request.
     */
    protected function setOrder(array $order) {
        $this->order = $order;
        return $this;
    }

    /**
     * Set the request.
     *
     * @param ParameterBag $query The query.
     * @return DataTablesRequestInterface Returns this request.
     */
    protected function setQuery(ParameterBag $query) {
        $this->query = $query;
        return $this;
    }

    /**
     * Set the request.
     *
     * @param ParameterBag $request The request.
     * @return DataTablesRequestInterface Returns this request.
     */
    protected function setRequest(ParameterBag $request) {
        $this->request = $request;
        return $this;
    }

    /**
     * Set the search.
     *
     * @param DataTablesSearchInterface $search The search.
     * @return DataTablesRequestInterface Returns this request.
     */
    protected function setSearch(DataTablesSearchInterface $search) {
        $this->search = $search;
        return $this;
    }

    /**
     * Set the start.
     *
     * @param int $start The start.
     * @return DataTablesRequestInterface Returns this request.
     */
    protected function setStart($start) {
        $this->start = $start;
        return $this;
    }

    /**
     * Set the wrapper.
     *
     * @param DataTablesWrapper $wrapper The wrapper.
     * @return DataTablesRequestInterface Returns this request.
     */
    protected function setWrapper(DataTablesWrapper $wrapper) {
        $this->wrapper = $wrapper;
        return $this;
    }

}

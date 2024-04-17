<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Model;

use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * DataTables request.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Model
 */
class DataTablesRequest implements DataTablesRequestInterface {

    use DataTablesWrapperTrait {
        setWrapper as public;
    }

    /**
     * Columns.
     *
     * @var DataTablesColumnInterface[]|null
     */
    private $columns;

    /**
     * Draw.
     *
     * @var int|null
     */
    private $draw;

    /**
     * Length.
     *
     * @var int|null
     */
    private $length;

    /**
     * Order.
     *
     * @var DataTablesOrderInterface[]|null
     */
    private $order;

    /**
     * Query.
     *
     * @var ParameterBag|null
     */
    private $query;

    /**
     * Request.
     *
     * @var ParameterBag|null
     */
    private $request;

    /**
     * Search.
     *
     * @var DataTablesSearchInterface|null
     */
    private $search;

    /**
     * Start.
     *
     * @var int|null
     */
    private $start;

    /**
     * Constructor.
     */
    public function __construct() {
        $this->setColumns([]);
        $this->setDraw(0);
        $this->setLength(10);
        $this->setOrder([]);
        $this->setQuery(new ParameterBag());
        $this->setRequest(new ParameterBag());
        $this->setStart(0);
    }

    /**
     * {@inheritDoc}
     */
    public function getColumn(string $data): ?DataTablesColumnInterface {

        foreach ($this->columns as $current) {

            if ($data === $current->getData()) {
                return $current;
            }
        }

        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function getColumns(): array {
        return $this->columns;
    }

    /**
     * {@inheritDoc}
     */
    public function getDraw(): int {
        return $this->draw;
    }

    /**
     * {@inheritDoc}
     */
    public function getLength(): int {
        return $this->length;
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder(): array {
        return $this->order;
    }

    /**
     * {@inheritDoc}
     */
    public function getQuery(): ParameterBag {
        return $this->query;
    }

    /**
     * {@inheritDoc}
     */
    public function getRequest(): ParameterBag {
        return $this->request;
    }

    /**
     * {@inheritDoc}
     */
    public function getSearch(): ?DataTablesSearchInterface {
        return $this->search;
    }

    /**
     * {@inheritDoc}
     */
    public function getStart(): int {
        return $this->start;
    }

    /**
     * Set the columns.
     *
     * @param DataTablesColumnInterface[] $columns The columns.
     * @return DataTablesRequestInterface Returns this request.
     */
    public function setColumns(array $columns): DataTablesRequestInterface {
        $this->columns = $columns;
        return $this;
    }

    /**
     * Set the draw.
     *
     * @param int $draw The draw.
     * @return DataTablesRequestInterface Returns this request.
     */
    public function setDraw(int $draw): DataTablesRequestInterface {
        $this->draw = $draw;
        return $this;
    }

    /**
     * Set the length.
     *
     * @param int $length The length.
     * @return DataTablesRequestInterface Returns this request.
     */
    public function setLength(int $length): DataTablesRequestInterface {
        $this->length = $length;
        return $this;
    }

    /**
     * Set the order.
     *
     * @param DataTablesOrderInterface[] $order The order.
     * @return DataTablesRequestInterface Returns this request.
     */
    public function setOrder(array $order): DataTablesRequestInterface {
        $this->order = $order;
        return $this;
    }

    /**
     * Set the request.
     *
     * @param ParameterBag $query The query.
     * @return DataTablesRequestInterface Returns this request.
     */
    protected function setQuery(ParameterBag $query): DataTablesRequestInterface {
        $this->query = $query;
        return $this;
    }

    /**
     * Set the request.
     *
     * @param ParameterBag $request The request.
     * @return DataTablesRequestInterface Returns this request.
     */
    protected function setRequest(ParameterBag $request): DataTablesRequestInterface {
        $this->request = $request;
        return $this;
    }

    /**
     * Set the search.
     *
     * @param DataTablesSearchInterface|null $search The search.
     * @return DataTablesRequestInterface Returns this request.
     */
    public function setSearch(?DataTablesSearchInterface $search): DataTablesRequestInterface {
        $this->search = $search;
        return $this;
    }

    /**
     * Set the start.
     *
     * @param int $start The start.
     * @return DataTablesRequestInterface Returns this request.
     */
    public function setStart(int $start): DataTablesRequestInterface {
        $this->start = $start;
        return $this;
    }
}

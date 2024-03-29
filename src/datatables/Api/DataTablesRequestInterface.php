<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Api;

use Symfony\Component\HttpFoundation\ParameterBag;
use WBW\Bundle\DataTablesBundle\Model\DataTablesColumnInterface;
use WBW\Bundle\DataTablesBundle\Model\DataTablesOrderInterface;

/**
 * DataTables request interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Api
 */
interface DataTablesRequestInterface {

    /**
     * Parameter "columns".
     *
     * @var string
     */
    public const DATATABLES_PARAMETER_COLUMNS = "columns";

    /**
     * Parameter "draw".
     *
     * @var string
     */
    public const DATATABLES_PARAMETER_DRAW = "draw";

    /**
     * Parameter "length".
     *
     * @var string
     */
    public const DATATABLES_PARAMETER_LENGTH = "length";

    /**
     * Parameter "order".
     *
     * @var string
     */
    public const DATATABLES_PARAMETER_ORDER = "order";

    /**
     * Parameter "search".
     *
     * @var string
     */
    public const DATATABLES_PARAMETER_SEARCH = "search";

    /**
     * Parameter "search".
     *
     * @var string
     */
    public const DATATABLES_PARAMETER_START = "start";

    /**
     * Get a column.
     *
     * @param string $data The column data.
     * @return DataTablesColumnInterface|null Returns the column in case of success, null otherwise.
     */
    public function getColumn(string $data): ?DataTablesColumnInterface;

    /**
     * Get the columns.
     *
     * @return DataTablesColumnInterface[] Returns the columns.
     */
    public function getColumns(): array;

    /**
     * Get the draw.
     *
     * @return int Returns the draw.
     */
    public function getDraw(): int;

    /**
     * Get the length.
     *
     * @return int Returns the length.
     */
    public function getLength(): int;

    /**
     * Get the order.
     *
     * @return DataTablesOrderInterface[] Returns the order.
     */
    public function getOrder(): array;

    /**
     * Get the query.
     *
     * @return ParameterBag Returns the query.
     */
    public function getQuery(): ParameterBag;

    /**
     * Get the request.
     *
     * @return ParameterBag Returns the request.
     */
    public function getRequest(): ParameterBag;

    /**
     * Get the search.
     *
     * @return DataTablesSearchInterface|null Returns the search.
     */
    public function getSearch(): ?DataTablesSearchInterface;

    /**
     * Get the start.
     *
     * @return int Returns the start.
     */
    public function getStart(): int;

    /**
     * Get the wrapper.
     *
     * @return DataTablesWrapperInterface|null Returns the wrapper.
     */
    public function getWrapper(): ?DataTablesWrapperInterface;
}

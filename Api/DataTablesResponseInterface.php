<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Api;

use JsonSerializable;

/**
 * DataTables response interface.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Api
 */
interface DataTablesResponseInterface extends JsonSerializable {

    /**
     * Row "attr".
     *
     * @var string
     */
    const DATATABLES_ROW_ATTR = "DT_RowAttr";

    /**
     * Row "class".
     *
     * @var string
     */
    const DATATABLES_ROW_CLASS = "DT_RowClass";

    /**
     * Row "data".
     *
     * @var string
     */
    const DATATABLES_ROW_DATA = "DT_RowData";

    /**
     * Row "ID".
     *
     * @var string
     */
    const DATATABLES_ROW_ID = "DT_RowId";

    /**
     * Add a row.
     *
     * @return DataTablesResponseInterface Returns this response.
     */
    public function addRow(): DataTablesResponseInterface;

    /**
     * Get the data.
     *
     * @return array Returns the data.
     */
    public function getData(): array;

    /**
     * Get the draw
     *
     * @return int Returns the draw.
     */
    public function getDraw(): int;

    /**
     * Get the error.
     *
     * @return string|null Returns the error.
     */
    public function getError(): ?string;

    /**
     * Get the records filtered.
     *
     * @return int The records filtered.
     */
    public function getRecordsFiltered(): int;

    /**
     * Get the records total.
     *
     * @return int Returns the records total.
     */
    public function getRecordsTotal(): int;

    /**
     * Get the wrapper.
     *
     * @return DataTablesWrapperInterface|null Returns the wrapper.
     */
    public function getWrapper(): ?DataTablesWrapperInterface;

    /**
     * Rows count.
     *
     * @return int Returns the rows count.
     */
    public function rowsCount(): int;

    /**
     * Set the error.
     *
     * @param string|null $error The error.
     * @return DataTablesResponseInterface Returns this response.
     */
    public function setError(?string $error): DataTablesResponseInterface;

    /**
     * Set the records filtered.
     *
     * @param int $recordsFiltered The records filtered.
     * @return DataTablesResponseInterface Returns this response.
     */
    public function setRecordsFiltered(int $recordsFiltered): DataTablesResponseInterface;

    /**
     * Set the records total.
     *
     * @param int $recordsTotal The records total.
     * @return DataTablesResponseInterface Returns this response.
     */
    public function setRecordsTotal(int $recordsTotal): DataTablesResponseInterface;

    /**
     * Set a row value.
     *
     * @param string $data The column data.
     * @param mixed|null $value The column value.
     * @return DataTablesResponseInterface Returns this response.
     */
    public function setRow(string $data, $value): DataTablesResponseInterface;
}

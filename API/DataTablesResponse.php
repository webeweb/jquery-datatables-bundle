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

use WBW\Bundle\JQuery\DataTablesBundle\Normalizer\DataTablesNormalizer;

/**
 * DataTables response.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\API
 */
class DataTablesResponse implements DataTablesResponseInterface {

    use DataTablesWrapperTrait {
        setWrapper as public;
    }

    /**
     * Data.
     *
     * @var array
     */
    private $data;

    /**
     * Draw.
     *
     * @var int
     */
    private $draw;

    /**
     * Error.
     *
     * @var string|null
     */
    private $error;

    /**
     * Records filtered.
     *
     * @var int
     */
    private $recordsFiltered;

    /**
     * Records total.
     *
     * @var int
     */
    private $recordsTotal;

    /**
     * Constructor.
     */
    public function __construct() {
        $this->setData([]);
        $this->setDraw(0);
        $this->setRecordsFiltered(0);
        $this->setRecordsTotal(0);
    }

    /**
     * {@inheritDoc}
     */
    public function addRow(): DataTablesResponseInterface {

        $index = $this->countRows();

        $this->data[] = [];

        // Set each column data in the new row.
        foreach ($this->getWrapper()->getColumns() as $dtColumn) {
            $this->data[$index][$dtColumn->getData()] = null;
        }

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function countRows(): int {
        return count($this->data);
    }

    /**
     * {@inheritDoc}
     */
    public function getData(): array {
        return $this->data;
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
    public function getError(): ?string {
        return $this->error;
    }

    /**
     * {@inheritDoc}
     */
    public function getRecordsFiltered(): int {
        return $this->recordsFiltered;
    }

    /**
     * {@inheritDoc}
     */
    public function getRecordsTotal(): int {
        return $this->recordsTotal;
    }

    /**
     * {@inheritDoc}
     */
    public function jsonSerialize(): array {
        return DataTablesNormalizer::normalizeResponse($this);
    }

    /**
     * Set the data.
     *
     * @param array $data The data.
     * @return DataTablesResponseInterface Returns this response.
     */
    protected function setData(array $data): DataTablesResponseInterface {
        $this->data = $data;
        return $this;
    }

    /**
     * Set the draw.
     *
     * @param int $draw The draw.
     * @return DataTablesResponseInterface Returns the response.
     */
    public function setDraw(int $draw): DataTablesResponseInterface {
        $this->draw = $draw;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setError(?string $error): DataTablesResponseInterface {
        $this->error = $error;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setRecordsFiltered(int $recordsFiltered): DataTablesResponseInterface {
        $this->recordsFiltered = $recordsFiltered;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setRecordsTotal(int $recordsTotal): DataTablesResponseInterface {
        $this->recordsTotal = $recordsTotal;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setRow(string $data, $value): DataTablesResponseInterface {

        $index = $this->countRows() - 1;

        if ((true === in_array($data, DataTablesEnumerator::enumRows()) && null !== $value) || (true === in_array($data, array_keys($this->data[$index])))) {
            $this->data[$index][$data] = $value;
        }

        return $this;
    }
}

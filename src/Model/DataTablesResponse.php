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

use WBW\Bundle\DataTablesBundle\Normalizer\DataTablesNormalizer;

/**
 * DataTables response.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Model
 */
class DataTablesResponse implements DataTablesResponseInterface {

    use DataTablesWrapperTrait {
        setWrapper as public;
    }

    /**
     * Data.
     *
     * @var array<string,mixed>[]|null
     */
    private $data;

    /**
     * Draw.
     *
     * @var int|null
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
     * @var int|null
     */
    private $recordsFiltered;

    /**
     * Records total.
     *
     * @var int|null
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

        $index = $this->rowsCount();

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
     * @return array<string,mixed> Returns this serialized instance.
     */
    public function jsonSerialize(): array {
        return DataTablesNormalizer::normalizeResponse($this);
    }

    /**
     * {@inheritDoc}
     */
    public function rowsCount(): int {
        return count($this->data);
    }

    /**
     * Set the data.
     *
     * @param array<string,mixed>[] $data The data.
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

        $index = $this->rowsCount() - 1;

        if ((true === in_array($data, DataTablesEnumerator::enumRows()) && null !== $value) || (true === in_array($data, array_keys($this->data[$index])))) {
            $this->data[$index][$data] = $value;
        }

        return $this;
    }
}

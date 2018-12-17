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

/**
 * DataTables response.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\API
 */
class DataTablesResponse implements DataTablesResponseInterface {

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
     * @var string
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
     * @var DataTablesWrapperTrait
     */
    use DataTablesWrapperTrait;

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
     * {@inheritdoc}
     */
    public function addRow() {

        // Count the rows.
        $index = $this->countRows();

        // Add a new row.
        $this->data[] = [];

        // Set each column data in the new row.
        foreach ($this->getWrapper()->getColumns() as $dtColumn) {
            $this->data[$index][$dtColumn->getData()] = null;
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function countRows() {
        return count($this->data);
    }

    /**
     * {@inheritdoc}
     */
    public function getData() {
        return $this->data;
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
    public function getError() {
        return $this->error;
    }

    /**
     * {@inheritdoc}
     */
    public function getRecordsFiltered() {
        return $this->recordsFiltered;
    }

    /**
     * {@inheritdoc}
     */
    public function getRecordsTotal() {
        return $this->recordsTotal;
    }

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize() {
        return $this->toArray();
    }

    /**
     * Set the data.
     *
     * @param array $data The data.
     * @return DataTablesResponseInterface Returns this response.
     */
    protected function setData(array $data) {
        $this->data = $data;
        return $this;
    }

    /**
     * Set the draw.
     *
     * @param int $draw The draw.
     * @return DataTablesResponseInterface Returns the response.
     */
    public function setDraw($draw) {
        $this->draw = $draw;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setError($error) {
        $this->error = $error;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setRecordsFiltered($recordsFiltered) {
        $this->recordsFiltered = $recordsFiltered;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setRecordsTotal($recordsTotal) {
        $this->recordsTotal = $recordsTotal;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setRow($data, $value) {

        // Count the rows.
        $index = $this->countRows() - 1;

        // Check the column data.
        if ((true === in_array($data, DataTablesEnumerator::enumRows()) && null !== $value) || (true === in_array($data, array_keys($this->data[$index])))) {
            $this->data[$index][$data] = $value;
        }

        // Returns the response.
        return $this;
    }

    /**
     * Convert into an array representing this instance.
     *
     * @return array Returns an array representing this instance.
     */
    public function toArray() {

        // Initialize the output.
        $output = [];

        $output["data"]            = $this->data;
        $output["draw"]            = $this->draw;
        $output["recordsFiltered"] = $this->recordsFiltered;
        $output["recordsTotal"]    = $this->recordsTotal;

        // Return the output.
        return $output;
    }

}

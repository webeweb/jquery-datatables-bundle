<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DatatablesBundle\Response;

use JsonSerializable;
use WBW\Bundle\JQuery\DatatablesBundle\Request\DataTablesRequest;

/**
 * DataTables response.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DatatablesBundle\Response
 * @final
 */
final class DataTablesResponse implements JsonSerializable {

    /**
     * Data.
     *
     * @var array
     */
    private $data;

    /**
     * Draw.
     *
     * @var integer
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
     * @var integer
     */
    private $recordsFiltered;

    /**
     * Records total.
     *
     * @var integer
     */
    private $recordsTotal;

    /**
     * Constructor.
     */
    private function __construct() {
        $this->setData([]);
        $this->setDraw(-1);
        $this->setRecordsFiltered(0);
        $this->setRecordsTotal(0);
    }

    /**
     * Get the data.
     *
     * @return array Returns the data.
     */
    public function getData() {
        return $this->data;
    }

    /**
     * Get the draw
     *
     * @return integer Returns the draw.
     */
    public function getDraw() {
        return $this->draw;
    }

    /**
     * Get the error.
     *
     * @return string Returns the error.
     */
    public function getError() {
        return $this->error;
    }

    /**
     * Get the records filtered.
     *
     * @return integer The records filtered.
     */
    public function getRecordsFiltered() {
        return $this->recordsFiltered;
    }

    /**
     * Get the records total.
     *
     * @return integer Returns the records total.
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
     * Create a DataTables response.
     *
     * @param DataTablesRequest $dtRequest The DataTables request.
     * @return DataTablesResponse Returns a DataTables response.
     */
    public static function newInstance(DataTablesRequest $dtRequest) {

        // Initialize the DataTables response.
        $instance = new DataTablesResponse();

        // Set the DataTables response.
        $instance->setDraw($dtRequest->getDraw());

        // Return the DataTables response.
        return $instance;
    }

    /**
     * Set the draw.
     *
     * @param integer $draw The draw.
     * @return DataTablesResponse Returns the DataTables response.
     */
    private function setDraw($draw) {
        $this->draw = $draw;
        return $this;
    }

    /**
     * Set the data.
     *
     * @param array $data The data.
     * @return DataTablesResponse Returns the DataTables response.
     */
    private function setData(array $data) {
        $this->data = $data;
        return $this;
    }

    /**
     * Set the error.
     *
     * @param string $error The error.
     * @return DataTablesResponse Returns the DataTables response.
     */
    public function setError($error) {
        $this->error = $error;
        return $this;
    }

    /**
     * Set the records filtered.
     *
     * @param integer $recordsFiltered The records filtered.
     * @return DataTablesResponse Returns the DataTables response.
     */
    public function setRecordsFiltered($recordsFiltered) {
        $this->recordsFiltered = $recordsFiltered;
        return $this;
    }

    /**
     * Set the records total.
     *
     * @param integer $recordsTotal The records total.
     * @return DataTablesResponse Returns the DataTables response.
     */
    public function setRecordsTotal($recordsTotal) {
        $this->recordsTotal = $recordsTotal;
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

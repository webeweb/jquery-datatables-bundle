<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DatatablesBundle\API;

/**
 * DataTables order.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DatatablesBundle\API
 */
class DataTablesOrder {

    /**
     * Column.
     *
     * @var integer
     */
    private $column;

    /**
     * Dir.
     *
     * @var string
     */
    private $dir;

    /**
     * Constructor.
     */
    private function __construct() {
        // NOTHING TO DO
    }

    /**
     * Get the column.
     *
     * @return integer Returns the column.
     */
    public function getColumn() {
        return $this->column;
    }

    /**
     * Get the dir.
     *
     * @return string Returns the dir.
     */
    public function getDir() {
        return $this->dir;
    }

    /**
     * Parse a raw orders.
     *
     * @param array $rawOrders The raw orders.
     * @return DataTablesOrder[] Returns the DataTables orders.
     */
    public static function parse(array $rawOrders) {

        // Initialize the output.
        $output = [];

        // Handle each raw order.
        foreach ($rawOrders as $current) {

            // Detremines if the raw order is valid.
            if (false === array_key_exists("column", $current)) {
                continue;
            }
            if (false === array_key_exists("dir", $current)) {
                continue;
            }

            // Create a DataTables order.
            $dtOrder = new DataTablesOrder();
            $dtOrder->setColumn(intval($current["column"]));
            $dtOrder->setDir($current["dir"]);

            // Add the DataTables order.
            $output[] = $dtOrder;
        }

        // Return the output.
        return $output;
    }

    /**
     * Set the column.
     *
     * @param integer $column The column.
     * @return DataTablesOrder Returns this DataTables order.
     */
    public function setColumn($column) {
        $this->column = (0 <= $column ? $column : null);
        return $this;
    }

    /**
     * Set the dir.
     *
     * @param string $dir The dir.
     * @return DataTablesOrder Returns this DataTables order.

     */
    public function setDir($dir) {
        $this->dir = strtoupper(true === in_array($dir, ["asc", "desc"]) ? $dir : "asc");
        return $this;
    }

}

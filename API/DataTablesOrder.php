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

/**
 * DataTables order.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\API
 */
class DataTablesOrder {

    /**
     * Column parameter.
     *
     * @var string
     */
    const COLUMN_PARAMETER = "column";

    /**
     * Dir parameter.
     *
     * @var string
     */
    const DIR_PARAMETER = "dir";

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
    protected function __construct() {
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

        // Initialize the DataTables orders.
        $dtOrders = [];

        // Handle each raw order.
        foreach ($rawOrders as $current) {

            // Determines if the raw order is valid.
            if (false === array_key_exists(self::COLUMN_PARAMETER, $current)) {
                continue;
            }
            if (false === array_key_exists(self::DIR_PARAMETER, $current)) {
                continue;
            }

            // Create a DataTables order.
            $dtOrder = new DataTablesOrder();
            $dtOrder->setColumn(intval($current[self::COLUMN_PARAMETER]));
            $dtOrder->setDir($current[self::DIR_PARAMETER]);

            // Add the DataTables order.
            $dtOrders[] = $dtOrder;
        }

        // Return the DataTables orders.
        return $dtOrders;
    }

    /**
     * Set the column.
     *
     * @param integer $column The column.
     * @return DataTablesOrder Returns this DataTables order.
     */
    protected function setColumn($column) {
        $this->column = (0 <= $column ? $column : null);
        return $this;
    }

    /**
     * Set the dir.
     *
     * @param string $dir The dir.
     * @return DataTablesOrder Returns this DataTables order.
     */
    protected function setDir($dir) {
        $this->dir = strtoupper(true === in_array($dir, ["asc", "desc"]) ? $dir : "asc");
        return $this;
    }

}

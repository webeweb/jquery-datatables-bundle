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
class DataTablesOrder implements DataTablesOrderInterface {

    /**
     * Column.
     *
     * @var int
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
     * DataTables dirs.
     *
     * @return array Returns the dirs.
     */
    public static function dtDirs() {
        return [
            self::DATATABLES_DIR_ASC,
            self::DATATABLES_DIR_DESC,
        ];
    }

    /**
     * Get the column.
     *
     * @return int Returns the column.
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
     * @return DataTablesOrder[] Returns the orders.
     */
    public static function parse(array $rawOrders) {

        // Initialize the orders.
        $dtOrders = [];

        // Handle each raw order.
        foreach ($rawOrders as $current) {

            // Determines if the raw order is valid.
            if (false === array_key_exists(self::DATATABLES_PARAMETER_COLUMN, $current)) {
                continue;
            }
            if (false === array_key_exists(self::DATATABLES_PARAMETER_DIR, $current)) {
                continue;
            }

            // Create a order.
            $dtOrder = new DataTablesOrder();
            $dtOrder->setColumn(intval($current[self::DATATABLES_PARAMETER_COLUMN]));
            $dtOrder->setDir($current[self::DATATABLES_PARAMETER_DIR]);

            // Add the order.
            $dtOrders[] = $dtOrder;
        }

        // Return the orders.
        return $dtOrders;
    }

    /**
     * Set the column.
     *
     * @param int $column The column.
     * @return DataTablesOrder Returns this order.
     */
    protected function setColumn($column) {
        $this->column = (0 <= $column ? $column : null);
        return $this;
    }

    /**
     * Set the dir.
     *
     * @param string $dir The dir.
     * @return DataTablesOrder Returns this order.
     */
    protected function setDir($dir) {
        if (false === in_array($dir, static::dtDirs())) {
            $dir = self::DATATABLES_DIR_ASC;
        }
        $this->dir = strtoupper($dir);
        return $this;
    }

}

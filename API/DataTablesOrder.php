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
    public function __construct() {
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

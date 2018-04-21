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
 * DataTables mapping.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DatatablesBundle\API
 */
class DataTablesMapping {

    /**
     * Column.
     *
     * @var string
     */
    private $column;

    /**
     * Prefix.
     *
     * @var string
     */
    private $prefix;

    /**
     * Constructor.
     */
    public function __construct() {
        // NOTHING TO DO.
    }

    /**
     * Get the column.
     *
     * @return string Returns the column.
     */
    public function getColumn() {
        return $this->column;
    }

    /**
     * Get the prefix.
     *
     * @return string Returns the prefix.
     */
    public function getPrefix() {
        return $this->prefix;
    }

    /**
     * Set the column.
     *
     * @param string $column The column.
     * @return DataTablesMapping Returns the DataTables mapping.
     */
    public function setColumn($column) {
        $this->column = $column;
        return $this;
    }

    /**
     * Set the prefix.
     *
     * @param string $prefix The prefix.
     * @return DataTablesMapping Returns the DataTables mapping.
     */
    public function setPrefix($prefix) {
        $this->prefix = $prefix;
        return $this;
    }

}

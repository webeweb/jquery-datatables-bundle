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

use WBW\Bundle\JQuery\DataTablesBundle\Helper\DataTablesOrderHelper;

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
    public function __construct() {
        // NOTHING TO DO
    }

    /**
     * {@inheritdoc}
     */
    public function getColumn() {
        return $this->column;
    }

    /**
     * {@inheritdoc}
     */
    public function getDir() {
        return $this->dir;
    }

    /**
     * Set the column.
     *
     * @param int $column The column.
     * @return DataTablesOrderInterface Returns this order.
     */
    public function setColumn($column) {
        $this->column = (0 <= $column ? $column : null);
        return $this;
    }

    /**
     * Set the dir.
     *
     * @param string $dir The dir.
     * @return DataTablesOrderInterface Returns this order.
     */
    public function setDir($dir) {
        if (false === in_array($dir, DataTablesOrderHelper::dtDirs())) {
            $dir = self::DATATABLES_DIR_ASC;
        }
        $this->dir = strtoupper($dir);
        return $this;
    }

}

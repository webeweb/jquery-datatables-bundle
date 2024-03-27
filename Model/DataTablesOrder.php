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

namespace WBW\Bundle\JQuery\DataTablesBundle\Model;

use WBW\Bundle\JQuery\DataTablesBundle\Api\DataTablesOrderInterface;

/**
 * DataTables order.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Model
 */
class DataTablesOrder implements DataTablesOrderInterface {

    /**
     * Column.
     *
     * @var int|null
     */
    private $column;

    /**
     * Dir.
     *
     * @var string|null
     */
    private $dir;

    /**
     * Constructor.
     */
    public function __construct() {
        // NOTHING TO DO
    }

    /**
     * {@inheritDoc}
     */
    public function getColumn(): ?int {
        return $this->column;
    }

    /**
     * {@inheritDoc}
     */
    public function getDir(): ?string {
        return $this->dir;
    }

    /**
     * Set the column.
     *
     * @param int|null $column The column.
     * @return DataTablesOrderInterface Returns this order.
     */
    public function setColumn(?int $column): DataTablesOrderInterface {
        $this->column = (0 <= $column ? $column : null);
        return $this;
    }

    /**
     * Set the dir.
     *
     * @param string|null $dir The dir.
     * @return DataTablesOrderInterface Returns this order.
     */
    public function setDir(?string $dir): DataTablesOrderInterface {

        if (false === in_array($dir, DataTablesEnumerator::enumDirs())) {
            $dir = self::DATATABLES_DIR_ASC;
        }

        $this->dir = strtoupper($dir);
        return $this;
    }
}

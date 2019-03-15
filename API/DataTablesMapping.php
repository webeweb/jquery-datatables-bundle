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
 * DataTables mapping.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\API
 */
class DataTablesMapping implements DataTablesMappingInterface {

    /**
     * Column.
     *
     * @var string
     */
    private $column;

    /**
     * Parent.
     *
     * @var DataTablesColumnInterface
     */
    private $parent;

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
     * {@inheritdoc}
     */
    public function getAlias() {
        if (null === $this->column) {
            return null;
        }
        return null !== $this->prefix ? implode(".", [$this->prefix, $this->column]) : $this->column;
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
    public function getParent() {
        return $this->parent;
    }

    /**
     * {@inheritdoc}
     */
    public function getPrefix() {
        return $this->prefix;
    }

    /**
     * {@inheritdoc}
     */
    public function setColumn($column) {
        $this->column = $column;
        return $this;
    }

    /**
     * Set the parent.
     *
     * @param DataTablesColumnInterface $parent The parent.
     * @return DataTablesMappingInterface Returns this mapping.
     */
    public function setParent(DataTablesColumnInterface $parent) {
        $this->parent = $parent;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setPrefix($prefix) {
        $this->prefix = $prefix;
        return $this;
    }
}

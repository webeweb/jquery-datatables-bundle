<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Model;

use WBW\Bundle\DataTablesBundle\Api\DataTablesMappingInterface;

/**
 * DataTables mapping.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Model
 */
class DataTablesMapping implements DataTablesMappingInterface {

    /**
     * Column.
     *
     * @var string|null
     */
    private $column;

    /**
     * Parent.
     *
     * @var DataTablesColumnInterface|null
     */
    private $parent;

    /**
     * Prefix.
     *
     * @var string|null
     */
    private $prefix;

    /**
     * Constructor.
     */
    public function __construct() {
        // NOTHING TO DO
    }

    /**
     * {@inheritDoc}
     */
    public function getColumn(): ?string {
        return $this->column;
    }

    /**
     * {@inheritDoc}
     */
    public function getParent(): ?DataTablesColumnInterface {
        return $this->parent;
    }

    /**
     * {@inheritDoc}
     */
    public function getPrefix(): ?string {
        return $this->prefix;
    }

    /**
     * {@inheritDoc}
     */
    public function setColumn(?string $column): DataTablesMappingInterface {
        $this->column = $column;
        return $this;
    }

    /**
     * Set the parent.
     *
     * @param DataTablesColumnInterface|null $parent The parent.
     * @return DataTablesMappingInterface Returns this mapping.
     */
    public function setParent(?DataTablesColumnInterface $parent): DataTablesMappingInterface {
        $this->parent = $parent;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setPrefix(?string $prefix): DataTablesMappingInterface {
        $this->prefix = $prefix;
        return $this;
    }
}

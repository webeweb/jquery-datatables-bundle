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

namespace WBW\Bundle\JQuery\DataTablesBundle\Api;

/**
 * DataTables mapping interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Api
 */
interface DataTablesMappingInterface {

    /**
     * Get the column.
     *
     * @return string|null Returns the column.
     */
    public function getColumn(): ?string;

    /**
     * Get the parent.
     *
     * @return DataTablesColumnInterface|null Returns the parent.
     */
    public function getParent(): ?DataTablesColumnInterface;

    /**
     * Get the prefix.
     *
     * @return string|null Returns the prefix.
     */
    public function getPrefix(): ?string;

    /**
     * Set the column.
     *
     * @param string|null $column The column.
     * @return DataTablesMappingInterface Returns this mapping.
     */
    public function setColumn(?string $column): DataTablesMappingInterface;

    /**
     * Set the prefix.
     *
     * @param string|null $prefix The prefix.
     * @return DataTablesMappingInterface Returns this mapping.
     */
    public function setPrefix(?string $prefix): DataTablesMappingInterface;
}

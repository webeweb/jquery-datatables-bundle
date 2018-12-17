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
 * DataTables mapping interface.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\API
 */
interface DataTablesMappingInterface {

    /**
     * Get the alias.
     *
     * @return string Returns the alias.
     */
    public function getAlias();

    /**
     * Get the column.
     *
     * @return string Returns the column.
     */
    public function getColumn();

    /**
     * Get the prefix.
     *
     * @return string Returns the prefix.
     */
    public function getPrefix();

    /**
     * Set the column.
     *
     * @param string $column The column.
     * @return DataTablesMappingInterface Returns this mapping.
     */
    public function setColumn($column);

    /**
     * Set the prefix.
     *
     * @param string $prefix The prefix.
     * @return DataTablesMappingInterface Returns this mapping.
     */
    public function setPrefix($prefix);
}

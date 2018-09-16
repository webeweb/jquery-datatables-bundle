<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Helper;

use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesMapping;

/**
 * DataTables mapping helper.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Helper
 */
class DataTablesMappingHelper {

    /**
     * Get an alias.
     *
     * @param DataTablesMapping $mapping The mapping.
     * @return string Returns the alias.
     */
    public static function getAlias(DataTablesMapping $mapping) {
        if (null === $mapping->getColumn()) {
            return null;
        }
        if (null === $mapping->getPrefix()) {
            return $mapping->getColumn();
        }
        return implode(".", [$mapping->getPrefix(), $mapping->getColumn()]);
    }

    /**
     * Get a param.
     *
     * @param DataTablesMapping $mapping The mapping.
     * @return string Returns the param.
     */
    public static function getParam(DataTablesMapping $mapping) {

        // Initialize the param.
        $param = ":";
        $param .= $mapping->getPrefix();
        $param .= $mapping->getColumn();

        // Return the param.
        return $param;
    }

    /**
     * Get a mapping where.
     *
     * @param DataTablesMapping $mapping The mapping.
     * @return string Returns the where.
     */
    public static function getWhere(DataTablesMapping $mapping) {

        // Initialize the where.
        $where = static::getAlias($mapping);
        $where .= " LIKE ";
        $where .= static::getParam($mapping);

        // Return the where.
        return $where;
    }

}

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

namespace WBW\Bundle\DataTablesBundle\Helper;

use WBW\Bundle\DataTablesBundle\Model\DataTablesColumnInterface;
use WBW\Bundle\DataTablesBundle\Model\DataTablesMappingInterface;

/**
 * DataTables mapping helper.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Helper
 */
class DataTablesMappingHelper {

    /**
     * Get an alias.
     *
     * @param DataTablesMappingInterface $mapping The mapping.
     * @return string|null Returns the alias.
     */
    public static function getAlias(DataTablesMappingInterface $mapping): ?string {

        if (null === $mapping->getColumn()) {
            return null;
        }

        if (null === $mapping->getPrefix()) {
            return $mapping->getColumn();
        }

        return implode(".", [
            $mapping->getPrefix(),
            $mapping->getColumn(),
        ]);
    }

    /**
     * Get a comparator.
     *
     * @param DataTablesMappingInterface $mapping The mapping.
     * @return string Returns the comparator.
     */
    public static function getComparator(DataTablesMappingInterface $mapping): string {

        if (null === $mapping->getParent()) {
            return "LIKE";
        }

        switch ($mapping->getParent()->getType()) {

            case DataTablesColumnInterface::DATATABLES_TYPE_DATE:
            case DataTablesColumnInterface::DATATABLES_TYPE_HTML_NUM:
            case DataTablesColumnInterface::DATATABLES_TYPE_NUM:
            case DataTablesColumnInterface::DATATABLES_TYPE_NUM_FMT:
                return "=";
        }

        return "LIKE";
    }

    /**
     * Get a param.
     *
     * @param DataTablesMappingInterface $mapping The mapping.
     * @return string Returns the param.
     */
    public static function getParam(DataTablesMappingInterface $mapping): string {

        return implode("", [
            ":",
            $mapping->getPrefix(),
            $mapping->getColumn(),
        ]);
    }

    /**
     * Get a where.
     *
     * @param DataTablesMappingInterface $mapping The mapping.
     * @return string Returns the where.
     */
    public static function getWhere(DataTablesMappingInterface $mapping): string {

        return implode(" ", [
            DataTablesMappingHelper::getAlias($mapping),
            DataTablesMappingHelper::getComparator($mapping),
            DataTablesMappingHelper::getParam($mapping),
        ]);
    }
}

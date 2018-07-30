<?php

/*
 * Disclaimer: This source code is protected by copyright law and by
 * international conventions.
 *
 * Any reproduction or partial or total distribution of the source code, by any
 * means whatsoever, is strictly forbidden.
 *
 * Anyone not complying with these provisions will be guilty of the offense of
 * infringement and the penal sanctions provided for by law.
 *
 * © 2018 All rights reserved.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Helper;

use Doctrine\ORM\QueryBuilder;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesWrapper;

/**
 * DataTables repository helper.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Helper
 */
class DataTablesRepositoryHelper {

    /**
     * Append a DataTables ORDER clause.
     *
     * @param QueryBuilder $queryBuilder The query builder.
     * @param DataTablesWrapper $dtWrapper The DataTables wrapper.
     * @return void
     */
    public static function appendOrder(QueryBuilder $queryBuilder, DataTablesWrapper $dtWrapper) {

        // Handle each DataTables order.
        foreach ($dtWrapper->getRequest()->getOrder() as $dtOrder) {

            // Get the DataTables column.
            $dtColumn = array_values($dtWrapper->getColumns())[$dtOrder->getColumn()];

            // Check if the DataTables column is orderable.
            if (false === $dtColumn->getOrderable()) {
                continue;
            }

            // Add the order by.
            $queryBuilder->addOrderBy($dtColumn->getMapping()->getAlias(), $dtOrder->getDir());
        }
    }

    /**
     * Append a DataTables WHERE clause.
     *
     * @param QueryBuilder $queryBuilder The query builder.
     * @param DataTablesWrapper $dtWrapper The DataTables wrapper.
     * @return void
     */
    public static function appendWhere(QueryBuilder $queryBuilder, DataTablesWrapper $dtWrapper) {

        // Determines and check the operator.
        $operator = self::determineOperator($dtWrapper);
        if (null === $operator) {
            return;
        }

        // Initialize.
        $wheres = [];
        $params = [];
        $values = [];

        // Handle each DataTables column.
        foreach ($dtWrapper->getRequest()->getColumns() as $dtColumn) {

            // Check the DataTables column.
            if ("OR" === $operator || "" !== $dtColumn->getSearch()->getValue()) {

                // Get the DataTables mapping.
                $mapping = $dtColumn->getMapping();

                // Add.
                $wheres[] = $mapping->getAlias() . " LIKE :" . $mapping->getPrefix() . $mapping->getColumn();
                $params[] = ":" . $mapping->getPrefix() . $mapping->getColumn();
                $values[] = "%" . ("AND" === $operator ? $dtColumn->getSearch()->getValue() : $dtWrapper->getRequest()->getSearch()->getValue()) . "%";
            }
        }

        // Set the where clause.
        $queryBuilder->andWhere("(" . implode(" " . $operator . " ", $wheres) . ")");
        for ($i = count($params) - 1; 0 <= $i; --$i) {
            $queryBuilder->setParameter($params[$i], $values[$i]);
        }
    }

    /**
     * Determines a DataTables operator.
     *
     * @param DataTablesWrapper $dtWrapper The DataTables wrapper.
     * @return string Returns the DataTables operator.
     */
    public static function determineOperator(DataTablesWrapper $dtWrapper) {

        // Check if the DataTables columns defines a search.
        foreach ($dtWrapper->getRequest()->getColumns() as $dtColumn) {
            if ("" !== $dtColumn->getSearch()->getValue()) {
                return "AND";
            }
        }

        // Check if the DataTables defines a search.
        if ("" !== $dtWrapper->getRequest()->getSearch()->getValue()) {
            return "OR";
        }

        // Return the operator.
        return null;
    }

}

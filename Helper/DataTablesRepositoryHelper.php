<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Helper;

use Doctrine\ORM\QueryBuilder;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesWrapperInterface;

/**
 * DataTables repository helper.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Helper
 */
class DataTablesRepositoryHelper {

    /**
     * Append an ORDER clause.
     *
     * @param QueryBuilder $queryBuilder The query builder.
     * @param DataTablesWrapperInterface $dtWrapper The wrapper.
     * @return void
     */
    public static function appendOrder(QueryBuilder $queryBuilder, DataTablesWrapperInterface $dtWrapper) {

        // Handle each order.
        foreach ($dtWrapper->getRequest()->getOrder() as $dtOrder) {

            // Get the column.
            $dtColumn = array_values($dtWrapper->getColumns())[$dtOrder->getColumn()];

            // Check if the column is orderable.
            if (false === $dtColumn->getOrderable()) {
                continue;
            }

            // Add the order by.
            $queryBuilder->addOrderBy($dtColumn->getMapping()->getAlias(), $dtOrder->getDir());
        }
    }

    /**
     * Append a WHERE clause.
     *
     * @param QueryBuilder $queryBuilder The query builder.
     * @param DataTablesWrapperInterface $dtWrapper The wrapper.
     * @return void
     */
    public static function appendWhere(QueryBuilder $queryBuilder, DataTablesWrapperInterface $dtWrapper) {

        // Determines and check the operator.
        $operator = static::determineOperator($dtWrapper);
        if (null === $operator) {
            return;
        }

        // Initialize.
        $wheres = [];
        $params = [];
        $values = [];

        // Handle each column.
        foreach ($dtWrapper->getRequest()->getColumns() as $dtColumn) {

            // Check the column.
            if (true === $dtColumn->getSearchable() && ("OR" === $operator || "" !== $dtColumn->getSearch()->getValue())) {

                // Add.
                $wheres[] = DataTablesMappingHelper::getWhere($dtColumn->getMapping());
                $params[] = DataTablesMappingHelper::getParam($dtColumn->getMapping());
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
     * Determines an operator.
     *
     * @param DataTablesWrapperInterface $dtWrapper The wrapper.
     * @return string Returns the operator.
     */
    public static function determineOperator(DataTablesWrapperInterface $dtWrapper) {

        // Check if a column defines a search.
        foreach ($dtWrapper->getRequest()->getColumns() as $dtColumn) {
            if (false === $dtColumn->getSearchable()) {
                continue;
            }
            if ("" !== $dtColumn->getSearch()->getValue()) {
                return "AND";
            }
        }

        // Check if the wrappe defines a search.
        if ("" !== $dtWrapper->getRequest()->getSearch()->getValue()) {
            return "OR";
        }

        // Return the operator.
        return null;
    }
}

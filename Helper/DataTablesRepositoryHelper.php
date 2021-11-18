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
use WBW\Bundle\JQuery\DataTablesBundle\Api\DataTablesWrapperInterface;

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
    public static function appendOrder(QueryBuilder $queryBuilder, DataTablesWrapperInterface $dtWrapper): void {

        foreach ($dtWrapper->getRequest()->getOrder() as $dtOrder) {

            $dtColumn = array_values($dtWrapper->getColumns())[$dtOrder->getColumn()];
            if (false === $dtColumn->getOrderable()) {
                continue;
            }

            $queryBuilder->addOrderBy(DataTablesMappingHelper::getAlias($dtColumn->getMapping()), $dtOrder->getDir());
        }
    }

    /**
     * Append a WHERE clause.
     *
     * @param QueryBuilder $queryBuilder The query builder.
     * @param DataTablesWrapperInterface $dtWrapper The wrapper.
     * @return void
     */
    public static function appendWhere(QueryBuilder $queryBuilder, DataTablesWrapperInterface $dtWrapper): void {

        $operator = DataTablesRepositoryHelper::determineOperator($dtWrapper);
        if (null === $operator) {
            return;
        }

        $wheres = [];
        $params = [];
        $values = [];

        foreach ($dtWrapper->getRequest()->getColumns() as $dtColumn) {

            if (true === $dtColumn->getSearchable() && ("OR" === $operator || "" !== $dtColumn->getSearch()->getValue())) {

                $wheres[] = DataTablesMappingHelper::getWhere($dtColumn->getMapping());
                $params[] = DataTablesMappingHelper::getParam($dtColumn->getMapping());
                $values[] = "%" . ("AND" === $operator ? $dtColumn->getSearch()->getValue() : $dtWrapper->getRequest()->getSearch()->getValue()) . "%";
            }
        }

        $queryBuilder->andWhere("(" . implode(" $operator ", $wheres) . ")");
        for ($i = count($params) - 1; 0 <= $i; --$i) {
            $queryBuilder->setParameter($params[$i], $values[$i]);
        }
    }

    /**
     * Determines an operator.
     *
     * @param DataTablesWrapperInterface $dtWrapper The wrapper.
     * @return string|null Returns the operator.
     */
    public static function determineOperator(DataTablesWrapperInterface $dtWrapper): ?string {

        foreach ($dtWrapper->getRequest()->getColumns() as $dtColumn) {
            if (false === $dtColumn->getSearchable()) {
                continue;
            }
            if ("" !== $dtColumn->getSearch()->getValue()) {
                return "AND";
            }
        }

        // Check if the wrapper defines a search.
        if ("" !== $dtWrapper->getRequest()->getSearch()->getValue()) {
            return "OR";
        }

        return null;
    }
}

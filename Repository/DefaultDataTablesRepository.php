<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DatatablesBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use WBW\Bundle\JQuery\DatatablesBundle\API\DataTablesWrapper;

/**
 * Default DataTables repository.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DatatablesBundle\Repository
 * @abstract
 */
abstract class DefaultDataTablesRepository extends EntityRepository implements DataTablesRepositoryInterface {

    /**
     * {@inheritdoc}
     */
    public function dataTablesCountFiltered(DataTablesWrapper $dtWrapper) {

        // Get the prefix.
        $prefix = $dtWrapper->getMapping()->getPrefix();

        // Create a query builder.
        $qb = $this->createQueryBuilder($prefix)
            ->select("COUNT(" . $prefix . ")");

        // Build the where clause.
        self::dataTablesWhere($qb, $dtWrapper);

        // Return the single scalar result.
        return intval($qb->getQuery()->getSingleScalarResult());
    }

    /**
     * {@inheritdoc}
     */
    public function dataTablesCountTotal(DataTablesWrapper $dtWrapper) {

        // Get the prefix.
        $prefix = $dtWrapper->getMapping()->getPrefix();

        // Create a query builder.
        $qb = $this->createQueryBuilder($prefix)
            ->select("COUNT(" . $prefix . ")");

        // Return the single scalar result.
        return intval($qb->getQuery()->getSingleScalarResult());
    }

    /**
     * {@inheritdoc}
     */
    public function dataTablesFindAll(DataTablesWrapper $dtWrapper) {

        // Get the prefix.
        $prefix = $dtWrapper->getMapping()->getPrefix();

        // Create a query builder.
        $qb = $this->createQueryBuilder($prefix)
            ->setFirstResult($dtWrapper->getRequest()->getStart())
            ->setMaxResults($dtWrapper->getRequest()->getLength());

        // Build the where and order clauses.
        self::dataTablesWhere($qb, $dtWrapper);
        self::dataTablesOrder($qb, $dtWrapper);

        // Return the result.
        return $qb->getQuery()->getResult();
    }

    /**
     * Build a WHERE operator.
     *
     * @param DataTablesWrapper $dtWrapper The DataTables wrapper.
     * @return string Returns the WHERE operator.
     */
    protected static function dataTablesOperator(DataTablesWrapper $dtWrapper) {

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

    /**
     * Build an ORDER clause.
     *
     * @param QueryBuilder $queryBuilder The query builder.
     * @param DataTablesWrapper $dtWrapper The DataTables wrapper.
     * @return void
     */
    public static function dataTablesOrder(QueryBuilder $queryBuilder, DataTablesWrapper $dtWrapper) {

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
     * Build a WHERE clause.
     *
     * @param QueryBuilder $queryBuilder The query builder.
     * @param DataTablesWrapper $dtWrapper The DataTables wrapper.
     * @return void
     */
    public static function dataTablesWhere(QueryBuilder $queryBuilder, DataTablesWrapper $dtWrapper) {

        // Get and check the operator.
        $operator = self::dataTablesOperator($dtWrapper);
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

                // Get the column mapping.
                $mapping = $dtColumn->getMapping();

                // Add.
                $wheres[] = $mapping->getAlias() . " LIKE :" . $mapping->getPrefix() . $mapping->getColumn();
                $params[] = ":" . $mapping->getPrefix() . $mapping->getColumn();
                $values[] = "%" . ("AND" === $operator ? $dtColumn->getSearch()->getValue() : $dtWrapper->getRequest()->getSearch()->getValue()) . "%";
            }
        }

        // Set the where.
        $queryBuilder->andWhere("(" . implode(" " . $operator . " ", $wheres) . ")");
        for ($i = count($params) - 1; 0 <= $i; --$i) {
            $queryBuilder->setParameter($params[$i], $values[$i]);
        }
    }

}

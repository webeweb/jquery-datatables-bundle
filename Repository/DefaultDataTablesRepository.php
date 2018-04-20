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
use WBW\Bundle\JQuery\DatatablesBundle\Wrapper\DataTablesWrapper;

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
     * Build the operator.
     *
     * @param DataTablesWrapper $dtWrapper The DataTables wrapper.
     * @return string Returns the operator.
     */
    protected static function dataTablesOperator(DataTablesWrapper $dtWrapper) {

        // Initialize the operator.
        $operator = null;

        // Check if the DataTables columns defines a search.
        foreach ($dtWrapper->getRequest()->getColumns() as $column) {
            $dtColumn = $dtWrapper->getColumn($column["name"]);
            if (null !== $dtColumn && true === $dtColumn->getSearchable() && "" !== $column["search"]["value"]) {
                $operator = "AND";
                break;
            }
        }

        // Check if the DataTables defines a search.
        if (null === $operator && "" !== $dtWrapper->getRequest()->getSearch()) {
            $operator = "OR";
        }

        // Return the operator.
        return $operator;
    }

    /**
     * Build an ORDER clause.
     *
     * @param QueryBuilder $queryBuilder The query builder.
     * @param DataTablesWrapper $dtWrapper The DataTables wrapper.
     * @return void
     */
    public static function dataTablesOrder(QueryBuilder $queryBuilder, DataTablesWrapper $dtWrapper) {

        // Handle each column.
        foreach ($dtWrapper->getRequest()->getOrder() as $order) {

            // Get the column names.
            $columnNames = array_keys($dtWrapper->getColumns());

            // Get and check the column index.
            $columnIndex = intval($order["column"]);
            if ($columnIndex < 0 && count($dtWrapper->getColumns()) < $columnIndex) {
                continue;
            }

            // Get the DataTables column.
            $dtColumn = $dtWrapper->getColumns()[$columnNames[$columnIndex]];

            // Check if the column is orderable.
            if (false === $dtColumn->getOrderable()) {
                continue;
            }

            //
            $sort   = [];
            $sort[] = $dtColumn->getMapping()->getPrefix();
            $sort[] = $dtColumn->getMapping()->getColumn();

            // Add the order by.
            $queryBuilder->addOrderBy(implode(".", $sort), $order["dir"]);
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

        // Handle each column.
        foreach ($dtWrapper->getRequest()->getColumns() as $column) {

            // Get the DataTables column.
            $dtColumn = $dtWrapper->getColumn($column["name"]);

            // Check the DataTables column.
            if (null !== $dtColumn && true === $dtColumn->getSearchable() && ("OR" === $operator || "" !== $column["search"]["value"])) {

                //
                $mPrefix = $dtColumn->getMapping()->getPrefix();
                $mColumn = $dtColumn->getMapping()->getColumn();

                // Add.
                $wheres[] = $mPrefix . "." . $mColumn . " LIKE :" . $mPrefix . $mColumn;
                $params[] = ":" . $mPrefix . $mColumn;
                $values[] = "%" . ("AND" === $operator ? $column["search"]["value"] : $dtWrapper->getRequest()->getSearch()["value"]) . "%";
            }
        }

        // Set the where.
        $queryBuilder->andWhere("(" . implode(" " . $operator . " ", $wheres) . ")");
        for ($i = count($params) - 1; 0 <= $i; --$i) {
            $queryBuilder->setParameter($params[$i], $values[$i]);
        }
    }

}

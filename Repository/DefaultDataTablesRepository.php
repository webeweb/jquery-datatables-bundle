<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesWrapper;
use WBW\Bundle\JQuery\DataTablesBundle\Provider\DataTablesProviderInterface;

/**
 * Default DataTables repository.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Repository
 * @abstract
 */
abstract class DefaultDataTablesRepository extends EntityRepository implements DataTablesRepositoryInterface {

    /**
     * Append a DataTables ORDER clause.
     *
     * @param QueryBuilder $queryBuilder The query builder.
     * @param DataTablesWrapper $dtWrapper The DataTables wrapper.
     * @return void
     */
    public static function appendDataTablesOrder(QueryBuilder $queryBuilder, DataTablesWrapper $dtWrapper) {

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
    public static function appendDataTablesWhere(QueryBuilder $queryBuilder, DataTablesWrapper $dtWrapper) {

        // Detremines and check the operator.
        $operator = self::determineDataTablesOperator($dtWrapper);
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
     * Build a DataTables query builder "Count filtered".
     *
     * @param DataTablesWrapper $dtWrapper The wrapper.
     * @return QueryBuilder Returns the DataTables query builder "Count filtered".
     */
    protected function buildDataTablesCountFiltered(DataTablesWrapper $dtWrapper) {

        // Get the prefix.
        $prefix = $dtWrapper->getMapping()->getPrefix();

        // Create a query builder.
        $qb = $this->createQueryBuilder($prefix)
            ->select("COUNT(" . $prefix . ")");

        // Append the where clause.
        self::appendDataTablesWhere($qb, $dtWrapper);

        // Return the query builder.
        return $qb;
    }

    /**
     * Build a DataTables query builder "Count total".
     *
     * @param DataTablesWrapper $dtWrapper The wrapper.
     * @return QueryBuilder Returns the DataTables query builder "Count total".
     */
    protected function buildDataTablesCountTotal(DataTablesWrapper $dtWrapper) {

        // Get the prefix.
        $prefix = $dtWrapper->getMapping()->getPrefix();

        // Create a query builder.
        $qb = $this->createQueryBuilder($prefix)
            ->select("COUNT(" . $prefix . ")");

        // Return the query builder.
        return $qb;
    }

    /**
     * Build a DataTables query builder "Export all".
     *
     * @param DataTablesProviderInterface $dtProvider The provider.
     * @return QueryBuilder Returns the DataTables query builder "Export all".
     */
    protected function buildDataTablesExportAll(DataTablesProviderInterface $dtProvider) {

        // Create a query builder.
        $qb = $this->createQueryBuilder($dtProvider->getPrefix());

        // Return the query builder.
        return $qb;
    }

    /**
     * Build a DataTables query builder "Find all".
     *
     * @param DataTablesWrapper $dtWrapper The wrapper.
     * @return QueryBuilder Returns the DataTables query builder "Find all".
     */
    protected function buildDataTablesFindAll(DataTablesWrapper $dtWrapper) {

        // Get the prefix.
        $prefix = $dtWrapper->getMapping()->getPrefix();

        // Create a query builder.
        $qb = $this->createQueryBuilder($prefix)
            ->setFirstResult($dtWrapper->getRequest()->getStart())
            ->setMaxResults($dtWrapper->getRequest()->getLength());

        // Build the where and order clauses.
        self::appendDataTablesWhere($qb, $dtWrapper);
        self::appendDataTablesOrder($qb, $dtWrapper);

        // Return the query builder.
        return $qb;
    }

    /**
     * {@inheritdoc}
     */
    public function dataTablesCountFiltered(DataTablesWrapper $dtWrapper) {

        // Build a DataTables query builder.
        $qb = $this->buildDataTablesCountFiltered($dtWrapper);

        // Return the single scalar result.
        return intval($qb->getQuery()->getSingleScalarResult());
    }

    /**
     * {@inheritdoc}
     */
    public function dataTablesCountTotal(DataTablesWrapper $dtWrapper) {

        // Build a DataTables query builder.
        $qb = $this->buildDataTablesCountTotal($dtWrapper);

        // Return the single scalar result.
        return intval($qb->getQuery()->getSingleScalarResult());
    }

    /**
     * {@inheritdoc}
     */
    public function dataTablesExportAll(DataTablesProviderInterface $dtProvider) {
        return $this->buildDataTablesExportAll($dtProvider);
    }

    /**
     * {@inheritdoc}
     */
    public function dataTablesFindAll(DataTablesWrapper $dtWrapper) {

        // Build a DataTables query builder.
        $qb = $this->buildDataTablesFindAll($dtWrapper);

        // Return the result.
        return $qb->getQuery()->getResult();
    }

    /**
     * Determines a DataTables operator.
     *
     * @param DataTablesWrapper $dtWrapper The DataTables wrapper.
     * @return string Returns the DataTables operator.
     */
    protected static function determineDataTablesOperator(DataTablesWrapper $dtWrapper) {

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

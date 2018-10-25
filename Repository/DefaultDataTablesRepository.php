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
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesWrapperInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Helper\DataTablesRepositoryHelper;
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
     * Build a query builder "Count exported".
     *
     * @param DataTablesProviderInterface $dtProvider The provider.
     * @return QueryBuilder Returns the query builder "Count exported".
     */
    protected function buildDataTablesCountExported(DataTablesProviderInterface $dtProvider) {

        // Get the prefix.
        $prefix = $dtProvider->getPrefix();

        // Create a query builder.
        $qb = $this->createQueryBuilder($prefix)
            ->select("COUNT(" . $prefix . ")");

        // Return the query builder.
        return $qb;
    }

    /**
     * Build a query builder "Count filtered".
     *
     * @param DataTablesWrapperInterface $dtWrapper The wrapper.
     * @return QueryBuilder Returns the query builder "Count filtered".
     */
    protected function buildDataTablesCountFiltered(DataTablesWrapperInterface $dtWrapper) {

        // Get the prefix.
        $prefix = $dtWrapper->getMapping()->getPrefix();

        // Create a query builder.
        $qb = $this->createQueryBuilder($prefix)
            ->select("COUNT(" . $prefix . ")");

        // Append the where clause.
        DataTablesRepositoryHelper::appendWhere($qb, $dtWrapper);

        // Return the query builder.
        return $qb;
    }

    /**
     * Build a query builder "Count total".
     *
     * @param DataTablesWrapperInterface $dtWrapper The wrapper.
     * @return QueryBuilder Returns the query builder "Count total".
     */
    protected function buildDataTablesCountTotal(DataTablesWrapperInterface $dtWrapper) {

        // Get the prefix.
        $prefix = $dtWrapper->getMapping()->getPrefix();

        // Create a query builder.
        $qb = $this->createQueryBuilder($prefix)
            ->select("COUNT(" . $prefix . ")");

        // Return the query builder.
        return $qb;
    }

    /**
     * Build a query builder "Export all".
     *
     * @param DataTablesProviderInterface $dtProvider The provider.
     * @return QueryBuilder Returns the query builder "Export all".
     */
    protected function buildDataTablesExportAll(DataTablesProviderInterface $dtProvider) {

        // Create a query builder.
        $qb = $this->createQueryBuilder($dtProvider->getPrefix());

        // Return the query builder.
        return $qb;
    }

    /**
     * Build a query builder "Find all".
     *
     * @param DataTablesWrapperInterface $dtWrapper The wrapper.
     * @return QueryBuilder Returns the query builder "Find all".
     */
    protected function buildDataTablesFindAll(DataTablesWrapperInterface $dtWrapper) {

        // Get the prefix.
        $prefix = $dtWrapper->getMapping()->getPrefix();

        // Create a query builder.
        $qb = $this->createQueryBuilder($prefix)
            ->setFirstResult($dtWrapper->getRequest()->getStart());
        if (0 < $dtWrapper->getRequest()->getLength()) {
            $qb->setMaxResults($dtWrapper->getRequest()->getLength());
        }

        // Build the where and order clauses.
        DataTablesRepositoryHelper::appendWhere($qb, $dtWrapper);
        DataTablesRepositoryHelper::appendOrder($qb, $dtWrapper);

        // Return the query builder.
        return $qb;
    }

    /**
     * {@inheritdoc}
     */
    public function dataTablesCountExported(DataTablesProviderInterface $dtProvider) {

        // Build a query builder.
        $qb = $this->buildDataTablesCountExported($dtProvider);

        // Return the single scalar result.
        return intval($qb->getQuery()->getSingleScalarResult());
    }

    /**
     * {@inheritdoc}
     */
    public function dataTablesCountFiltered(DataTablesWrapperInterface $dtWrapper) {

        // Build a query builder.
        $qb = $this->buildDataTablesCountFiltered($dtWrapper);

        // Return the single scalar result.
        return intval($qb->getQuery()->getSingleScalarResult());
    }

    /**
     * {@inheritdoc}
     */
    public function dataTablesCountTotal(DataTablesWrapperInterface $dtWrapper) {

        // Build a query builder.
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
    public function dataTablesFindAll(DataTablesWrapperInterface $dtWrapper) {

        // Build a query builder.
        $qb = $this->buildDataTablesFindAll($dtWrapper);

        // Return the result.
        return $qb->getQuery()->getResult();
    }

}

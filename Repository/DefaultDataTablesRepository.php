<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Throwable;
use WBW\Bundle\DataTablesBundle\Helper\DataTablesRepositoryHelper;
use WBW\Bundle\DataTablesBundle\Model\DataTablesWrapperInterface;

/**
 * Default DataTables repository.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Repository
 * @abstract
 */
abstract class DefaultDataTablesRepository extends EntityRepository implements DataTablesRepositoryInterface {

    /**
     * {@inheritDoc}
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function dataTablesCountExported(DataTablesWrapperInterface $dtWrapper): int {

        $qb = $this->dataTablesCountExportedQueryBuilder($dtWrapper);

        return intval($qb->getQuery()->getSingleScalarResult());
    }

    /**
     * Create a query builder "count exported".
     *
     * @param DataTablesWrapperInterface $dtWrapper The wrapper.
     * @return QueryBuilder Returns the query builder "count exported".
     */
    protected function dataTablesCountExportedQueryBuilder(DataTablesWrapperInterface $dtWrapper): QueryBuilder {

        $prefix = $dtWrapper->getProvider()->getPrefix();

        $qb = $this->createQueryBuilder($prefix)
            ->select("COUNT($prefix)");

        DataTablesRepositoryHelper::appendWhere($qb, $dtWrapper);

        return $qb;
    }

    /**
     * {@inheritDoc}
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function dataTablesCountFiltered(DataTablesWrapperInterface $dtWrapper): int {

        $qb = $this->dataTablesCountFilteredQueryBuilder($dtWrapper);

        return intval($qb->getQuery()->getSingleScalarResult());
    }

    /**
     * Create a query builder "count filtered".
     *
     * @param DataTablesWrapperInterface $dtWrapper The wrapper.
     * @return QueryBuilder Returns the query builder "count filtered".
     */
    protected function dataTablesCountFilteredQueryBuilder(DataTablesWrapperInterface $dtWrapper): QueryBuilder {

        $prefix = $dtWrapper->getMapping()->getPrefix();

        $qb = $this->createQueryBuilder($prefix)
            ->select("COUNT($prefix)");

        DataTablesRepositoryHelper::appendWhere($qb, $dtWrapper);

        return $qb;
    }

    /**
     * {@inheritDoc}
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function dataTablesCountTotal(DataTablesWrapperInterface $dtWrapper): int {

        $qb = $this->dataTablesCountTotalQueryBuilder($dtWrapper);

        return intval($qb->getQuery()->getSingleScalarResult());
    }

    /**
     * Create a query builder "Count total".
     *
     * @param DataTablesWrapperInterface $dtWrapper The wrapper.
     * @return QueryBuilder Returns the query builder "count total".
     */
    protected function dataTablesCountTotalQueryBuilder(DataTablesWrapperInterface $dtWrapper): QueryBuilder {

        $prefix = $dtWrapper->getMapping()->getPrefix();

        return $this->createQueryBuilder($prefix)
            ->select("COUNT($prefix)");
    }

    /**
     * {@inheritDoc}
     */
    public function dataTablesExportAll(DataTablesWrapperInterface $dtWrapper): QueryBuilder {
        return $this->dataTablesExportAllQueryBuilder($dtWrapper);
    }

    /**
     * Create a query builder "export all".
     *
     * @param DataTablesWrapperInterface $dtWrapper The wrapper.
     * @return QueryBuilder Returns the query builder "export all".
     */
    protected function dataTablesExportAllQueryBuilder(DataTablesWrapperInterface $dtWrapper): QueryBuilder {

        $prefix = $dtWrapper->getProvider()->getPrefix();

        $qb = $this->createQueryBuilder($prefix);

        DataTablesRepositoryHelper::appendWhere($qb, $dtWrapper);

        return $qb;
    }

    /**
     * {@inheritDoc}
     */
    public function dataTablesFindAll(DataTablesWrapperInterface $dtWrapper): array {

        $qb = $this->dataTablesFindAllQueryBuilder($dtWrapper);

        return $qb->getQuery()->getResult();
    }

    /**
     * Create a query builder "find all".
     *
     * @param DataTablesWrapperInterface $dtWrapper The wrapper.
     * @return QueryBuilder Returns the query builder "find all".
     */
    protected function dataTablesFindAllQueryBuilder(DataTablesWrapperInterface $dtWrapper): QueryBuilder {

        $prefix = $dtWrapper->getMapping()->getPrefix();

        $qb = $this->createQueryBuilder($prefix)
            ->setFirstResult($dtWrapper->getRequest()->getStart());

        if (0 < $dtWrapper->getRequest()->getLength()) {
            $qb->setMaxResults($dtWrapper->getRequest()->getLength());
        }

        DataTablesRepositoryHelper::appendWhere($qb, $dtWrapper);
        DataTablesRepositoryHelper::appendOrder($qb, $dtWrapper);

        return $qb;
    }
}

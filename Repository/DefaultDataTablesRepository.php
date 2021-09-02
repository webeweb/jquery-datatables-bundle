<?php

/*
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
use WBW\Bundle\JQuery\DataTablesBundle\Api\DataTablesWrapperInterface;
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
    protected function buildDataTablesCountExported(DataTablesProviderInterface $dtProvider): QueryBuilder {

        $prefix = $dtProvider->getPrefix();

        return $this->createQueryBuilder($prefix)
            ->select("COUNT(" . $prefix . ")");
    }

    /**
     * Build a query builder "Count filtered".
     *
     * @param DataTablesWrapperInterface $dtWrapper The wrapper.
     * @return QueryBuilder Returns the query builder "Count filtered".
     */
    protected function buildDataTablesCountFiltered(DataTablesWrapperInterface $dtWrapper): QueryBuilder {

        $prefix = $dtWrapper->getMapping()->getPrefix();

        $qb = $this->createQueryBuilder($prefix)
            ->select("COUNT(" . $prefix . ")");

        DataTablesRepositoryHelper::appendWhere($qb, $dtWrapper);

        return $qb;
    }

    /**
     * Build a query builder "Count total".
     *
     * @param DataTablesWrapperInterface $dtWrapper The wrapper.
     * @return QueryBuilder Returns the query builder "Count total".
     */
    protected function buildDataTablesCountTotal(DataTablesWrapperInterface $dtWrapper): QUeryBuilder {

        $prefix = $dtWrapper->getMapping()->getPrefix();

        return $this->createQueryBuilder($prefix)
            ->select("COUNT(" . $prefix . ")");
    }

    /**
     * Build a query builder "Export all".
     *
     * @param DataTablesProviderInterface $dtProvider The provider.
     * @return QueryBuilder Returns the query builder "Export all".
     */
    protected function buildDataTablesExportAll(DataTablesProviderInterface $dtProvider): QueryBuilder {
        return $this->createQueryBuilder($dtProvider->getPrefix());
    }

    /**
     * Build a query builder "Find all".
     *
     * @param DataTablesWrapperInterface $dtWrapper The wrapper.
     * @return QueryBuilder Returns the query builder "Find all".
     */
    protected function buildDataTablesFindAll(DataTablesWrapperInterface $dtWrapper): QUeryBuilder {

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

    /**
     * {@inheritDoc}
     */
    public function dataTablesCountExported(DataTablesProviderInterface $dtProvider): int {

        $qb = $this->buildDataTablesCountExported($dtProvider);

        return intval($qb->getQuery()->getSingleScalarResult());
    }

    /**
     * {@inheritDoc}
     */
    public function dataTablesCountFiltered(DataTablesWrapperInterface $dtWrapper): int {

        $qb = $this->buildDataTablesCountFiltered($dtWrapper);

        return intval($qb->getQuery()->getSingleScalarResult());
    }

    /**
     * {@inheritDoc}
     */
    public function dataTablesCountTotal(DataTablesWrapperInterface $dtWrapper): int {

        $qb = $this->buildDataTablesCountTotal($dtWrapper);

        return intval($qb->getQuery()->getSingleScalarResult());
    }

    /**
     * {@inheritDoc}
     */
    public function dataTablesExportAll(DataTablesProviderInterface $dtProvider): QueryBuilder {
        return $this->buildDataTablesExportAll($dtProvider);
    }

    /**
     * {@inheritDoc}
     */
    public function dataTablesFindAll(DataTablesWrapperInterface $dtWrapper): array {

        $qb = $this->buildDataTablesFindAll($dtWrapper);

        return $qb->getQuery()->getResult();
    }
}

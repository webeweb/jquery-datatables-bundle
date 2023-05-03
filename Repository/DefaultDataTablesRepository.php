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
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Repository
 * @abstract
 */
abstract class DefaultDataTablesRepository extends EntityRepository implements DataTablesRepositoryInterface {

    /**
     * Build a query builder "count exported".
     *
     * @param DataTablesProviderInterface $dtProvider The provider.
     * @return QueryBuilder Returns the query builder "count exported".
     * @deprecated since 3.34.0 use {@see WBW\Bundle\JQuery\DataTablesBundle\Repository\DefaultDataTablesRepository::dataTablesCountExportedQueryBuilder()} instead
     */
    protected function buildDataTablesCountExported(DataTablesProviderInterface $dtProvider): QueryBuilder {
        return $this->dataTablesCountExportedQueryBuilder($dtProvider);
    }

    /**
     * Build a query builder "count filtered".
     *
     * @param DataTablesWrapperInterface $dtWrapper The wrapper.
     * @return QueryBuilder Returns the query builder "count filtered".
     * @deprecated since 3.34.0 use {@see WBW\Bundle\JQuery\DataTablesBundle\Repository\DefaultDataTablesRepository::dataTablesCountFilteredQueryBuilder()} instead
     */
    protected function buildDataTablesCountFiltered(DataTablesWrapperInterface $dtWrapper): QueryBuilder {
        return $this->dataTablesCountFilteredQueryBuilder($dtWrapper);
    }

    /**
     * Build a query builder "count total".
     *
     * @param DataTablesWrapperInterface $dtWrapper The wrapper.
     * @return QueryBuilder Returns the query builder "count total".
     * @deprecated since 3.34.0 use {@see WBW\Bundle\JQuery\DataTablesBundle\Repository\DefaultDataTablesRepository::dataTablesCountTotalQueryBuilder()} instead
     */
    protected function buildDataTablesCountTotal(DataTablesWrapperInterface $dtWrapper): QueryBuilder {
        return $this->dataTablesCountTotalQueryBuilder($dtWrapper);
    }

    /**
     * Build a query builder "export all".
     *
     * @param DataTablesProviderInterface $dtProvider The provider.
     * @return QueryBuilder Returns the query builder "export all".
     * @deprecated since 3.34.0 use {@see WBW\Bundle\JQuery\DataTablesBundle\Repository\DefaultDataTablesRepository::dataTablesExportAllQueryBuilder()} instead
     */
    protected function buildDataTablesExportAll(DataTablesProviderInterface $dtProvider): QueryBuilder {
        return $this->dataTablesExportAllQueryBuilder($dtProvider);
    }

    /**
     * Build a query builder "find all".
     *
     * @param DataTablesWrapperInterface $dtWrapper The wrapper.
     * @return QueryBuilder Returns the query builder "find all".
     * @deprecated since 3.34.0 use {@see WBW\Bundle\JQuery\DataTablesBundle\Repository\DefaultDataTablesRepository::dataTablesFindAllQueryBuilder()} instead
     */
    protected function buildDataTablesFindAll(DataTablesWrapperInterface $dtWrapper): QueryBuilder {
        return $this->dataTablesFindAllQueryBuilder($dtWrapper);
    }

    /**
     * {@inheritdoc}
     */
    public function dataTablesCountExported(DataTablesProviderInterface $dtProvider): int {

        $qb = $this->dataTablesCountExportedQueryBuilder($dtProvider);

        return intval($qb->getQuery()->getSingleScalarResult());
    }

    /**
     * Create a query builder "count exported".
     *
     * @param DataTablesProviderInterface $dtProvider The provider.
     * @return QueryBuilder Returns the query builder "count exported".
     */
    protected function dataTablesCountExportedQueryBuilder(DataTablesProviderInterface $dtProvider): QueryBuilder {

        $prefix = $dtProvider->getPrefix();

        return $this->createQueryBuilder($prefix)
            ->select("COUNT($prefix)");
    }

    /**
     * {@inheritdoc}
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
     * {@inheritdoc}
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
     * {@inheritdoc}
     */
    public function dataTablesExportAll(DataTablesProviderInterface $dtProvider): QueryBuilder {
        return $this->dataTablesExportAllQueryBuilder($dtProvider);
    }

    /**
     * Create a query builder "export all".
     *
     * @param DataTablesProviderInterface $dtProvider The provider.
     * @return QueryBuilder Returns the query builder "export all".
     */
    protected function dataTablesExportAllQueryBuilder(DataTablesProviderInterface $dtProvider): QueryBuilder {
        return $this->createQueryBuilder($dtProvider->getPrefix());
    }

    /**
     * {@inheritdoc}
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

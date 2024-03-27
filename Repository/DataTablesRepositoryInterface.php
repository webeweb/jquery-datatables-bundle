<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Repository;

use Doctrine\ORM\QueryBuilder;
use WBW\Bundle\JQuery\DataTablesBundle\Api\DataTablesWrapperInterface;

/**
 * DataTables repository interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Provider;
 */
interface DataTablesRepositoryInterface {

    /**
     * Repository limit.
     *
     * @var int
     */
    public const REPOSITORY_LIMIT = 10000;

    /**
     * Count exported entities.
     *
     * @param DataTablesWrapperInterface $dtWrapper The provider.
     * @return int Returns the exported entities count.
     */
    public function dataTablesCountExported(DataTablesWrapperInterface $dtWrapper): int;

    /**
     * Count filtered entities.
     *
     * @param DataTablesWrapperInterface $dtWrapper The wrapper.
     * @return int Returns the filtered entities count.
     */
    public function dataTablesCountFiltered(DataTablesWrapperInterface $dtWrapper): int;

    /**
     * Count all entities.
     *
     * @param DataTablesWrapperInterface $dtWrapper The wrapper.
     * @return int Returns the all entities count.
     */
    public function dataTablesCountTotal(DataTablesWrapperInterface $dtWrapper): int;

    /**
     * Export all query builder.
     *
     * @param DataTablesWrapperInterface $dtWrapper The provider.
     * @return QueryBuilder Returns the query builder.
     */
    public function dataTablesExportAll(DataTablesWrapperInterface $dtWrapper): QueryBuilder;

    /**
     * Find all entities.
     *
     * @param DataTablesWrapperInterface $dtWrapper The wrapper.
     * @return object[] Returns the entities.
     */
    public function dataTablesFindAll(DataTablesWrapperInterface $dtWrapper): array;
}

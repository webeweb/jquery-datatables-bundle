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

use Doctrine\ORM\QueryBuilder;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesWrapperInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Provider\DataTablesProviderInterface;

/**
 * DataTables repository interface.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Provider;
 */
interface DataTablesRepositoryInterface {

    /**
     * Repository limit.
     *
     * @var int
     */
    const REPOSITORY_LIMIT = 10000;

    /**
     * Count exported entities.
     *
     * @param DataTablesProviderInterface $dtProvider The provider.
     * @return int Returns the exported entities count.
     */
    public function dataTablesCountExported(DataTablesProviderInterface $dtProvider);

    /**
     * Count filtered entities.
     *
     * @param DataTablesWrapperInterface $dtWrapper The wrapper.
     * @return int Returns the filtered entities count.
     */
    public function dataTablesCountFiltered(DataTablesWrapperInterface $dtWrapper);

    /**
     * Count all entities.
     *
     * @param DataTablesWrapperInterface $dtWrapper The wrapper.
     * @return int Returns the all entities count.
     */
    public function dataTablesCountTotal(DataTablesWrapperInterface $dtWrapper);

    /**
     * Export all query builder.
     *
     * @param DataTablesProviderInterface $dtProvider The provider.
     * @return QueryBuilder Returns the export all query builder.
     */
    public function dataTablesExportAll(DataTablesProviderInterface $dtProvider);

    /**
     * Find all entities.
     *
     * @param DataTablesWrapperInterface $dtWrapper The wrapper.
     * @return array Returns the entities.
     */
    public function dataTablesFindAll(DataTablesWrapperInterface $dtWrapper);
}

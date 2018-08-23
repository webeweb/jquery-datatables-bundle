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

use Doctrine\ORM\QueryBuilder;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesWrapper;
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
     * @var integer
     */
    const REPOSITORY_LIMIT = 10000;

    /**
     * Count exported entities.
     *
     * @param DataTablesProvider The provider.
     * @return integer Returns the exported entities count.
     */
    public function dataTablesCountExported(DataTablesProviderInterface $dtProvider);

    /**
     * Count filtered entities.
     *
     * @param DataTablesWrapper $dtWrapper The wrapper.
     * @return integer Returns the filtered entities count.
     */
    public function dataTablesCountFiltered(DataTablesWrapper $dtWrapper);

    /**
     * Count all entities.
     *
     * @param DataTablesWrapper $dtWrapper The wrapper.
     * @return integer Returns the all entities count.
     */
    public function dataTablesCountTotal(DataTablesWrapper $dtWrapper);

    /**
     * Export all query builder.
     *
     * @param DataTablesProvider The provider.
     * @return QueryBuilder Returns the export all query builder.
     */
    public function dataTablesExportAll(DataTablesProviderInterface $dtProvider);

    /**
     * Find all entities.
     *
     * @param DataTablesWrapper $dtWrapper The wrapper.
     * @return array Returns the entities.
     */
    public function dataTablesFindAll(DataTablesWrapper $dtWrapper);
}

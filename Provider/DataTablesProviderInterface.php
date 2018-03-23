<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DatatablesBundle\Provider;

use WBW\Bundle\JQuery\DatatablesBundle\Column\DataTablesColumn;
use WBW\Bundle\JQuery\DatatablesBundle\Repository\DataTablesRepositoryInterface;

/**
 * DataTables provider interface.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DatatablesBundle\Provider;
 */
interface DataTablesProviderInterface {

    /**
     * Tag name.
     *
     * @var string
     */
    const TAG_NAME = "webeweb.jquerydatatables.provider";

    /**
     * Get the DataTables columns.
     *
     * @return DataTablesColumn[] Returns the DataTables columns.
     */
    public function getColumns();

    /**
     * Get the provider name.
     *
     * @return string Returns the provider name.
     */
    public function getName();

    /**
     * Get the prefix.
     *
     * @return string Returns the prefix.
     */
    public function getPrefix();

    /**
     * Get the DataTables repository.
     *
     * @return DataTablesRepositoryInterface Returns the DataTables repository.
     */
    public function getRepository();

    /**
     * Get the controller view.
     *
     * @return string Returns the controller view.
     */
    public function getView();
}

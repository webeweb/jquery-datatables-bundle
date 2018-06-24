<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Provider;

use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesColumn;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesResponseInterface;

/**
 * DataTables provider interface.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Provider;
 */
interface DataTablesProviderInterface extends DataTablesResponseInterface {

    /**
     * Tag name.
     *
     * @var string
     */
    const TAG_NAME = "webeweb.jquerydatatables.provider";

    /**
     * Export a DataTables columns.
     *
     * @return array Returns an array representing the columns.
     */
    public function exportColumns();

    /**
     * Export a DataTables row.
     *
     * @param mixed $entity The entity.
     * @return array Returns an array representing this row.
     */
    public function exportRow($entity);

    /**
     * Get the DataTables columns.
     *
     * @return DataTablesColumn[] Returns the DataTables columns.
     */
    public function getColumns();

    /**
     * Get the entity.
     *
     * @return mixed Returns the entity (Entity::class for example).
     */
    public function getEntity();

    /**
     * Get the HTTP method.
     *
     * @return string Returns the HTTP method.
     */
    public function getMethod();

    /**
     * Get the provider name.
     *
     * @return string Returns the provider name.
     */
    public function getName();

    /**
     * Get the Doctrine prefix.
     *
     * @return string Returns the Doctrine prefix.
     */
    public function getPrefix();

    /**
     * Get the controller view.
     *
     * @return string Returns the controller view.
     */
    public function getView();

    /**
     * Render a DataTables column.
     *
     * @param DataTablesColumn $dtColumn The DataTables column.
     * @param mixed $entity The entity.
     * @return mixed Returns the rendered DataTables column.
     */
    public function renderColumn(DataTablesColumn $dtColumn, $entity);

    /**
     * Render a DataTables row.
     *
     * @param string $dtRow The DataTables row.
     * @param mixed $entity The entity.
     * @param integer $rowNumber The row number.
     * @return mixed Returns the rendered DataTables row.
     */
    public function renderRow($dtRow, $entity, $rowNumber);
}

<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Provider;

use WBW\Bundle\CoreBundle\Provider\ProviderInterface;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesColumnInterface;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesOptionsInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Entity\DataTablesEntityInterface;

/**
 * DataTables provider interface.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Provider;
 */
interface DataTablesProviderInterface extends ProviderInterface {

    /**
     * Tag name.
     *
     * @var string
     */
    const DATATABLES_TAG_NAME = "wbw.jquery.datatables.provider";

    /**
     * Get the CSV exporter.
     *
     * @return DataTablesCSVExporterInterface|null Returns the CSV exporter.
     */
    public function getCSVExporter();

    /**
     * Get the columns.
     *
     * @return DataTablesColumnInterface[] Returns the columns.
     */
    public function getColumns();

    /**
     * Get the editor.
     *
     * @return DataTablesEditorInterface|null Returns the editor.
     */
    public function getEditor();

    /**
     * Get the entity.
     *
     * @return mixed Returns the entity (Entity::class for example).
     */
    public function getEntity();

    /**
     * Get the HTTP method.
     *
     * @return string|null Returns the HTTP method.
     */
    public function getMethod();

    /**
     * Get the provider name.
     *
     * @return string Returns the provider name.
     */
    public function getName();

    /**
     * Get the options.
     *
     * @return DataTablesOptionsInterface Returns the options.
     */
    public function getOptions();

    /**
     * Get the Doctrine prefix.
     *
     * @return string Returns the Doctrine prefix.
     */
    public function getPrefix();

    /**
     * Get the controller view.
     *
     * @return string|null Returns the controller view.
     */
    public function getView();

    /**
     * Render a column.
     *
     * @param DataTablesColumnInterface $dtColumn The column.
     * @param DataTablesEntityInterface $entity The entity.
     * @return string Returns the rendered column.
     */
    public function renderColumn(DataTablesColumnInterface $dtColumn, $entity);

    /**
     * Render a row.
     *
     * @param string $dtRow The row.
     * @param DataTablesEntityInterface $entity The entity.
     * @param int $rowNumber The row number.
     * @return mixed Returns the rendered row.
     */
    public function renderRow($dtRow, $entity, $rowNumber);
}

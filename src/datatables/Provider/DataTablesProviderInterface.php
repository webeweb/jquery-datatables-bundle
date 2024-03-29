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

namespace WBW\Bundle\DataTablesBundle\Provider;

use Throwable;
use WBW\Bundle\DataTablesBundle\Api\DataTablesColumnInterface;
use WBW\Bundle\DataTablesBundle\Api\DataTablesOptionsInterface;
use WBW\Library\Symfony\Provider\ProviderInterface;

/**
 * DataTables provider interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Provider;
 */
interface DataTablesProviderInterface extends ProviderInterface {

    /**
     * Tag name.
     *
     * @var string
     */
    public const DATATABLES_TAG_NAME = "wbw.datatables.provider";

    /**
     * Get the CSV exporter.
     *
     * @return DataTablesCsvExporterInterface|null Returns the CSV exporter.
     */
    public function getCsvExporter(): ?DataTablesCsvExporterInterface;

    /**
     * Get the columns.
     *
     * @return DataTablesColumnInterface[] Returns the columns.
     */
    public function getColumns(): array;

    /**
     * Get the editor.
     *
     * @return DataTablesEditorInterface|null Returns the editor.
     */
    public function getEditor(): ?DataTablesEditorInterface;

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
    public function getMethod(): ?string;

    /**
     * Get the provider name.
     *
     * @return string Returns the provider name.
     */
    public function getName(): string;

    /**
     * Get the options.
     *
     * @return DataTablesOptionsInterface|null Returns the options.
     */
    public function getOptions(): ?DataTablesOptionsInterface;

    /**
     * Get the Doctrine prefix.
     *
     * @return string Returns the Doctrine prefix.
     */
    public function getPrefix(): string;

    /**
     * Get the controller view.
     *
     * @return string|null Returns the controller view.
     */
    public function getView(): ?string;

    /**
     * Render a column.
     *
     * @param DataTablesColumnInterface $dtColumn The column.
     * @param object $entity The entity.
     * @return string|null Returns the rendered column.
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function renderColumn(DataTablesColumnInterface $dtColumn, $entity): ?string;

    /**
     * Render a row.
     *
     * @param string $dtRow The row.
     * @param object $entity The entity.
     * @param int $rowNumber The row number.
     * @return mixed Returns the rendered row.
     */
    public function renderRow(string $dtRow, $entity, int $rowNumber);
}

<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\DataTablesBundle\Service;

use Doctrine\ORM\EntityNotFoundException;
use Throwable;
use WBW\Bundle\DataTablesBundle\Exception\BadDataTablesColumnException;
use WBW\Bundle\DataTablesBundle\Exception\BadDataTablesCsvExporterException;
use WBW\Bundle\DataTablesBundle\Exception\BadDataTablesEditorException;
use WBW\Bundle\DataTablesBundle\Exception\BadDataTablesRepositoryException;
use WBW\Bundle\DataTablesBundle\Exception\UnregisteredDataTablesProviderException;
use WBW\Bundle\DataTablesBundle\Model\DataTablesColumnInterface;
use WBW\Bundle\DataTablesBundle\Model\DataTablesWrapperInterface;
use WBW\Bundle\DataTablesBundle\Provider\DataTablesCsvExporterInterface;
use WBW\Bundle\DataTablesBundle\Provider\DataTablesEditorInterface;
use WBW\Bundle\DataTablesBundle\Provider\DataTablesProviderInterface;
use WBW\Bundle\DataTablesBundle\Repository\DataTablesRepositoryInterface;

/**
 * DataTables service interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Service
 */
interface DataTablesServiceInterface {

    /**
     * Get a column.
     *
     * @param DataTablesProviderInterface $dtProvider The provider.
     * @param string $data The data.
     * @return DataTablesColumnInterface Returns the column.
     * @throws BadDataTablesColumnException Throws a bad column exception.
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function getDataTablesColumn(DataTablesProviderInterface $dtProvider, string $data): DataTablesColumnInterface;

    /**
     * Get a CSV exporter.
     *
     * @param DataTablesProviderInterface $dtProvider The provider.
     * @return DataTablesCsvExporterInterface Returns the CSV exporter.
     * @throws BadDataTablesCsvExporterException Throws a bad CSV exporter exception.
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function getDataTablesCsvExporter(DataTablesProviderInterface $dtProvider): DataTablesCsvExporterInterface;

    /**
     * Get an editor.
     *
     * @param DataTablesProviderInterface $dtProvider The provider.
     * @return DataTablesEditorInterface Returns the editor.
     * @throws BadDataTablesEditorException Throws a bad editor exception.
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function getDataTablesEditor(DataTablesProviderInterface $dtProvider): DataTablesEditorInterface;

    /**
     * Get an entity by id.
     *
     * @param DataTablesProviderInterface $dtProvider The provider.
     * @param mixed $id The entity id.
     * @return object Returns the entity.
     * @throws BadDataTablesRepositoryException Throws a bad repository exception.
     * @throws EntityNotFoundException Throws an Entity not found exception.
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function getDataTablesEntityById(DataTablesProviderInterface $dtProvider, $id);

    /**
     * Get the provider.
     *
     * @param string $name The provider name.
     * @return DataTablesProviderInterface Returns the provider.
     * @throws Throwable Throws an exception if an error occurs.
     * @throws UnregisteredDataTablesProviderException Throws an unregistered provider exception.
     */
    public function getDataTablesProvider(string $name): DataTablesProviderInterface;

    /**
     * Get a repository.
     *
     * @param DataTablesProviderInterface $dtProvider The provider.
     * @return DataTablesRepositoryInterface Returns the repository.
     * @throws BadDataTablesRepositoryException Throws a bad repository exception.
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function getDataTablesRepository(DataTablesProviderInterface $dtProvider): DataTablesRepositoryInterface;

    /**
     * Get a URL.
     *
     * @param DataTablesProviderInterface $dtProvider The provider.
     * @return string Returns the URL.
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function getDataTablesUrl(DataTablesProviderInterface $dtProvider): string;

    /**
     * Get a wrapper.
     *
     * @param DataTablesProviderInterface $dtProvider The provider.
     * @return DataTablesWrapperInterface Returns the wrapper.
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function getDataTablesWrapper(DataTablesProviderInterface $dtProvider): DataTablesWrapperInterface;
}

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

namespace WBW\Bundle\DataTablesBundle\Api;

use Symfony\Component\Security\Core\User\UserInterface;
use WBW\Bundle\DataTablesBundle\Model\DataTablesColumnInterface;
use WBW\Bundle\DataTablesBundle\Model\DataTablesMappingInterface;
use WBW\Bundle\DataTablesBundle\Model\DataTablesOptionsInterface;
use WBW\Bundle\DataTablesBundle\Model\DataTablesRequestInterface;
use WBW\Bundle\DataTablesBundle\Provider\DataTablesProviderInterface;

/**
 * DataTables wrapper interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Api
 */
interface DataTablesWrapperInterface {

    /**
     * Add a column.
     *
     * @param DataTablesColumnInterface $column The column.
     * @return DataTablesWrapperInterface Returns this wrapper.
     */
    public function addColumn(DataTablesColumnInterface $column): DataTablesWrapperInterface;

    /**
     * Get a column.
     *
     * @param string $data The column data.
     * @return DataTablesColumnInterface|null Returns the column in case of success, null otherwise.
     */
    public function getColumn(string $data): ?DataTablesColumnInterface;

    /**
     * Get the columns.
     *
     * @return DataTablesColumnInterface[] Returns the columns.
     */
    public function getColumns(): array;

    /**
     * Get the mapping.
     *
     * @return DataTablesMappingInterface Returns the mapping.
     */
    public function getMapping(): DataTablesMappingInterface;

    /**
     * Get the method.
     *
     * @return string Returns the method.
     */
    public function getMethod(): string;

    /**
     * Get the options.
     *
     * @return DataTablesOptionsInterface|null Returns the options.
     */
    public function getOptions(): ?DataTablesOptionsInterface;

    /**
     * Get the processing.
     *
     * @return bool|null Returns the processing.
     */
    public function getProcessing(): ?bool;

    /**
     * Get the provider.
     *
     * @return DataTablesProviderInterface|null Returns the provider.
     */
    public function getProvider(): ?DataTablesProviderInterface;

    /**
     * Get the request.
     *
     * @return DataTablesRequestInterface|null The request.
     */
    public function getRequest(): ?DataTablesRequestInterface;

    /**
     * Get the response.
     *
     * @return DataTablesResponseInterface|null Returns the response.
     */
    public function getResponse(): ?DataTablesResponseInterface;

    /**
     * Get the server side.
     *
     * @return bool|null Returns the server side.
     */
    public function getServerSide(): ?bool;

    /**
     * Get the URL.
     *
     * @return string|null Returns the URL.
     */
    public function getUrl(): ?string;

    /**
     * Get the user.
     *
     * @return UserInterface|null Returns the user.
     */
    public function getUser(): ?UserInterface;

    /**
     * Set the request.
     *
     * @param DataTablesRequestInterface|null $request The request.
     * @return DataTablesWrapperInterface Returns this wrapper.
     */
    public function setRequest(?DataTablesRequestInterface $request): DataTablesWrapperInterface;

    /**
     * Set the response.
     *
     * @param DataTablesResponseInterface|null $response The response.
     * @return DataTablesWrapperInterface Returns this wrapper.
     */
    public function setResponse(?DataTablesResponseInterface $response): DataTablesWrapperInterface;
}

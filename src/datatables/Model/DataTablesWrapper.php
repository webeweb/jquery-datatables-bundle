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

namespace WBW\Bundle\DataTablesBundle\Model;

use WBW\Bundle\CommonBundle\Security\Core\User\UserTrait;
use WBW\Bundle\DataTablesBundle\Api\DataTablesColumnInterface;
use WBW\Bundle\DataTablesBundle\Api\DataTablesMappingInterface;
use WBW\Bundle\DataTablesBundle\Api\DataTablesOptionsInterface;
use WBW\Bundle\DataTablesBundle\Api\DataTablesRequestInterface;
use WBW\Bundle\DataTablesBundle\Api\DataTablesResponseInterface;
use WBW\Bundle\DataTablesBundle\Api\DataTablesWrapperInterface;
use WBW\Bundle\DataTablesBundle\Provider\DataTablesProviderInterface;

/**
 * DataTables wrapper.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Model
 */
class DataTablesWrapper implements DataTablesWrapperInterface {

    use UserTrait {
        setUser as public;
    }

    /**
     * Columns.
     *
     * @var DataTablesColumnInterface[]
     */
    private $columns;

    /**
     * Mapping.
     *
     * @var DataTablesMappingInterface
     */
    private $mapping;

    /**
     * Method.
     *
     * @var string
     */
    private $method;

    /**
     * Options.
     *
     * @var DataTablesOptionsInterface|null
     */
    private $options;

    /**
     * Processing.
     *
     * @var bool|null
     */
    private $processing;

    /**
     * Provider.
     *
     * @var DataTablesProviderInterface|null
     */
    private $provider;

    /**
     * Request.
     *
     * @var DataTablesRequestInterface|null
     */
    private $request;

    /**
     * Response.
     *
     * @var DataTablesResponseInterface|null
     */
    private $response;

    /**
     * Server side.
     *
     * @var bool|null
     */
    private $serverSide;

    /**
     * URL.
     *
     * @var string|null
     */
    private $url;

    /**
     * Constructor.
     */
    public function __construct() {
        $this->setColumns([]);
        $this->setMapping(new DataTablesMapping());
        $this->setMethod("POST");
        $this->setProcessing(true);
        $this->setServerSide(true);
    }

    /**
     * {@inheritDoc}
     */
    public function addColumn(DataTablesColumnInterface $column): DataTablesWrapperInterface {

        if (null === $column->getMapping()->getPrefix()) {
            $column->getMapping()->setPrefix($this->mapping->getPrefix());
        }

        $this->columns[$column->getData()] = $column;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getColumn(string $data): ?DataTablesColumnInterface {

        if (true === array_key_exists($data, $this->columns)) {
            return $this->columns[$data];
        }

        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function getColumns(): array {
        return $this->columns;
    }

    /**
     * {@inheritDoc}
     */
    public function getMapping(): DataTablesMappingInterface {
        return $this->mapping;
    }

    /**
     * {@inheritDoc}
     */
    public function getMethod(): string {
        return $this->method;
    }

    /**
     * {@inheritDoc}
     */
    public function getOptions(): ?DataTablesOptionsInterface {
        return $this->options;
    }

    /**
     * {@inheritDoc}
     */
    public function getProcessing(): ?bool {
        return $this->processing;
    }

    /**
     * {@inheritDoc}
     */
    public function getProvider(): ?DataTablesProviderInterface {
        return $this->provider;
    }

    /**
     * {@inheritDoc}
     */
    public function getRequest(): ?DataTablesRequestInterface {
        return $this->request;
    }

    /**
     * {@inheritDoc}
     */
    public function getResponse(): ?DataTablesResponseInterface {
        return $this->response;
    }

    /**
     * {@inheritDoc}
     */
    public function getServerSide(): ?bool {
        return $this->serverSide;
    }

    /**
     * {@inheritDoc}
     */
    public function getUrl(): ?string {
        return $this->url;
    }

    /**
     * Remove a column.
     *
     * @param DataTablesColumnInterface $column The column.
     * @return DataTablesWrapperInterface Returns this wrapper.
     */
    public function removeColumn(DataTablesColumnInterface $column): DataTablesWrapperInterface {

        if (true === array_key_exists($column->getData(), $this->columns)) {

            $this->columns[$column->getData()]->getMapping()->setPrefix(null);
            unset($this->columns[$column->getData()]);
        }

        return $this;
    }

    /**
     * Set the columns.
     *
     * @param DataTablesColumnInterface[] $columns The columns.
     * @return DataTablesWrapperInterface Returns this wrapper.
     */
    private function setColumns(array $columns): DataTablesWrapperInterface {
        $this->columns = $columns;
        return $this;
    }

    /**
     * Set the mapping.
     *
     * @param DataTablesMappingInterface $mapping The mapping
     * @return DataTablesWrapperInterface Returns this wrapper.
     */
    public function setMapping(DataTablesMappingInterface $mapping): DataTablesWrapperInterface {
        $this->mapping = $mapping;
        return $this;
    }

    /**
     * Set the method.
     *
     * @param string|null $method The method.
     * @return DataTablesWrapperInterface Returns this wrapper.
     */
    public function setMethod(?string $method): DataTablesWrapperInterface {
        $this->method = (true === in_array($method, ["GET", "POST"]) ? $method : "POST");
        return $this;
    }

    /**
     * Set the options.
     *
     * @param DataTablesOptionsInterface|null $options The options.
     * @return DataTablesWrapperInterface Returns this wrapper.
     */
    public function setOptions(?DataTablesOptionsInterface $options): DataTablesWrapperInterface {
        $this->options = $options;
        return $this;
    }

    /**
     * Set the processing.
     *
     * @param bool|null $processing The processing.
     * @return DataTablesWrapperInterface Returns this wrapper.
     */
    public function setProcessing(?bool $processing): DataTablesWrapperInterface {
        $this->processing = !(false === $processing);
        return $this;
    }

    /**
     * Set the provider.
     *
     * @param DataTablesProviderInterface|null $provider The provider.
     * @return DataTablesWrapperInterface Returns this wrapper.
     */
    public function setProvider(?DataTablesProviderInterface $provider): DataTablesWrapperInterface {
        $this->provider = $provider;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setRequest(?DataTablesRequestInterface $request): DataTablesWrapperInterface {
        $this->request = $request;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setResponse(?DataTablesResponseInterface $response): DataTablesWrapperInterface {
        $this->response = $response;
        return $this;
    }

    /**
     * Set the server side.
     *
     * @param bool|null $serverSide The server side.
     * @return DataTablesWrapperInterface Returns this wrapper.
     */
    public function setServerSide(?bool $serverSide): DataTablesWrapperInterface {
        $this->serverSide = !(false === $serverSide);
        return $this;
    }

    /**
     * Set the URL.
     *
     * @param string|null $url The UTL.
     * @return DataTablesWrapperInterface Returns this wrapper.
     */
    public function setUrl(?string $url): DataTablesWrapperInterface {
        $this->url = $url;
        return $this;
    }
}

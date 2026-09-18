<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\DocumentBundle\Manager;

use InvalidArgumentException;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;
use WBW\Bundle\CommonBundle\Manager\AbstractManager;
use WBW\Bundle\CommonBundle\Manager\ManagerInterface;
use WBW\Bundle\CommonBundle\Provider\ProviderInterface;
use WBW\Bundle\DocumentBundle\Helper\DocumentHelper;
use WBW\Bundle\DocumentBundle\Model\DocumentInterface;
use WBW\Bundle\DocumentBundle\Provider\StorageProviderInterface;

/**
 * Storage manager.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DocumentBundle\Manager
 */
class StorageManager extends AbstractManager implements StorageManagerInterface {

    /**
     * Service name.
     *
     * @var string
     */
    public const SERVICE_NAME = "wbw.document.manager.storage";

    /**
     * Constructor.
     *
     * @param LoggerInterface $logger The logger.
     */
    public function __construct(LoggerInterface $logger) {
        parent::__construct($logger);
    }

    /**
     * {@inheritDoc}
     */
    public function addProvider(ProviderInterface $provider): ManagerInterface {

        if (false === ($provider instanceof StorageProviderInterface)) {
            throw new InvalidArgumentException("The provider must implements " . StorageProviderInterface::class);
        }

        return parent::addProvider($provider);
    }

    /**
     * {@inheritDoc}
     */
    public function deleteDirectory(DocumentInterface $directory): void {

        DocumentHelper::isDirectory($directory);

        /** @var StorageProviderInterface $current */
        foreach ($this->getProviders() as $current) {
            $current->deleteDirectory($directory);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function deleteDocument(DocumentInterface $document): void {

        DocumentHelper::isDocument($document);

        /** @var StorageProviderInterface $current */
        foreach ($this->getProviders() as $current) {
            $current->deleteDocument($document);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function downloadDirectory(DocumentInterface $directory): ?Response {

        DocumentHelper::isDirectory($directory);
        if (false === $this->hasProviders()) {
            return null;
        }

        /** @var StorageProviderInterface $provider */
        $provider = $this->getProviders()[0];

        return $provider->downloadDirectory($directory);
    }

    /**
     * {@inheritDoc}
     */
    public function downloadDocument(DocumentInterface $document): ?Response {

        DocumentHelper::isDocument($document);
        if (false === $this->hasProviders()) {
            return null;
        }

        /** @var StorageProviderInterface $provider */
        $provider = $this->getProviders()[0];

        return $provider->downloadDocument($document);
    }

    /**
     * {@inheritDoc}
     */
    public function moveDocument(DocumentInterface $document): void {

        /** @var StorageProviderInterface $current */
        foreach ($this->getProviders() as $current) {
            $current->moveDocument($document);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function newDirectory(DocumentInterface $directory): void {

        DocumentHelper::isDirectory($directory);

        /** @var StorageProviderInterface $current */
        foreach ($this->getProviders() as $current) {
            $current->newDirectory($directory);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function uploadDocument(DocumentInterface $document): void {

        DocumentHelper::isDocument($document);

        /** @var StorageProviderInterface $current */
        foreach ($this->getProviders() as $current) {
            $current->uploadDocument($document);
        }
    }
}

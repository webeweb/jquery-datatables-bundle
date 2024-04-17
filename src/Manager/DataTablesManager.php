<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Manager;

use InvalidArgumentException;
use Throwable;
use WBW\Bundle\DataTablesBundle\Exception\AlreadyRegisteredDataTablesProviderException;
use WBW\Bundle\DataTablesBundle\Exception\UnregisteredDataTablesProviderException;
use WBW\Bundle\DataTablesBundle\Provider\DataTablesProviderInterface;
use WBW\Library\Symfony\Manager\AbstractManager;
use WBW\Library\Symfony\Manager\ManagerInterface;
use WBW\Library\Symfony\Provider\ProviderInterface;

/**
 * DataTables manager.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Manager
 */
class DataTablesManager extends AbstractManager {

    /**
     * Service name.
     *
     * @var string
     */
    public const SERVICE_NAME = "wbw.datatables.manager";

    /**
     * {@inheritDoc}
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function addProvider(ProviderInterface $provider): ManagerInterface {

        if (false === ($provider instanceof DataTablesProviderInterface)) {
            throw new InvalidArgumentException("The provider must implements " . DataTablesProviderInterface::class);
        }

        /** @var DataTablesProviderInterface $provider */
        if (true === $this->containsProvider($provider)) {
            throw new AlreadyRegisteredDataTablesProviderException($provider->getName());
        }

        return parent::addProvider($provider);
    }

    /**
     * Get a provider.
     *
     * @param string $name The name.
     * @return DataTablesProviderInterface Returns the provider.
     * @throws UnregisteredDataTablesProviderException Throws an unregistered provider exception.
     */
    public function getProvider(string $name): DataTablesProviderInterface {

        /** @var DataTablesProviderInterface $current */
        foreach ($this->getProviders() as $current) {
            if ($name === $current->getName()) {
                return $current;
            }
        }

        throw new UnregisteredDataTablesProviderException($name);
    }
}

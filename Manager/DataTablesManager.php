<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Manager;

use InvalidArgumentException;
use WBW\Bundle\CoreBundle\Manager\AbstractManager;
use WBW\Bundle\CoreBundle\Provider\ProviderInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Exception\AlreadyRegisteredDataTablesProviderException;
use WBW\Bundle\JQuery\DataTablesBundle\Exception\UnregisteredDataTablesProviderException;
use WBW\Bundle\JQuery\DataTablesBundle\Provider\DataTablesProviderInterface;

/**
 * DataTables manager.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Manager
 */
class DataTablesManager extends AbstractManager {

    /**
     * Service name.
     *
     * @var string
     */
    const SERVICE_NAME = "wbw.jquery.datatables.manager";

    /**
     * {@inheritDoc}
     */
    public function addProvider(ProviderInterface $provider) {

        if (true === $this->contains($provider)) {
            throw new AlreadyRegisteredDataTablesProviderException($provider->getName());
        }

        return parent::addProvider($provider);
    }

    /**
     * {@inheritDoc}
     */
    public function contains(ProviderInterface $provider) {

        if (false === ($provider instanceof DataTablesProviderInterface)) {
            throw new InvalidArgumentException("The provider must implements DataTablesProviderInterface");
        }

        foreach ($this->getProviders() as $current) {
            if ($provider->getName() === $current->getName()) {
                return true;
            }
        }

        return false;
    }

    /**
     * Get a provider.
     *
     * @param string $name The name.
     * @return DataTablesProviderInterface Returns the provider.
     * @throws UnregisteredDataTablesProviderException Throws an unregistered provider exception.
     */
    public function getProvider($name) {

        /** @var DataTablesProviderInterface $current */
        foreach ($this->getProviders() as $current) {
            if ($name === $current->getName()) {
                return $current;
            }
        }

        throw new UnregisteredDataTablesProviderException($name);
    }
}

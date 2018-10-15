<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Manager;

use WBW\Bundle\JQuery\DataTablesBundle\Exception\AlreadyRegisteredDataTablesProviderException;
use WBW\Bundle\JQuery\DataTablesBundle\Exception\UnregisteredDataTablesProviderException;
use WBW\Bundle\JQuery\DataTablesBundle\Provider\DataTablesProviderInterface;

/**
 * DataTables manager.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Manager
 */
class DataTablesManager {

    /**
     * Service name.
     *
     * @var string
     */
    const SERVICE_NAME = "webeweb.jquerydatatables.manager.datatables";

    /**
     * Providers.
     *
     * @var DataTablesProviderInterface[]
     */
    private $providers;

    /**
     * Constructor.
     */
    public function __construct() {
        $this->setProviders([]);
    }

    /**
     * Get a provider.
     *
     * @param string $name The provider name.
     * @return DataTablesProviderInterface Returns the provider.
     * @throws UnregisteredDataTablesProviderException Throws an unregistered provider exception.
     */
    public function getProvider($name) {
        if (false === array_key_exists($name, $this->providers)) {
            throw new UnregisteredDataTablesProviderException($name);
        }
        return $this->providers[$name];
    }

    /**
     * Get the providers.
     *
     * @return DataTablesProviderInterface[] Returns the providers.
     */
    public function getProviders() {
        return $this->providers;
    }

    /**
     * Register a provider.
     *
     * @param DataTablesProviderInterface $provider The provider.
     * @throws AlreadyRegisteredDataTablesProviderException Throws an already registered provider exception.
     */
    public function registerProvider(DataTablesProviderInterface $provider) {
        if (true === array_key_exists($provider->getName(), $this->providers)) {
            throw new AlreadyRegisteredDataTablesProviderException($provider->getName());
        }
        $this->providers[$provider->getName()] = $provider;
    }

    /**
     * Set the providers.
     *
     * @param DataTablesProviderInterface[] $providers The providers.
     * @return DataTablesManager Returns this manager.
     */
    private function setProviders(array $providers) {
        $this->providers = $providers;
        return $this;
    }

}

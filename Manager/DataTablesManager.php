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

use WBW\Bundle\CoreBundle\Manager\AbstractManager;
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
    const SERVICE_NAME = "webeweb.jquerydatatables.manager";

    /**
     * Index.
     *
     * @var array
     */
    private $index;

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct();
        $this->setIndex([]);
    }

    /**
     * Determines if a name exists.
     *
     * @param string $name The name.
     * @return bool Returns true in case of success, false otherwise.
     */
    protected function exists($name) {
        return array_key_exists($name, $this->index);
    }

    /**
     * Get the index.
     *
     * @return array Returns the index.
     */
    public function getIndex() {
        return $this->index;
    }

    /**
     * Get a provider.
     *
     * @param string $name The provider name.
     * @return DataTablesProviderInterface Returns the provider.
     * @throws UnregisteredDataTablesProviderException Throws an unregistered provider exception.
     */
    public function getProvider($name) {
        if (false === $this->exists($name)) {
            throw new UnregisteredDataTablesProviderException($name);
        }
        return $this->getProviders()[$this->getIndex()[$name]];
    }

    /**
     * Index a provider.
     *
     * @param DataTablesProviderInterface $provider The provider.
     * @return void
     */
    protected function indexProvider(DataTablesProviderInterface $provider) {
        $this->index[$provider->getName()] = $this->size();
    }

    /**
     * Register a provider.
     *
     * @param DataTablesProviderInterface $provider The provider.
     * @return ManagerInterface Returns this manager.
     * @throws AlreadyRegisteredDataTablesProviderException Throws an already registered provider exception.
     */
    public function registerProvider(DataTablesProviderInterface $provider) {
        if (true === $this->exists($provider->getName())) {
            throw new AlreadyRegisteredDataTablesProviderException($provider->getName());
        }
        $this->indexProvider($provider);
        return $this->addProvider($provider);
    }

    /**
     * Set the index.
     *
     * @param array $index The index.
     * @return ManagerInterface Returns this manager.
     */
    protected function setIndex(array $index) {
        $this->index = $index;
        return $this;
    }

}

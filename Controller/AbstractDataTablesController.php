<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Controller;

use WBW\Bundle\BootstrapBundle\Controller\AbstractBootstrapController;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesWrapper;
use WBW\Bundle\JQuery\DataTablesBundle\Exception\UnregisteredDataTablesProviderException;
use WBW\Bundle\JQuery\DataTablesBundle\Manager\DataTablesManager;
use WBW\Bundle\JQuery\DataTablesBundle\Provider\DataTablesProviderInterface;
use WBW\Library\Core\IO\HTTPInterface;

/**
 * Abstract jQuery DataTables controller.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Controller
 * @abstract
 */
abstract class AbstractDataTablesController extends AbstractBootstrapController {

    /**
     * Get the DataTables provider.
     *
     * @return DataTablesProviderInterface Returns the DataTables provider.
     * @throws UnregisteredDataTablesProviderException Throws an unregistered DataTables provider exception.
     */
    protected function getDataTablesProvider($name) {

        // Log a debug trace.
        $this->getLogger()->debug(sprintf("DataTables controller search for a DataTables provider with name \"%s\"", $name));

        // Get the DataTables provider.
        $dtProvider = $this->get(DataTablesManager::SERVICE_NAME)->getProvider($name);

        // Log an info trace.
        $this->getLogger()->info(sprintf("DataTables controller found a DataTables provider with name \"%s\"", $name));

        // Return the DataTables provider.
        return $dtProvider;
    }

    /**
     * Get a DataTables wrapper.
     *
     * @param DataTablesProviderInterface $dtProvider The DataTables provider.
     * @return DataTablesWrapper Returns the DataTables wrapper.
     */
    protected function getDataTablesWrapper(DataTablesProviderInterface $dtProvider) {

        // Initialize the DataTables wrapper.
        $dtWrapper = new DataTablesWrapper($dtProvider->getPrefix(), $dtProvider->getMethod(), $this->getRouter()->generate("jquery_datatables_index", ["name" => $dtProvider->getName()]));

        // Handle each column.
        foreach ($dtProvider->getColumns() as $dtColumn) {

            // Log a debug trace.
            $this->getLogger()->debug(sprintf("DataTables provider add a DataTables column \"%s\"", $dtColumn->getData()));

            // Add.
            $dtWrapper->addColumn($dtColumn);
        }

        // Return the DataTables wrapper.
        return $dtWrapper;
    }

    /**
     * Get the notification.
     *
     * @param string $id The notification id.
     * @return string Returns the notification.
     */
    protected function getNotification($id) {
        return $this->getTranslator()->trans($id, [], "JQueryDataTablesBundle");
    }

}

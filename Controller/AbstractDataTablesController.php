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

use Doctrine\ORM\EntityNotFoundException;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use WBW\Bundle\BootstrapBundle\Controller\AbstractBootstrapController;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesWrapper;
use WBW\Bundle\JQuery\DataTablesBundle\Exception\BadDataTablesRepositoryException;
use WBW\Bundle\JQuery\DataTablesBundle\Exception\UnregisteredDataTablesProviderException;
use WBW\Bundle\JQuery\DataTablesBundle\Manager\DataTablesManager;
use WBW\Bundle\JQuery\DataTablesBundle\Provider\DataTablesProviderInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Repository\DataTablesRepositoryInterface;

/**
 * Abstract jQuery DataTables controller.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Controller
 * @abstract
 */
abstract class AbstractDataTablesController extends AbstractBootstrapController {

    /**
     * Build a DataTables response.
     *
     * @param Request $request The request.
     * @param string $name The provider name.
     * @param array $output The output.
     * @return Response Returns the DataTables response.
     */
    protected function buildDataTablesResponse(Request $request, $name, array $output) {

        // Determines if the request is an XML HTTP request.
        if (true === $request->isXmlHttpRequest()) {

            // Return the response.
            return new Response(json_encode($output));
        }

        // Notify the user.
        switch ($output["status"]) {
            case 200:
                $this->notifySuccess($output["notify"]);
                break;
            case 404:
                $this->notifyDanger($output["notify"]);
                break;
            case 500:
                $this->notifyWarning($output["notify"]);
                break;
        }

        // Return the response.
        return $this->redirectToRoute("jquery_datatables_index", ["name" => $name]);
    }

    /**
     * Get a DataTables entity by id.
     *
     * @param DataTablesProviderInterface $dtProvider The DataTables provider.
     * @param integer $id The entity id.
     * @return mixed Returns the DataTables entity.
     * @throws BadDataTablesRepositoryException Throws a bad DataTables repository exception.
     * @throws EntityNotFoundException Throws an Entity not found exception.
     */
    protected function getDataTablesEntityById(DataTablesProviderInterface $dtProvider, $id) {

        // Get the DataTables repository.
        $repository = $this->getDataTablesRepository($dtProvider);

        // Find and check the entity.
        $entity = $repository->find($id);
        if (null === $entity) {
            throw EntityNotFoundException::fromClassNameAndIdentifier($dtProvider->getEntity(), [$id]);
        }

        // Return the DataTables entity.
        return $entity;
    }

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

        // Log a debug trace.
        $this->getLogger()->debug(sprintf("DataTables controller found a DataTables provider with name \"%s\"", $name));

        // Return the DataTables provider.
        return $dtProvider;
    }

    /**
     * Get a DataTables repository.
     *
     * @param DataTablesProviderInterface The DataTables provider.
     * @return EntityRepository Returns the DataTables repository.
     * @throws BadDataTablesRepositoryException Throws a bad DataTables repository exception.
     */
    protected function getDataTablesRepository(DataTablesProviderInterface $dtProvider) {

        // Get the entities manager.
        $em = $this->getDoctrine()->getManager();

        // Get and check the entities repository.
        $repository = $em->getRepository($dtProvider->getEntity());
        if (false === ($repository instanceOf DataTablesRepositoryInterface)) {
            throw new BadDataTablesRepositoryException($repository);
        }

        // Return the DataTables repository.
        return $repository;
    }

    /**
     * Get a DataTables wrapper.
     *
     * @param DataTablesProviderInterface $dtProvider The DataTables provider.
     * @return DataTablesWrapper Returns the DataTables wrapper.
     */
    protected function getDataTablesWrapper(DataTablesProviderInterface $dtProvider) {

        // Initialize the URL.
        $url = $this->getRouter()->generate("jquery_datatables_index", ["name" => $dtProvider->getName()]);

        // Initialize the DataTables wrapper.
        $dtWrapper = new DataTablesWrapper($dtProvider->getMethod(), $url, $dtProvider->getName());
        $dtWrapper->getMapping()->setPrefix($dtProvider->getPrefix());

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

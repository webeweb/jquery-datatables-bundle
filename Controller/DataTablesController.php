<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DatatablesBundle\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use WBW\Bundle\JQuery\DatatablesBundle\API\DataTablesResponse;
use WBW\Bundle\JQuery\DatatablesBundle\API\DataTablesWrapper;
use WBW\Bundle\JQuery\DatatablesBundle\Exception\BadDataTablesRepositoryException;
use WBW\Bundle\JQuery\DatatablesBundle\Exception\UnregisteredDataTablesProviderException;
use WBW\Bundle\JQuery\DatatablesBundle\Manager\DataTablesManager;
use WBW\Bundle\JQuery\DatatablesBundle\Provider\DataTablesProviderInterface;
use WBW\Bundle\JQuery\DatatablesBundle\Repository\DataTablesRepositoryInterface;
use WBW\Library\Core\IO\HTTPInterface;

/**
 * DataTables controller.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DatatablesBundle\Controller
 * @final
 */
final class DataTablesController extends Controller {

    /**
     * Get the DataTables provider.
     *
     * @return DataTablesProviderInterface Returns the DataTables provider.
     */
    private function getDataTablesProvider($name) {

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
    private function getDataTablesWrapper(DataTablesProviderInterface $dtProvider) {

        // Initialize the DataTables wrapper.
        $dtWrapper = new DataTablesWrapper($dtProvider->getPrefix(), HTTPInterface::HTTP_METHOD_POST, "jquery_datatables_index", ["name" => $dtProvider->getName()]);

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
     * Get the logger.
     *
     * @return LoggerInterface Returns the logger.
     */
    private function getLogger() {
        return $this->get("logger");
    }

    /**
     * Lists all entities.
     *
     * @param Request $request The request.
     * @param string $name The provider name.
     * @return Response Returns the response.
     * @throws UnregisteredDataTablesProviderException Throws an unregistered DataTables provider exception.
     * @throws BadDataTablesRepositoryException Throws a bad DataTables repository exception.
     */
    public function indexAction(Request $request, $name) {

        // Get the provider.
        $dtProvider = $this->getDataTablesProvider($name);

        // Get the wrapper.
        $dtWrapper = $this->getDataTablesWrapper($dtProvider);

        // Check if the request is an XML HTTP request.
        if (true === $request->isXmlHttpRequest()) {

            // Get the entities manager.
            $em = $this->getDoctrine()->getManager();

            // Get and check the entities repository.
            $repository = $em->getRepository($dtProvider->getEntity());
            if (false === ($repository instanceOf DataTablesRepositoryInterface)) {
                throw new BadDataTablesRepositoryException($repository);
            }

            // Parse the request.
            $dtWrapper->parse($request);

            //
            $filtered = $repository->dataTablesCountFiltered($dtWrapper);
            $total    = $repository->dataTablesCountTotal($dtWrapper);
            $entities = $repository->dataTablesFindAll($dtWrapper);

            // Set the response.
            $dtWrapper->getResponse()->setRecordsFiltered($filtered);
            $dtWrapper->getResponse()->setRecordsTotal($total);

            // Handle each entity.
            foreach ($entities as $entity) {

                // Count the rows.
                $rows = $dtWrapper->getResponse()->countRows();

                // Create a row.
                $dtWrapper->getResponse()->addRow();

                // Render each optional parameters.
                foreach (DataTablesResponse::dtRow() as $dtRow) {
                    $dtWrapper->getResponse()->setRow($dtRow, $dtProvider->renderRow($dtRow, $entity, $rows));
                }

                // Render each column.
                foreach ($dtWrapper->getColumns() as $dtColumn) {
                    $dtWrapper->getResponse()->setRow($dtColumn->getData(), $dtProvider->renderColumn($dtColumn, $entity));
                }
            }

            // Return the response.
            return new Response(json_encode($dtWrapper->getResponse()));
        }

        // Initialize the default view.
        $dtView = "@JQueryDataTables/DataTables/index.html.twig";

        // Check the provider view.
        if (null !== $dtProvider->getView()) {
            $dtView = $dtProvider->getView();
        }

        // Return the response.
        return $this->render($dtView, [
                "dtWrapper" => $dtWrapper,
        ]);
    }

}

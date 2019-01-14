<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Controller;

use DateTime;
use Doctrine\ORM\EntityNotFoundException;
use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesEnumerator;
use WBW\Bundle\JQuery\DataTablesBundle\Event\DataTablesEvents;
use WBW\Bundle\JQuery\DataTablesBundle\Exception\BadDataTablesColumnException;
use WBW\Bundle\JQuery\DataTablesBundle\Exception\BadDataTablesCSVExporterException;
use WBW\Bundle\JQuery\DataTablesBundle\Exception\BadDataTablesEditorException;
use WBW\Bundle\JQuery\DataTablesBundle\Exception\BadDataTablesRepositoryException;
use WBW\Bundle\JQuery\DataTablesBundle\Exception\UnregisteredDataTablesProviderException;
use WBW\Bundle\JQuery\DataTablesBundle\Factory\DataTablesFactory;
use WBW\Bundle\JQuery\DataTablesBundle\Helper\DataTablesExportHelper;
use WBW\Bundle\JQuery\DataTablesBundle\Helper\DataTablesWrapperHelper;
use WBW\Library\Core\Network\HTTP\HTTPInterface;

/**
 * DataTables controller.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Controller
 */
class DataTablesController extends AbstractController {

    /**
     * Delete an existing entity.
     *
     * @param Request $request The request.
     * @param string $name The provider name.
     * @param string $id The entity id.
     * @return Response Returns the response.
     * @throws UnregisteredDataTablesProviderException Throws an unregistered provider exception.
     */
    public function deleteAction(Request $request, $name, $id) {

        // Get the provider.
        $dtProvider = $this->getDataTablesProvider($name);

        try {

            // Get the entity.
            $entity = $this->getDataTablesEntityById($dtProvider, $id);

            // Dispatch an event.
            $this->dispatchDataTablesEvent(DataTablesEvents::DATATABLES_PRE_DELETE, [$entity]);

            // Get the entities manager and delete the entity.
            $em = $this->getDoctrine()->getManager();
            $em->remove($entity);
            $em->flush();

            // Dispatch an event.
            $this->dispatchDataTablesEvent(DataTablesEvents::DATATABLES_POST_DELETE, [$entity]);

            // Set the output.
            $output = $this->prepareActionResponse(200, "DataTablesController.deleteAction.success");
        } catch (Exception $ex) {

            // Set the output.
            $output = $this->handleDataTablesException($ex, "DataTablesController.deleteAction");
        }

        // Return the response.
        return $this->buildDataTablesResponse($request, $name, $output);
    }

    /**
     * Edit an existing entity.
     *
     * @param Request $request The request.
     * @param string $name The provider name
     * @param string $id The entity id.
     * @param string $data The data.
     * @param mixed $value The value
     * @return Response Returns the response.
     * @throws UnregisteredDataTablesProviderException Throws an unregistered provider exception.
     * @throws BadDataTablesEditorException Throws a bad editor exception.
     * @throws BadDataTablesColumnException Throws a bad column exception.
     */
    public function editAction(Request $request, $name, $id, $data, $value) {

        // Get the provider.
        $dtProvider = $this->getDataTablesProvider($name);

        // Get the editor.
        $dtEditor = $this->getDataTablesEditor($dtProvider);

        // Get the column.
        $dtColumn = $this->getDataTablesColumn($dtProvider, $data);

        try {

            // Get the entity.
            $entity = $this->getDataTablesEntityById($dtProvider, $id);

            // Set the value.
            if (true === $request->isMethod(HTTPInterface::HTTP_METHOD_POST)) {
                $value = $request->request->get("value");
            }

            // Dispatch an event.
            $this->dispatchDataTablesEvent(DataTablesEvents::DATATABLES_PRE_EDIT, [$entity]);

            // Set the entity.
            $dtEditor->editColumn($dtColumn, $entity, $value);

            // Get the entities manager and delete the entity.
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            // Dispatch an event.
            $this->dispatchDataTablesEvent(DataTablesEvents::DATATABLES_POST_EDIT, [$entity]);

            // Set the output.
            $output = $this->prepareActionResponse(200, "DataTablesController.editAction.success");
        } catch (Exception $ex) {

            // Set the output.
            $output = $this->handleDataTablesException($ex, "DataTablesController.editAction");
        }

        // Return the response.
        return new JsonResponse($output);
    }

    /**
     * Export all entities.
     *
     * @param string $name The provider name.
     * @return Response Returns the response.
     * @throws UnregisteredDataTablesProviderException Throws an unregistered provider exception.
     * @throws BadDataTablesCSVExporterException Throws a bad CSV exporter exception.
     * @throws BadDataTablesRepositoryException Throws a bad repository exception.
     */
    public function exportAction(Request $request, $name) {

        // Determines the client OS.
        $windows = DataTablesExportHelper::isWindows($request);

        // Get the provider.
        $dtProvider = $this->getDataTablesProvider($name);

        // Get the exporter.
        $dtExporter = $this->getDataTablesCSVExporter($dtProvider);

        // Get the entity repository.
        $repository = $this->getDataTablesRepository($dtProvider);

        // Initialize the filename.
        $filename = (new DateTime())->format("Y.m.d-H.i.s") . "-" . $dtProvider->getName() . ".csv";

        // Initialize the charset.
        $charset = true === $windows ? "iso-8859-1" : "utf-8";

        // Initialize the response.
        $response = new StreamedResponse();
        $response->headers->set("Content-Disposition", "attachment; filename=\"" . $filename . "\"");
        $response->headers->set("Content-Type", "text/csv; charset=" . $charset);
        $response->setCallback(function() use ($dtProvider, $repository, $dtExporter, $windows) {
            $this->exportDataTablesCallback($dtProvider, $repository, $dtExporter, $windows);
        });
        $response->setStatusCode(200);

        // Return the response.
        return $response;
    }

    /**
     * Lists all entities.
     *
     * @param Request $request The request.
     * @param string $name The provider name.
     * @return Response Returns the response.
     * @throws UnregisteredDataTablesProviderException Throws an unregistered provider exception.
     * @throws BadDataTablesRepositoryException Throws a bad repository exception.
     */
    public function indexAction(Request $request, $name) {

        // Check if the request is an XML HTTP request.
        if (false === $request->isXmlHttpRequest()) {
            return $this->renderAction($name);
        }

        // Get the provider.
        $dtProvider = $this->getDataTablesProvider($name);

        // Get the wrapper.
        $dtWrapper = $this->getDataTablesWrapper($dtProvider);

        // Parse the request.
        DataTablesFactory::parseWrapper($dtWrapper, $request);

        // Get the entities repository.
        $repository = $this->getDataTablesRepository($dtProvider);

        // Set the response.
        $dtWrapper->getResponse()->setRecordsFiltered($repository->dataTablesCountFiltered($dtWrapper));
        $dtWrapper->getResponse()->setRecordsTotal($repository->dataTablesCountTotal($dtWrapper));

        // Find all entities.
        $entities = $repository->dataTablesFindAll($dtWrapper);

        // Dispatch an event.
        $this->dispatchDataTablesEvent(DataTablesEvents::DATATABLES_PRE_INDEX, $entities);

        // Handle each entity.
        foreach ($entities as $entity) {

            // Count the rows.
            $rows = $dtWrapper->getResponse()->countRows();

            // Create a row.
            $dtWrapper->getResponse()->addRow();

            // Render each row.
            foreach (DataTablesEnumerator::enumRows() as $dtRow) {
                $dtWrapper->getResponse()->setRow($dtRow, $dtProvider->renderRow($dtRow, $entity, $rows));
            }

            // Render each column.
            foreach ($dtWrapper->getColumns() as $dtColumn) {
                $dtWrapper->getResponse()->setRow($dtColumn->getData(), $dtProvider->renderColumn($dtColumn, $entity));
            }
        }

        // Dispatch an event.
        $this->dispatchDataTablesEvent(DataTablesEvents::DATATABLES_POST_INDEX, $entities);

        // Return the response.
        return new JsonResponse($dtWrapper->getResponse());
    }

    /**
     * Options of a DataTables.
     *
     * @param string $name The provider name.
     * @return Response Returns a response.
     * @throws UnregisteredDataTablesProviderException Throws an unregistered provider exception.
     */
    public function optionsAction($name) {

        // Get the provider.
        $dtProvider = $this->getDataTablesProvider($name);

        // Get the wrapper.
        $dtWrapper = $this->getDataTablesWrapper($dtProvider);

        // Get the options.
        $dtOptions = DataTablesWrapperHelper::getOptions($dtWrapper);

        // Return the response.
        return new JsonResponse($dtOptions);
    }

    /**
     * Render a DataTables.
     *
     * @param string $name The provider name.
     * @return Response Returns the response.
     * @throws UnregisteredDataTablesProviderException Throws an unregistered provider exception.
     */
    public function renderAction($name) {

        // Get the provider.
        $dtProvider = $this->getDataTablesProvider($name);

        // Get the wrapper.
        $dtWrapper = $this->getDataTablesWrapper($dtProvider);

        // Get and check the provider view.
        $dtView = $dtProvider->getView();
        if (null === $dtProvider->getView()) {
            $dtView = "@JQueryDataTables/DataTables/index.html.twig";
        }

        // Return the response.
        return $this->render($dtView, [
            "dtWrapper" => $dtWrapper,
        ]);
    }

    /**
     * Show an existing entity.
     *
     * @param string $name The provider name.
     * @param string $id The entity id.
     * @return Response Returns the response.
     * @throws BadDataTablesRepositoryException Throws a bad repository exception.
     * @throws UnregisteredDataTablesProviderException Throws an unregistered provider exception.
     */
    public function showAction($name, $id) {

        // Get the provider.
        $dtProvider = $this->getDataTablesProvider($name);

        try {

            // Get the entity.
            $entity = $this->getDataTablesEntityById($dtProvider, $id);

            // Dispatch an event.
            $this->dispatchDataTablesEvent(DataTablesEvents::DATATABLES_PRE_SHOW, [$entity]);
        } catch (EntityNotFoundException $ex) {

            // Log a debug trace.
            $this->getLogger()->debug($ex->getMessage());

            // Initialize the entity.
            $entity = [];
        }

        // Get the serializer.
        $serializer = $this->getDataTablesSerializer();

        // Return the response.
        return new Response($serializer->serialize($entity, "json"), 200, ["Content-type" => "application/json"]);
    }
}

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

use DateTime;
use Doctrine\DBAL\Exception\ForeignKeyConstraintViolationException;
use Doctrine\ORM\EntityNotFoundException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesResponse;
use WBW\Bundle\JQuery\DataTablesBundle\Exception\BadDataTablesCSVExporterException;
use WBW\Bundle\JQuery\DataTablesBundle\Exception\BadDataTablesEditorException;
use WBW\Bundle\JQuery\DataTablesBundle\Exception\BadDataTablesRepositoryException;
use WBW\Bundle\JQuery\DataTablesBundle\Exception\UnregisteredDataTablesProviderException;
use WBW\Bundle\JQuery\DataTablesBundle\Helper\DataTablesWrapperHelper;
use WBW\Library\Core\Network\HTTP\HTTPInterface;

/**
 * DataTables controller.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Controller
 */
class DataTablesController extends AbstractDataTablesController {

    /**
     * Delete an existing entity.
     *
     * @param Request $request The request.
     * @param string $name The provider name.
     * @param string $id The entity id.
     * @throws UnregisteredDataTablesProviderException Throws an unregistered provider exception.
     * @throws BadDataTablesRepositoryException Throws a bad repository exception.
     */
    public function deleteAction(Request $request, $name, $id) {

        // Get the provider.
        $dtProvider = $this->getDataTablesProvider($name);

        try {

            // Get the entity.
            $entity = $this->getDataTablesEntityById($dtProvider, $id);

            // Get the entities manager and delete the entity.
            $em = $this->getDoctrine()->getManager();
            $em->remove($entity);
            $em->flush();

            // Set the output.
            $output = $this->prepareActionResponse(200, "DataTablesController.deleteAction.success");
        } catch (EntityNotFoundException $ex) {

            // Log a debug trace.
            $this->getLogger()->debug($ex->getMessage());

            // Set the output.
            $output = $this->prepareActionResponse(404, "DataTablesController.deleteAction.danger");
        } catch (Exception $ex) {

            // Log a debug trace.
            $this->getLogger()->debug(sprintf("%s:%s %s", $ex->getErrorCode(), $ex->getSQLState(), $ex->getMessage()));

            // Set the output.
            $output = $this->prepareActionResponse(500, "DataTablesController.deleteAction.warning");
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

            // Set the entity.
            $dtEditor->editColumn($dtColumn, $entity, $value);

            // Get the entities manager and delete the entity.
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            // Set the output.
            $output = $this->prepareActionResponse(200, "DataTablesController.editAction.success");
        } catch (EntityNotFoundException $ex) {

            // Log a debug trace.
            $this->getLogger()->debug($ex->getMessage());

            // Set the output.
            $output = $this->prepareActionResponse(404, "DataTablesController.editAction.danger");
        } catch (Exception $ex) {

            // Log a debug trace.
            $this->getLogger()->debug(sprintf("%s:%s %s", $ex->getErrorCode(), $ex->getSQLState(), $ex->getMessage()));

            // Set the output.
            $output = $this->prepareActionResponse(500, "DataTablesController.editAction.warning");
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
    public function exportAction($name) {

        // Get the provider.
        $dtProvider = $this->getDataTablesProvider($name);

        // Get the exporter.
        $dtExporter = $this->getDataTablesCSVExporter($dtProvider);

        // Get the entity repository.
        $repository = $this->getDataTablesRepository($dtProvider);

        // Initialize the filename.
        $filename = (new DateTime())->format("Y.m.d-H.i.s") . "-" . $dtProvider->getName() . ".csv";

        // Initialize the response.
        $response = new StreamedResponse();
        $response->headers->set("Content-Disposition", "attachment; filename=\"" . $filename . "\"");
        $response->headers->set("Content-Type", "text/csv; charset=utf-8");
        $response->setCallback(function() use($dtProvider, $repository, $dtExporter) {
            $this->exportCallback($dtProvider, $repository, $dtExporter);
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
        $dtWrapper->parse($request);

        // Get the entities repository.
        $repository = $this->getDataTablesRepository($dtProvider);

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

            // Render each row.
            foreach (DataTablesResponse::dtRows() as $dtRow) {
                $dtWrapper->getResponse()->setRow($dtRow, $dtProvider->renderRow($dtRow, $entity, $rows));
            }

            // Render each column.
            foreach ($dtWrapper->getColumns() as $dtColumn) {
                $dtWrapper->getResponse()->setRow($dtColumn->getData(), $dtProvider->renderColumn($dtColumn, $entity));
            }
        }

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
     */
    public function showAction($name, $id) {

        // Get the provider.
        $dtProvider = $this->getDataTablesProvider($name);

        try {

            // Get the entity.
            $entity = $this->getDataTablesEntityById($dtProvider, $id);
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

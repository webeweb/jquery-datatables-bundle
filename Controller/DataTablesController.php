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
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesResponse;
use WBW\Bundle\JQuery\DataTablesBundle\Exception\BadDataTablesRepositoryException;
use WBW\Bundle\JQuery\DataTablesBundle\Exception\UnregisteredDataTablesProviderException;
use WBW\Bundle\JQuery\DataTablesBundle\Helper\DataTablesHelper;

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
     * @throws UnregisteredDataTablesProviderException Throws an unregistered DataTables provider exception.
     * @throws BadDataTablesRepositoryException Throws a bad DataTables repository exception.
     */
    public function deleteAction(Request $request, $name, $id) {

        // Get the provider.
        $dtProvider = $this->getDataTablesProvider($name);

        // Initialize the output.
        $output = [
            "status" => null,
            "notify" => null,
        ];

        try {

            // Get the entity.
            $entity = $this->getDataTablesEntityById($dtProvider, $id);

            // Get the entities manager and delete the entity.
            $em = $this->getDoctrine()->getManager();
            $em->remove($entity);
            $em->flush();

            // Set the output.
            $output["status"] = 200;
            $output["notify"] = $this->getNotification("DataTablesController.deleteAction.success");
        } catch (EntityNotFoundException $ex) {

            // Log a debug trace.
            $this->getLogger()->debug($ex->getMessage());

            // Set the output.
            $output["status"] = 404;
            $output["notify"] = $this->getNotification("DataTablesController.deleteAction.danger");
        } catch (ForeignKeyConstraintViolationException $ex) {

            // Log a debug trace.
            $this->getLogger()->debug(sprintf("%s:%s %s", $ex->getErrorCode(), $ex->getSQLState(), $ex->getMessage()));

            // Set the output.
            $output["status"] = 500;
            $output["notify"] = $this->getNotification("DataTablesController.deleteAction.warning");
        }

        // Return the response.
        return $this->buildDataTablesResponse($request, $name, $output);
    }

    /**
     * Export all entities.
     *
     * @param string $name The provider name.
     * @return Response Returns the response.
     * @throws UnregisteredDataTablesProviderException Throws an unregistered DataTables provider exception.
     * @throws BadDataTablesRepositoryException Throws a bad DataTables repository exception.
     */
    public function exportAction($name) {

        // Get the provider.
        $dtProvider = $this->getDataTablesCSVExporter($name);

        // Get the entities repository.
        $repository = $this->getDataTablesRepository($dtProvider);

        // Get the entities manager.
        $em = $this->getDoctrine()->getManager();

        // Initialize the response.
        $response = new StreamedResponse(function() use($dtProvider, $repository, $em) {

            // Open the file.
            $stream = fopen("php://output", "w+");

            // Export the columns.
            fputcsv($stream, $dtProvider->exportColumns(), ";");

            // Get the export query.
            $result = $repository->dataTablesExportAll($dtProvider)->getQuery()->iterate();

            // Handle each entity.
            while (false !== ($row = $result->next())) {

                // Export the entity.
                fputcsv($stream, $dtProvider->exportRow($row[0]), ";");

                // Detach the entity to avoid memory consumption.
                $em->detach($row[0]);
            }

            // Close the file.
            fclose($stream);
        });

        // Initialize the filename.
        $filename = (new DateTime())->format("Y.m.d-H.i.s") . "-" . $dtProvider->getName() . ".csv";

        // Set the response.
        $response->setStatusCode(200);
        $response->headers->set("Content-Disposition", "attachment; filename=\"" . $filename . "\"");
        $response->headers->set("Content-Type", "text/csv; charset=utf-8");

        // Return the response.
        return $response;
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

            // Render each optional parameter.
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

    /**
     * Options of a DataTables.
     *
     * @param string $name The provider name.
     * @return Response Returns a response.
     */
    public function optionsAction($name) {

        // Get the provider.
        $dtProvider = $this->getDataTablesProvider($name);

        // Get the wrapper.
        $dtWrapper = $this->getDataTablesWrapper($dtProvider);

        // Get the options.
        $dtOptions = DataTablesHelper::getOptions($dtWrapper);

        // Return the response.
        return new Response(json_encode($dtOptions));
    }

    /**
     * Render a DataTables.
     *
     * @param string $name The provider name.
     * @return Response Returns the response.
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

}

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

use Doctrine\DBAL\Exception\ForeignKeyConstraintViolationException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesResponse;
use WBW\Bundle\JQuery\DataTablesBundle\Exception\BadDataTablesRepositoryException;
use WBW\Bundle\JQuery\DataTablesBundle\Exception\UnregisteredDataTablesProviderException;
use WBW\Bundle\JQuery\DataTablesBundle\Repository\DataTablesRepositoryInterface;

/**
 * DataTables controller.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Controller
 */
class DataTablesController extends AbstractDataTablesController {

    /**
     * Build a response.
     *
     * @param Request $request The request.
     * @param string $name The provider name.
     * @param array $output The output.
     * @return Response Return the response.
     */
    protected function buildResponse(Request $request, $name, array $output) {

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

        // Get the entities manager.
        $em = $this->getDoctrine()->getManager();

        // Get and check the entities repository.
        $repository = $em->getRepository($dtProvider->getEntity());
        if (false === ($repository instanceOf DataTablesRepositoryInterface)) {
            throw new BadDataTablesRepositoryException($repository);
        }

        // Initialize the output.
        $output = [
            "status" => null,
            "notify" => null,
        ];

        // Get and check the entity.
        $entity = $repository->find($id);
        if (null === $entity) {

            // Set the output.
            $output["status"] = 404;
            $output["notify"] = $this->getNotification("DataTablesController.deleteAction.danger");

            // Return the response.
            return $this->buildResponse($request, $name, $output);
        }

        try {

            // Delete the entity.
            $em->remove($entity);
            $em->flush();

            // Set the output.
            $output["status"] = 200;
            $output["notify"] = $this->getNotification("DataTablesController.deleteAction.success");
        } catch (ForeignKeyConstraintViolationException $ex) {

            // Log a debug trace.
            $this->getLogger()->debug(sprintf("%s:%s %s", $ex->getErrorCode(), $ex->getSQLState(), $ex->getMessage()));

            // Set the output.
            $output["status"] = 500;
            $output["notify"] = $this->getNotification("DataTablesController.deleteAction.warning");
        }

        // Return the response.
        return $this->buildResponse($request, $name, $output);
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
        if (false === $request->isXmlHttpRequest()) {

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

}

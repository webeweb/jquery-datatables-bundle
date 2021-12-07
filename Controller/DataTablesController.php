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
use WBW\Bundle\JQuery\DataTablesBundle\Event\DataTablesEvent;
use WBW\Bundle\JQuery\DataTablesBundle\Exception\BadDataTablesColumnException;
use WBW\Bundle\JQuery\DataTablesBundle\Exception\BadDataTablesCSVExporterException;
use WBW\Bundle\JQuery\DataTablesBundle\Exception\BadDataTablesEditorException;
use WBW\Bundle\JQuery\DataTablesBundle\Exception\BadDataTablesRepositoryException;
use WBW\Bundle\JQuery\DataTablesBundle\Exception\UnregisteredDataTablesProviderException;
use WBW\Bundle\JQuery\DataTablesBundle\Factory\DataTablesFactory;
use WBW\Bundle\JQuery\DataTablesBundle\Helper\DataTablesEntityHelper;
use WBW\Bundle\JQuery\DataTablesBundle\Helper\DataTablesExportHelper;
use WBW\Bundle\JQuery\DataTablesBundle\Helper\DataTablesWrapperHelper;
use WBW\Bundle\JQuery\DataTablesBundle\Model\DataTablesEnumerator;
use WBW\Library\Types\Helper\BooleanHelper;

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
    public function deleteAction(Request $request, string $name, string $id): Response {

        $dtProvider = $this->getDataTablesProvider($name);

        try {

            $entity = $this->getDataTablesEntityById($dtProvider, $id);

            $this->dispatchDataTablesEvent(DataTablesEvent::PRE_DELETE, [$entity], $dtProvider);

            $em = $this->getDoctrine()->getManager();
            $em->remove($entity);
            $em->flush();

            $this->dispatchDataTablesEvent(DataTablesEvent::POST_DELETE, [$entity], $dtProvider);

            $output = $this->prepareActionResponse(200, "DataTablesController.deleteAction.success");
        } catch (Exception $ex) {

            $output = $this->handleDataTablesException($ex, "DataTablesController.deleteAction");
        }

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
    public function editAction(Request $request, string $name, string $id, string $data, $value): Response {

        $dtProvider = $this->getDataTablesProvider($name);
        $dtEditor   = $this->getDataTablesEditor($dtProvider);
        $dtColumn   = $this->getDataTablesColumn($dtProvider, $data);

        try {

            $entity = $this->getDataTablesEntityById($dtProvider, $id);

            if (true === $request->isMethod("POST")) {
                $value = $request->request->get("value");
            }

            $this->dispatchDataTablesEvent(DataTablesEvent::PRE_EDIT, [$entity], $dtProvider);

            $dtEditor->editColumn($dtColumn, $entity, $value);

            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            $this->dispatchDataTablesEvent(DataTablesEvent::POST_EDIT, [$entity], $dtProvider);

            $output = $this->prepareActionResponse(200, "DataTablesController.editAction.success");
        } catch (Exception $ex) {

            $output = $this->handleDataTablesException($ex, "DataTablesController.editAction");
        }

        return new JsonResponse($output);
    }

    /**
     * Export all entities.
     *
     * @param Request $request The request.
     * @param string $name The provider name.
     * @return Response Returns the response.
     * @throws UnregisteredDataTablesProviderException Throws an unregistered provider exception.
     * @throws BadDataTablesCSVExporterException Throws a bad CSV exporter exception.
     * @throws BadDataTablesRepositoryException Throws a bad repository exception.
     */
    public function exportAction(Request $request, string $name): Response {

        $windows = DataTablesExportHelper::isWindows($request);

        $dtProvider = $this->getDataTablesProvider($name);
        $dtExporter = $this->getDataTablesCSVExporter($dtProvider);
        $repository = $this->getDataTablesRepository($dtProvider);

        $filename = (new DateTime())->format("Y.m.d-H.i.s") . "-" . $dtProvider->getName() . ".csv";
        $charset  = true === $windows ? "iso-8859-1" : "utf-8";

        $response = new StreamedResponse();
        $response->headers->set("Content-Disposition", 'attachment; filename="' . $filename . '"');
        $response->headers->set("Content-Type", "text/csv; charset=" . $charset);
        $response->setCallback(function() use ($dtProvider, $repository, $dtExporter, $windows) {
            $this->exportDataTablesCallback($dtProvider, $repository, $dtExporter, $windows);
        });
        $response->setStatusCode(200);

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
    public function indexAction(Request $request, string $name): Response {

        if (false === $request->isXmlHttpRequest()) {
            return $this->renderAction($name);
        }

        $dtProvider = $this->getDataTablesProvider($name);

        $dtWrapper = $this->getDataTablesWrapper($dtProvider);
        DataTablesFactory::parseWrapper($dtWrapper, $request);

        $repository = $this->getDataTablesRepository($dtProvider);

        $dtWrapper->getResponse()->setRecordsFiltered($repository->dataTablesCountFiltered($dtWrapper));
        $dtWrapper->getResponse()->setRecordsTotal($repository->dataTablesCountTotal($dtWrapper));

        $entities = $repository->dataTablesFindAll($dtWrapper);

        $this->dispatchDataTablesEvent(DataTablesEvent::PRE_INDEX, $entities, $dtProvider);

        foreach ($entities as $entity) {

            $rows = $dtWrapper->getResponse()->countRows();

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

        $this->dispatchDataTablesEvent(DataTablesEvent::POST_INDEX, $entities, $dtProvider);

        return new JsonResponse($dtWrapper->getResponse());
    }

    /**
     * Options of a DataTables.
     *
     * @param string $name The provider name.
     * @return Response Returns a response.
     * @throws UnregisteredDataTablesProviderException Throws an unregistered provider exception.
     */
    public function optionsAction(string $name): Response {

        $dtProvider = $this->getDataTablesProvider($name);
        $dtWrapper  = $this->getDataTablesWrapper($dtProvider);
        $dtOptions  = DataTablesWrapperHelper::getOptions($dtWrapper);

        return new JsonResponse($dtOptions);
    }

    /**
     * Render a DataTables.
     *
     * @param string $name The provider name.
     * @param string|null $alone Alone ?
     * @return Response Returns the response.
     * @throws UnregisteredDataTablesProviderException Throws an unregistered provider exception.
     */
    public function renderAction(string $name, string $alone = null): Response {

        $dtProvider = $this->getDataTablesProvider($name);
        $dtWrapper  = $this->getDataTablesWrapper($dtProvider);

        $dtView = $dtProvider->getView();
        if (null === $dtProvider->getView()) {
            $dtView = "@WBWJQueryDataTables/DataTables/index.html.twig";
        }
        if (true === BooleanHelper::parseString($alone)) {
            $dtView = "@WBWJQueryDataTables/DataTables/render.html.twig";
        }

        return $this->render($dtView, [
            "dtWrapper" => $dtWrapper,
        ]);
    }

    /**
     * Serialize an existing entity.
     *
     * @param string $name The provider name.
     * @param string $id The entity id.
     * @return Response Returns the response.
     * @throws BadDataTablesRepositoryException Throws a bad repository exception.
     * @throws UnregisteredDataTablesProviderException Throws an unregistered provider exception.
     */
    public function serializeAction(string $name, string $id): Response {

        $dtProvider = $this->getDataTablesProvider($name);

        $entity = null;

        try {

            $entity = $this->getDataTablesEntityById($dtProvider, $id);

            $this->dispatchDataTablesEvent(DataTablesEvent::PRE_SERIALIZE, [$entity], $dtProvider);
        } catch (EntityNotFoundException $ex) {
            $this->logInfo($ex->getMessage());
        }

        $data = DataTablesEntityHelper::jsonSerialize($entity);

        return new Response($data, 200, ["Content-type" => "application/json"]);
    }

    /**
     * Show an existing entity.
     *
     * @param string $name The provider name.
     * @param string $id The entity id.
     * @return Response Returns the response.
     * @throws BadDataTablesRepositoryException Throws a bad repository exception.
     * @throws UnregisteredDataTablesProviderException Throws an unregistered provider exception.
     * @deprecated since 3.9.0 use {@see WBW\Bundle\JQuery\DataTablesBundle\Controller\DataTablesController::serializeAction()} instead.
     */
    public function showAction(string $name, string $id): Response {

        $format = "The %s::showAction() is deprecated: use %s::serializeAction() instead";
        $myself = get_class($this);

        $this->getLogger()->warning(sprintf($format, $myself, $myself));

        return $this->serializeAction($name, $id);
    }
}

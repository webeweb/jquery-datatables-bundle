<?php

declare(strict_types = 1);

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
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Throwable;
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
use WBW\Bundle\JQuery\DataTablesBundle\Model\DataTablesLoop;
use WBW\Library\Types\Helper\BooleanHelper;

/**
 * DataTables controller.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Controller
 */
class DataTablesController extends AbstractController {

    /**
     * Service name.
     *
     * @var string
     */
    public const SERVICE_NAME = "wbw.jquery.datatables.controller.datatables";

    /**
     * Delete an existing entity.
     *
     * @param Request $request The request.
     * @param string $name The provider name.
     * @param string $id The entity id.
     * @return Response Returns the response.
     * @throws Throwable Throws an exception if an error occurs.
     * @throws UnregisteredDataTablesProviderException Throws an unregistered provider exception.
     */
    public function deleteAction(Request $request, string $name, string $id): Response {

        $dtProvider = $this->getDataTablesProvider($name);

        try {

            $entity = $this->getDataTablesEntityById($dtProvider, $id);

            $this->dispatchDataTablesEvent(DataTablesEvent::PRE_DELETE, [$entity], $dtProvider);

            $em = $this->getEntityManager();
            $em->remove($entity);
            $em->flush();

            $this->dispatchDataTablesEvent(DataTablesEvent::POST_DELETE, [$entity], $dtProvider);

            $output = $this->prepareActionResponse(200, "controller.datatables.delete.success");
        } catch (Throwable $ex) {

            $output = $this->handleDataTablesException($ex, "controller.datatables.delete");
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
     * @throws Throwable Throws an exception if an error occurs.
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

            $em = $this->getEntityManager();
            $em->persist($entity);
            $em->flush();

            $this->dispatchDataTablesEvent(DataTablesEvent::POST_EDIT, [$entity], $dtProvider);

            $output = $this->prepareActionResponse(200, "controller.datatables.edit.success");
        } catch (Throwable $ex) {

            $output = $this->handleDataTablesException($ex, "controller.datatables.edit");
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
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function exportAction(Request $request, string $name): Response {

        $windows = DataTablesExportHelper::isWindows($request);

        $dtProvider = $this->getDataTablesProvider($name);
        $dtExporter = $this->getDataTablesCSVExporter($dtProvider);
        $repository = $this->getDataTablesRepository($dtProvider);

        $dtWrapper = $this->getDataTablesWrapper($dtProvider);
        DataTablesFactory::parseWrapper($dtWrapper, $request);

        $filename = (new DateTime())->format("Y.m.d-H.i.s") . "-" . $dtProvider->getName() . ".csv";
        $charset  = true === $windows ? "iso-8859-1" : "utf-8";

        $response = new StreamedResponse();
        $response->headers->set("Content-Disposition", 'attachment; filename="' . $filename . '"');
        $response->headers->set("Content-Type", "text/csv; charset=" . $charset);
        $response->setCallback(function() use ($dtWrapper, $repository, $dtExporter, $windows) {
            $this->exportDataTablesCallback($dtWrapper, $repository, $dtExporter, $windows);
        });
        $response->setStatusCode(200);

        return $response;
    }

    /**
     * List all entities.
     *
     * @param Request $request The request.
     * @param string $name The provider name.
     * @return Response Returns the response.
     * @throws BadDataTablesRepositoryException Throws a bad repository exception.
     * @throws UnregisteredDataTablesProviderException Throws an unregistered provider exception.
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function indexAction(Request $request, string $name): Response {

        if (false === $request->isXmlHttpRequest()) {
            return $this->renderAction($name);
        }

        $dtProvider = $this->getDataTablesProvider($name);
        $repository = $this->getDataTablesRepository($dtProvider);

        $dtWrapper = $this->getDataTablesWrapper($dtProvider);
        DataTablesFactory::parseWrapper($dtWrapper, $request);

        $dtRecords = $repository->dataTablesCountTotal($dtWrapper);

        $dtWrapper->getResponse()->setRecordsTotal($dtRecords);
        $dtWrapper->getResponse()->setRecordsFiltered($dtRecords);

        if (true === DataTablesWrapperHelper::hasSearch($dtWrapper)) {
            $dtWrapper->getResponse()->setRecordsFiltered($repository->dataTablesCountFiltered($dtWrapper));
        }

        $entities = $repository->dataTablesFindAll($dtWrapper);

        $this->dispatchDataTablesEvent(DataTablesEvent::PRE_INDEX, $entities, $dtProvider);

        $dtLoop = new DataTablesLoop($entities);

        foreach ($entities as $entity) {

            $dtWrapper->getResponse()->addRow();

            // Render each row.
            foreach (DataTablesEnumerator::enumRows() as $dtRow) {
                $dtWrapper->getResponse()->setRow($dtRow, $dtProvider->renderRow($dtRow, $entity, $dtLoop->getIndex0()));
            }

            // Render each column.
            foreach ($dtWrapper->getColumns() as $dtColumn) {
                $dtWrapper->getResponse()->setRow($dtColumn->getData(), $dtProvider->renderColumn($dtColumn, $entity));
            }

            $dtLoop->next();
        }

        $this->dispatchDataTablesEvent(DataTablesEvent::POST_INDEX, $entities, $dtProvider);

        return new JsonResponse($dtWrapper->getResponse());
    }

    /**
     * Options of a DataTables.
     *
     * @param string $name The provider name.
     * @return Response Returns a response.
     * @throws Throwable Throws an exception if an error occurs.
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
     * @throws Throwable Throws an exception if an error occurs.
     * @throws UnregisteredDataTablesProviderException Throws an unregistered provider exception.
     */
    public function renderAction(string $name, string $alone = null): Response {

        $dtProvider = $this->getDataTablesProvider($name);
        $dtWrapper  = $this->getDataTablesWrapper($dtProvider);

        $dtView = $dtProvider->getView();
        if (null === $dtProvider->getView()) {
            $dtView = "@WBWJQueryDataTables/datatables/index.html.twig";
        }
        if (true === BooleanHelper::parseString($alone)) {
            $dtView = "@WBWJQueryDataTables/datatables/render.html.twig";
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
     * @throws Throwable Throws an exception if an error occurs.
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
}

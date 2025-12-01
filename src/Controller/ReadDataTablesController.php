<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2025 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Controller;

use Doctrine\ORM\EntityNotFoundException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Throwable;
use WBW\Bundle\DataTablesBundle\Event\DataTablesEvent;
use WBW\Bundle\DataTablesBundle\Exception\BadDataTablesRepositoryException;
use WBW\Bundle\DataTablesBundle\Exception\UnregisteredDataTablesProviderException;
use WBW\Bundle\DataTablesBundle\Factory\DataTablesFactory;
use WBW\Bundle\DataTablesBundle\Helper\DataTablesEntityHelper;
use WBW\Bundle\DataTablesBundle\Helper\DataTablesWrapperHelper;
use WBW\Bundle\DataTablesBundle\Model\DataTablesEnumerator;
use WBW\Bundle\DataTablesBundle\Model\DataTablesLoop;

/**
 * Read DataTables controller.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Controller
 */
class ReadDataTablesController extends AbstractDataTablesController {

    /**
     * Service name.
     *
     * @var string
     */
    public const SERVICE_NAME = "wbw.datatables.controller.read";

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
            return $this->forward(DefaultDataTablesController::class . "::renderAction", [
                "name" => $name,
            ]);
        }

        $dtService = $this->getDataTablesService();

        $dtProvider = $dtService->getDataTablesProvider($name);
        $repository = $dtService->getDataTablesRepository($dtProvider);

        $dtWrapper = $dtService->getDataTablesWrapper($dtProvider);
        DataTablesFactory::parseWrapper($dtWrapper, $request);

        $dtRecords = $repository->dataTablesCountTotal($dtWrapper);

        $dtWrapper->getResponse()->setRecordsTotal($dtRecords);
        $dtWrapper->getResponse()->setRecordsFiltered($dtRecords);

        if (true === DataTablesWrapperHelper::hasSearch($dtWrapper)) {
            $dtWrapper->getResponse()->setRecordsFiltered($repository->dataTablesCountFiltered($dtWrapper));
        }

        $entities = $repository->dataTablesFindAll($dtWrapper);

        $this->dispatchDataTablesEvent($entities, DataTablesEvent::PRE_INDEX, $dtProvider);

        $dtLoop = new DataTablesLoop($entities);

        foreach ($entities as $entity) {

            $dtWrapper->getResponse()->addRow();

            // Render the row.
            foreach (DataTablesEnumerator::enumRows() as $dtRow) {
                $dtWrapper->getResponse()->setRow($dtRow, $dtProvider->renderRow($dtRow, $entity, $dtLoop->getIndex0()));
            }

            // Render each column.
            foreach ($dtWrapper->getColumns() as $dtColumn) {
                $dtWrapper->getResponse()->setRow($dtColumn->getData(), $dtProvider->renderColumn($dtColumn, $entity));
            }

            $dtLoop->next();
        }

        $this->dispatchDataTablesEvent($entities, DataTablesEvent::POST_INDEX, $dtProvider);

        return new JsonResponse($dtWrapper->getResponse());
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

        $dtService = $this->getDataTablesService();

        $dtProvider = $dtService->getDataTablesProvider($name);

        $entity = null;

        try {

            $entity = $dtService->getDataTablesEntityById($dtProvider, $id);

            $this->dispatchDataTablesEvent([$entity], DataTablesEvent::PRE_SERIALIZE, $dtProvider);
        } catch (EntityNotFoundException $ex) {
            $this->logInfo($ex->getMessage());
        }

        $data = DataTablesEntityHelper::jsonSerialize($entity);

        return new Response($data, 200, [
            "Content-type" => "application/json",
        ]);
    }
}

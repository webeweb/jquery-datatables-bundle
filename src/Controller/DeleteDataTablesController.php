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

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Throwable;
use WBW\Bundle\DataTablesBundle\Event\DataTablesEvent;
use WBW\Bundle\DataTablesBundle\Exception\UnregisteredDataTablesProviderException;

/**
 * Delete DataTables controller.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Controller
 */
class DeleteDataTablesController extends AbstractDataTablesController {

    /**
     * Service name.
     *
     * @var string
     */
    public const SERVICE_NAME = "wbw.datatables.controller.delete";

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

        $dtService = $this->getDataTablesService();

        $dtProvider = $dtService->getDataTablesProvider($name);

        try {

            $entity = $dtService->getDataTablesEntityById($dtProvider, $id);

            $this->dispatchDataTablesEvent([$entity], DataTablesEvent::PRE_DELETE, $dtProvider);

            $em = $this->getEntityManager();
            $em->remove($entity);
            $em->flush();

            $this->dispatchDataTablesEvent([$entity], DataTablesEvent::POST_DELETE, $dtProvider);

            $output = $this->prepareActionResponse(200, "controller.datatables.delete.success");
        } catch (Throwable $ex) {
            $output = $this->handleDataTablesException($ex, "controller.datatables.delete");
        }

        return $this->buildDataTablesResponse($request, $name, $output);
    }
}

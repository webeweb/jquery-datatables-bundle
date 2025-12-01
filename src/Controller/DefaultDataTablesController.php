<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\DataTablesBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Throwable;
use WBW\Bundle\DataTablesBundle\Event\DataTablesEvent;
use WBW\Bundle\DataTablesBundle\Exception\BadDataTablesColumnException;
use WBW\Bundle\DataTablesBundle\Exception\BadDataTablesEditorException;
use WBW\Bundle\DataTablesBundle\Exception\UnregisteredDataTablesProviderException;
use WBW\Bundle\DataTablesBundle\Helper\DataTablesWrapperHelper;
use WBW\Library\Common\Helper\BooleanHelper;

/**
 * Default DataTables controller.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Controller
 */
class DefaultDataTablesController extends AbstractDataTablesController {

    /**
     * Service name.
     *
     * @var string
     */
    public const SERVICE_NAME = "wbw.datatables.controller.default";

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

        $dtService = $this->getDataTablesService();

        $dtProvider = $dtService->getDataTablesProvider($name);
        $dtEditor   = $dtService->getDataTablesEditor($dtProvider);
        $dtColumn   = $dtService->getDataTablesColumn($dtProvider, $data);

        try {

            $entity = $dtService->getDataTablesEntityById($dtProvider, $id);

            if (true === $request->isMethod("POST")) {
                $value = $request->request->get("value");
            }

            $this->dispatchDataTablesEvent([$entity], DataTablesEvent::PRE_EDIT, $dtProvider);

            $dtEditor->editColumn($dtColumn, $entity, $value);

            $em = $this->getEntityManager();
            $em->persist($entity);
            $em->flush();

            $this->dispatchDataTablesEvent([$entity], DataTablesEvent::POST_EDIT, $dtProvider);

            $output = $this->prepareActionResponse(200, "controller.datatables.edit.success");
        } catch (Throwable $ex) {
            $output = $this->handleDataTablesException($ex, "controller.datatables.edit");
        }

        return new JsonResponse($output);
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

        $dtService = $this->getDataTablesService();

        $dtProvider = $dtService->getDataTablesProvider($name);
        $dtWrapper  = $dtService->getDataTablesWrapper($dtProvider);
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
    public function renderAction(string $name, ?string $alone = null): Response {

        $dtService = $this->getDataTablesService();

        $dtProvider = $dtService->getDataTablesProvider($name);
        $dtWrapper  = $dtService->getDataTablesWrapper($dtProvider);

        $dtView = $dtProvider->getView();
        if (null === $dtProvider->getView()) {
            $dtView = "@WBWDataTables/default/index.html.twig";
        }
        if (true === BooleanHelper::parseString($alone)) {
            $dtView = "@WBWDataTables/default/render.html.twig";
        }

        return $this->render($dtView, [
            "dtWrapper" => $dtWrapper,
        ]);
    }
}

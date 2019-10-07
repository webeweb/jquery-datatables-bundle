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

use Doctrine\ORM\EntityNotFoundException;
use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use WBW\Bundle\BootstrapBundle\Controller\AbstractController as BaseController;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesColumnInterface;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesWrapperInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Event\DataTablesEvent;
use WBW\Bundle\JQuery\DataTablesBundle\Exception\BadDataTablesColumnException;
use WBW\Bundle\JQuery\DataTablesBundle\Exception\BadDataTablesCSVExporterException;
use WBW\Bundle\JQuery\DataTablesBundle\Exception\BadDataTablesEditorException;
use WBW\Bundle\JQuery\DataTablesBundle\Exception\BadDataTablesRepositoryException;
use WBW\Bundle\JQuery\DataTablesBundle\Exception\UnregisteredDataTablesProviderException;
use WBW\Bundle\JQuery\DataTablesBundle\Factory\DataTablesFactory;
use WBW\Bundle\JQuery\DataTablesBundle\Helper\DataTablesExportHelper;
use WBW\Bundle\JQuery\DataTablesBundle\Manager\DataTablesManager;
use WBW\Bundle\JQuery\DataTablesBundle\Provider\DataTablesCSVExporterInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Provider\DataTablesEditorInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Provider\DataTablesProviderInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Provider\DataTablesRouterInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Repository\DataTablesRepositoryInterface;
use WBW\Bundle\JQuery\DataTablesBundle\WBWJQueryDataTablesEvents;
use WBW\Library\Core\Database\PaginateHelper;
use WBW\Library\Core\Model\Response\ActionResponse;

/**
 * Abstract controller.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Controller
 * @abstract
 */
abstract class AbstractController extends BaseController {

    /**
     * Build a response.
     *
     * @param Request $request The request.
     * @param string $name The provider name.
     * @param ActionResponse $output The output.
     * @return Response Returns the response.
     */
    protected function buildDataTablesResponse(Request $request, $name, ActionResponse $output) {

        if (true === $request->isXmlHttpRequest()) {
            return new JsonResponse($output);
        }

        switch ($output->getStatus()) {

            case 200:
                $this->notifySuccess($output->getNotify());
                break;

            case 404:
                $this->notifyDanger($output->getNotify());
                break;

            case 500:
                $this->notifyWarning($output->getNotify());
                break;
        }

        return $this->redirectToRoute("wbw_jquery_datatables_index", ["name" => $name]);
    }

    /**
     * Dispatch an event.
     *
     * @param string $eventName The event name.
     * @param array $entities The entities.
     * @return DataTablesEvent|null Returns the event in case of success, null otherwise.
     */
    protected function dispatchDataTablesEvent($eventName, array $entities) {
        return $this->dispatchEvent($eventName, new DataTablesEvent($eventName, $entities));
    }

    /**
     * Export callback.
     *
     * @param DataTablesProviderInterface $dtProvider The provider.
     * @param DataTablesRepositoryInterface $repository The repository.
     * @param DataTablesCSVExporterInterface $dtExporter The exporter.
     * @param bool $windows Windows ?
     * @return void
     */
    protected function exportDataTablesCallback(DataTablesProviderInterface $dtProvider, DataTablesRepositoryInterface $repository, DataTablesCSVExporterInterface $dtExporter, $windows) {

        $stream = fopen("php://output", "w+");
        fputcsv($stream, DataTablesExportHelper::convert($dtExporter->exportColumns(), $windows), ";");

        // Paginates.
        $total = $repository->dataTablesCountExported($dtProvider);
        $pages = PaginateHelper::getPagesCount($total, DataTablesRepositoryInterface::REPOSITORY_LIMIT);

        $em = $this->getDoctrine()->getManager();

        for ($i = 0; $i < $pages; ++$i) {

            // Get the offset and limit.
            list($offset, $limit) = PaginateHelper::getPageOffsetAndLimit($i, DataTablesRepositoryInterface::REPOSITORY_LIMIT, $total);

            // Get the export query with offset and limit.
            $result = $repository->dataTablesExportAll($dtProvider)
                ->setFirstResult($offset)
                ->setMaxResults($limit)
                ->getQuery()
                ->iterate();

            while (false !== ($row = $result->next())) {

                $this->dispatchDataTablesEvent(WBWJQueryDataTablesEvents::DATATABLES_PRE_EXPORT, [$row[0]]);

                fputcsv($stream, DataTablesExportHelper::convert($dtExporter->exportRow($row[0]), $windows), ";");

                $em->detach($row[0]); // Detach the entity to avoid memory consumption.

                $this->dispatchDataTablesEvent(WBWJQueryDataTablesEvents::DATATABLES_POST_EXPORT, [$row[0]]);
            }
        }

        fclose($stream);
    }

    /**
     * Get a CSV exporter.
     *
     * @param DataTablesProviderInterface $dtProvider The provider.
     * @return DataTablesCSVExporterInterface Returns the CSV exporter.
     * @throws BadDataTablesCSVExporterException Throws a bad CSV exporter exception.
     */
    protected function getDataTablesCSVExporter(DataTablesProviderInterface $dtProvider) {

        $context = [
            "_controller" => get_class($this),
            "_provider"   => get_class($dtProvider),
        ];

        $this->logInfo(sprintf("DataTables controller search for a CSV exporter with name \"%s\"", $dtProvider->getName()), $context);

        $dtExporter = $dtProvider->getCSVExporter();
        if (false === ($dtExporter instanceOf DataTablesCSVExporterInterface)) {
            throw new BadDataTablesCSVExporterException($dtExporter);
        }

        $context["_exporter"] = get_class($dtExporter);

        $this->logInfo(sprintf("DataTables controller found a CSV exporter with name \"%s\"", $dtProvider->getName()), $context);

        return $dtExporter;
    }

    /**
     * Get a column.
     *
     * @param DataTablesProviderInterface $dtProvider The provider.
     * @param string $data The data.
     * @return DataTablesColumnInterface Returns the column.
     * @throws BadDataTablesColumnException Throws a bad column exception.
     */
    protected function getDataTablesColumn(DataTablesProviderInterface $dtProvider, $data) {

        $dtWrapper = $this->getDataTablesWrapper($dtProvider);

        $context = [
            "_controller" => get_class($this),
            "_provider"   => get_class($dtProvider),
            "_wrapper"    => get_class($dtWrapper),
        ];

        $this->logInfo(sprintf("DataTables controller search for a column with name \"%s\"", $data), $context);

        $dtColumn = $dtWrapper->getColumn($data);
        if (null === $dtColumn) {
            throw new BadDataTablesColumnException($data);
        }

        $context["_column"] = get_class($dtColumn);

        $this->logInfo(sprintf("DataTables controller found a column with name \"%s\"", $data), $context);

        return $dtColumn;
    }

    /**
     * Get an editor.
     *
     * @param DataTablesProviderInterface $dtProvider The provider.
     * @return DataTablesEditorInterface Returns the editor.
     * @throws BadDataTablesEditorException Throws a bad editor exception.
     */
    protected function getDataTablesEditor(DataTablesProviderInterface $dtProvider) {

        $context = [
            "_controller" => get_class($this),
            "_provider"   => get_class($dtProvider),
        ];

        $this->logInfo(sprintf("DataTables controller search for an editor with name \"%s\"", $dtProvider->getName()), $context);

        $dtEditor = $dtProvider->getEditor();
        if (false === ($dtEditor instanceOf DataTablesEditorInterface)) {
            throw new BadDataTablesEditorException($dtEditor);
        }

        $context["_editor"] = get_class($dtEditor);

        $this->logInfo(sprintf("DataTables controller found an editor with name \"%s\"", $dtProvider->getName()), $context);

        return $dtEditor;
    }

    /**
     * Get an entity by id.
     *
     * @param DataTablesProviderInterface $dtProvider The provider.
     * @param int $id The entity id.
     * @return object Returns the entity.
     * @throws BadDataTablesRepositoryException Throws a bad repository exception.
     * @throws EntityNotFoundException Throws an Entity not found exception.
     */
    protected function getDataTablesEntityById(DataTablesProviderInterface $dtProvider, $id) {

        $repository = $this->getDataTablesRepository($dtProvider);

        $context = [
            "_controller" => get_class($this),
            "_provider"   => get_class($dtProvider),
            "_repository" => get_class($repository),
        ];

        $this->logInfo(sprintf("DataTables controller search for an entity with id [%s]", $id), $context);

        $entity = $repository->find($id);
        if (null === $entity) {
            throw EntityNotFoundException::fromClassNameAndIdentifier($dtProvider->getEntity(), [$id]);
        }

        $context["_entity"] = get_class($entity);

        $this->logInfo(sprintf("DataTables controller found an entity with id [%s]", get_class($repository), $id));

        return $entity;
    }

    /**
     * Get the manager.
     *
     * @return DataTablesManager Returns the manager.
     */
    protected function getDataTablesManager() {
        return $this->get(DataTablesManager::SERVICE_NAME);
    }

    /**
     * Get a notification.
     *
     * @param string $notificationId The notification id.
     * @return string Returns the notification.
     */
    protected function getDataTablesNotification($notificationId) {
        return $this->getTranslator()->trans($notificationId, [], "WBWJQueryDataTablesBundle");
    }

    /**
     * Get the provider.
     *
     * @param string $name The provider name.
     * @return DataTablesProviderInterface Returns the provider.
     * @throws UnregisteredDataTablesProviderException Throws an unregistered provider exception.
     */
    protected function getDataTablesProvider($name) {

        $dtManager = $this->getDataTablesManager();

        $context = [
            "_controller" => get_class($this),
            "_manager"    => get_class($dtManager),
        ];

        $this->logInfo(sprintf("DataTables controller search for a provider with name \"%s\"", $name), $context);

        $dtProvider = $dtManager->getProvider($name);

        $context["_provider"] = get_class($dtProvider);

        $this->logInfo(sprintf("DataTables controller found a provider with name \"%s\"", $name), $context);

        return $dtProvider;
    }

    /**
     * Get a repository.
     *
     * @param DataTablesProviderInterface $dtProvider The provider.
     * @return DataTablesRepositoryInterface Returns the repository.
     * @throws BadDataTablesRepositoryException Throws a bad repository exception.
     */
    protected function getDataTablesRepository(DataTablesProviderInterface $dtProvider) {

        $em = $this->getDoctrine()->getManager();

        $context = [
            "_controller" => get_class($this),
            "_provider"   => get_class($dtProvider),
            "_entity"     => $dtProvider->getEntity(),
        ];

        $this->logInfo(sprintf("DataTables controller search for a repository with name \"%s\"", $dtProvider->getName()), $context);

        $repository = $em->getRepository($dtProvider->getEntity());
        if (false === ($repository instanceOf DataTablesRepositoryInterface)) {
            throw new BadDataTablesRepositoryException($repository);
        }

        $context["_repository"] = get_class($repository);

        $this->logInfo(sprintf("DataTables controller found a repository with name \"%s\"", $dtProvider->getName()), $context);

        return $repository;
    }

    /**
     * Get a serializer.
     *
     * @return Serializer Returns the serializer.
     */
    protected function getDataTablesSerializer() {
        return new Serializer([new ObjectNormalizer()], [new JsonEncoder()]);
    }

    /**
     * Get an URL.
     *
     * @param DataTablesProviderInterface $dtProvider The provider.
     * @return string Returns the URL.
     */
    protected function getDataTablesURL(DataTablesProviderInterface $dtProvider) {

        $context = [
            "_controller" => get_class($this),
            "_provider"   => get_class($dtProvider),
        ];

        $this->logInfo(sprintf("DataTables controller search for an URL with name \"%s\"", $dtProvider->getName()), $context);

        if (false === ($dtProvider instanceof DataTablesRouterInterface)) {
            return $this->getRouter()->generate("wbw_jquery_datatables_index", ["name" => $dtProvider->getName()]);
        }

        $url = $dtProvider->getUrl();

        $context["_url"] = $url;

        $this->logInfo(sprintf("DataTables controller found for an URL with name \"%s\"", $dtProvider->getName()), $context);

        return $url;
    }

    /**
     * Get a wrapper.
     *
     * @param DataTablesProviderInterface $dtProvider The provider.
     * @return DataTablesWrapperInterface Returns the wrapper.
     */
    protected function getDataTablesWrapper(DataTablesProviderInterface $dtProvider) {

        $dtWrapper = DataTablesFactory::newWrapper($this->getDataTablesURL($dtProvider), $dtProvider, $this->getKernelEventListener()->getUser());

        $context = [
            "_controller" => get_class($this),
            "_provider"   => get_class($dtProvider),
            "_wrapper"    => get_class($dtWrapper),
        ];

        foreach ($dtProvider->getColumns() as $dtColumn) {

            $this->logInfo(sprintf("DataTables controller add a column \"%s\" with the provider \"%s\"", $dtColumn->getData(), $dtProvider->getName()), $context);

            $dtWrapper->addColumn($dtColumn);
        }

        if (null !== $dtProvider->getOptions()) {
            $dtWrapper->setOptions($dtProvider->getOptions());
        }

        return $dtWrapper;
    }

    /**
     * Handle an exception.
     *
     * @param Exception $ex The exception.
     * @param string $notificationBaseId The notification base id.
     * @return ActionResponse Returns the action response.
     */
    protected function handleDataTablesException(Exception $ex, $notificationBaseId) {

        $this->logInfo($ex->getMessage());

        if (true === ($ex instanceof EntityNotFoundException)) {
            return $this->prepareActionResponse(404, $notificationBaseId . ".danger");
        }

        return $this->prepareActionResponse(500, $notificationBaseId . ".warning");
    }

    /**
     * Log an info.
     *
     * @param string $message The message.
     * @param array $context The context.
     * @return AbstractController Returns this controller.
     */
    protected function logInfo($message, array $context = []) {
        $this->getLogger()->info($message, $context);
        return $this;
    }

    /**
     * Prepare an action response.
     *
     * @param int $status The status.
     * @param string $notificationId The notification id.
     * @return ActionResponse Returns the action response.
     */
    protected function prepareActionResponse($status, $notificationId) {

        $response = new ActionResponse();
        $response->setStatus($status);
        $response->setNotify($this->getDataTablesNotification($notificationId));

        return $response;
    }
}

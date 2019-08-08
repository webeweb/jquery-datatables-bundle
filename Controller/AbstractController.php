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
     * @return DataTablesEvent Returns the event in case of success, null otherwise.
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

        $this->logInfo(sprintf("%s search for a CSV exporter with name \"%s\"", get_class($this), $dtProvider->getName()));

        $dtExporter = $dtProvider->getCSVExporter();
        if (false === ($dtExporter instanceOf DataTablesCSVExporterInterface)) {
            throw new BadDataTablesCSVExporterException($dtExporter);
        }

        $this->logInfo(sprintf("%s found a CSV exporter with name \"%s\"", get_class($this), $dtProvider->getName()));

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

        $this->logInfo(sprintf("%s search for a column with name \"%s\"", get_class($dtWrapper), $data));

        $dtColumn = $dtWrapper->getColumn($data);
        if (null === $dtColumn) {
            throw new BadDataTablesColumnException($data);
        }

        $this->logInfo(sprintf("%s found a column with name \"%s\"", get_class($dtWrapper), $data));

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

        $this->logInfo(sprintf("%s with name \"%s\" search for an editor", get_class($dtProvider), $dtProvider->getName()));

        $dtEditor = $dtProvider->getEditor();
        if (false === ($dtEditor instanceOf DataTablesEditorInterface)) {
            throw new BadDataTablesEditorException($dtEditor);
        }

        $this->logInfo(sprintf("%s with name \"%s\" found an editor", get_class($dtProvider), $dtProvider->getName()));

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

        $this->logInfo(sprintf("%s search for an entity [%s]", get_class($repository), $id));

        $entity = $repository->find($id);
        if (null === $entity) {
            throw EntityNotFoundException::fromClassNameAndIdentifier($dtProvider->getEntity(), [$id]);
        }

        $this->logInfo(sprintf("%s found an entity [%s]", get_class($repository), $id));

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

        $manager = $this->getDataTablesManager();

        $this->logInfo(sprintf("%s search for a provider with name \"%s\"", get_class($manager), $name));

        $dtProvider = $manager->getProvider($name);

        $this->logInfo(sprintf("%s found a provider with name \"%s\"", get_class($manager), $name));

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

        $this->logInfo(sprintf("%s search for a repository with entity \"%s\"", get_class($em), $dtProvider->getEntity()));

        $repository = $em->getRepository($dtProvider->getEntity());
        if (false === ($repository instanceOf DataTablesRepositoryInterface)) {
            throw new BadDataTablesRepositoryException($repository);
        }

        $this->logInfo(sprintf("%s found a repository with entity \"%s\"", get_class($em), $dtProvider->getEntity()));

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

        $this->logInfo(sprintf("%s search for an URL with name \"%s\"", get_class($this), $dtProvider->getName()));

        if (false === ($dtProvider instanceof DataTablesRouterInterface)) {
            return $this->getRouter()->generate("wbw_jquery_datatables_index", ["name" => $dtProvider->getName()]);
        }

        $this->logInfo(sprintf("%s found for an URL with name \"%s\"", get_class($this), $dtProvider->getName()));

        return $dtProvider->getUrl();
    }

    /**
     * Get a wrapper.
     *
     * @param DataTablesProviderInterface $dtProvider The provider.
     * @return DataTablesWrapperInterface Returns the wrapper.
     */
    protected function getDataTablesWrapper(DataTablesProviderInterface $dtProvider) {

        $url = $this->getDataTablesURL($dtProvider);

        $dtWrapper = DataTablesFactory::newWrapper($url, $dtProvider, $this->getKernelEventListener()->getUser());

        foreach ($dtProvider->getColumns() as $dtColumn) {

            $this->logInfo(sprintf("%s add a column \"%s\" with the provider \"%s\"", get_class($dtWrapper), $dtColumn->getData(), get_class($dtProvider)));

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
     * @return AbstractController Returns this controller.
     */
    protected function logInfo($message) {
        $this->getLogger()->info($message);
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

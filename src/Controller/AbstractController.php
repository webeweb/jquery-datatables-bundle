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

namespace WBW\Bundle\DataTablesBundle\Controller;

use Doctrine\ORM\EntityNotFoundException;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Throwable;
use WBW\Bundle\BootstrapBundle\Controller\AbstractController as BaseController;
use WBW\Bundle\DataTablesBundle\Entity\DataTablesEntityInterface;
use WBW\Bundle\DataTablesBundle\Event\DataTablesEvent;
use WBW\Bundle\DataTablesBundle\Exception\BadDataTablesColumnException;
use WBW\Bundle\DataTablesBundle\Exception\BadDataTablesCsvExporterException;
use WBW\Bundle\DataTablesBundle\Exception\BadDataTablesEditorException;
use WBW\Bundle\DataTablesBundle\Exception\BadDataTablesRepositoryException;
use WBW\Bundle\DataTablesBundle\Exception\UnregisteredDataTablesProviderException;
use WBW\Bundle\DataTablesBundle\Factory\DataTablesFactory;
use WBW\Bundle\DataTablesBundle\Helper\DataTablesExportHelper;
use WBW\Bundle\DataTablesBundle\Manager\DataTablesManagerTrait;
use WBW\Bundle\DataTablesBundle\Model\DataTablesColumnInterface;
use WBW\Bundle\DataTablesBundle\Model\DataTablesWrapper;
use WBW\Bundle\DataTablesBundle\Model\DataTablesWrapperInterface;
use WBW\Bundle\DataTablesBundle\Provider\DataTablesCsvExporterInterface;
use WBW\Bundle\DataTablesBundle\Provider\DataTablesEditorInterface;
use WBW\Bundle\DataTablesBundle\Provider\DataTablesProviderInterface;
use WBW\Bundle\DataTablesBundle\Provider\DataTablesRouterInterface;
use WBW\Bundle\DataTablesBundle\Repository\DataTablesRepositoryInterface;
use WBW\Bundle\DataTablesBundle\WBWDataTablesBundle;
use WBW\Library\Database\Helper\PaginateHelper;
use WBW\Library\Symfony\Response\SimpleJsonResponseData;
use WBW\Library\Symfony\Response\SimpleJsonResponseDataInterface;

/**
 * Abstract controller.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Controller
 * @abstract
 */
abstract class AbstractController extends BaseController {

    use DataTablesManagerTrait {
        setDataTablesManager as public;
    }

    /**
     * Build a response.
     *
     * @param Request $request The request.
     * @param string $name The provider name.
     * @param SimpleJsonResponseDataInterface $output The output.
     * @return Response Returns the response.
     * @throws Throwable Throws an exception if an error occurs.
     */
    protected function buildDataTablesResponse(Request $request, string $name, SimpleJsonResponseDataInterface $output): Response {

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

        return $this->redirectToRoute("wbw_datatables_index", ["name" => $name]);
    }

    /**
     * Dispatch an event.
     *
     * @param object[] $entities The entities.
     * @param string $eventName The event name.
     * @param DataTablesProviderInterface|null $provider The provider.
     * @return DataTablesEvent Returns the event.
     * @throws Throwable Throws an exception if an error occurs.
     */
    protected function dispatchDataTablesEvent(array $entities, string $eventName, ?DataTablesProviderInterface $provider = null): DataTablesEvent {

        $event = new DataTablesEvent($entities, $eventName, $provider);
        $this->dispatchEvent($event, $eventName);

        return $event;
    }

    /**
     * Export callback.
     *
     * @param DataTablesWrapperInterface $dtWrapper The wrapper.
     * @param DataTablesRepositoryInterface $repository The repository.
     * @param DataTablesCsvExporterInterface $dtExporter The exporter.
     * @param bool $windows Windows ?
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    protected function exportDataTablesCallback(DataTablesWrapperInterface $dtWrapper, DataTablesRepositoryInterface $repository, DataTablesCsvExporterInterface $dtExporter, bool $windows): void {

        $stream = fopen("php://output", "w+");
        fputcsv($stream, DataTablesExportHelper::convert($dtExporter->exportColumns(), $windows), ";");

        // Paginates.
        $total = $repository->dataTablesCountExported($dtWrapper);
        $pages = PaginateHelper::getPagesCount($total, DataTablesRepositoryInterface::REPOSITORY_LIMIT);

        $em = $this->getEntityManager();

        for ($i = 0; $i < $pages; ++$i) {

            // Get the offset and limit.
            [$offset, $limit] = PaginateHelper::getPageOffsetAndLimit($i, DataTablesRepositoryInterface::REPOSITORY_LIMIT, $total);

            // Get the export query with offset and limit.
            $query = $repository->dataTablesExportAll($dtWrapper)
                ->setFirstResult($offset)
                ->setMaxResults($limit)
                ->getQuery();

            foreach ($query->toIterable() as $entity) {

                $this->dispatchDataTablesEvent([$entity], DataTablesEvent::PRE_EXPORT, $dtWrapper->getProvider());

                fputcsv($stream, DataTablesExportHelper::convert($dtExporter->exportRow($entity), $windows), ";");

                $this->dispatchDataTablesEvent([$entity], DataTablesEvent::POST_EXPORT, $dtWrapper->getProvider());
            }

            $em->clear(); // Detach the entity to avoid memory consumption.
        }

        fclose($stream);
    }

    /**
     * Get a CSV exporter.
     *
     * @param DataTablesProviderInterface $dtProvider The provider.
     * @return DataTablesCsvExporterInterface Returns the CSV exporter.
     * @throws BadDataTablesCsvExporterException Throws a bad CSV exporter exception.
     * @throws Throwable Throws an exception if an error occurs.
     */
    protected function getDataTablesCsvExporter(DataTablesProviderInterface $dtProvider): DataTablesCsvExporterInterface {

        $context = [
            "_controller" => get_class($this),
            "_provider"   => get_class($dtProvider),
        ];

        $this->logInfo(sprintf('DataTables controller search for a CSV exporter with name "%s"', $dtProvider->getName()), $context);

        $dtExporter = $dtProvider->getCsvExporter();
        if (false === ($dtExporter instanceof DataTablesCsvExporterInterface)) {
            throw new BadDataTablesCsvExporterException($dtExporter);
        }

        $context["_exporter"] = get_class($dtExporter);

        $this->logInfo(sprintf('DataTables controller found a CSV exporter with name "%s"', $dtProvider->getName()), $context);

        return $dtExporter;
    }

    /**
     * Get a column.
     *
     * @param DataTablesProviderInterface $dtProvider The provider.
     * @param string $data The data.
     * @return DataTablesColumnInterface Returns the column.
     * @throws BadDataTablesColumnException Throws a bad column exception.
     * @throws Throwable Throws an exception if an error occurs.
     */
    protected function getDataTablesColumn(DataTablesProviderInterface $dtProvider, string $data): DataTablesColumnInterface {

        $dtWrapper = $this->getDataTablesWrapper($dtProvider);

        $context = [
            "_controller" => get_class($this),
            "_provider"   => get_class($dtProvider),
            "_wrapper"    => get_class($dtWrapper),
        ];

        $this->logInfo(sprintf('DataTables controller search for a column with name "%s"', $data), $context);

        $dtColumn = $dtWrapper->getColumn($data);
        if (null === $dtColumn) {
            throw new BadDataTablesColumnException($data);
        }

        $context["_column"] = get_class($dtColumn);

        $this->logInfo(sprintf('DataTables controller found a column with name "%s"', $data), $context);

        return $dtColumn;
    }

    /**
     * Get an editor.
     *
     * @param DataTablesProviderInterface $dtProvider The provider.
     * @return DataTablesEditorInterface Returns the editor.
     * @throws BadDataTablesEditorException Throws a bad editor exception.
     * @throws Throwable Throws an exception if an error occurs.
     */
    protected function getDataTablesEditor(DataTablesProviderInterface $dtProvider): DataTablesEditorInterface {

        $context = [
            "_controller" => get_class($this),
            "_provider"   => get_class($dtProvider),
        ];

        $this->logInfo(sprintf('DataTables controller search for an editor with name "%s"', $dtProvider->getName()), $context);

        $dtEditor = $dtProvider->getEditor();
        if (false === ($dtEditor instanceof DataTablesEditorInterface)) {
            throw new BadDataTablesEditorException($dtEditor);
        }

        $context["_editor"] = get_class($dtEditor);

        $this->logInfo(sprintf('DataTables controller found an editor with name "%s"', $dtProvider->getName()), $context);

        return $dtEditor;
    }

    /**
     * Get an entity by id.
     *
     * @param DataTablesProviderInterface $dtProvider The provider.
     * @param mixed $id The entity id.
     * @return object Returns the entity.
     * @throws BadDataTablesRepositoryException Throws a bad repository exception.
     * @throws EntityNotFoundException Throws an Entity not found exception.
     * @throws Throwable Throws an exception if an error occurs.
     */
    protected function getDataTablesEntityById(DataTablesProviderInterface $dtProvider, $id) {

        /** @var EntityRepository<DataTablesEntityInterface> $repository */
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

        $this->logInfo(sprintf("DataTables controller found an entity with id [%s]", $id), $context);

        return $entity;
    }

    /**
     * Get the provider.
     *
     * @param string $name The provider name.
     * @return DataTablesProviderInterface Returns the provider.
     * @throws Throwable Throws an exception if an error occurs.
     * @throws UnregisteredDataTablesProviderException Throws an unregistered provider exception.
     */
    protected function getDataTablesProvider(string $name): DataTablesProviderInterface {

        $dtManager = $this->getDataTablesManager();

        $context = [
            "_controller" => get_class($this),
            "_manager"    => get_class($dtManager),
        ];

        $this->logInfo(sprintf('DataTables controller search for a provider with name "%s"', $name), $context);

        $dtProvider = $dtManager->getProvider($name);

        $context["_provider"] = get_class($dtProvider);

        $this->logInfo(sprintf('DataTables controller found a provider with name "%s"', $name), $context);

        return $dtProvider;
    }

    /**
     * Get a repository.
     *
     * @param DataTablesProviderInterface $dtProvider The provider.
     * @return DataTablesRepositoryInterface Returns the repository.
     * @throws BadDataTablesRepositoryException Throws a bad repository exception.
     * @throws Throwable Throws an exception if an error occurs.
     */
    protected function getDataTablesRepository(DataTablesProviderInterface $dtProvider): DataTablesRepositoryInterface {

        $em = $this->getEntityManager();

        $context = [
            "_controller" => get_class($this),
            "_provider"   => get_class($dtProvider),
            "_entity"     => $dtProvider->getEntity(),
        ];

        $this->logInfo(sprintf('DataTables controller search for a repository with name "%s"', $dtProvider->getName()), $context);

        /** @var EntityRepository<DataTablesEntityInterface> $repository */
        $repository = $em->getRepository($dtProvider->getEntity());
        if (false === ($repository instanceof DataTablesRepositoryInterface)) {
            throw new BadDataTablesRepositoryException($repository);
        }

        $context["_repository"] = get_class($repository);

        $this->logInfo(sprintf('DataTables controller found a repository with name "%s"', $dtProvider->getName()), $context);

        /** @var DataTablesRepositoryInterface $repository */
        return $repository;
    }

    /**
     * Get a URL.
     *
     * @param DataTablesProviderInterface $dtProvider The provider.
     * @return string Returns the URL.
     * @throws Throwable Throws an exception if an error occurs.
     */
    protected function getDataTablesUrl(DataTablesProviderInterface $dtProvider): string {

        $context = [
            "_controller" => get_class($this),
            "_provider"   => get_class($dtProvider),
        ];

        $this->logInfo(sprintf('DataTables controller search for an URL with name "%s"', $dtProvider->getName()), $context);

        if (true === ($dtProvider instanceof DataTablesRouterInterface)) {
            $url = $dtProvider->getUrl();
        } else {
            $url = $this->getRouter()->generate("wbw_datatables_index", ["name" => $dtProvider->getName()]);
        }

        $context["_url"] = $url;

        $this->logInfo(sprintf('DataTables controller found for an URL with name "%s"', $dtProvider->getName()), $context);

        return $url;
    }

    /**
     * Get a wrapper.
     *
     * @param DataTablesProviderInterface $dtProvider The provider.
     * @return DataTablesWrapperInterface Returns the wrapper.
     * @throws Throwable Throws an exception if an error occurs.
     */
    protected function getDataTablesWrapper(DataTablesProviderInterface $dtProvider): DataTablesWrapperInterface {

        /** @var DataTablesWrapper $dtWrapper */
        $dtWrapper = DataTablesFactory::newWrapper($this->getDataTablesUrl($dtProvider), $dtProvider, $this->getUser());

        $context = [
            "_controller" => get_class($this),
            "_provider"   => get_class($dtProvider),
            "_wrapper"    => get_class($dtWrapper),
        ];

        foreach ($dtProvider->getColumns() as $dtColumn) {

            $this->logInfo(sprintf('DataTables controller add a column "%s" with the provider "%s"', $dtColumn->getData(), $dtProvider->getName()), $context);

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
     * @param Throwable $ex The exception.
     * @param string $notificationBaseId The notification base id.
     * @return SimpleJsonResponseDataInterface Returns the action response.
     * @throws Throwable Throws an exception if an error occurs.
     */
    protected function handleDataTablesException(Throwable $ex, string $notificationBaseId): SimpleJsonResponseDataInterface {

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
     * @param mixed[] $context The context.
     * @return AbstractController Returns this controller.
     * @throws Throwable Throws an exception if an error occurs.
     */
    protected function logInfo(string $message, array $context = []): AbstractController {
        $this->getLogger()->info($message, $context);
        return $this;
    }

    /**
     * Prepare an action response.
     *
     * @param int $status The status.
     * @param string $notificationId The notification id.
     * @return SimpleJsonResponseDataInterface Returns the action response.
     * @throws Throwable Throws an exception if an error occurs.
     */
    protected function prepareActionResponse(int $status, string $notificationId): SimpleJsonResponseDataInterface {

        $notify = $this->getTranslator()->trans($notificationId, [], WBWDataTablesBundle::getTranslationDomain());

        $response = new SimpleJsonResponseData();
        $response->setStatus($status);
        $response->setNotify($notify);

        return $response;
    }
}

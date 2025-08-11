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

use Doctrine\ORM\EntityNotFoundException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Throwable;
use WBW\Bundle\BootstrapBundle\Controller\AbstractController as BaseController;
use WBW\Bundle\DataTablesBundle\Event\DataTablesEvent;
use WBW\Bundle\DataTablesBundle\Helper\DataTablesExportHelper;
use WBW\Bundle\DataTablesBundle\Manager\DataTablesManagerTrait;
use WBW\Bundle\DataTablesBundle\Model\DataTablesWrapperInterface;
use WBW\Bundle\DataTablesBundle\Provider\DataTablesCsvExporterInterface;
use WBW\Bundle\DataTablesBundle\Provider\DataTablesProviderInterface;
use WBW\Bundle\DataTablesBundle\Repository\DataTablesRepositoryInterface;
use WBW\Bundle\DataTablesBundle\Service\DataTablesServiceTrait;
use WBW\Bundle\DataTablesBundle\WBWDataTablesBundle;
use WBW\Library\Common\Database\Paginator;
use WBW\Library\Common\Model\Response\SimpleJsonResponseData;
use WBW\Library\Common\Model\Response\SimpleJsonResponseDataInterface;

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

    use DataTablesServiceTrait {
        setDataTablesService as public;
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
        $pages = Paginator::countPages($total, DataTablesRepositoryInterface::REPOSITORY_LIMIT);

        $em = $this->getEntityManager();

        for ($i = 0; $i < $pages; ++$i) {

            // Get the offset and limit.
            [$offset, $limit] = Paginator::offsetLimit($i, DataTablesRepositoryInterface::REPOSITORY_LIMIT, $total);

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

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

use DateTime;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Throwable;
use WBW\Bundle\DataTablesBundle\Event\DataTablesEvent;
use WBW\Bundle\DataTablesBundle\Exception\BadDataTablesCsvExporterException;
use WBW\Bundle\DataTablesBundle\Exception\BadDataTablesRepositoryException;
use WBW\Bundle\DataTablesBundle\Exception\UnregisteredDataTablesProviderException;
use WBW\Bundle\DataTablesBundle\Factory\DataTablesFactory;
use WBW\Bundle\DataTablesBundle\Helper\DataTablesExportHelper;
use WBW\Bundle\DataTablesBundle\Model\DataTablesWrapperInterface;
use WBW\Bundle\DataTablesBundle\Provider\DataTablesCsvExporterInterface;
use WBW\Bundle\DataTablesBundle\Repository\DataTablesRepositoryInterface;
use WBW\Library\Common\Database\Paginator;

/**
 * Export DataTables controller.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Controller
 */
class ExportDataTablesController extends AbstractDataTablesController {

    /**
     * Service name.
     *
     * @var string
     */
    public const SERVICE_NAME = "wbw.datatables.controller.export";

    /**
     * Export all entities.
     *
     * @param Request $request The request.
     * @param string $name The provider name.
     * @return Response Returns the response.
     * @throws UnregisteredDataTablesProviderException Throws an unregistered provider exception.
     * @throws BadDataTablesCsvExporterException Throws a bad CSV exporter exception.
     * @throws BadDataTablesRepositoryException Throws a bad repository exception.
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function exportAction(Request $request, string $name): Response {

        $windows = DataTablesExportHelper::isWindows($request);

        $dtService = $this->getDataTablesService();

        $dtProvider = $dtService->getDataTablesProvider($name);
        $dtExporter = $dtService->getDataTablesCsvExporter($dtProvider);
        $repository = $dtService->getDataTablesRepository($dtProvider);

        $dtWrapper = $dtService->getDataTablesWrapper($dtProvider);
        DataTablesFactory::parseWrapper($dtWrapper, $request);

        $filename = (new DateTime())->format("Y.m.d-H.i.s") . "-{$dtProvider->getName()}.csv";
        $charset  = true === $windows ? "iso-8859-1" : "utf-8";
        $callback = function() use ($dtWrapper, $repository, $dtExporter, $windows) {
            $this->exportCallback($dtWrapper, $repository, $dtExporter, $windows);
        };

        $response = new StreamedResponse();
        $response->headers->set("Content-Disposition", 'attachment; filename="' . $filename . '"');
        $response->headers->set("Content-Type", "text/csv; charset=$charset");
        $response->setCallback($callback);
        $response->setStatusCode(200);

        return $response;
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
    private function exportCallback(DataTablesWrapperInterface $dtWrapper, DataTablesRepositoryInterface $repository, DataTablesCsvExporterInterface $dtExporter, bool $windows): void {

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
}

<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Controller;

use Doctrine\ORM\EntityNotFoundException;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use WBW\Bundle\BootstrapBundle\Controller\AbstractBootstrapController;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesWrapper;
use WBW\Bundle\JQuery\DataTablesBundle\Exception\BadDataTablesCSVExporterException;
use WBW\Bundle\JQuery\DataTablesBundle\Exception\BadDataTablesRepositoryException;
use WBW\Bundle\JQuery\DataTablesBundle\Exception\UnregisteredDataTablesProviderException;
use WBW\Bundle\JQuery\DataTablesBundle\Manager\DataTablesManager;
use WBW\Bundle\JQuery\DataTablesBundle\Provider\DataTablesCSVExporterInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Provider\DataTablesProviderInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Repository\DataTablesRepositoryInterface;
use WBW\Library\Core\Database\PaginateHelper;

/**
 * Abstract jQuery DataTables controller.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Controller
 * @abstract
 */
abstract class AbstractDataTablesController extends AbstractBootstrapController {

    /**
     * Build a response.
     *
     * @param Request $request The request.
     * @param string $name The provider name.
     * @param array $output The output.
     * @return Response Returns the response.
     */
    protected function buildDataTablesResponse(Request $request, $name, array $output) {

        // Determines if the request is an XML HTTP request.
        if (true === $request->isXmlHttpRequest()) {

            // Return the response.
            return new JsonResponse($output);
        }

        // Notify the user.
        switch ($output["status"]) {

            case 200:
                $this->notifySuccess($output["notify"]);
                break;

            case 404:
                $this->notifyDanger($output["notify"]);
                break;

            case 500:
                $this->notifyWarning($output["notify"]);
                break;
        }

        // Return the response.
        return $this->redirectToRoute("jquery_datatables_index", ["name" => $name]);
    }

    /**
     * Export callback.
     *
     * @param DataTablesProviderInterface $dtProvider The provider.
     * @param DataTablesRepositoryInterface $repository The repository.
     * @return void
     */
    protected function exportCallback(DataTablesProviderInterface $dtProvider, DataTablesRepositoryInterface $repository) {

        // Get the entities manager.
        $em = $this->getDoctrine()->getManager();

        // Open the file.
        $stream = fopen("php://output", "w+");

        // Export the columns.
        fputcsv($stream, $dtProvider->exportColumns(), ";");

        // Paginates.
        $total = $repository->dataTablesCountExported($dtProvider);
        $pages = PaginateHelper::getPagesCount($total, DataTablesRepositoryInterface::REPOSITORY_LIMIT);

        // Handle each page.
        for ($i = 0; $i < $pages; ++$i) {

            // Get the offset and limit.
            list($offset, $limit) = PaginateHelper::getPageOffsetAndLimit($i, DataTablesRepositoryInterface::REPOSITORY_LIMIT, $total);

            // Get the export query with offset and limit.
            $result = $repository->dataTablesExportAll($dtProvider)
                ->setFirstResult($offset)
                ->setMaxResults($limit)
                ->getQuery()
                ->iterate();

            // Handle each entity.
            while (false !== ($row = $result->next())) {

                // Export the entity.
                fputcsv($stream, $dtProvider->exportRow($row[0]), ";");

                // Detach the entity to avoid memory consumption.
                $em->detach($row[0]);
            }
        }
        // Close the file.
        fclose($stream);
    }

    /**
     * Get a CSV exporter.
     *
     * @param string $name The provider name.
     * @return DataTablesProviderInterface Returns the CSV exporter.
     * @throws UnregisteredDataTablesProviderException Throws an unregistered provider exception.
     * @throws BadDataTablesCSVExporterException Throws a bad CSV exporter exception.
     */
    protected function getDataTablesCSVExporter($name) {

        // Get the provider.
        $dtProvider = $this->getDataTablesProvider($name);

        // Log a debug trace.
        $this->getLogger()->debug(sprintf("DataTables controller search for a CSV exporter with name \"%s\"", $name));

        // Check the CSV exporter.
        if (false === ($dtProvider instanceOf DataTablesCSVExporterInterface)) {
            throw new BadDataTablesCSVExporterException($dtProvider);
        }

        // Log a debug trace.
        $this->getLogger()->debug(sprintf("DataTables controller found a CSV exporter with name \"%s\"", $name));

        // Return the provider.
        return $dtProvider;
    }

    /**
     * Get an entity by id.
     *
     * @param DataTablesProviderInterface $dtProvider The provider.
     * @param integer $id The entity id.
     * @return object Returns the entity.
     * @throws BadDataTablesRepositoryException Throws a bad repository exception.
     * @throws EntityNotFoundException Throws an Entity not found exception.
     */
    protected function getDataTablesEntityById(DataTablesProviderInterface $dtProvider, $id) {

        // Get the repository.
        $repository = $this->getDataTablesRepository($dtProvider);

        // Log a debug trace.
        $this->getLogger()->debug(sprintf("DataTables controller search for an entity [%s]", $id));

        // Find and check the entity.
        $entity = $repository->find($id);
        if (null === $entity) {
            throw EntityNotFoundException::fromClassNameAndIdentifier($dtProvider->getEntity(), [$id]);
        }

        // Log a debug trace.
        $this->getLogger()->debug(sprintf("DataTables controller found an entity [%s]", $id));

        // Return the entity.
        return $entity;
    }

    /**
     * Get the provider.
     *
     * @param string $name The provider name.
     * @return DataTablesProviderInterface Returns the provider.
     * @throws UnregisteredDataTablesProviderException Throws an unregistered provider exception.
     */
    protected function getDataTablesProvider($name) {

        // Log a debug trace.
        $this->getLogger()->debug(sprintf("DataTables controller search for a provider with name \"%s\"", $name));

        // Get the provider.
        $dtProvider = $this->get(DataTablesManager::SERVICE_NAME)->getProvider($name);

        // Log a debug trace.
        $this->getLogger()->debug(sprintf("DataTables controller found a provider with name \"%s\"", $name));

        // Return the provider.
        return $dtProvider;
    }

    /**
     * Get a repository.
     *
     * @param DataTablesProviderInterface $dtProvider The provider.
     * @return EntityRepository Returns the repository.
     * @throws BadDataTablesRepositoryException Throws a bad repository exception.
     */
    protected function getDataTablesRepository(DataTablesProviderInterface $dtProvider) {

        // Log a debug trace.
        $this->getLogger()->debug(sprintf("DataTables controller search for a repository with name \"%s\"", $dtProvider->getName()));

        // Get the entities manager.
        $em = $this->getDoctrine()->getManager();

        // Get and check the entities repository.
        $repository = $em->getRepository($dtProvider->getEntity());
        if (false === ($repository instanceOf DataTablesRepositoryInterface)) {
            throw new BadDataTablesRepositoryException($repository);
        }

        // Return the repository.
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
     * Get a wrapper.
     *
     * @param DataTablesProviderInterface $dtProvider The provider.
     * @return DataTablesWrapper Returns the wrapper.
     */
    protected function getDataTablesWrapper(DataTablesProviderInterface $dtProvider) {

        // Initialize the URL.
        $url = $this->getRouter()->generate("jquery_datatables_index", ["name" => $dtProvider->getName()]);

        // Initialize the wrapper.
        $dtWrapper = new DataTablesWrapper($dtProvider->getMethod(), $url, $dtProvider->getName());
        $dtWrapper->getMapping()->setPrefix($dtProvider->getPrefix());

        // Handle each column.
        foreach ($dtProvider->getColumns() as $dtColumn) {

            // Log a debug trace.
            $this->getLogger()->debug(sprintf("DataTables provider add a column \"%s\"", $dtColumn->getData()));

            // Add.
            $dtWrapper->addColumn($dtColumn);
        }

        // Return the wrapper.
        return $dtWrapper;
    }

    /**
     * Get the notification.
     *
     * @param string $id The notification id.
     * @return string Returns the notification.
     */
    protected function getNotification($id) {
        return $this->getTranslator()->trans($id, [], "JQueryDataTablesBundle");
    }

}

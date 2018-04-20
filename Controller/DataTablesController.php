<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DatatablesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use WBW\Bundle\JQuery\DatatablesBundle\Exception\BadDataTablesRepositoryException;
use WBW\Bundle\JQuery\DatatablesBundle\Exception\UnregisteredDataTablesProviderException;
use WBW\Bundle\JQuery\DatatablesBundle\Manager\DataTablesManager;
use WBW\Bundle\JQuery\DatatablesBundle\Repository\DataTablesRepositoryInterface;
use WBW\Bundle\JQuery\DatatablesBundle\Wrapper\DataTablesWrapper;
use WBW\Library\Core\IO\HTTPInterface;

/**
 * DataTables controller.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DatatablesBundle\Controller
 * @final
 */
final class DataTablesController extends Controller {

    /**
     * Lists all entities.
     *
     * @param Request $request The request.
     * @param string $name The provider name.
     * @return Response Returns the response.
     * @throws UnregisteredDataTablesProviderException Throws an unregistered DataTables provider exception.
     */
    public function indexAction(Request $request, $name) {

        // Get the provider.
        $dtProvider = $this->get(DataTablesManager::SERVICE_NAME)->getProvider($name);

        // Initialize the DataTables wrapper.
        $dtWrapper = new DataTablesWrapper($dtProvider->getPrefix(), HTTPInterface::HTTP_METHOD_POST, "jquery_datatables_index", ["name" => $name]);
        foreach ($dtProvider->getColumns() as $dtColumn) {
            $dtWrapper->addColumn($dtColumn);
        }

        // Check if the request is an XML HTTP request.
        if (true === $request->isXmlHttpRequest()) {

            // Get the entities manager.
            $em = $this->getDoctrine()->getManager();

            // Get and check the entities repository.
            $repository = $em->getRepository($dtProvider->getEntity());
            if (false === ($repository instanceOf DataTablesRepositoryInterface)) {
                throw new BadDataTablesRepositoryException($repository);
            }

            // Parse the request.
            $dtWrapper->parse($request);

            //
            $filtered = $repository->dataTablesCountFiltered($dtWrapper);
            $total    = $repository->dataTablesCountTotal($dtWrapper);
            $entities = $repository->dataTablesFindAll($dtWrapper);

            // Set the response.
            $dtWrapper->getResponse()->setRecordsFiltered($filtered);
            $dtWrapper->getResponse()->setRecordsTotal($total);

            // Handle each entity.
            foreach ($entities as $entity) {

                // Create the row.
                $dtWrapper->getResponse()->addRow();

                // Render each column.
                foreach ($dtWrapper->getColumns() as $column) {
                    $dtWrapper->getResponse()->setRow($column->getName(), $dtProvider->render($column, $entity));
                }
            }

            // Return the response.
            return new Response(json_encode($dtWrapper->getResponse()));
        }

        // Initialize the default view.
        $dtView = "@JQueryDataTables/DataTables/index.html.twig";

        // Check the provider view.
        if (null !== $dtProvider->getView()) {
            $dtView = $dtProvider->getView();
        }

        // Return the response.
        return $this->render($dtView, [
                "dtWrapper" => $dtWrapper,
        ]);
    }

}

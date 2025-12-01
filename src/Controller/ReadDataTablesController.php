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
use Symfony\Component\HttpFoundation\Response;
use Throwable;
use WBW\Bundle\DataTablesBundle\Event\DataTablesEvent;
use WBW\Bundle\DataTablesBundle\Exception\BadDataTablesRepositoryException;
use WBW\Bundle\DataTablesBundle\Exception\UnregisteredDataTablesProviderException;
use WBW\Bundle\DataTablesBundle\Helper\DataTablesEntityHelper;

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

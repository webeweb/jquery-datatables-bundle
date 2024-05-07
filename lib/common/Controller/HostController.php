<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Controller;

use Doctrine\DBAL\Connection;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use WBW\Library\Common\Helper\ArrayHelper;
use WBW\Library\Common\Monitor\SystemMonitor;

/**
 * Host controller.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Controller
 */
class HostController extends AbstractController {

    /**
     * Service name.
     *
     * @var string
     */
    const SERVICE_NAME = "wbw.common.controller.host";

    /**
     * CPU.
     *
     * @return Response Returns the response.
     */
    public function cpuAction(): Response {

        $info = SystemMonitor::getCpu();
        $data = $this->defaultJsonResponseData(true, $info->jsonSerialize());

        return new JsonResponse($data);
    }

    /**
     * Hard disks.
     *
     * @return Response Returns the response.
     */
    public function hardDisksAction(): Response {

        $info = SystemMonitor::getHardDisks();
        $data = $this->defaultJsonResponseData(true, $info);

        return new JsonResponse($data);
    }

    /**
     * Memory.
     *
     * @return Response Returns the response.
     */
    public function memoryAction(): Response {

        $info = SystemMonitor::getMemory();
        $data = $this->defaultJsonResponseData(true, $info->jsonSerialize());

        return new JsonResponse($data);
    }

    /**
     * Retrieve the information "database".
     *
     * @return array Returns the information "database".
     */
    public function retrieveInformationDatabase(): array {

        /** @var ManagerRegistry $doctrine */
        $doctrine = $this->container->get("doctrine");

        /** @var Connection $connection */
        $connection = $doctrine->getConnection();
        $parameters = $connection->getParams();

        return [
            "driver"        => $parameters["driver"],
            "dbname"        => ArrayHelper::get($parameters, "dbname"),
            "host"          => $parameters["host"],
            "port"          => $parameters["port"],
            "user"          => $parameters["user"],
            "serverVersion" => ArrayHelper::get($parameters, "serverVersion"),
        ];
    }

    /**
     * Retrieve the information "server".
     *
     * @param Request $request The request.
     * @return array Returns the information "server".
     */
    public function retrieveInformationServer(Request $request): array {

        return [
            "maxExecutionTime" => ini_get("max_execution_time"),
            "memoryLimit"      => ini_get("memory_limit"),
            "phpUname"         => implode(" ", [
                php_uname('s'),
                php_uname('v'),
                php_uname('m'),
            ]),
            "phpVersion"       => phpversion(),
            "serverSoftware"   => $request->server->get("SERVER_SOFTWARE"),
        ];
    }
}

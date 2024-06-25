<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\DataTablesBundle\Service;

use WBW\Bundle\CommonBundle\Doctrine\ORM\EntityManagerTrait;
use WBW\Library\Common\Logger\LoggerTrait;

/**
 * DataTables service.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Service
 */
class DataTablesService implements DataTablesServiceInterface {

    use EntityManagerTrait;
    use LoggerTrait;

    /**
     * Service name.
     *
     * @var string
     */
    public const SERVICE_NAME = "wbw.datatables.service";
}

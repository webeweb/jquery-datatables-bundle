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

namespace WBW\Bundle\DataTablesBundle\Tests\Service;

use WBW\Bundle\DataTablesBundle\Service\DataTablesService;
use WBW\Bundle\DataTablesBundle\Service\DataTablesServiceInterface;
use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;

/**
 * DataTables service test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Service
 */
class DataTablesServiceTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.datatables.service", DataTablesService::SERVICE_NAME);

        $obj = new DataTablesService();

        $this->assertInstanceOf(DataTablesServiceInterface::class, $obj);

        $this->assertNull($obj->getEntityManager());
        $this->assertNull($obj->getLogger());
    }
}

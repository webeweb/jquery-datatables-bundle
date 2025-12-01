<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2025 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Controller;

use WBW\Bundle\DataTablesBundle\Controller\ExportDataTablesController;
use WBW\Bundle\DataTablesBundle\Tests\AbstractWebTestCase;

/**
 * Export DataTables controller test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Controller
 */
class ExportDataTablesControllerTest extends AbstractWebTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.datatables.controller.export", ExportDataTablesController::SERVICE_NAME);
    }
}

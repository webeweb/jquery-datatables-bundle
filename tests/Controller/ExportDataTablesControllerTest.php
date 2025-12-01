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

use Throwable;
use WBW\Bundle\DataTablesBundle\Controller\ExportDataTablesController;
use WBW\Bundle\DataTablesBundle\Tests\AbstractWebTestCase;
use WBW\Bundle\DataTablesBundle\Tests\Fixtures\TestFixtures;

/**
 * Export DataTables controller test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Controller
 */
class ExportDataTablesControllerTest extends AbstractWebTestCase {

    /**
     * {@inheritDoc}
     * @throws Throwable Throws an exception if an error occurs.
     */
    public static function setUpBeforeClass(): void {
        parent::setUpBeforeClass();
        parent::setUpSchemaTool();

        static::setUpEmployeeEntities();

        // Set a default timezone.
        date_default_timezone_set("UTC");
    }

    /**
     * Test exportAction()
     *
     * @return void
     */
    public function testExportAction(): void {

        $parameters = TestFixtures::getPostData();

        $client = $this->client;

        $client->request("GET", "/datatables/employee/export", $parameters);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals("text/csv; charset=utf-8", $client->getResponse()->headers->get("Content-Type"));
        $this->assertRegExp('/attachment; filename="[0-9]{4}\\.[0-9]{2}\\.[0-9]{2}-[0-9]{2}\\.[0-9]{2}\\.[0-9]{2}-employee\\.csv"/', $client->getResponse()->headers->get("Content-Disposition"));
    }

    /**
     * Test exportAction()
     *
     * @return void
     */
    public function testExportActionWithBadDataTablesRepository(): void {

        $client = $this->client;

        $client->request("GET", "/datatables/office/export");
        $this->assertEquals(500, $client->getResponse()->getStatusCode());
        $this->assertEquals("text/html; charset=UTF-8", $client->getResponse()->headers->get("Content-Type"));

        $this->assertStringContainsString("BadDataTablesCsvExporterException", $client->getResponse()->getContent());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.datatables.controller.export", ExportDataTablesController::SERVICE_NAME);
    }
}

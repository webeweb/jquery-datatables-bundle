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
use WBW\Bundle\DataTablesBundle\Controller\DeleteDataTablesController;
use WBW\Bundle\DataTablesBundle\Tests\AbstractWebTestCase;

/**
 * Delete DataTables controller test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Controller
 */
class DeleteDataTablesControllerTest extends AbstractWebTestCase {

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
     * Test deleteAction()
     *
     * @return void
     */
    public function testDeleteAction(): void {

        $client = $this->client;

        $client->request("GET", "/datatables/employee/delete/57");
        $this->assertEquals(302, $client->getResponse()->getStatusCode());
        $this->assertStringContainsString("text/html; charset=", $client->getResponse()->headers->get("Content-Type"));
        $this->assertEquals("/datatables/employee/index", $client->getResponse()->headers->get("location"));

        $client->followRedirect();
        $this->assertStringContainsString("Successful deletion", $client->getResponse()->getContent());
    }

    /**
     * Test deleteAction()
     *
     * @return void
     */
    public function testDeleteActionWithNotify404(): void {

        $client = $this->client;

        $client->request("GET", "/datatables/employee/delete/57");
        $this->assertEquals(302, $client->getResponse()->getStatusCode());
        $this->assertStringContainsString("text/html; charset=", $client->getResponse()->headers->get("Content-Type"));
        $this->assertEquals("/datatables/employee/index", $client->getResponse()->headers->get("location"));

        $client->followRedirect();
        $this->assertStringContainsString("Record not found", $client->getResponse()->getContent());
    }

    /**
     * Test deleteAction()
     *
     * @return void
     */
    public function testDeleteActionWithStatus200(): void {

        $client = $this->client;

        $client->request("GET", "/datatables/employee/delete/56", [], [], ["HTTP_X-Requested-With" => "XMLHttpRequest"]);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals("application/json", $client->getResponse()->headers->get("Content-Type"));

        // Check the JSON response.
        $res = json_decode($client->getResponse()->getContent(), true);

        $this->assertArrayHasKey("status", $res);
        $this->assertArrayHasKey("notify", $res);

        $this->assertEquals(200, $res["status"]);
        $this->assertEquals("Successful deletion", $res["notify"]);
    }

    /**
     * Test deleteAction()
     *
     * @return void
     */
    public function testDeleteActionWithStatus404(): void {

        $client = $this->client;

        $client->request("GET", "/datatables/employee/delete/56", [], [], ["HTTP_X-Requested-With" => "XMLHttpRequest"]);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals("application/json", $client->getResponse()->headers->get("Content-Type"));

        // Check the JSON response.
        $res = json_decode($client->getResponse()->getContent(), true);

        $this->assertArrayHasKey("status", $res);
        $this->assertArrayHasKey("notify", $res);

        $this->assertEquals(404, $res["status"]);
        $this->assertEquals("Record not found", $res["notify"]);
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.datatables.controller.delete", DeleteDataTablesController::SERVICE_NAME);
    }
}

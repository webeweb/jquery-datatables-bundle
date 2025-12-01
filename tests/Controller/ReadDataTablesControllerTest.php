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
use WBW\Bundle\DataTablesBundle\Controller\ReadDataTablesController;
use WBW\Bundle\DataTablesBundle\Tests\AbstractWebTestCase;

/**
 * Read DataTables controller test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Controller
 */
class ReadDataTablesControllerTest extends AbstractWebTestCase {

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
     * Test serializeAction()
     *
     * @return void
     */
    public function testSerializeAction(): void {

        $client = $this->client;

        $client->request("GET", "/datatables/employee/serialize/55");
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals("application/json", $client->getResponse()->headers->get("Content-Type"));

        // Check the JSON response.
        $res = json_decode($client->getResponse()->getContent(), true);

        $this->assertEquals("Shad Decker", $res["name"]);
        $this->assertEquals("Regional Director", $res["position"]);
        $this->assertEquals("Edinburgh", $res["office"]);
        $this->assertEquals(51, $res["age"]);
        $this->assertEquals(1226534400, $res["startDate"]["timestamp"]);
        $this->assertEquals(183000, $res["salary"]);
    }

    /**
     * Test serializeAction()
     *
     * @return void
     */
    public function testSerializeActionWithStatus404(): void {

        $client = $this->client;

        $client->request("GET", "/datatables/employee/serialize/58");
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals("application/json", $client->getResponse()->headers->get("Content-Type"));

        // Check the JSON response.
        $res = json_decode($client->getResponse()->getContent(), true);

        $this->assertCount(0, $res);
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.datatables.controller.read", ReadDataTablesController::SERVICE_NAME);
    }
}

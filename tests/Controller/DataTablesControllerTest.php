<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\DataTablesBundle\Tests\Controller;

use Throwable;
use WBW\Bundle\DataTablesBundle\Controller\DataTablesController;
use WBW\Bundle\DataTablesBundle\Tests\AbstractWebTestCase;
use WBW\Bundle\DataTablesBundle\Tests\Fixtures\TestFixtures;

/**
 * DataTables controller test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Controller
 */
class DataTablesControllerTest extends AbstractWebTestCase {

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
     * Test editAction()
     *
     * @return void
     */
    public function testEditAction(): void {

        $client = $this->client;

        $client->request("POST", "/datatables/employee/edit/55/name", ["value" => "Shad decker"]);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals("application/json", $client->getResponse()->headers->get("Content-Type"));

        // Check the JSON response.
        $res = json_decode($client->getResponse()->getContent(), true);

        $this->assertArrayHasKey("status", $res);
        $this->assertArrayHasKey("notify", $res);

        $this->assertEquals(200, $res["status"]);
        $this->assertEquals("Successful editing", $res["notify"]);
    }

    /**
     * Test editAction()
     *
     * @return void
     */
    public function testEditActionWithBadDatatablesColumnException(): void {

        $client = $this->client;

        $client->request("GET", "/datatables/employee/edit/55/data/value");
        $this->assertEquals(500, $client->getResponse()->getStatusCode());
        $this->assertEquals("text/html; charset=UTF-8", $client->getResponse()->headers->get("Content-Type"));

        $this->assertStringContainsString("BadDataTablesColumnException", $client->getResponse()->getContent());
    }

    /**
     * Test editAction()
     *
     * @return void
     */
    public function testEditActionWithBadDatatablesEditorException(): void {

        $client = $this->client;

        $client->request("GET", "/datatables/office/edit/1/name/value");
        $this->assertEquals(500, $client->getResponse()->getStatusCode());
        $this->assertEquals("text/html; charset=UTF-8", $client->getResponse()->headers->get("Content-Type"));

        $this->assertStringContainsString("BadDataTablesEditorException", $client->getResponse()->getContent());
    }

    /**
     * Test editAction()
     *
     * @return void
     */
    public function testEditActionWithStatus404(): void {

        $client = $this->client;

        $client->request("GET", "/datatables/employee/edit/58/name/value");
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
     * Test editAction()
     *
     * @return void
     */
    public function testEditActionWithStatus500(): void {

        $client = $this->client;

        $client->request("GET", "/datatables/employee/edit/55/age/value");
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals("application/json", $client->getResponse()->headers->get("Content-Type"));

        // Check the JSON response.
        $res = json_decode($client->getResponse()->getContent(), true);

        $this->assertArrayHasKey("status", $res);
        $this->assertArrayHasKey("notify", $res);

        $this->assertEquals(500, $res["status"]);
        $this->assertEquals("Failed editing", $res["notify"]);
    }

    /**
     * Test optionsAction()
     *
     * @return void
     */
    public function testOptionsAction(): void {

        $client = $this->client;

        $client->request("GET", "/datatables/employee/options");
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals("application/json", $client->getResponse()->headers->get("Content-Type"));

        // Check the JSON response.
        $res = json_decode($client->getResponse()->getContent(), true);

        $this->assertCount(4, $res);
        $this->assertCount(7, $res["columns"]);

        $this->assertEquals("POST", $res["ajax"]["type"]);
        $this->assertEquals("/datatables/employee/index", $res["ajax"]["url"]);
        $this->assertTrue($res["processing"]);
        $this->assertTrue($res["serverSide"]);
    }

    /**
     * Test optionsAction()
     *
     * @return void
     */
    public function testOptionsActionWithDataTablesRouterInterface(): void {

        $client = $this->client;

        $client->request("GET", "/datatables/office/options");
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals("application/json", $client->getResponse()->headers->get("Content-Type"));

        // Check the JSON response.
        $res = json_decode($client->getResponse()->getContent(), true);

        $this->assertCount(4, $res);
        $this->assertCount(2, $res["columns"]);

        $this->assertEquals("POST", $res["ajax"]["type"]);
        $this->assertEquals("url", $res["ajax"]["url"]);
        $this->assertTrue($res["processing"]);
        $this->assertTrue($res["serverSide"]);
    }

    /**
     * Test renderAction()
     *
     * @return void
     */
    public function testRenderAction(): void {

        $client = $this->client;

        $client->request("GET", "/datatables/employee/render");
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals("text/html; charset=UTF-8", $client->getResponse()->headers->get("Content-Type"));

        // Get the response content.
        $content = $client->getResponse()->getContent();

        // Check the stylesheet.
        foreach (TestFixtures::listStylesheetAssets() as $current) {
            $this->assertRegExp("/" . preg_quote($current, "/") . "/", $content);
        }

        // Check the javascript.
        foreach (TestFixtures::listJavascriptAssets() as $current) {
            $this->assertRegExp("/" . preg_quote($current, "/") . "/", $content);
        }
    }

    /**
     * Test renderAction()
     *
     * @return void
     */
    public function testRenderActionWithAlone(): void {

        $client = $this->client;

        $client->request("GET", "/datatables/employee/render/true");
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals("text/html; charset=UTF-8", $client->getResponse()->headers->get("Content-Type"));

        // Get the response content.
        $content = $client->getResponse()->getContent();

        // Check the stylesheet.
        foreach (TestFixtures::listStylesheetAssets() as $current) {
            $this->assertNotRegExp("/" . preg_quote($current, "/") . "/", $content);
        }

        // Check the javascript.
        foreach (TestFixtures::listJavascriptAssets() as $current) {
            $this->assertNotRegExp("/" . preg_quote($current, "/") . "/", $content);
        }
    }

    /**
     * Test showAction()
     *
     * @return void
     */
    public function testShowAction(): void {

        $client = $this->client;

        $client->request("GET", "/datatables/employee/show/55");
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals("application/json", $client->getResponse()->headers->get("Content-Type"));

        // Check the JSON response.
        $res = json_decode($client->getResponse()->getContent(), true);

        $this->assertEquals("Shad decker", $res["name"]);
        $this->assertEquals("Regional Director", $res["position"]);
        $this->assertEquals("Edinburgh", $res["office"]);
        $this->assertEquals(51, $res["age"]);
        $this->assertEquals(1226534400, $res["startDate"]["timestamp"]);
        $this->assertEquals(183000, $res["salary"]);
    }

    /**
     * Test showAction()
     *
     * @return void
     */
    public function testShowActionWithStatus404(): void {

        $client = $this->client;

        $client->request("GET", "/datatables/employee/show/58");
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

        $this->assertEquals("wbw.datatables.controller.datatables", DataTablesController::SERVICE_NAME);
    }
}

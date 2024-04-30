<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Throwable;
use WBW\Bundle\DataTablesBundle\Controller\DataTablesController;
use WBW\Bundle\DataTablesBundle\Tests\AbstractWebTestCase as BaseWebTestCase;
use WBW\Bundle\DataTablesBundle\Tests\Fixtures\TestFixtures;

/**
 * DataTables controller test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Controller
 */
class DataTablesControllerTest extends BaseWebTestCase {

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
     * Set up the employee entities.
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    protected static function setUpEmployeeEntities(): void {

        /** @var EntityManagerInterface $em */
        $em = static::$kernel->getContainer()->get("doctrine.orm.entity_manager");

        foreach (TestFixtures::getEmployees() as $entity) {
            $em->persist($entity);
        }

        $em->flush();
    }

    /**
     * Test deleteAction()
     *
     * @return void
     */
    public function testDeleteAction(): void {

        $client = $this->client;

        $client->request("GET", "/datatables/employee/delete/49");
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

        $client->request("GET", "/datatables/employee/delete/49");
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

        $client->request("GET", "/datatables/employee/delete/48", [], [], ["HTTP_X-Requested-With" => "XMLHttpRequest"]);
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

        $client->request("GET", "/datatables/employee/delete/49", [], [], ["HTTP_X-Requested-With" => "XMLHttpRequest"]);
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

        $client->request("GET", "/datatables/employee/edit/49/name/value");
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
     * Test indexAction()
     *
     * @return void
     */
    public function testIndexAction(): void {

        $client = $this->client;

        $client->request("GET", "/datatables/employee/index");
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals("text/html; charset=UTF-8", $client->getResponse()->headers->get("Content-Type"));
    }

    /**
     * Test indexAction()
     *
     * @return void
     */
    public function testIndexActionWithBadDataTablesRepository(): void {

        $client = $this->client;

        $client->request("GET", "/datatables/office/index", [], [], ["HTTP_X-Requested-With" => "XMLHttpRequest"]);
        $this->assertEquals(500, $client->getResponse()->getStatusCode());
        $this->assertEquals("text/html; charset=UTF-8", $client->getResponse()->headers->get("Content-Type"));

        $this->assertStringContainsString("BadDataTablesRepositoryException", $client->getResponse()->getContent());
    }

    /**
     * Test indexAction()
     *
     * @return void
     */
    public function testIndexActionWithLength(): void {

        $parameters = TestFixtures::getPostData();

        $parameters["length"] = "20";

        $client = $this->client;

        $client->request("POST", "/datatables/employee/index", $parameters, [], ["HTTP_X-Requested-With" => "XMLHttpRequest"]);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals("application/json", $client->getResponse()->headers->get("Content-Type"));

        // Check the JSON response.
        $res = json_decode($client->getResponse()->getContent(), true);

        $this->assertCount(20, $res["data"]);

        $this->assertArrayHasKey("DT_RowId", $res["data"][0]);
        $this->assertArrayHasKey("DT_RowClass", $res["data"][0]);
        $this->assertArrayHasKey("DT_RowData", $res["data"][0]);

        $this->assertEquals("Airi Satou", $res["data"][0]["name"]);
        $this->assertEquals("Angelica Ramos", $res["data"][1]["name"]);
        $this->assertEquals("Ashton Cox", $res["data"][2]["name"]);
        $this->assertEquals("Bradley Greer", $res["data"][3]["name"]);
        $this->assertEquals("Brenden Wagner", $res["data"][4]["name"]);
        $this->assertEquals("Brielle Williamson", $res["data"][5]["name"]);
        $this->assertEquals("Bruno Nash", $res["data"][6]["name"]);
        $this->assertEquals("Caesar Vance", $res["data"][7]["name"]);
        $this->assertEquals("Cara Stevens", $res["data"][8]["name"]);
        $this->assertEquals("Cedric Kelly", $res["data"][9]["name"]);

        $this->assertEquals("Charde Marshall", $res["data"][10]["name"]);
        $this->assertEquals("Colleen Hurst", $res["data"][11]["name"]);
        $this->assertEquals("Dai Rios", $res["data"][12]["name"]);
        $this->assertEquals("Donna Snider", $res["data"][13]["name"]);
        $this->assertEquals("Doris Wilder", $res["data"][14]["name"]);
        $this->assertEquals("Finn Camacho", $res["data"][15]["name"]);
        $this->assertEquals("Fiona Green", $res["data"][16]["name"]);
        $this->assertEquals("Garrett Winters", $res["data"][17]["name"]);
        $this->assertEquals("Gavin Cortez", $res["data"][18]["name"]);
        $this->assertEquals("Gavin Joyce", $res["data"][19]["name"]);
    }

    /**
     * Test indexAction()
     *
     * @return void
     */
    public function testIndexActionWithNegativeLength(): void {

        $parameters = TestFixtures::getPostData();

        $parameters["length"] = "-1";

        // Create a client.
        $client = $this->client;

        $client->request("POST", "/datatables/employee/index", $parameters, [], ["HTTP_X-Requested-With" => "XMLHttpRequest"]);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals("application/json", $client->getResponse()->headers->get("Content-Type"));

        // Check the JSON response.
        $res = json_decode($client->getResponse()->getContent(), true);

        $this->assertCount(55, $res["data"]);

        $this->assertArrayHasKey("DT_RowId", $res["data"][0]);
        $this->assertArrayHasKey("DT_RowClass", $res["data"][0]);
        $this->assertArrayHasKey("DT_RowData", $res["data"][0]);

        $this->assertEquals("Airi Satou", $res["data"][0]["name"]);
        $this->assertEquals("Angelica Ramos", $res["data"][1]["name"]);
        $this->assertEquals("Ashton Cox", $res["data"][2]["name"]);
        $this->assertEquals("Bradley Greer", $res["data"][3]["name"]);
        $this->assertEquals("Brenden Wagner", $res["data"][4]["name"]);
        $this->assertEquals("Brielle Williamson", $res["data"][5]["name"]);
        $this->assertEquals("Bruno Nash", $res["data"][6]["name"]);
        $this->assertEquals("Caesar Vance", $res["data"][7]["name"]);
        $this->assertEquals("Cara Stevens", $res["data"][8]["name"]);
        $this->assertEquals("Cedric Kelly", $res["data"][9]["name"]);

        // [...]

        $this->assertEquals("Tiger Nixon", $res["data"][50]["name"]);
        $this->assertEquals("Timothy Mooney", $res["data"][51]["name"]);
        $this->assertEquals("Unity Butler", $res["data"][52]["name"]);
        $this->assertEquals("Vivian Harrell", $res["data"][53]["name"]);
        $this->assertEquals("Yuri Berry", $res["data"][54]["name"]);
    }

    /**
     * Test indexAction()
     *
     * @return void
     */
    public function testIndexActionWithOrder(): void {

        $parameters = TestFixtures::getPostData();

        $parameters["order"][0]["dir"] = "desc";

        $client = $this->client;

        $client->request("POST", "/datatables/employee/index", $parameters, [], ["HTTP_X-Requested-With" => "XMLHttpRequest"]);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals("application/json", $client->getResponse()->headers->get("Content-Type"));

        // Check the JSON response.
        $res = json_decode($client->getResponse()->getContent(), true);

        $this->assertCount(10, $res["data"]);

        $this->assertArrayHasKey("DT_RowId", $res["data"][0]);
        $this->assertArrayHasKey("DT_RowClass", $res["data"][0]);
        $this->assertArrayHasKey("DT_RowData", $res["data"][0]);

        $this->assertEquals("Yuri Berry", $res["data"][0]["name"]);
        $this->assertEquals("Vivian Harrell", $res["data"][1]["name"]);
        $this->assertEquals("Unity Butler", $res["data"][2]["name"]);
        $this->assertEquals("Timothy Mooney", $res["data"][3]["name"]);
        $this->assertEquals("Tiger Nixon", $res["data"][4]["name"]);
        $this->assertEquals("Thor Walton", $res["data"][5]["name"]);
        $this->assertEquals("Tatyana Fitzpatrick", $res["data"][6]["name"]);
        $this->assertEquals("Suki Burks", $res["data"][7]["name"]);
        $this->assertEquals("Sonya Frost", $res["data"][8]["name"]);
        $this->assertEquals("Shou Itou", $res["data"][9]["name"]);
    }

    /**
     * Test indexAction()
     *
     * @return void
     */
    public function testIndexActionWithOrderOnNoOrderableColumn(): void {

        $parameters = TestFixtures::getPostData();

        $parameters["order"][6]["column"] = "6";
        $parameters["order"][6]["dir"]    = "desc";

        $client = $this->client;

        $client->request("POST", "/datatables/employee/index", $parameters, [], ["HTTP_X-Requested-With" => "XMLHttpRequest"]);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals("application/json", $client->getResponse()->headers->get("Content-Type"));

        // Check the JSON response.
        $res = json_decode($client->getResponse()->getContent(), true);

        $this->assertCount(10, $res["data"]);

        $this->assertArrayHasKey("DT_RowId", $res["data"][0]);
        $this->assertArrayHasKey("DT_RowClass", $res["data"][0]);
        $this->assertArrayHasKey("DT_RowData", $res["data"][0]);

        $this->assertEquals("Airi Satou", $res["data"][0]["name"]);
        $this->assertEquals("Angelica Ramos", $res["data"][1]["name"]);
        $this->assertEquals("Ashton Cox", $res["data"][2]["name"]);
        $this->assertEquals("Bradley Greer", $res["data"][3]["name"]);
        $this->assertEquals("Brenden Wagner", $res["data"][4]["name"]);
        $this->assertEquals("Brielle Williamson", $res["data"][5]["name"]);
        $this->assertEquals("Bruno Nash", $res["data"][6]["name"]);
        $this->assertEquals("Caesar Vance", $res["data"][7]["name"]);
        $this->assertEquals("Cara Stevens", $res["data"][8]["name"]);
        $this->assertEquals("Cedric Kelly", $res["data"][9]["name"]);
    }

    /**
     * Test indexAction()
     *
     * @return void
     */
    public function testIndexActionWithParameters(): void {

        $parameters = TestFixtures::getPostData();

        $client = $this->client;

        $client->request("POST", "/datatables/employee/index", $parameters, [], ["HTTP_X-Requested-With" => "XMLHttpRequest"]);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals("application/json", $client->getResponse()->headers->get("Content-Type"));

        // Check the JSON response.
        $res = json_decode($client->getResponse()->getContent(), true);

        $this->assertCount(10, $res["data"]);

        $this->assertArrayHasKey("DT_RowId", $res["data"][0]);
        $this->assertArrayHasKey("DT_RowClass", $res["data"][0]);
        $this->assertArrayHasKey("DT_RowData", $res["data"][0]);

        $this->assertEquals("Airi Satou", $res["data"][0]["name"]);
        $this->assertEquals("Angelica Ramos", $res["data"][1]["name"]);
        $this->assertEquals("Ashton Cox", $res["data"][2]["name"]);
        $this->assertEquals("Bradley Greer", $res["data"][3]["name"]);
        $this->assertEquals("Brenden Wagner", $res["data"][4]["name"]);
        $this->assertEquals("Brielle Williamson", $res["data"][5]["name"]);
        $this->assertEquals("Bruno Nash", $res["data"][6]["name"]);
        $this->assertEquals("Caesar Vance", $res["data"][7]["name"]);
        $this->assertEquals("Cara Stevens", $res["data"][8]["name"]);
        $this->assertEquals("Cedric Kelly", $res["data"][9]["name"]);
    }

    /**
     * Test indexAction()
     *
     * @return void
     */
    public function testIndexActionWithSearch(): void {

        $parameters = TestFixtures::getPostData();

        $parameters["search"]["value"] = "New York";

        $client = $this->client;

        $client->request("POST", "/datatables/employee/index", $parameters, [], ["HTTP_X-Requested-With" => "XMLHttpRequest"]);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals("application/json", $client->getResponse()->headers->get("Content-Type"));

        // Check the JSON response.
        $res = json_decode($client->getResponse()->getContent(), true);

        $this->assertCount(10, $res["data"]);

        $this->assertArrayHasKey("DT_RowId", $res["data"][0]);
        $this->assertArrayHasKey("DT_RowClass", $res["data"][0]);
        $this->assertArrayHasKey("DT_RowData", $res["data"][0]);

        $this->assertEquals("Brielle Williamson", $res["data"][0]["name"]);
        $this->assertEquals("Caesar Vance", $res["data"][1]["name"]);
        $this->assertEquals("Cara Stevens", $res["data"][2]["name"]);
        $this->assertEquals("Donna Snider", $res["data"][3]["name"]);
        $this->assertEquals("Gloria Little", $res["data"][4]["name"]);
        $this->assertEquals("Jackson Bradshaw", $res["data"][5]["name"]);
        $this->assertEquals("Jenette Caldwell", $res["data"][6]["name"]);
        $this->assertEquals("Paul Byrd", $res["data"][7]["name"]);
        $this->assertEquals("Thor Walton", $res["data"][8]["name"]);
        $this->assertEquals("Yuri Berry", $res["data"][9]["name"]);
    }

    /**
     * Test indexAction()
     *
     * @return void
     */
    public function testIndexActionWithSearchColumn(): void {

        $parameters = TestFixtures::getPostData();

        $parameters["columns"][0]["search"]["value"] = "Brielle";
        $parameters["columns"][2]["search"]["value"] = "New York";

        $client = $this->client;

        $client->request("POST", "/datatables/employee/index", $parameters, [], ["HTTP_X-Requested-With" => "XMLHttpRequest"]);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals("application/json", $client->getResponse()->headers->get("Content-Type"));

        // Check the JSON response.
        $res = json_decode($client->getResponse()->getContent(), true);

        $this->assertCount(1, $res["data"]);

        $this->assertArrayHasKey("DT_RowId", $res["data"][0]);
        $this->assertArrayHasKey("DT_RowClass", $res["data"][0]);
        $this->assertArrayHasKey("DT_RowData", $res["data"][0]);

        $this->assertEquals("Brielle Williamson", $res["data"][0]["name"]);
    }

    /**
     * Test indexAction()
     *
     * @return void
     */
    public function testIndexActionWithSearchColumnOnNoSearchableColumn(): void {

        $parameters = TestFixtures::getPostData();

        $parameters["column"][6]["search"]["value"] = "search";

        $client = $this->client;

        $client->request("POST", "/datatables/employee/index", $parameters, [], ["HTTP_X-Requested-With" => "XMLHttpRequest"]);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals("application/json", $client->getResponse()->headers->get("Content-Type"));

        // Check the JSON response.
        $res = json_decode($client->getResponse()->getContent(), true);

        $this->assertCount(10, $res["data"]);

        $this->assertArrayHasKey("DT_RowId", $res["data"][0]);
        $this->assertArrayHasKey("DT_RowClass", $res["data"][0]);
        $this->assertArrayHasKey("DT_RowData", $res["data"][0]);

        $this->assertEquals("Airi Satou", $res["data"][0]["name"]);
        $this->assertEquals("Angelica Ramos", $res["data"][1]["name"]);
        $this->assertEquals("Ashton Cox", $res["data"][2]["name"]);
        $this->assertEquals("Bradley Greer", $res["data"][3]["name"]);
        $this->assertEquals("Brenden Wagner", $res["data"][4]["name"]);
        $this->assertEquals("Brielle Williamson", $res["data"][5]["name"]);
        $this->assertEquals("Bruno Nash", $res["data"][6]["name"]);
        $this->assertEquals("Caesar Vance", $res["data"][7]["name"]);
        $this->assertEquals("Cara Stevens", $res["data"][8]["name"]);
        $this->assertEquals("Cedric Kelly", $res["data"][9]["name"]);
    }

    /**
     * Test indexAction()
     *
     * @return void
     */
    public function testIndexActionWithStart(): void {

        $parameters = TestFixtures::getPostData();

        $parameters["start"] = "50";

        $client = $this->client;

        $client->request("POST", "/datatables/employee/index", $parameters, [], ["HTTP_X-Requested-With" => "XMLHttpRequest"]);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals("application/json", $client->getResponse()->headers->get("Content-Type"));

        // Check the JSON response.
        $res = json_decode($client->getResponse()->getContent(), true);

        $this->assertCount(5, $res["data"]);

        $this->assertEquals("Tiger Nixon", $res["data"][0]["name"]);
        $this->assertEquals("Timothy Mooney", $res["data"][1]["name"]);
        $this->assertEquals("Unity Butler", $res["data"][2]["name"]);
        $this->assertEquals("Vivian Harrell", $res["data"][3]["name"]);
        $this->assertEquals("Yuri Berry", $res["data"][4]["name"]);
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

        $this->assertEquals("Shad decker", $res["name"]);
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

        $client->request("GET", "/datatables/employee/serialize/49");
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals("application/json", $client->getResponse()->headers->get("Content-Type"));

        // Check the JSON response.
        $res = json_decode($client->getResponse()->getContent(), true);

        $this->assertCount(0, $res);
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

        $client->request("GET", "/datatables/employee/show/49");
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

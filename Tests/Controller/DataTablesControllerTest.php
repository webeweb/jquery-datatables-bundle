<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Controller;

use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractWebTestCase;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\TestFixtures;

/**
 * DataTables controller test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Controller
 */
class DataTablesControllerTest extends AbstractWebTestCase {

    /**
     * {@inheritDoc}
     */
    public static function setUpBeforeClass(): void {
        parent::setUpBeforeClass();

        parent::setUpEmployeeFixtures();
    }

    /**
     * Tests deleteAction()
     *
     * @return void
     */
    public function testDeleteAction(): void {

        $client = $this->client;

        $client->request("GET", "/datatables/employee/delete/49");
        $this->assertEquals(302, $client->getResponse()->getStatusCode());
        $this->assertEquals("text/html; charset=UTF-8", $client->getResponse()->headers->get("Content-Type"));
        $this->assertEquals("/datatables/employee/index", $client->getResponse()->headers->get("location"));

        $client->followRedirect();
        $this->assertStringContainsString("Successful deletion", $client->getResponse()->getContent());
    }

    /**
     * Tests deleteAction()
     *
     * @return void
     */
    public function testDeleteActionWithNotify404(): void {

        $client = $this->client;

        $client->request("GET", "/datatables/employee/delete/49");
        $this->assertEquals(302, $client->getResponse()->getStatusCode());
        $this->assertEquals("text/html; charset=UTF-8", $client->getResponse()->headers->get("Content-Type"));
        $this->assertEquals("/datatables/employee/index", $client->getResponse()->headers->get("location"));

        $client->followRedirect();
        $this->assertStringContainsString("Record not found", $client->getResponse()->getContent());
    }

    /**
     * Tests deleteAction()
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
     * Tests deleteAction()
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
     * Tests editAction()
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
     * Tests editAction()
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
     * Tests editAction()
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
     * Tests editAction()
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
     * Tests editAction()
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
     * Tests exportAction()
     *
     * @return void
     */
    public function testExportAction(): void {

        $client = $this->client;

        $client->request("GET", "/datatables/employee/export");
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals("text/csv; charset=utf-8", $client->getResponse()->headers->get("Content-Type"));
        $this->assertRegExp('/attachment; filename="[0-9]{4}\\.[0-9]{2}\\.[0-9]{2}-[0-9]{2}\\.[0-9]{2}\\.[0-9]{2}-employee\\.csv"/', $client->getResponse()->headers->get("Content-Disposition"));
    }

    /**
     * Tests exportAction()
     *
     * @return void
     */
    public function testExportActionWithBadDataTablesRepository(): void {

        $client = $this->client;

        $client->request("GET", "/datatables/office/export");
        $this->assertEquals(500, $client->getResponse()->getStatusCode());
        $this->assertEquals("text/html; charset=UTF-8", $client->getResponse()->headers->get("Content-Type"));

        $this->assertStringContainsString("BadDataTablesCSVExporterException", $client->getResponse()->getContent());
    }

    /**
     * Tests indexAction()
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
     * Tests indexAction()
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
     * Tests indexAction()
     *
     * @return void
     */
    public function testIndexActionWithLength(): void {

        $parameters = TestFixtures::getPOSTData();

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
     * Tests indexAction()
     *
     * @return void
     */
    public function testIndexActionWithNegativeLength(): void {

        $parameters = TestFixtures::getPOSTData();

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
     * Tests indexAction()
     *
     * @return void
     */
    public function testIndexActionWithOrder(): void {

        $parameters = TestFixtures::getPOSTData();

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
     * Tests indexAction()
     *
     * @return void
     */
    public function testIndexActionWithOrderOnNoOrderableColumn(): void {

        $parameters = TestFixtures::getPOSTData();

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
     * Tests indexAction()
     *
     * @return void
     */
    public function testIndexActionWithParameters(): void {

        $parameters = TestFixtures::getPOSTData();

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
     * Tests indexAction()
     *
     * @return void
     */
    public function testIndexActionWithSearch(): void {

        $parameters = TestFixtures::getPOSTData();

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
     * Tests indexAction()
     *
     * @return void
     */
    public function testIndexActionWithSearchColumn(): void {

        $parameters = TestFixtures::getPOSTData();

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
     * Tests indexAction()
     *
     * @return void
     */
    public function testIndexActionWithSearchColumnOnNoSearchableColumn(): void {

        $parameters = TestFixtures::getPOSTData();

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
     * Tests indexAction()
     *
     * @return void
     */
    public function testIndexActionWithStart(): void {

        $parameters = TestFixtures::getPOSTData();

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
     * Tests optionsAction()
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
        $this->assertEquals(true, $res["processing"]);
        $this->assertEquals(true, $res["serverSide"]);
    }

    /**
     * Tests optionsAction()
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
        $this->assertEquals(true, $res["processing"]);
        $this->assertEquals(true, $res["serverSide"]);
    }

    /**
     * Tests renderAction()
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

        // Check the CSS.
        foreach (static::listCSSAssets() as $current) {
            $this->assertRegExp("/" . preg_quote($current, "/") . "/", $content);
        }

        // Check the Javascript.
        foreach (static::listJavascriptAssets() as $current) {
            $this->assertRegExp("/" . preg_quote($current, "/") . "/", $content);
        }
    }

    /**
     * Tests renderAction()
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

        // Check the CSS.
        foreach (static::listCSSAssets() as $current) {
            $this->assertNotRegExp("/" . preg_quote($current, "/") . "/", $content);
        }

        // Check the Javascript.
        foreach (static::listJavascriptAssets() as $current) {
            $this->assertNotRegExp("/" . preg_quote($current, "/") . "/", $content);
        }
    }

    /**
     * Tests serializeAction()
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
     * Tests serializeAction()
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
     * Tests showAction()
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
     * Tests showAction()
     *
     * @return void
     */
    public function testShowActionWithDeprecatedMethod(): void {

        $client = $this->client;

        $client->request("GET", "/datatables/employee/deprecated-show/55");
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
     * Tests showAction()
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
}

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
use WBW\Bundle\DataTablesBundle\Tests\Fixtures\TestFixtures;

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

        $this->assertCount(57, $res["data"]);

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
        $this->assertEquals("Zenaida Frank", $res["data"][55]["name"]);
        $this->assertEquals("Zorita Serrano", $res["data"][56]["name"]);
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

        $this->assertEquals("Zorita Serrano", $res["data"][0]["name"]);
        $this->assertEquals("Zenaida Frank", $res["data"][1]["name"]);
        $this->assertEquals("Yuri Berry", $res["data"][2]["name"]);
        $this->assertEquals("Vivian Harrell", $res["data"][3]["name"]);
        $this->assertEquals("Unity Butler", $res["data"][4]["name"]);
        $this->assertEquals("Timothy Mooney", $res["data"][5]["name"]);
        $this->assertEquals("Tiger Nixon", $res["data"][6]["name"]);
        $this->assertEquals("Thor Walton", $res["data"][7]["name"]);
        $this->assertEquals("Tatyana Fitzpatrick", $res["data"][8]["name"]);
        $this->assertEquals("Suki Burks", $res["data"][9]["name"]);
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

        $this->assertCount(7, $res["data"]);

        $this->assertEquals("Tiger Nixon", $res["data"][0]["name"]);
        $this->assertEquals("Timothy Mooney", $res["data"][1]["name"]);
        $this->assertEquals("Unity Butler", $res["data"][2]["name"]);
        $this->assertEquals("Vivian Harrell", $res["data"][3]["name"]);
        $this->assertEquals("Yuri Berry", $res["data"][4]["name"]);
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

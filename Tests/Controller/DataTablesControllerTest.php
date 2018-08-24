<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Controller;

use WBW\Bundle\JQuery\DataTablesBundle\Tests\Cases\AbstractJQueryDataTablesFrameworkTestCase;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\Cases\AbstractJQueryDataTablesWebTestCase;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\App\TestFixtures;

/**
 * DataTables controller test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Controller
 * @final
 */
final class DataTablesControllerTest extends AbstractJQueryDataTablesWebTestCase {

    /**
     * {@inheritdoc}
     */
    public static function setUpBeforeClass() {
        parent::setUpBeforeClass();

        // Get the entity manager.
        $em = self::$kernel->getContainer()->get("doctrine.orm.entity_manager");

        // Persist each entity.
        foreach (TestFixtures::getEmployees() as $entity) {
            $em->persist($entity);
        }

        // Flush entities.
        $em->flush();
    }

    /**
     * Tests the renderAction() methode.
     *
     * @return void
     */
    public function testRenderAction() {

        // Create a client.
        $client = static::createClient();

        // Make a GET request.
        $client->request("GET", "/datatables/employee/render");
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals("text/html; charset=UTF-8", $client->getResponse()->headers->get("Content-Type"));
    }

    /**
     * Tests the optionsAction() method.
     *
     * @return void
     */
    public function testOptionsAction() {

        // Create a client.
        $client = static::createClient();

        // Make a GET request.
        $client->request("GET", "/datatables/employee/options");
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals("application/json", $client->getResponse()->headers->get("Content-Type"));

        // Check the JSON response.
        $res = json_decode($client->getResponse()->getContent(), true);

        $this->assertCount(5, $res);
        $this->assertCount(7, $res["columns"]);

        $this->assertEquals("POST", $res["ajax"]["type"]);
        $this->assertEquals("/datatables/employee/index", $res["ajax"]["url"]);
        $this->assertEquals([], $res["order"]);
        $this->assertEquals(true, $res["processing"]);
        $this->assertEquals(true, $res["serverSide"]);
    }

    /**
     * Tests the indexAction() method.
     *
     * @return void
     * @depends testRenderAction
     */
    public function testIndexAction() {

        // Create a client.
        $client = static::createClient();

        // Make a GET request.
        $client->request("GET", "/datatables/employee/index");
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals("text/html; charset=UTF-8", $client->getResponse()->headers->get("Content-Type"));
    }

    /**
     * Tests the indexAction() method.
     *
     * @return void
     * @depends testIndexAction
     */
    public function testIndexActionWithParameters() {

        // Get the POST data.
        $parameters = AbstractJQueryDataTablesFrameworkTestCase::getPostData();

        // Create a client.
        $client = static::createClient();

        // Make a POST request with XML HTTP request.
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
     * Tests the indexAction() method.
     *
     * @return void
     * @depends testIndexAction
     */
    public function testIndexActionWithLength() {

        // Get the POST data.
        $parameters = AbstractJQueryDataTablesFrameworkTestCase::getPostData();

        // Change the length.
        $parameters["length"] = "20";

        // Create a client.
        $client = static::createClient();

        // Make a POST request with XML HTTP request.
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
     * Tests the indexAction() method.
     *
     * @return void
     * @depends testIndexAction
     */
    public function testIndexActionWithOrder() {

        // Get the POST data.
        $parameters = AbstractJQueryDataTablesFrameworkTestCase::getPostData();

        // Change the column order.
        $parameters["order"][0]["dir"] = "desc";

        // Create a client.
        $client = static::createClient();

        // Make a POST request with XML HTTP request.
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
     * Tests the indexAction() method.
     *
     * @return void
     * @depends testIndexAction
     */
    public function testIndexActionWithOrderOnNoOrderableColumn() {

        // Get the POST data.
        $parameters = AbstractJQueryDataTablesFrameworkTestCase::getPostData();

        // Change the column order.
        $parameters["order"][6]["dir"] = "desc";

        // Create a client.
        $client = static::createClient();

        // Make a POST request with XML HTTP request.
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
     * Tests the indexAction() method.
     *
     * @return void
     * @depends testIndexAction
     */
    public function testIndexActionWithSearch() {

        // Get the POST data.
        $parameters = AbstractJQueryDataTablesFrameworkTestCase::getPostData();

        // Change the search.
        $parameters["search"]["value"] = "New York";

        // Create a client.
        $client = static::createClient();

        // Make a POST request with XML HTTP request.
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
     * Tests the indexAction() method.
     *
     * @return void
     * @depends testIndexAction
     */
    public function testIndexActionWithSearchColumn() {

        // Get the POST data.
        $parameters = AbstractJQueryDataTablesFrameworkTestCase::getPostData();

        // Change the search.
        $parameters["columns"][0]["search"]["value"] = "Brielle";
        $parameters["columns"][2]["search"]["value"] = "New York";

        // Create a client.
        $client = static::createClient();

        // Make a POST request with XML HTTP request.
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
     * Tests the indexAction() method.
     *
     * @return void
     * @depends testIndexAction
     */
    public function testIndexActionWithSearchColumnOnNoSearchableColumn() {

        // Get the POST data.
        $parameters = AbstractJQueryDataTablesFrameworkTestCase::getPostData();

        // Change the column order.
        $parameters["column"][6]["search"]["value"] = "search";

        // Create a client.
        $client = static::createClient();

        // Make a POST request with XML HTTP request.
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
     * Tests the indexAction() method.
     *
     * @return void
     * @depends testIndexAction
     */
    public function testIndexActionWithStart() {

        // Get the POST data.
        $parameters = AbstractJQueryDataTablesFrameworkTestCase::getPostData();

        // Change the start.
        $parameters["start"] = "50";

        // Create a client.
        $client = static::createClient();

        // Make a POST request with XML HTTP request.
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
        $this->assertEquals("Zenaida Frank", $res["data"][5]["name"]);
        $this->assertEquals("Zorita Serrano", $res["data"][6]["name"]);
    }

    /**
     * Tests the indexAction() method.
     *
     * @return void
     * @depends testIndexAction
     */
    public function testIndexActionWithBadDataTablesRepository() {

        // Create a client.
        $client = static::createClient();

        // Make a GET request.
        $client->request("GET", "/datatables/office/index", [], [], ["HTTP_X-Requested-With" => "XMLHttpRequest"]);
        $this->assertEquals(500, $client->getResponse()->getStatusCode());
        $this->assertEquals("text/html; charset=UTF-8", $client->getResponse()->headers->get("Content-Type"));

        $this->assertContains("BadDataTablesRepositoryException", $client->getResponse()->getContent());
    }

    /**
     * Tests the deleteAction() method.
     *
     * @return void
     */
    public function testDeleteAction() {

        // Create a client.
        $client = static::createClient();

        // Make a GET request.
        $client->request("GET", "/datatables/employee/delete/57");
        $this->assertEquals(302, $client->getResponse()->getStatusCode());
        $this->assertEquals("text/html; charset=UTF-8", $client->getResponse()->headers->get("Content-Type"));

        $this->assertEquals("/datatables/employee/index", $client->getResponse()->headers->get("location"));
    }

    /**
     * Tests the deleteAction() method.
     *
     * @return void
     * @depends testDeleteAction
     */
    public function testDeleteActionWithNotify404() {

        // Create a client.
        $client = static::createClient();

        // Make a GET request.
        $client->request("GET", "/datatables/employee/delete/57");
        $this->assertEquals(302, $client->getResponse()->getStatusCode());
        $this->assertEquals("text/html; charset=UTF-8", $client->getResponse()->headers->get("Content-Type"));

        $this->assertEquals("/datatables/employee/index", $client->getResponse()->headers->get("location"));
    }

    /**
     * Tests the deleteAction() method.
     *
     * @return void
     * @depends testDeleteAction
     */
    public function testDeleteActionWithStatus200() {

        // Create a client.
        $client = static::createClient();

        // Make a GET request with XML HTTP request.
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
     * Tests the deleteAction() method.
     *
     * @return void
     * @depends testDeleteAction
     */
    public function testDeleteActionWithStatus404() {

        // Create a client.
        $client = static::createClient();

        // Make a GET request with XML HTTP request.
        $client->request("GET", "/datatables/employee/delete/57", [], [], ["HTTP_X-Requested-With" => "XMLHttpRequest"]);
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
     * Tests the exportAction() method.
     *
     * @return void
     */
    public function testExportAction() {

        // Create a client.
        $client = static::createClient();

        // Make a GET request.
        $client->request("GET", "/datatables/employee/export");
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals("text/csv; charset=utf-8", $client->getResponse()->headers->get("Content-Type"));
        $this->assertRegExp("/attachment; filename=\"[0-9]{4}\.[0-9]{2}\.[0-9]{2}-[0-9]{2}\.[0-9]{2}\.[0-9]{2}-employee\.csv\"/", $client->getResponse()->headers->get("Content-Disposition"));
    }

    /**
     * Tests the exportAction() method.
     *
     * @return void
     * @depends testExportAction
     */
    public function testExportActionWithBadDataTablesRepository() {

        // Create a client.
        $client = static::createClient();

        // Make a GET request.
        $client->request("GET", "/datatables/office/export");
        $this->assertEquals(500, $client->getResponse()->getStatusCode());
        $this->assertEquals("text/html; charset=UTF-8", $client->getResponse()->headers->get("Content-Type"));

        $this->assertContains("BadDataTablesCSVExporterException", $client->getResponse()->getContent());
    }

    /**
     * Tests the getAction() method.
     *
     * @return void
     */
    public function testGetAction() {

        // Create a client.
        $client = static::createClient();

        // Make a GET request.
        $client->request("GET", "/datatables/employee/get/55");
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
     * Tests the getAction() method.
     *
     * @return void
     * @depends testGetAction
     */
    public function testGetActionWithStatus404() {

        // Create a client.
        $client = static::createClient();

        // Make a GET request.
        $client->request("GET", "/datatables/employee/get/57");
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals("application/json", $client->getResponse()->headers->get("Content-Type"));

        // Check the JSON response.
        $res = json_decode($client->getResponse()->getContent(), true);

        $this->assertCount(0, $res);
    }

}

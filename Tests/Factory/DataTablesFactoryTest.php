<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Factory;

use Symfony\Component\HttpFoundation\Request;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesWrapperInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractFrameworkTestCase;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Factory\TestDataTablesFactory;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\TestFixtures;

/**
 * DataTables factory test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Factory
 * @final
 */
final class DataTablesFactoryTest extends AbstractFrameworkTestCase {

    /**
     * Tests the newResponse() method.
     *
     * @return void
     */
    public function testNewResponse() {

        // Get the wrapper.
        $wrapper = TestFixtures::getWrapper();
        $wrapper->setRequest($this->dtRequest);

        $obj = TestDataTablesFactory::newResponse($wrapper);

        $this->assertEquals(0, $obj->countRows());
        $this->assertEquals([], $obj->getData());
        $this->assertEquals(0, $obj->getDraw());
        $this->assertNull($obj->getError());
        $this->assertEquals(0, $obj->getRecordsFiltered());
        $this->assertEquals(0, $obj->getRecordsTotal());
        $this->assertSame($wrapper, $obj->getWrapper());
    }

    /**
     * Tests the newWrapper() method.
     *
     * @return void
     */
    public function testNewWrapper() {

        $obj = TestDataTablesFactory::newWrapper("url", "name");

        $this->assertInstanceOf(DataTablesWrapperInterface::class, $obj);

        $this->assertEquals([], $obj->getColumns());
        $this->assertNull($obj->getMapping()->getPrefix());
        $this->assertEquals("POST", $obj->getMethod());
        $this->assertNull($obj->getOptions());
        $this->assertEquals("name", $obj->getName());
        $this->assertEquals([], $obj->getOrder());
        $this->assertTrue($obj->getProcessing());
        $this->assertNull($obj->getProvider());
        $this->assertNull($obj->getRequest());
        $this->assertNull($obj->getResponse());
        $this->assertTrue($obj->getServerSide());
        $this->assertEquals("url", $obj->getUrl());
    }

    /**
     * Tests the parseColumn() method.
     *
     * @return void
     */
    public function testParseColumn() {

        // Get the wrapper.
        $wrapper = TestFixtures::getWrapper();

        // Get the POST data.
        $postData = TestFixtures::getPOSTData();

        $obj = TestDataTablesFactory::parseColumn($postData["columns"][0], $wrapper);

        $this->assertEquals("name", $obj->getData());
        $this->assertEquals("Name", $obj->getName());
        $this->assertTrue($obj->getOrderable());
        $this->assertFalse($obj->getSearch()->getRegex());
        $this->assertEquals("", $obj->getSearch()->getValue());
        $this->assertTrue($obj->getSearchable());
    }

    /**
     * Tests the parseColumn() method.
     *
     * @return
     */
    public function testParseColumnWithNoData() {

        // Get the wrapper.
        $wrapper = TestFixtures::getWrapper();

        // Get the POST data.
        $postData = TestFixtures::getPOSTData();

        // Set the POST data.
        unset($postData["columns"][0]["data"]);

        $obj = TestDataTablesFactory::parseColumn($postData["columns"][0], $wrapper);

        $this->assertNull($obj);
    }

    /**
     * Tests the parseColumn() method.
     *
     * @return
     */
    public function testParseColumnWithBadData() {

        // Get the wrapper.
        $wrapper = TestFixtures::getWrapper();

        // Get the POST data.
        $postData = TestFixtures::getPOSTData();

        // Set the POST data.
        $postData["columns"][0]["data"] = "exception";

        $obj = TestDataTablesFactory::parseColumn($postData["columns"][0], $wrapper);

        $this->assertNull($obj);
    }

    /**
     * Tests the parseColumn() method.
     *
     * @return
     */
    public function testParseColumnWithNoName() {

        // Get the wrapper.
        $wrapper = TestFixtures::getWrapper();

        // Get the POST data.
        $postData = TestFixtures::getPOSTData();

        // Set the POST data.
        unset($postData["columns"][0]["name"]);

        $obj = TestDataTablesFactory::parseColumn($postData["columns"][0], $wrapper);

        $this->assertNull($obj);
    }

    /**
     * Tests the parseColumn() method.
     *
     * @return
     */
    public function testParseColumnWithBadName() {

        // Get the wrapper.
        $wrapper = TestFixtures::getWrapper();

        // Get the POST data.
        $postData = TestFixtures::getPOSTData();

        // Set the POST data.
        $postData["columns"][0]["name"] = "exception";

        $obj = TestDataTablesFactory::parseColumn($postData["columns"][0], $wrapper);

        $this->assertNull($obj);
    }

    /**
     * Tests the parseColumn() method.
     *
     * @return
     */
    public function testParseColumnWithNoSearchable() {

        // Get the wrapper.
        $wrapper = TestFixtures::getWrapper();

        // Get the POST data.
        $postData = TestFixtures::getPOSTData();

        // Set the POST data.
        $postData["columns"][0]["searchable"] = "false";

        $obj = TestDataTablesFactory::parseColumn($postData["columns"][0], $wrapper);

        $this->assertEquals("name", $obj->getData());
        $this->assertEquals("Name", $obj->getName());
        $this->assertTrue($obj->getOrderable());
        $this->assertFalse($obj->getSearch()->getRegex());
        $this->assertEquals("", $obj->getSearch()->getValue());
        $this->assertTrue($obj->getSearchable());
    }

    /**
     * Tests the parseColumns() method.
     *
     * @return void
     */
    public function testParseColumns() {

        // Get the wrapper.
        $wrapper = TestFixtures::getWrapper();

        // Get the POST data.
        $postData = TestFixtures::getPOSTData();

        $obj = TestDataTablesFactory::parseColumns($postData["columns"], $wrapper);

        $this->assertCount(7, $obj);
    }

    /**
     * Tests the parseColumns() method.
     *
     * @return void
     */
    public function testParseColumnsWithNoData() {

        // Get the wrapper.
        $wrapper = TestFixtures::getWrapper();

        // Get the POST data.
        $postData = TestFixtures::getPOSTData();

        // Set the POST data.
        unset($postData["columns"][6]["name"]);

        $obj = TestDataTablesFactory::parseColumns($postData["columns"], $wrapper);

        $this->assertCount(6, $obj);
    }

    /**
     * Tests the parseOrder() method.
     *
     * @return void
     */
    public function testParseOrder() {

        // Get the POST data.
        $postData = TestFixtures::getPOSTData();

        // Set the POST data.
        $postData["order"][0]["column"] = "0";
        $postData["order"][0]["dir"]    = "asc";

        $obj = TestDataTablesFactory::parseOrder($postData["order"][0]);

        $this->assertEquals(0, $obj->getColumn());
        $this->assertEquals("ASC", $obj->getDir());
    }

    /**
     * Tests the parseOrder() method.
     *
     * @return void
     */
    public function testParseOrderWithNoColumn() {

        // Get the POST data.
        $postData = TestFixtures::getPOSTData();

        // Set the POST data.
        unset($postData["order"][0]["column"]);

        $obj = TestDataTablesFactory::parseOrder($postData["order"][0]);

        $this->assertNull($obj->getColumn());
        $this->assertNull($obj->getDir());
    }

    /**
     * Tests the parseOrder() method.
     *
     * @return void
     */
    public function testParseOrderWithNoDir() {

        // Get the POST data.
        $postData = TestFixtures::getPOSTData();

        // Set the POST data.
        unset($postData["order"][0]["dir"]);

        $obj = TestDataTablesFactory::parseOrder($postData["order"][0]);

        $this->assertNull($obj->getColumn());
        $this->assertNull($obj->getDir());
    }

    /**
     * Tests the parseOrder() method.
     *
     * @return void
     */
    public function testParseOrderWithInvalidDir() {

        // Get the POST data.
        $postData = TestFixtures::getPOSTData();

        // Set the POST data.
        $postData["order"][0]["dir"] = "exception";

        $obj = TestDataTablesFactory::parseOrder($postData["order"][0]);

        $this->assertEquals(0, $obj->getColumn());
        $this->assertEquals("ASC", $obj->getDir());
    }

    /**
     * Tests the parseOrders() method.
     *
     * @return void
     */
    public function testParseOrders() {

        // Get the POST data.
        $postData = TestFixtures::getPOSTData();

        // Set the POST data.
        $postData["order"][0]["dir"] = "exception";

        $obj = TestDataTablesFactory::parseOrders($postData["order"]);

        $this->assertCount(1, $obj);
        $this->assertEquals(0, $obj[0]->getColumn());
        $this->assertEquals("ASC", $obj[0]->getDir());
    }

    /**
     * Tests the parseRequest() method.
     *
     * @return void
     */
    public function testParseRequestWithGET() {

        // Get the wrapper.
        $wrapper = TestFixtures::getWrapper();

        // Create a request.
        $request = new Request(array_merge(TestFixtures::getPOSTData(), ["query" => "query"]), ["request" => "request"], [], [], [], ["REQUEST_METHOD" => "GET"]);

        $obj = TestDataTablesFactory::parseRequest($wrapper, $request);

        $this->assertEquals(1, $obj->getDraw());
        $this->assertEquals(10, $obj->getLength());
        $this->assertEquals("query", $obj->getQuery()->get("query"));
        $this->assertEquals("request", $obj->getRequest()->get("request"));
        $this->assertFalse($obj->getSearch()->getRegex());
        $this->assertEquals("", $obj->getSearch()->getValue());
        $this->assertEquals(0, $obj->getStart());

        $this->assertCount(7, $obj->getColumns());
    }

    /**
     * Tests the parseRequest() method.
     *
     * @return void
     */
    public function testParseRequestWithPOST() {

        // Get the wrapper.
        $wrapper = TestFixtures::getWrapper();

        // Create a request.
        $request = new Request(["query" => "query"], array_merge(TestFixtures::getPOSTData(), ["request" => "request"]), [], [], [], ["REQUEST_METHOD" => "POST"]);

        $obj = TestDataTablesFactory::parseRequest($wrapper, $request);

        $this->assertEquals(1, $obj->getDraw());
        $this->assertEquals(10, $obj->getLength());
        $this->assertEquals("query", $obj->getQuery()->get("query"));
        $this->assertEquals("request", $obj->getRequest()->get("request"));
        $this->assertFalse($obj->getSearch()->getRegex());
        $this->assertEquals("", $obj->getSearch()->getValue());
        $this->assertEquals(0, $obj->getStart());

        $this->assertCount(7, $obj->getColumns());
    }

    /**
     * Tests the parseSearch() method.
     *
     * @return void
     */
    public function testParseSearch() {

        // Get the POST data.
        $postData = TestFixtures::getPOSTData();

        // Set the POST data.
        $postData["search"]["regex"] = "true";
        $postData["search"]["value"] = "value";

        $obj = TestDataTablesFactory::parseSearch($postData["search"]);

        $this->assertTrue($obj->getRegex());
        $this->assertEquals("value", $obj->getValue());
    }

    /**
     * Tests the parseSearch() method.
     *
     * @return void
     */
    public function testParseSearchWithNoRegex() {

        // Get the POST data.
        $postData = TestFixtures::getPOSTData();

        // Set the POST data.
        $postData["search"]["regex"] = "false";
        $postData["search"]["value"] = "value";

        // Set an invalid search.
        unset($postData["search"]["regex"]);

        $obj = TestDataTablesFactory::parseSearch($postData["search"]);

        $this->assertFalse($obj->getRegex());
        $this->assertEquals("", $obj->getValue());
    }

    /**
     * Tests the parseSearch() method.
     *
     * @return void
     */
    public function testParseSearchWithNoValue() {

        // Get the POST data.
        $postData = TestFixtures::getPOSTData();

        // Set the POST data.
        $postData["search"]["regex"] = "true";
        $postData["search"]["value"] = "value";

        // Set an invalid search.
        unset($postData["search"]["value"]);

        $obj = TestDataTablesFactory::parseSearch($postData["search"]);

        $this->assertFalse($obj->getRegex());
        $this->assertEquals("", $obj->getValue());
    }

}

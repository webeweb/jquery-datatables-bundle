<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Factory;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\User\UserInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Api\DataTablesColumnInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Api\DataTablesOptionsInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Api\DataTablesOrderInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Api\DataTablesRequestInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Api\DataTablesResponseInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Api\DataTablesSearchInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Api\DataTablesWrapperInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Factory\TestDataTablesFactory;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\TestFixtures;

/**
 * DataTables factory test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Factory
 */
class DataTablesFactoryTest extends AbstractTestCase {

    /**
     * Test newResponse()
     *
     * @return void
     */
    public function testNewOptions(): void {

        $obj = TestDataTablesFactory::newOptions();

        $this->assertInstanceOf(DataTablesOptionsInterface::class, $obj);
    }

    /**
     * Test newResponse()
     *
     * @return void
     */
    public function testNewResponse(): void {

        // Set a DataTables wrapper mock.
        $wrapper = TestFixtures::getWrapper();
        $wrapper->setRequest($this->dtRequest);

        $obj = TestDataTablesFactory::newResponse($wrapper);

        $this->assertInstanceOf(DataTablesResponseInterface::class, $obj);

        $this->assertEquals([], $obj->getData());
        $this->assertEquals(0, $obj->getDraw());
        $this->assertNull($obj->getError());
        $this->assertEquals(0, $obj->getRecordsFiltered());
        $this->assertEquals(0, $obj->getRecordsTotal());
        $this->assertSame($wrapper, $obj->getWrapper());
        $this->assertEquals(0, $obj->rowsCount());
    }

    /**
     * Test newWrapper()
     *
     * @return void
     */
    public function testNewWrapper(): void {

        // Set a User mock.
        $user = $this->getMockBuilder(UserInterface::class)->getMock();

        $obj = TestDataTablesFactory::newWrapper("url", $this->dtProvider, $user);

        $this->assertInstanceOf(DataTablesWrapperInterface::class, $obj);

        $this->assertEquals([], $obj->getColumns());
        $this->assertEquals("", $obj->getMapping()->getPrefix());
        $this->assertEquals("POST", $obj->getMethod());
        $this->assertNull($obj->getOptions());
        $this->assertTrue($obj->getProcessing());
        $this->assertSame($this->dtProvider, $obj->getProvider());
        $this->assertNull($obj->getRequest());
        $this->assertNull($obj->getResponse());
        $this->assertTrue($obj->getServerSide());
        $this->assertEquals("url", $obj->getUrl());
        $this->assertSame($user, $obj->getUser());
    }

    /**
     * Test parseColumn()
     *
     * @return void
     */
    public function testParseColumn(): void {

        // Set a DataTables wrapper mock.
        $wrapper = TestFixtures::getWrapper();

        // Set the POST data mock.
        $postData = TestFixtures::getPostData();

        $obj = TestDataTablesFactory::parseColumn($postData["columns"][0], $wrapper);

        $this->assertInstanceOf(DataTablesColumnInterface::class, $obj);

        $this->assertEquals("name", $obj->getData());
        $this->assertEquals("Name", $obj->getName());
        $this->assertTrue($obj->getOrderable());
        $this->assertFalse($obj->getSearch()->getRegex());
        $this->assertEquals("", $obj->getSearch()->getValue());
        $this->assertTrue($obj->getSearchable());
    }

    /**
     * Test parseColumn()
     *
     * @return void
     */
    public function testParseColumnWithBadData(): void {

        // Set a DataTables wrapper mock.
        $wrapper = TestFixtures::getWrapper();

        // Set the POST data mock.
        $postData                       = TestFixtures::getPostData();
        $postData["columns"][0]["data"] = "exception";

        $obj = TestDataTablesFactory::parseColumn($postData["columns"][0], $wrapper);

        $this->assertNull($obj);
    }

    /**
     * Test parseColumn()
     *
     * @return void
     */
    public function testParseColumnWithBadName(): void {

        // Set a DataTables wrapper mock.
        $wrapper = TestFixtures::getWrapper();

        // Set the POST data mock.
        $postData                       = TestFixtures::getPostData();
        $postData["columns"][0]["name"] = "exception";

        $obj = TestDataTablesFactory::parseColumn($postData["columns"][0], $wrapper);

        $this->assertNull($obj);
    }

    /**
     * Test parseColumn()
     *
     * @return void
     */
    public function testParseColumnWithNoData(): void {

        // Set a DataTables wrapper mock.
        $wrapper = TestFixtures::getWrapper();

        // Set the POST data mock.
        $postData = TestFixtures::getPostData();
        unset($postData["columns"][0]["data"]);

        $obj = TestDataTablesFactory::parseColumn($postData["columns"][0], $wrapper);

        $this->assertNull($obj);
    }

    /**
     * Test parseColumn()
     *
     * @return void
     */
    public function testParseColumnWithNoName(): void {

        // Set a DataTables wrapper mock.
        $wrapper = TestFixtures::getWrapper();

        // Set the POST data mock.
        $postData = TestFixtures::getPostData();
        unset($postData["columns"][0]["name"]);

        $obj = TestDataTablesFactory::parseColumn($postData["columns"][0], $wrapper);

        $this->assertNull($obj);
    }

    /**
     * Test parseColumn()
     *
     * @return void
     */
    public function testParseColumnWithNoSearchable(): void {

        // Set a DataTables wrapper mock.
        $wrapper = TestFixtures::getWrapper();

        // Set the POST data mock.
        $postData                             = TestFixtures::getPostData();
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
     * Test parseColumns()
     *
     * @return void
     */
    public function testParseColumns(): void {

        // Set a DataTables wrapper mock.
        $wrapper = TestFixtures::getWrapper();

        // Set the POST data mock.
        $postData = TestFixtures::getPostData();

        $obj = TestDataTablesFactory::parseColumns($postData["columns"], $wrapper);

        $this->assertCount(7, $obj);
    }

    /**
     * Test parseColumns()
     *
     * @return void
     */
    public function testParseColumnsWithNoData(): void {

        // Set a DataTables wrapper mock.
        $wrapper = TestFixtures::getWrapper();

        // Set the POST data mock.
        $postData = TestFixtures::getPostData();
        unset($postData["columns"][6]["name"]);

        $obj = TestDataTablesFactory::parseColumns($postData["columns"], $wrapper);

        $this->assertCount(6, $obj);
    }

    /**
     * Test parseOrder()
     *
     * @return void
     */
    public function testParseOrder(): void {

        // Set the POST data mock.
        $postData                       = TestFixtures::getPostData();
        $postData["order"][0]["column"] = "0";
        $postData["order"][0]["dir"]    = "asc";

        $obj = TestDataTablesFactory::parseOrder($postData["order"][0]);

        $this->assertInstanceOf(DataTablesOrderInterface::class, $obj);

        $this->assertEquals(0, $obj->getColumn());
        $this->assertEquals("ASC", $obj->getDir());
    }

    /**
     * Test parseOrder()
     *
     * @return void
     */
    public function testParseOrderWithInvalidDir(): void {

        // Set the POST data mock.
        $postData                    = TestFixtures::getPostData();
        $postData["order"][0]["dir"] = "exception";

        $obj = TestDataTablesFactory::parseOrder($postData["order"][0]);

        $this->assertEquals(0, $obj->getColumn());
        $this->assertEquals("ASC", $obj->getDir());
    }

    /**
     * Test parseOrder()
     *
     * @return void
     */
    public function testParseOrderWithNoColumn(): void {

        // Set the POST data mock.
        $postData = TestFixtures::getPostData();
        unset($postData["order"][0]["column"]);

        $obj = TestDataTablesFactory::parseOrder($postData["order"][0]);

        $this->assertNull($obj->getColumn());
        $this->assertNull($obj->getDir());
    }

    /**
     * Test parseOrder()
     *
     * @return void
     */
    public function testParseOrderWithNoDir(): void {

        // Set the POST data mock.
        $postData = TestFixtures::getPostData();
        unset($postData["order"][0]["dir"]);

        $obj = TestDataTablesFactory::parseOrder($postData["order"][0]);

        $this->assertNull($obj->getColumn());
        $this->assertNull($obj->getDir());
    }

    /**
     * Test parseOrders()
     *
     * @return void
     */
    public function testParseOrders(): void {

        // Set the POST data mock.
        $postData                    = TestFixtures::getPostData();
        $postData["order"][0]["dir"] = "exception";

        $obj = TestDataTablesFactory::parseOrders($postData["order"]);

        $this->assertCount(1, $obj);
        $this->assertEquals(0, $obj[0]->getColumn());
        $this->assertEquals("ASC", $obj[0]->getDir());
    }

    /**
     * Test parseRequest()
     *
     * @return void
     */
    public function testParseRequestWithGET(): void {

        // Set a DataTables wrapper mock.
        $wrapper = TestFixtures::getWrapper();

        // Set a Request mock.
        $request = new Request(array_merge(TestFixtures::getPostData(), ["query" => "query"]), ["request" => "request"], [], [], [], ["REQUEST_METHOD" => "GET"]);

        $obj = TestDataTablesFactory::parseRequest($wrapper, $request);

        $this->assertInstanceOf(DataTablesRequestInterface::class, $obj);

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
     * Test parseRequest()
     *
     * @return void
     */
    public function testParseRequestWithPOST(): void {

        // Set a DataTables wrapper mock.
        $wrapper = TestFixtures::getWrapper();

        // Set a Request mock.
        $request = new Request(["query" => "query"], array_merge(TestFixtures::getPostData(), ["request" => "request"]), [], [], [], ["REQUEST_METHOD" => "POST"]);

        $obj = TestDataTablesFactory::parseRequest($wrapper, $request);

        $this->assertInstanceOf(DataTablesRequestInterface::class, $obj);

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
     * Test parseSearch()
     *
     * @return void
     */
    public function testParseSearch(): void {

        // Set the POST data mock.
        $postData                    = TestFixtures::getPostData();
        $postData["search"]["regex"] = "true";
        $postData["search"]["value"] = "value";

        $obj = TestDataTablesFactory::parseSearch($postData["search"]);

        $this->assertInstanceOf(DataTablesSearchInterface::class, $obj);

        $this->assertTrue($obj->getRegex());
        $this->assertEquals("value", $obj->getValue());
    }

    /**
     * Test parseSearch()
     *
     * @return void
     */
    public function testParseSearchWithNoRegex(): void {

        // Set the POST data mock.
        $postData                    = TestFixtures::getPostData();
        $postData["search"]["regex"] = "false";
        $postData["search"]["value"] = "value";
        unset($postData["search"]["regex"]); // Set an invalid search.

        $obj = TestDataTablesFactory::parseSearch($postData["search"]);

        $this->assertFalse($obj->getRegex());
        $this->assertEquals("", $obj->getValue());
    }

    /**
     * Test parseSearch()
     *
     * @return void
     */
    public function testParseSearchWithNoValue(): void {

        // Set the POST data mock.
        $postData                    = TestFixtures::getPostData();
        $postData["search"]["regex"] = "true";
        $postData["search"]["value"] = "value";
        unset($postData["search"]["value"]); // Set an invalid search.

        $obj = TestDataTablesFactory::parseSearch($postData["search"]);

        $this->assertFalse($obj->getRegex());
        $this->assertEquals("", $obj->getValue());
    }

    /**
     * Test parseWrapper()
     *
     * @return void
     */
    public function testParseWrapper(): void {

        // Set a DataTables wrapper mock.
        $wrapper = TestFixtures::getWrapper();

        TestDataTablesFactory::parseWrapper($wrapper, $this->request);

        $this->assertNotNull($wrapper->getRequest());
        $this->assertNotNull($wrapper->getResponse());
    }
}

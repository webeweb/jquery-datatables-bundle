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

use WBW\Bundle\JQuery\DataTablesBundle\Factory\DataTablesFactory;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractFrameworkTestCase;
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
     * Tests the parseColumn() method.
     *
     * @return void
     */
    public function testParseColumn() {

        // Get the wrapper.
        $wrapper = TestFixtures::getWrapper();

        // Get the POST data.
        $postData = TestFixtures::getPOSTData();

        $res = DataTablesFactory::parseColumn($postData["columns"][0], $wrapper);
        $this->assertEquals("name", $res->getData());
        $this->assertEquals("Name", $res->getName());
        $this->assertTrue($res->getOrderable());
        $this->assertFalse($res->getSearch()->getRegex());
        $this->assertEquals("", $res->getSearch()->getValue());
        $this->assertTrue($res->getSearchable());
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

        $res = DataTablesFactory::parseColumn($postData["columns"][0], $wrapper);
        $this->assertNull($res);
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

        $res = DataTablesFactory::parseColumn($postData["columns"][0], $wrapper);
        $this->assertNull($res);
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

        $res = DataTablesFactory::parseColumn($postData["columns"][0], $wrapper);
        $this->assertNull($res);
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

        $res = DataTablesFactory::parseColumn($postData["columns"][0], $wrapper);
        $this->assertNull($res);
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

        $res = DataTablesFactory::parseColumn($postData["columns"][0], $wrapper);
        $this->assertEquals("name", $res->getData());
        $this->assertEquals("Name", $res->getName());
        $this->assertTrue($res->getOrderable());
        $this->assertFalse($res->getSearch()->getRegex());
        $this->assertEquals("", $res->getSearch()->getValue());
        $this->assertTrue($res->getSearchable());
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

        $res = DataTablesFactory::parseColumns($postData["columns"], $wrapper);
        $this->assertCount(7, $res);
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

        $res = DataTablesFactory::parseColumns($postData["columns"], $wrapper);
        $this->assertCount(6, $res);
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

        $res = DataTablesFactory::parseOrder($postData["order"][0]);
        $this->assertEquals(0, $res->getColumn());
        $this->assertEquals("ASC", $res->getDir());
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

        $res = DataTablesFactory::parseOrder($postData["order"][0]);
        $this->assertNull($res->getColumn());
        $this->assertNull($res->getDir());
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

        $res = DataTablesFactory::parseOrder($postData["order"][0]);
        $this->assertNull($res->getColumn());
        $this->assertNull($res->getDir());
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

        $res = DataTablesFactory::parseOrder($postData["order"][0]);
        $this->assertEquals(0, $res->getColumn());
        $this->assertEquals("ASC", $res->getDir());
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

        $res = DataTablesFactory::parseOrders($postData["order"]);
        $this->assertCount(1, $res);
        $this->assertEquals(0, $res[0]->getColumn());
        $this->assertEquals("ASC", $res[0]->getDir());
    }

    /**
     * Tests the parseRequest() method.
     *
     * @return void
     */
    public function testParseRequest() {

        // Get the wrapper.
        $wrapper = TestFixtures::getWrapper();

        $res = DataTablesFactory::parseRequest($wrapper, $this->request);

        $this->assertEquals(1, $res->getDraw());
        $this->assertEquals(10, $res->getLength());
        $this->assertFalse($res->getSearch()->getRegex());
        $this->assertEquals("", $res->getSearch()->getValue());
        $this->assertEquals(0, $res->getStart());

        $this->assertCount(7, $res->getColumns());
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

        $res = DataTablesFactory::parseSearch($postData["search"]);
        $this->assertTrue($res->getRegex());
        $this->assertEquals("value", $res->getValue());
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

        $res = DataTablesFactory::parseSearch($postData["search"]);
        $this->assertFalse($res->getRegex());
        $this->assertEquals("", $res->getValue());
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

        $res = DataTablesFactory::parseSearch($postData["search"]);
        $this->assertFalse($res->getRegex());
        $this->assertEquals("", $res->getValue());
    }

}

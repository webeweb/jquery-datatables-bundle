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
     * Tests the newOrder() method.
     *
     * @return void
     */
    public function testNewOrder() {

        // Get the POST data.
        $postData = TestFixtures::getPOSTData();

        // Set the POST data.
        $postData["order"][0]["column"] = "0";
        $postData["order"][0]["dir"]    = "asc";

        $res = DataTablesFactory::newOrder($postData["order"][0]);
        $this->assertEquals(0, $res->getColumn());
        $this->assertEquals("ASC", $res->getDir());
    }

    /**
     * Tests the newOrder() method.
     *
     * @return void
     */
    public function testNewOrderWithNoColumn() {

        // Get the POST data.
        $postData = TestFixtures::getPOSTData();

        // Set the POST data.
        $postData["order"][0]["column"] = "0";
        $postData["order"][0]["dir"]    = "asc";

        // Set an invalid order.
        unset($postData["order"][0]["column"]);

        $res = DataTablesFactory::newOrder($postData["order"][0]);
        $this->assertNull($res->getColumn());
        $this->assertNull($res->getDir());
    }

    /**
     * Tests the newOrder() method.
     *
     * @return void
     */
    public function testNewOrderWithNoDir() {

        // Get the POST data.
        $postData = TestFixtures::getPOSTData();

        // Set the POST data.
        $postData["order"][0]["column"] = "0";
        $postData["order"][0]["dir"]    = "ASC";

        // Set an invalid order.
        unset($postData["order"][0]["dir"]);

        $res = DataTablesFactory::newOrder($postData["order"][0]);
        $this->assertNull($res->getColumn());
        $this->assertNull($res->getDir());
    }

    /**
     * Tests the newOrder() method.
     *
     * @return void
     */
    public function testNewOrderWithInvalidDir() {

        // Get the POST data.
        $postData = TestFixtures::getPOSTData();

        // Set the POST data.
        $postData["order"][0]["column"] = "0";
        $postData["order"][0]["dir"]    = "exception";

        $res = DataTablesFactory::newOrder($postData["order"][0]);
        $this->assertEquals(0, $res->getColumn());
        $this->assertEquals("ASC", $res->getDir());
    }

    /**
     * Tests the newOrders() method.
     *
     * @return void
     */
    public function testNewOrders() {

        // Get the POST data.
        $postData = TestFixtures::getPOSTData();

        // Set the POST data.
        $postData["order"][0]["column"] = "0";
        $postData["order"][0]["dir"]    = "exception";

        $res = DataTablesFactory::newOrders($postData["order"]);
        $this->assertCount(1, $res);
        $this->assertEquals(0, $res[0]->getColumn());
        $this->assertEquals("ASC", $res[0]->getDir());
    }

    /**
     * Tests the newSearch() method.
     *
     * @return void
     */
    public function testNewSearch() {

        // Get the POST data.
        $postData = TestFixtures::getPOSTData();

        // Set the POST data.
        $postData["search"]["regex"] = "true";
        $postData["search"]["value"] = "value";

        $res = DataTablesFactory::newSearch($postData["search"]);
        $this->assertTrue($res->getRegex());
        $this->assertEquals("value", $res->getValue());
    }

    /**
     * Tests the newSearch() method.
     *
     * @return void
     */
    public function testNewSearchWithNoRegex() {

        // Get the POST data.
        $postData = TestFixtures::getPOSTData();

        // Set the POST data.
        $postData["search"]["regex"] = "false";
        $postData["search"]["value"] = "value";

        // Set an invalid search.
        unset($postData["search"]["regex"]);

        $res = DataTablesFactory::newSearch($postData["search"]);
        $this->assertFalse($res->getRegex());
        $this->assertEquals("", $res->getValue());
    }

    /**
     * Tests the newSearch() method.
     *
     * @return void
     */
    public function testNewSearchWithNoValue() {

        // Get the POST data.
        $postData = TestFixtures::getPOSTData();

        // Set the POST data.
        $postData["search"]["regex"] = "true";
        $postData["search"]["value"] = "value";

        // Set an invalid search.
        unset($postData["search"]["value"]);

        $res = DataTablesFactory::newSearch($postData["search"]);
        $this->assertFalse($res->getRegex());
        $this->assertEquals("", $res->getValue());
    }

}

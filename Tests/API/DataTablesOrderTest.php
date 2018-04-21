<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DatatablesBundle\Tests\API;

use PHPUnit_Framework_TestCase;
use WBW\Bundle\JQuery\DatatablesBundle\API\DataTablesOrder;
use WBW\Bundle\JQuery\DatatablesBundle\Tests\AbstractFrameworkTestCase;

/**
 * DataTables order test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DatatablesBundle\Tests\API
 * @final
 */
final class DataTablesOrderTest extends PHPUnit_Framework_TestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstructor() {

        $obj = new DataTablesOrder();

        $this->assertNull($obj->getColumn());
        $this->assertNull($obj->getDir());
    }

    /**
     * Tests the setColumn() method.
     *
     * @return void
     */
    public function testSetColumn() {

        $obj = new DataTablesOrder();

        $obj->setColumn(0);
        $this->assertEquals(0, $obj->getColumn());

        $obj->setColumn(-1);
        $this->assertNull($obj->getColumn());
    }

    /**
     * Tests the setDir() method.
     *
     * @return void
     */
    public function testSetDir() {

        $obj = new DataTablesOrder();

        $obj->setDir("asc");
        $this->assertEquals("ASC", $obj->getDir());

        $obj->setDir("desc");
        $this->assertEquals("DESC", $obj->getDir());

        $obj->setDir("exception");
        $this->assertEquals("ASC", $obj->getDir());
    }

    /**
     * Tests the parse() method.
     *
     * @return void
     * @depends testSetColumn
     * @depends testSetDir
     */
    public function testParse() {

        // Get the POST data.
        $postData = AbstractFrameworkTestCase::getPostData();

        // Set the POST data.
        $postData["order"][0]["column"] = "0";
        $postData["order"][0]["dir"]    = "asc";

        //
        $res = DataTablesOrder::parse($postData["order"]);
        $this->assertCount(1, $res);
        $this->assertEquals(0, $res[0]->getColumn());
        $this->assertEquals("ASC", $res[0]->getDir());

        // Set an invalid order.
        $postData["order"][0]["column"] = "0";
        unset($postData["order"][0]["dir"]);

        $res1 = DataTablesOrder::parse($postData["order"]);
        $this->assertCount(0, $res1);

        // Set an invalid order.
        unset($postData["order"][0]["column"]);
        unset($postData["order"][0]["dir"]);

        $res2 = DataTablesOrder::parse($postData["order"]);
        $this->assertCount(0, $res2);
    }

}

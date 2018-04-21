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
use WBW\Bundle\JQuery\DatatablesBundle\API\DataTablesColumn;

/**
 * DataTables column test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DatatablesBundle\Tests\Column
 * @final
 */
final class DataTablesColumnTest extends PHPUnit_Framework_TestCase {

    /**
     * Tests the newInstance() method.
     *
     * @return void
     */
    public function testNewInstance() {

        $obj = DataTablesColumn::newInstance("name", "title");

        $this->assertEquals("td", $obj->getCellType());
        $this->assertNull($obj->getClassname());
        $this->assertNull($obj->getContentPadding());
        $this->assertEquals("name", $obj->getData());
        $this->assertEquals("name", $obj->getMapping()->getColumn());
        $this->assertNull($obj->getDefaultContent());
        $this->assertEquals("name", $obj->getName());
        $this->assertNull($obj->getOrderData());
        $this->assertNull($obj->getOrderDataType());
        $this->assertNull($obj->getOrderSequence());
        $this->assertNull($obj->getSearch());
        $this->assertTrue($obj->getSearchable());
        $this->assertEquals("title", $obj->getTitle());
        $this->assertNull($obj->getType());
        $this->assertTrue($obj->getVisible());
        $this->assertNull($obj->getWidth());
    }

    /**
     * Tests the setCellType() method.
     *
     * @return void
     */
    public function testSetCellType() {

        $obj = DataTablesColumn::newInstance("name", "title");

        $obj->setCellType("td");
        $this->assertEquals("td", $obj->getCellType());

        $obj->setCellType("th");
        $this->assertEquals("th", $obj->getCellType());

        $obj->setCellType("exception");
        $this->assertEquals("td", $obj->getCellType());
    }

    /**
     * Tests the setClassname() method.
     *
     * @return void
     */
    public function testSetClassname() {

        $obj = DataTablesColumn::newInstance("name", "title");

        $obj->setClassname("classname");
        $this->assertEquals("classname", $obj->getClassname());
    }

    /**
     * Tests the setContentPadding() method.
     *
     * @return void
     */
    public function testSetContentPadding() {

        $obj = DataTablesColumn::newInstance("name", "title");

        $obj->setContentPadding("contentPadding");
        $this->assertEquals("contentPadding", $obj->getContentPadding());
    }

    /**
     * Tests the setData() method.
     *
     * @return void
     */
    public function testSetData() {

        $obj = DataTablesColumn::newInstance("name", "title");

        $obj->setData("data");
        $this->assertEquals("data", $obj->getData());
    }

    /**
     * Tests the setDefaultContent() method.
     *
     * @return void
     */
    public function testSetDefaultContent() {

        $obj = DataTablesColumn::newInstance("name", "title");

        $obj->setDefaultContent("defaultContent");
        $this->assertEquals("defaultContent", $obj->getDefaultContent());
    }

    /**
     * Tests the setOrderData() method.
     *
     * @return void
     */
    public function testSetOrderData() {

        $obj = DataTablesColumn::newInstance("name", "title");

        $obj->setOrderData(1);
        $this->assertEquals(1, $obj->getOrderData());
    }

    /**
     * Tests the setOrderDataType() method.
     *
     * @return void
     */
    public function testSetOrderDataType() {

        $obj = DataTablesColumn::newInstance("name", "title");

        $obj->setOrderDataType("orderDataType");
        $this->assertEquals("orderDataType", $obj->getOrderDataType());
    }

    /**
     * Tests the setOrderSequence() method.
     *
     * @return void
     */
    public function testSetOrderSequence() {

        $obj = DataTablesColumn::newInstance("name", "title");

        $obj->setOrderSequence("exception");
        $this->assertNull($obj->getOrderSequence());

        $obj->setOrderSequence("asc");
        $this->assertEquals("asc", $obj->getOrderSequence());

        $obj->setOrderSequence("desc");
        $this->assertEquals("desc", $obj->getOrderSequence());
    }

    /**
     * Tests the setOrderable() method.
     *
     * @return void
     */
    public function testSetOrderable() {

        $obj = DataTablesColumn::newInstance("name", "title");

        $obj->setOrderable(false);
        $this->assertFalse($obj->getOrderable());
    }

    /**
     * Tests the setSearchable() method.
     *
     * @return void
     */
    public function testSetSearchable() {

        $obj = DataTablesColumn::newInstance("name", "title");

        $obj->setSearchable(false);
        $this->assertFalse($obj->getSearchable());
    }

    /**
     * Tests the setTitle() method.
     *
     * @return void
     */
    public function testSetTitle() {

        $obj = DataTablesColumn::newInstance("name", "title");

        $obj->setTitle("anotherTitle");
        $this->assertEquals("anotherTitle", $obj->getTitle());
    }

    /**
     * Tests the setType() method.
     *
     * @return void
     */
    public function testSetType() {

        $obj = DataTablesColumn::newInstance("name", "title");

        $obj->setType("exception");
        $this->assertNull($obj->getType());

        $obj->setType("date");
        $this->assertEquals("date", $obj->getType());

        $obj->setType("num");
        $this->assertEquals("num", $obj->getType());

        $obj->setType("num-fmt");
        $this->assertEquals("num-fmt", $obj->getType());

        $obj->setType("html");
        $this->assertEquals("html", $obj->getType());

        $obj->setType("html-num");
        $this->assertEquals("html-num", $obj->getType());

        $obj->setType("string");
        $this->assertEquals("string", $obj->getType());
    }

    /**
     * Tests the setVisible() method.
     *
     * @return void
     */
    public function testSetVisible() {

        $obj = DataTablesColumn::newInstance("name", "title");

        $obj->setVisible(false);
        $this->assertFalse($obj->getVisible());
    }

    /**
     * Tests the setWidth() method.
     *
     * @return void
     */
    public function testSetWidth() {

        $obj = DataTablesColumn::newInstance("name", "title");

        $obj->setWidth("width");
        $this->assertEquals("width", $obj->getWidth());
    }

    /**
     * Tests the toArray() method.
     *
     * @return void
     */
    public function testToArray() {

        $obj = DataTablesColumn::newInstance("name", "title");
        $obj->setData(null);
        $obj->setTitle(null);

        $res1 = ["cellType" => "td", "name" => "name"];
        $this->assertEquals($res1, $obj->toArray());

        $obj->setClassname("classname");
        $res2 = ["cellType" => "td", "classname" => "classname", "name" => "name"];
        $this->assertEquals($res2, $obj->toArray());

        $obj->setClassname(null);
        $obj->setContentPadding("contentPadding");
        $res3 = ["cellType" => "td", "contentPadding" => "contentPadding", "name" => "name"];
        $this->assertEquals($res3, $obj->toArray());

        $obj->setContentPadding(null);
        $obj->setData("data");
        $res4 = ["cellType" => "td", "data" => "data", "name" => "name"];
        $this->assertEquals($res4, $obj->toArray());

        $obj->setData(null);
        $obj->setDefaultContent("defaultContent");
        $res5 = ["cellType" => "td", "defaultContent" => "defaultContent", "name" => "name"];
        $this->assertEquals($res5, $obj->toArray());

        $obj->setDefaultContent(null);
        $obj->setOrderData("orderData");
        $res6 = ["cellType" => "td", "name" => "name", "orderData" => "orderData"];
        $this->assertEquals($res6, $obj->toArray());

        $obj->setOrderData(null);
        $obj->setOrderDataType("orderDataType");
        $res7 = ["cellType" => "td", "name" => "name", "orderDataType" => "orderDataType"];
        $this->assertEquals($res7, $obj->toArray());

        $obj->setOrderDataType(null);
        $obj->setOrderSequence("asc");
        $res8 = ["cellType" => "td", "name" => "name", "orderSequence" => "asc"];
        $this->assertEquals($res8, $obj->toArray());

        $obj->setOrderSequence(null);
        $obj->setOrderable(false);
        $res9 = ["cellType" => "td", "name" => "name", "orderable" => false];
        $this->assertEquals($res9, $obj->toArray());

        $obj->setOrderable(true);
        $obj->setSearchable(false);
        $res10 = ["cellType" => "td", "name" => "name", "searchable" => false];
        $this->assertEquals($res10, $obj->toArray());

        $obj->setSearchable(true);
        $obj->setTitle("title");
        $res11 = ["cellType" => "td", "name" => "name", "title" => "title"];
        $this->assertEquals($res11, $obj->toArray());

        $obj->setTitle(null);
        $obj->setType("string");
        $res12 = ["cellType" => "td", "name" => "name", "type" => "string"];
        $this->assertEquals($res12, $obj->toArray());

        $obj->setType(null);
        $obj->setVisible(false);
        $res13 = ["cellType" => "td", "name" => "name", "visible" => false];
        $this->assertEquals($res13, $obj->toArray());

        $obj->setVisible(true);
        $obj->setWidth("width");
        $res14 = ["cellType" => "td", "name" => "name", "width" => "width"];
        $this->assertEquals($res14, $obj->toArray());
    }

    /**
     * Tests the jsonSerialize() method.
     *
     * @return void
     * @depends testToArray
     */
    public function testJsonSerialize() {

        $obj = DataTablesColumn::newInstance("name", "title");

        $res = ["cellType" => "td", "data" => "name", "name" => "name", "title" => "title"];
        $this->assertEquals($res, $obj->jsonSerialize());
    }

}

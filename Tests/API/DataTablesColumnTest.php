<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\API;

use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesColumn;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractJQueryDataTablesFrameworkTestCase;

/**
 * DataTables column test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Column
 * @final
 */
final class DataTablesColumnTest extends AbstractJQueryDataTablesFrameworkTestCase {

    /**
     * Tests the newInstance() method.
     *
     * @return void
     */
    public function testNewInstance() {

        $obj = DataTablesColumn::newInstance("data", "name");

        $this->assertEquals("td", $obj->getCellType());
        $this->assertNull($obj->getClassname());
        $this->assertNull($obj->getContentPadding());
        $this->assertEquals("data", $obj->getData());
        $this->assertEquals("data", $obj->getMapping()->getColumn());
        $this->assertNull($obj->getDefaultContent());
        $this->assertEquals("name", $obj->getName());
        $this->assertNull($obj->getOrderData());
        $this->assertNull($obj->getOrderDataType());
        $this->assertNull($obj->getOrderSequence());
        $this->assertNull($obj->getSearch());
        $this->assertTrue($obj->getSearchable());
        $this->assertEquals("name", $obj->getTitle());
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

        $obj = DataTablesColumn::newInstance("data", "name");

        // ===
        $obj->setCellType("exception");
        $this->assertEquals("td", $obj->getCellType());

        // ===
        $obj->setCellType("td");
        $this->assertEquals("td", $obj->getCellType());

        // ===
        $obj->setCellType("th");
        $this->assertEquals("th", $obj->getCellType());
    }

    /**
     * Tests the setClassname() method.
     *
     * @return void
     */
    public function testSetClassname() {

        $obj = DataTablesColumn::newInstance("data", "name");

        $obj->setClassname("classname");
        $this->assertEquals("classname", $obj->getClassname());
    }

    /**
     * Tests the setContentPadding() method.
     *
     * @return void
     */
    public function testSetContentPadding() {

        $obj = DataTablesColumn::newInstance("data", "name");

        $obj->setContentPadding("contentPadding");
        $this->assertEquals("contentPadding", $obj->getContentPadding());
    }

    /**
     * Tests the setDefaultContent() method.
     *
     * @return void
     */
    public function testSetDefaultContent() {

        $obj = DataTablesColumn::newInstance("data", "name");

        $obj->setDefaultContent("defaultContent");
        $this->assertEquals("defaultContent", $obj->getDefaultContent());
    }

    /**
     * Tests the setName() method.
     *
     * @return void
     */
    public function testSetName() {

        $obj = DataTablesColumn::newInstance("data", "name");

        $obj->setName("othername");
        $this->assertEquals("othername", $obj->getName());
    }

    /**
     * Tests the setOrderData() method.
     *
     * @return void
     */
    public function testSetOrderData() {

        $obj = DataTablesColumn::newInstance("data", "name");

        $obj->setOrderData(1);
        $this->assertEquals(1, $obj->getOrderData());
    }

    /**
     * Tests the setOrderDataType() method.
     *
     * @return void
     */
    public function testSetOrderDataType() {

        $obj = DataTablesColumn::newInstance("data", "name");

        $obj->setOrderDataType("orderDataType");
        $this->assertEquals("orderDataType", $obj->getOrderDataType());
    }

    /**
     * Tests the setOrderSequence() method.
     *
     * @return void
     */
    public function testSetOrderSequence() {

        $obj = DataTablesColumn::newInstance("data", "name");

        // ===
        $obj->setOrderSequence("exception");
        $this->assertNull($obj->getOrderSequence());

        // ===
        $obj->setOrderSequence("asc");
        $this->assertEquals("asc", $obj->getOrderSequence());

        // ===
        $obj->setOrderSequence("desc");
        $this->assertEquals("desc", $obj->getOrderSequence());
    }

    /**
     * Tests the setOrderable() method.
     *
     * @return void
     */
    public function testSetOrderable() {

        $obj = DataTablesColumn::newInstance("data", "name");

        $obj->setOrderable(false);
        $this->assertFalse($obj->getOrderable());
    }

    /**
     * Tests the setSearchable() method.
     *
     * @return void
     */
    public function testSetSearchable() {

        $obj = DataTablesColumn::newInstance("data", "name");

        $obj->setSearchable(false);
        $this->assertFalse($obj->getSearchable());
    }

    /**
     * Tests the setTitle() method.
     *
     * @return void
     */
    public function testSetTitle() {

        $obj = DataTablesColumn::newInstance("data", "name");

        $obj->setTitle("title");
        $this->assertEquals("title", $obj->getTitle());
    }

    /**
     * Tests the setType() method.
     *
     * @return void
     */
    public function testSetType() {

        $obj = DataTablesColumn::newInstance("data", "name");

        // ===
        $obj->setType("exception");
        $this->assertNull($obj->getType());

        // ===
        $obj->setType("date");
        $this->assertEquals("date", $obj->getType());

        // ===
        $obj->setType("num");
        $this->assertEquals("num", $obj->getType());

        // ===
        $obj->setType("num-fmt");
        $this->assertEquals("num-fmt", $obj->getType());

        // ===
        $obj->setType("html");
        $this->assertEquals("html", $obj->getType());

        // ===
        $obj->setType("html-num");
        $this->assertEquals("html-num", $obj->getType());

        // ===
        $obj->setType("string");
        $this->assertEquals("string", $obj->getType());
    }

    /**
     * Tests the setVisible() method.
     *
     * @return void
     */
    public function testSetVisible() {

        $obj = DataTablesColumn::newInstance("data", "name");

        $obj->setVisible(false);
        $this->assertFalse($obj->getVisible());
    }

    /**
     * Tests the setWidth() method.
     *
     * @return void
     */
    public function testSetWidth() {

        $obj = DataTablesColumn::newInstance("data", "name");

        $obj->setWidth("width");
        $this->assertEquals("width", $obj->getWidth());
    }

    /**
     * Tests the toArray() method.
     *
     * @return void
     */
    public function testToArray() {

        $obj = DataTablesColumn::newInstance("data", "name");

        // ===
        $res01 = ["cellType" => "td", "data" => "data", "name" => "name"];
        $this->assertEquals($res01, $obj->toArray());

        // ===
        $obj->setClassname("classname");
        $res02 = ["cellType" => "td", "classname" => "classname", "data" => "data", "name" => "name"];
        $this->assertEquals($res02, $obj->toArray());

        // ===
        $obj->setClassname(null);
        $obj->setContentPadding("contentPadding");
        $res03 = ["cellType" => "td", "contentPadding" => "contentPadding", "data" => "data", "name" => "name"];
        $this->assertEquals($res03, $obj->toArray());

        // ===
        $obj->setContentPadding(null);
        $obj->setDefaultContent("defaultContent");
        $res04 = ["cellType" => "td", "data" => "data", "defaultContent" => "defaultContent", "name" => "name"];
        $this->assertEquals($res04, $obj->toArray());

        // ===
        $obj->setDefaultContent(null);
        $obj->setName("othername");
        $res05 = ["cellType" => "td", "data" => "data", "name" => "othername"];
        $this->assertEquals($res05, $obj->toArray());

        // ===
        $obj->setOrderData("orderData");
        $res06 = ["cellType" => "td", "data" => "data", "name" => "othername", "orderData" => "orderData"];
        $this->assertEquals($res06, $obj->toArray());

        // ===
        $obj->setOrderData(null);
        $obj->setOrderDataType("orderDataType");
        $res07 = ["cellType" => "td", "data" => "data", "name" => "othername", "orderDataType" => "orderDataType"];
        $this->assertEquals($res07, $obj->toArray());

        // ===
        $obj->setOrderDataType(null);
        $obj->setOrderSequence("asc");
        $res08 = ["cellType" => "td", "data" => "data", "name" => "othername", "orderSequence" => "asc"];
        $this->assertEquals($res08, $obj->toArray());

        // ===
        $obj->setOrderSequence(null);
        $obj->setOrderable(false);
        $res09 = ["cellType" => "td", "data" => "data", "name" => "othername", "orderable" => false];
        $this->assertEquals($res09, $obj->toArray());

        // ===
        $obj->setOrderable(true);
        $obj->setSearchable(false);
        $res10 = ["cellType" => "td", "data" => "data", "name" => "othername", "searchable" => false];
        $this->assertEquals($res10, $obj->toArray());

        // ===
        $obj->setSearchable(true);
        $obj->setType("string");
        $res11 = ["cellType" => "td", "data" => "data", "name" => "othername", "type" => "string"];
        $this->assertEquals($res11, $obj->toArray());

        // ===
        $obj->setType(null);
        $obj->setVisible(false);
        $res12 = ["cellType" => "td", "data" => "data", "name" => "othername", "visible" => false];
        $this->assertEquals($res12, $obj->toArray());

        // ===
        $obj->setVisible(true);
        $obj->setWidth("width");
        $res13 = ["cellType" => "td", "data" => "data", "name" => "othername", "width" => "width"];
        $this->assertEquals($res13, $obj->toArray());
    }

    /**
     * Tests the jsonSerialize() method.
     *
     * @return void
     * @depends testToArray
     */
    public function testJsonSerialize() {

        $obj = DataTablesColumn::newInstance("data", "name");

        $res = ["cellType" => "td", "data" => "data", "name" => "name"];
        $this->assertEquals($res, $obj->jsonSerialize());
    }

}

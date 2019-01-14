<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\API;

use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesColumn;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesSearch;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractTestCase;

/**
 * DataTables column test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Column
 */
class DataTablesColumnTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new DataTablesColumn();

        $this->assertEquals(DataTablesColumn::DATATABLES_CELL_TYPE_TD, $obj->getCellType());
        $this->assertNull($obj->getClassname());
        $this->assertNull($obj->getContentPadding());
        $this->assertNull($obj->getData());
        $this->assertNull($obj->getDefaultContent());
        $this->assertNotNull($obj->getMapping());
        $this->assertNull($obj->getOrderData());
        $this->assertNull($obj->getOrderDataType());
        $this->assertNull($obj->getOrderSequence());
        $this->assertTrue($obj->getOrderable());
        $this->assertNull($obj->getSearch());
        $this->assertTrue($obj->getSearchable());
        $this->assertNull($obj->getTitle());
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

        $obj = new DataTablesColumn();

        // ===
        $obj->setCellType("td");
        $this->assertEquals("td", $obj->getCellType());

        // ===
        $obj->setCellType("th");
        $this->assertEquals("th", $obj->getCellType());

        // ===
        $obj->setCellType("exception");
        $this->assertEquals("td", $obj->getCellType());
    }

    /**
     * Tests the setClassname() method.
     *
     * @return void
     */
    public function testSetClassname() {

        $obj = new DataTablesColumn();

        $obj->setClassname("classname");
        $this->assertEquals("classname", $obj->getClassname());
    }

    /**
     * Tests the setContentPadding() method.
     *
     * @return void
     */
    public function testSetContentPadding() {

        $obj = new DataTablesColumn();

        $obj->setContentPadding("contentPadding");
        $this->assertEquals("contentPadding", $obj->getContentPadding());
    }

    /**
     * Tests the setData() method.
     *
     * @return void
     */
    public function testSetData() {

        $obj = new DataTablesColumn();

        $obj->setData("data");
        $this->assertEquals("data", $obj->getData());
    }

    /**
     * Tests the setDefaultContent() method.
     *
     * @return void
     */
    public function testSetDefaultContent() {

        $obj = new DataTablesColumn();

        $obj->setDefaultContent("defaultContent");
        $this->assertEquals("defaultContent", $obj->getDefaultContent());
    }

    /**
     * Tests the setName() method.
     *
     * @return void
     */
    public function testSetName() {

        $obj = new DataTablesColumn();

        $obj->setName("name");
        $this->assertEquals("name", $obj->getName());
    }

    /**
     * Tests the setOrderData() method.
     *
     * @return void
     */
    public function testSetOrderData() {

        $obj = new DataTablesColumn();

        $obj->setOrderData(1);
        $this->assertEquals(1, $obj->getOrderData());
    }

    /**
     * Tests the setOrderDataType() method.
     *
     * @return void
     */
    public function testSetOrderDataType() {

        $obj = new DataTablesColumn();

        $obj->setOrderDataType("orderDataType");
        $this->assertEquals("orderDataType", $obj->getOrderDataType());
    }

    /**
     * Tests the setOrderSequence() method.
     *
     * @return void
     */
    public function testSetOrderSequence() {

        $obj = new DataTablesColumn();

        // ===
        $obj->setOrderSequence("asc");
        $this->assertEquals("asc", $obj->getOrderSequence());

        // ===
        $obj->setOrderSequence("desc");
        $this->assertEquals("desc", $obj->getOrderSequence());

        // ===
        $obj->setOrderSequence("exception");
        $this->assertNull($obj->getOrderSequence());
    }

    /**
     * Tests the setOrderable() method.
     *
     * @return void
     */
    public function testSetOrderable() {

        $obj = new DataTablesColumn();

        $obj->setOrderable(false);
        $this->assertFalse($obj->getOrderable());
    }

    /**
     * Tests the setSearch() method.
     *
     * @return void
     */
    public function testSetSearch() {

        $obj = new DataTablesColumn();

        $arg = new DataTablesSearch();

        $obj->setSearch($arg);
        $this->assertSame($arg, $obj->getSearch());
    }

    /**
     * Tests the setSearchable() method.
     *
     * @return void
     */
    public function testSetSearchable() {

        $obj = new DataTablesColumn();

        $obj->setSearchable(false);
        $this->assertFalse($obj->getSearchable());
    }

    /**
     * Tests the setTitle() method.
     *
     * @return void
     */
    public function testSetTitle() {

        $obj = new DataTablesColumn();

        $obj->setTitle("title");
        $this->assertEquals("title", $obj->getTitle());
    }

    /**
     * Tests the setType() method.
     *
     * @return void
     */
    public function testSetType() {

        $obj = new DataTablesColumn();

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

        // ===
        $obj->setType("exception");
        $this->assertNull($obj->getType());
    }

    /**
     * Tests the setVisible() method.
     *
     * @return void
     */
    public function testSetVisible() {

        $obj = new DataTablesColumn();

        $obj->setVisible(false);
        $this->assertFalse($obj->getVisible());
    }

    /**
     * Tests the setWidth() method.
     *
     * @return void
     */
    public function testSetWidth() {

        $obj = new DataTablesColumn();

        $obj->setWidth("width");
        $this->assertEquals("width", $obj->getWidth());
    }

    /**
     * Tests the toArray() method.
     *
     * @return void
     */
    public function testToArray() {

        $obj = new DataTablesColumn();

        $res = ["cellType" => "td"];
        $this->assertEquals($res, $obj->toArray());
    }

    /**
     * Tests the toArray() method.
     *
     * @return void
     */
    public function testToArrayWithClassname() {

        $obj = new DataTablesColumn();

        $obj->setClassname("classname");
        $res = ["cellType" => "td", "classname" => "classname"];
        $this->assertEquals($res, $obj->toArray());
    }

    /**
     * Tests the toArray() method.
     *
     * @return void
     */
    public function testToArrayWithContentPadding() {

        $obj = new DataTablesColumn();

        $obj->setContentPadding("contentPadding");
        $res = ["cellType" => "td", "contentPadding" => "contentPadding"];
        $this->assertEquals($res, $obj->toArray());
    }

    /**
     * Tests the toArray() method.
     *
     * @return void
     */
    public function testToArrayWithData() {

        $obj = new DataTablesColumn();


        $obj->setData("data");
        $res = ["cellType" => "td", "data" => "data"];
        $this->assertEquals($res, $obj->toArray());
    }

    /**
     * Tests the toArray() method.
     *
     * @return void
     */
    public function testToArrayWithDefaultContent() {

        $obj = new DataTablesColumn();


        $obj->setDefaultContent("defaultContent");
        $res = ["cellType" => "td", "defaultContent" => "defaultContent"];
        $this->assertEquals($res, $obj->toArray());
    }

    /**
     * Tests the toArray() method.
     *
     * @return void
     */
    public function testToArrayWithName() {

        $obj = new DataTablesColumn();

        $obj->setName("name");
        $res = ["cellType" => "td", "name" => "name"];
        $this->assertEquals($res, $obj->toArray());
    }

    /**
     * Tests the toArray() method.
     *
     * @return void
     */
    public function testToArrayWithOrderData() {

        $obj = new DataTablesColumn();

        $obj->setOrderData("orderData");
        $res = ["cellType" => "td", "orderData" => "orderData"];
        $this->assertEquals($res, $obj->toArray());
    }

    /**
     * Tests the toArray() method.
     *
     * @return void
     */
    public function testToArrayWithOrderDataType() {

        $obj = new DataTablesColumn();

        $obj->setOrderDataType("orderDataType");
        $res = ["cellType" => "td", "orderDataType" => "orderDataType"];
        $this->assertEquals($res, $obj->toArray());
    }

    /**
     * Tests the toArray() method.
     *
     * @return void
     */
    public function testToArrayWithOrderSequence() {

        $obj = new DataTablesColumn();

        $obj->setOrderSequence("asc");
        $res = ["cellType" => "td", "orderSequence" => "asc"];
        $this->assertEquals($res, $obj->toArray());
    }

    /**
     * Tests the toArray() method.
     *
     * @return void
     */
    public function testToArrayWithOrderable() {

        $obj = new DataTablesColumn();

        $obj->setOrderable(false);
        $res = ["cellType" => "td", "orderable" => false];
        $this->assertEquals($res, $obj->toArray());
    }

    /**
     * Tests the toArray() method.
     *
     * @return void
     */
    public function testToArrayWithSearchable() {

        $obj = new DataTablesColumn();

        $obj->setSearchable(false);
        $res = ["cellType" => "td", "searchable" => false];
        $this->assertEquals($res, $obj->toArray());
    }

    /**
     * Tests the toArray() method.
     *
     * @return void
     */
    public function testToArrayWithType() {

        $obj = new DataTablesColumn();

        $obj->setType("string");
        $res = ["cellType" => "td", "type" => "string"];
        $this->assertEquals($res, $obj->toArray());
    }

    /**
     * Tests the toArray() method.
     *
     * @return void
     */
    public function testToArrayWithVisible() {

        $obj = new DataTablesColumn();

        $obj->setVisible(false);
        $res = ["cellType" => "td", "visible" => false];
        $this->assertEquals($res, $obj->toArray());
    }

    /**
     * Tests the toArray() method.
     *
     * @return void
     */
    public function testToArrayWithWidth() {

        $obj = new DataTablesColumn();

        $obj->setWidth("width");
        $res = ["cellType" => "td", "width" => "width"];
        $this->assertEquals($res, $obj->toArray());
    }

    /**
     * Tests the jsonSerialize() method.
     *
     * @return void
     * @depends testToArray
     */
    public function testJsonSerialize() {

        $obj = new DataTablesColumn();

        $res = ["cellType" => "td"];
        $this->assertEquals($res, $obj->jsonSerialize());
    }
}

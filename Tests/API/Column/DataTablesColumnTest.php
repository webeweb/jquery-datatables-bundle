<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DatatablesBundle\Tests\API\Column;

use PHPUnit_Framework_TestCase;
use WBW\Bundle\JQuery\DatatablesBundle\API\Column\DataTablesColumn;

/**
 * DataTables column test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DatatablesBundle\Tests\API\Column
 * @final
 */
final class DataTablesColumnTest extends PHPUnit_Framework_TestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void.
     */
    public function testConstructor() {

        $obj = new DataTablesColumn("name", "title");

        $this->assertEquals("td", $obj->getCellType());
        $this->assertEquals(null, $obj->getClassname());
        $this->assertEquals(null, $obj->getContentPadding());
        $this->assertEquals("name", $obj->getData());
        $this->assertEquals("name", $obj->getMapping()->getColumn());
        $this->assertEquals(null, $obj->getDefaultContent());
        $this->assertEquals("name", $obj->getName());
        $this->assertEquals(null, $obj->getOrderData());
        $this->assertEquals(null, $obj->getOrderDataType());
        $this->assertEquals(null, $obj->getOrderSequence());
        $this->assertEquals(true, $obj->getSearchable());
        $this->assertEquals("title", $obj->getTitle());
        $this->assertEquals(null, $obj->getType());
        $this->assertEquals(true, $obj->getVisible());
        $this->assertEquals(null, $obj->getWidth());
    }

    /**
     * Tests the setCellType() method.
     *
     * @return void
     */
    public function testSetCellType() {

        $obj = new DataTablesColumn("name", "title");

        $obj->setCellType("exception");
        $this->assertEquals("td", $obj->getCellType());

        $obj->setCellType("td");
        $this->assertEquals("td", $obj->getCellType());

        $obj->setCellType("th");
        $this->assertEquals("th", $obj->getCellType());
    }

    /**
     * Tests the setClassname() method.
     *
     * @return void
     */
    public function testSetClassname() {

        $obj = new DataTablesColumn("name", "title");

        $obj->setClassname("classname");
        $this->assertEquals("classname", $obj->getClassname());
    }

    /**
     * Tests the setContentPadding() method.
     *
     * @return void
     */
    public function testSetContentPadding() {

        $obj = new DataTablesColumn("name", "title");

        $obj->setContentPadding("contentPadding");
        $this->assertEquals("contentPadding", $obj->getContentPadding());
    }

    /**
     * Tests the setData() method.
     *
     * @return void
     */
    public function testSetData() {

        $obj = new DataTablesColumn("name", "title");

        $obj->setData("data");
        $this->assertEquals("data", $obj->getData());
    }

    /**
     * Tests the setDefaultContent() method.
     *
     * @return void
     */
    public function testSetDefaultContent() {

        $obj = new DataTablesColumn("name", "title");

        $obj->setDefaultContent("defaultContent");
        $this->assertEquals("defaultContent", $obj->getDefaultContent());
    }

    /**
     * Tests the setName() method.
     *
     * @return void
     */
    public function testSetName() {

        $obj = new DataTablesColumn("name", "title");

        $obj->setName("anotherName");
        $this->assertEquals("anotherName", $obj->getName());
    }

    /**
     * Tests the setOrderData() method.
     *
     * @return void
     */
    public function testSetOrderData() {

        $obj = new DataTablesColumn("name", "title");

        $obj->setOrderData(1);
        $this->assertEquals(1, $obj->getOrderData());
    }

    /**
     * Tests the setOrderDataType() method.
     *
     * @return void
     */
    public function testSetOrderDataType() {

        $obj = new DataTablesColumn("name", "title");

        $obj->setOrderDataType("orderDataType");
        $this->assertEquals("orderDataType", $obj->getOrderDataType());
    }

    /**
     * Tests the setOrderSequence() method.
     *
     * @return void
     */
    public function testSetOrderSequence() {

        $obj = new DataTablesColumn("name", "title");

        $obj->setOrderSequence("exception");
        $this->assertEquals(null, $obj->getOrderSequence());

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

        $obj = new DataTablesColumn("name", "title");

        $obj->setOrderable(false);
        $this->assertEquals(false, $obj->getOrderable());
    }

    /**
     * Tests the setSearchable() method.
     *
     * @return void
     */
    public function testSetSearchable() {

        $obj = new DataTablesColumn("name", "title");

        $obj->setSearchable(false);
        $this->assertEquals(false, $obj->getSearchable());
    }

    /**
     * Tests the setTitle() method.
     *
     * @return void
     */
    public function testSetTitle() {

        $obj = new DataTablesColumn("name", "title");

        $obj->setTitle("anotherTitle");
        $this->assertEquals("anotherTitle", $obj->getTitle());
    }

    /**
     * Tests the setType() method.
     *
     * @return void
     */
    public function testSetType() {

        $obj = new DataTablesColumn("name", "title");

        $obj->setType("exception");
        $this->assertEquals(null, $obj->getType());

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

        $obj = new DataTablesColumn("name", "title");

        $obj->setVisible(false);
        $this->assertEquals(false, $obj->getVisible());
    }

    /**
     * Tests the setWidth() method.
     *
     * @return void
     */
    public function testSetWidth() {

        $obj = new DataTablesColumn("name", "title");

        $obj->setWidth("width");
        $this->assertEquals("width", $obj->getWidth());
    }

    /**
     * Tests the toArray() method.
     *
     * @return void
     */
    public function testToArray() {

        $obj = new DataTablesColumn("name", "title");
        $obj->setData(null);
        $obj->setName(null);
        $obj->setTitle(null);

        $res1 = ["cellType" => "td"];
        $this->assertEquals($res1, $obj->toArray());

        $obj->setClassname("classname");
        $res2 = ["cellType" => "td", "classname" => "classname"];
        $this->assertEquals($res2, $obj->toArray());

        $obj->setClassname(null);
        $obj->setContentPadding("contentPadding");
        $res3 = ["cellType" => "td", "contentPadding" => "contentPadding"];
        $this->assertEquals($res3, $obj->toArray());

        $obj->setContentPadding(null);
        $obj->setData("data");
        $res4 = ["cellType" => "td", "data" => "data"];
        $this->assertEquals($res4, $obj->toArray());

        $obj->setData(null);
        $obj->setDefaultContent("defaultContent");
        $res5 = ["cellType" => "td", "defaultContent" => "defaultContent"];
        $this->assertEquals($res5, $obj->toArray());

        $obj->setDefaultContent(null);
        $obj->setName("name");
        $res6 = ["cellType" => "td", "name" => "name"];
        $this->assertEquals($res6, $obj->toArray());

        $obj->setName(null);
        $obj->setOrderData("orderData");
        $res7 = ["cellType" => "td", "orderData" => "orderData"];
        $this->assertEquals($res7, $obj->toArray());

        $obj->setOrderData(null);
        $obj->setOrderDataType("orderDataType");
        $res8 = ["cellType" => "td", "orderDataType" => "orderDataType"];
        $this->assertEquals($res8, $obj->toArray());

        $obj->setOrderDataType(null);
        $obj->setOrderSequence("asc");
        $res9 = ["cellType" => "td", "orderSequence" => "asc"];
        $this->assertEquals($res9, $obj->toArray());

        $obj->setOrderSequence(null);
        $obj->setOrderable(false);
        $res10 = ["cellType" => "td", "orderable" => false];
        $this->assertEquals($res10, $obj->toArray());

        $obj->setOrderable(true);
        $obj->setSearchable(false);
        $res11 = ["cellType" => "td", "searchable" => false];
        $this->assertEquals($res11, $obj->toArray());

        $obj->setSearchable(true);
        $obj->setTitle("title");
        $res12 = ["cellType" => "td", "title" => "title"];
        $this->assertEquals($res12, $obj->toArray());

        $obj->setTitle(null);
        $obj->setType("string");
        $res13 = ["cellType" => "td", "type" => "string"];
        $this->assertEquals($res13, $obj->toArray());

        $obj->setType(null);
        $obj->setVisible(false);
        $res14 = ["cellType" => "td", "visible" => false];
        $this->assertEquals($res14, $obj->toArray());

        $obj->setVisible(true);
        $obj->setWidth("width");
        $res15 = ["cellType" => "td", "width" => "width"];
        $this->assertEquals($res15, $obj->toArray());
    }

    /**
     * Tests the jsonSerialize() method.
     *
     * @return void
     * @depends testToArray
     */
    public function testJsonSerialize() {

        $obj = new DataTablesColumn("name", "title");

        $res = ["cellType" => "td", "data" => "name", "name" => "name", "title" => "title"];
        $this->assertEquals($res, $obj->jsonSerialize());
    }

}

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

use Exception;
use InvalidArgumentException;
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
     * Tests the setCellType() method.
     *
     * @return void
     */
    public function testSetCellType(): void {

        $obj = new DataTablesColumn();

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
    public function testSetClassname(): void {

        $obj = new DataTablesColumn();

        $obj->setClassname("classname");
        $this->assertEquals("classname", $obj->getClassname());
    }

    /**
     * Tests the setContentPadding() method.
     *
     * @return void
     */
    public function testSetContentPadding(): void {

        $obj = new DataTablesColumn();

        $obj->setContentPadding("contentPadding");
        $this->assertEquals("contentPadding", $obj->getContentPadding());
    }

    /**
     * Tests the setData() method.
     *
     * @return void
     */
    public function testSetData(): void {

        $obj = new DataTablesColumn();

        $obj->setData("data");
        $this->assertEquals("data", $obj->getData());
    }

    /**
     * Tests the setDefaultContent() method.
     *
     * @return void
     */
    public function testSetDefaultContent(): void {

        $obj = new DataTablesColumn();

        $obj->setDefaultContent("defaultContent");
        $this->assertEquals("defaultContent", $obj->getDefaultContent());
    }

    /**
     * Tests the setName() method.
     *
     * @return void
     */
    public function testSetName(): void {

        $obj = new DataTablesColumn();

        $obj->setName("name");
        $this->assertEquals("name", $obj->getName());
    }

    /**
     * Tests the setOrderData() method.
     *
     * @return void
     */
    public function testSetOrderData(): void {

        $obj = new DataTablesColumn();

        $obj->setOrderData([1]);
        $this->assertEquals([1], $obj->getOrderData());
    }

    /**
     * Tests the setOrderDataType() method.
     *
     * @return void
     */
    public function testSetOrderDataType(): void {

        $obj = new DataTablesColumn();

        $obj->setOrderDataType("orderDataType");
        $this->assertEquals("orderDataType", $obj->getOrderDataType());
    }

    /**
     * Tests the setOrderSequence() method.
     *
     * @return void
     */
    public function testSetOrderSequence(): void {

        $obj = new DataTablesColumn();

        $obj->setOrderSequence("asc");
        $this->assertEquals("asc", $obj->getOrderSequence());

        $obj->setOrderSequence("desc");
        $this->assertEquals("desc", $obj->getOrderSequence());

        $obj->setOrderSequence("exception");
        $this->assertNull($obj->getOrderSequence());
    }

    /**
     * Tests the setOrderable() method.
     *
     * @return void
     */
    public function testSetOrderable(): void {

        $obj = new DataTablesColumn();

        $obj->setOrderable(false);
        $this->assertFalse($obj->getOrderable());
    }

    /**
     * Tests the setSearch() method.
     *
     * @return void
     */
    public function testSetSearch(): void {

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
    public function testSetSearchable(): void {

        $obj = new DataTablesColumn();

        $obj->setSearchable(false);
        $this->assertFalse($obj->getSearchable());
    }

    /**
     * Tests the setTitle() method.
     *
     * @return void
     */
    public function testSetTitle(): void {

        $obj = new DataTablesColumn();

        $obj->setTitle("title");
        $this->assertEquals("title", $obj->getTitle());
    }

    /**
     * Tests the setType() method.
     *
     * @return void
     */
    public function testSetType(): void {

        $obj = new DataTablesColumn();

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
     * Tests the setType() method.
     *
     * @return void
     */
    public function testSetTypeWithInvalidArgumentException(): void {

        $obj = new DataTablesColumn();

        try {

            $obj->setType("exception");
        } catch (Exception $ex) {

            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
            $this->assertEquals('The type "exception" is invalid', $ex->getMessage());
        }
    }

    /**
     * Tests the setVisible() method.
     *
     * @return void
     */
    public function testSetVisible(): void {

        $obj = new DataTablesColumn();

        $obj->setVisible(false);
        $this->assertFalse($obj->getVisible());
    }

    /**
     * Tests the setWidth() method.
     *
     * @return void
     */
    public function testSetWidth(): void {

        $obj = new DataTablesColumn();

        $obj->setWidth("width");
        $this->assertEquals("width", $obj->getWidth());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct(): void {

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
}

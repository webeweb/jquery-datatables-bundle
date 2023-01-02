<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Model;

use InvalidArgumentException;
use Throwable;
use WBW\Bundle\JQuery\DataTablesBundle\Model\DataTablesColumn;
use WBW\Bundle\JQuery\DataTablesBundle\Model\DataTablesSearch;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractTestCase;

/**
 * DataTables column test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Model
 */
class DataTablesColumnTest extends AbstractTestCase {

    /**
     * Tests setCellType()
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
     * Tests setClassname()
     *
     * @return void
     */
    public function testSetClassname(): void {

        $obj = new DataTablesColumn();

        $obj->setClassname("classname");
        $this->assertEquals("classname", $obj->getClassname());
    }

    /**
     * Tests setContentPadding()
     *
     * @return void
     */
    public function testSetContentPadding(): void {

        $obj = new DataTablesColumn();

        $obj->setContentPadding("contentPadding");
        $this->assertEquals("contentPadding", $obj->getContentPadding());
    }

    /**
     * Tests setData()
     *
     * @return void
     */
    public function testSetData(): void {

        $obj = new DataTablesColumn();

        $obj->setData("data");
        $this->assertEquals("data", $obj->getData());
    }

    /**
     * Tests setDefaultContent()
     *
     * @return void
     */
    public function testSetDefaultContent(): void {

        $obj = new DataTablesColumn();

        $obj->setDefaultContent("defaultContent");
        $this->assertEquals("defaultContent", $obj->getDefaultContent());
    }

    /**
     * Tests setName()
     *
     * @return void
     */
    public function testSetName(): void {

        $obj = new DataTablesColumn();

        $obj->setName("name");
        $this->assertEquals("name", $obj->getName());
    }

    /**
     * Tests setOrderData()
     *
     * @return void
     */
    public function testSetOrderData(): void {

        $obj = new DataTablesColumn();

        $obj->setOrderData([1]);
        $this->assertEquals([1], $obj->getOrderData());
    }

    /**
     * Tests setOrderDataType()
     *
     * @return void
     */
    public function testSetOrderDataType(): void {

        $obj = new DataTablesColumn();

        $obj->setOrderDataType("orderDataType");
        $this->assertEquals("orderDataType", $obj->getOrderDataType());
    }

    /**
     * Tests setOrderSequence()
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
     * Tests setOrderable()
     *
     * @return void
     */
    public function testSetOrderable(): void {

        $obj = new DataTablesColumn();

        $obj->setOrderable(false);
        $this->assertFalse($obj->getOrderable());
    }

    /**
     * Tests setSearch()
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
     * Tests setSearchable()
     *
     * @return void
     */
    public function testSetSearchable(): void {

        $obj = new DataTablesColumn();

        $obj->setSearchable(false);
        $this->assertFalse($obj->getSearchable());
    }

    /**
     * Tests setTitle()
     *
     * @return void
     */
    public function testSetTitle(): void {

        $obj = new DataTablesColumn();

        $obj->setTitle("title");
        $this->assertEquals("title", $obj->getTitle());
    }

    /**
     * Tests setType()
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
     * Tests setType()
     *
     * @return void
     */
    public function testSetTypeWithInvalidArgumentException(): void {

        $obj = new DataTablesColumn();

        try {

            $obj->setType("exception");
        } catch (Throwable $ex) {

            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
            $this->assertEquals('The type "exception" is invalid', $ex->getMessage());
        }
    }

    /**
     * Tests setVisible()
     *
     * @return void
     */
    public function testSetVisible(): void {

        $obj = new DataTablesColumn();

        $obj->setVisible(false);
        $this->assertFalse($obj->getVisible());
    }

    /**
     * Tests setWidth()
     *
     * @return void
     */
    public function testSetWidth(): void {

        $obj = new DataTablesColumn();

        $obj->setWidth("width");
        $this->assertEquals("width", $obj->getWidth());
    }

    /**
     * Tests __construct()
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

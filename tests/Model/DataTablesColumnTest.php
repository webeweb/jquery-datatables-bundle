<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\DataTablesBundle\Tests\Model;

use InvalidArgumentException;
use Throwable;
use WBW\Bundle\DataTablesBundle\Model\DataTablesColumn;
use WBW\Bundle\DataTablesBundle\Model\DataTablesColumnInterface;
use WBW\Bundle\DataTablesBundle\Model\DataTablesSearch;
use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;

/**
 * DataTables column test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Model
 */
class DataTablesColumnTest extends AbstractTestCase {

    /**
     * Test setCellType()
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
     * Test setClassname()
     *
     * @return void
     */
    public function testSetClassname(): void {

        $obj = new DataTablesColumn();

        $obj->setClassname("classname");
        $this->assertEquals("classname", $obj->getClassname());
    }

    /**
     * Test setContentPadding()
     *
     * @return void
     */
    public function testSetContentPadding(): void {

        $obj = new DataTablesColumn();

        $obj->setContentPadding("contentPadding");
        $this->assertEquals("contentPadding", $obj->getContentPadding());
    }

    /**
     * Test setData()
     *
     * @return void
     */
    public function testSetData(): void {

        $obj = new DataTablesColumn();

        $obj->setData("data");
        $this->assertEquals("data", $obj->getData());
    }

    /**
     * Test setDefaultContent()
     *
     * @return void
     */
    public function testSetDefaultContent(): void {

        $obj = new DataTablesColumn();

        $obj->setDefaultContent("defaultContent");
        $this->assertEquals("defaultContent", $obj->getDefaultContent());
    }

    /**
     * Test setName()
     *
     * @return void
     */
    public function testSetName(): void {

        $obj = new DataTablesColumn();

        $obj->setName("name");
        $this->assertEquals("name", $obj->getName());
    }

    /**
     * Test setOrderData()
     *
     * @return void
     */
    public function testSetOrderData(): void {

        $obj = new DataTablesColumn();

        $obj->setOrderData([1]);
        $this->assertEquals([1], $obj->getOrderData());
    }

    /**
     * Test setOrderDataType()
     *
     * @return void
     */
    public function testSetOrderDataType(): void {

        $obj = new DataTablesColumn();

        $obj->setOrderDataType("orderDataType");
        $this->assertEquals("orderDataType", $obj->getOrderDataType());
    }

    /**
     * Test setOrderSequence()
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
     * Test setOrderable()
     *
     * @return void
     */
    public function testSetOrderable(): void {

        $obj = new DataTablesColumn();

        $obj->setOrderable(false);
        $this->assertFalse($obj->getOrderable());
    }

    /**
     * Test setSearch()
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
     * Test setSearchable()
     *
     * @return void
     */
    public function testSetSearchable(): void {

        $obj = new DataTablesColumn();

        $obj->setSearchable(false);
        $this->assertFalse($obj->getSearchable());
    }

    /**
     * Test setTitle()
     *
     * @return void
     */
    public function testSetTitle(): void {

        $obj = new DataTablesColumn();

        $obj->setTitle("title");
        $this->assertEquals("title", $obj->getTitle());
    }

    /**
     * Test setType()
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
     * Test setType()
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
     * Test setVisible()
     *
     * @return void
     */
    public function testSetVisible(): void {

        $obj = new DataTablesColumn();

        $obj->setVisible(false);
        $this->assertFalse($obj->getVisible());
    }

    /**
     * Test setWidth()
     *
     * @return void
     */
    public function testSetWidth(): void {

        $obj = new DataTablesColumn();

        $obj->setWidth("width");
        $this->assertEquals("width", $obj->getWidth());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new DataTablesColumn();

        $this->assertEquals(DataTablesColumnInterface::DATATABLES_CELL_TYPE_TD, $obj->getCellType());
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

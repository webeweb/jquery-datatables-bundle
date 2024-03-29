<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Model;

use WBW\Bundle\DataTablesBundle\Api\DataTablesWrapperInterface;
use WBW\Bundle\DataTablesBundle\Model\DataTablesColumnInterface;
use WBW\Bundle\DataTablesBundle\Model\DataTablesResponse;
use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;

/**
 * DataTables response test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Model
 */
class DataTablesResponseTest extends AbstractTestCase {

    /**
     * Test addRow()
     *
     * @return void
     */
    public function testAddRow(): void {

        // Set a DataTables wrapper mock.
        $wrapper = $this->getMockBuilder(DataTablesWrapperInterface::class)->getMock();

        $obj = new DataTablesResponse();
        $obj->setWrapper($wrapper);

        $this->assertCount(0, $obj->getData());
        $this->assertSame($obj, $obj->addRow());
        $this->assertCount(1, $obj->getData());
    }

    /**
     * Test jsonSerialize()
     *
     * @return void
     */
    public function testJsonSerialize(): void {

        $obj = new DataTablesResponse();

        $res = ["data" => [], "draw" => null, "recordsFiltered" => null, "recordsTotal" => null];
        $this->assertEquals($res, $obj->jsonSerialize());
    }

    /**
     * Test setError()
     *
     * @return void
     */
    public function testSetError(): void {

        $obj = new DataTablesResponse();

        $obj->setError("error");
        $this->assertEquals("error", $obj->getError());
    }

    /**
     * Test setRecordFiltered()
     *
     * @return void
     */
    public function testSetRecordFiltered(): void {

        $obj = new DataTablesResponse();

        $obj->setRecordsFiltered(1);
        $this->assertEquals(1, $obj->getRecordsFiltered());
    }

    /**
     * Test setRecordTotal()
     *
     * @return void
     */
    public function testSetRecordTotal(): void {

        $obj = new DataTablesResponse();

        $obj->setRecordsTotal(2);
        $this->assertEquals(2, $obj->getRecordsTotal());
    }

    /**
     * Test setRow()
     *
     * @return void
     */
    public function testSetRow(): void {

        // Set the DataTables column mocks.
        $columns = [
            $this->getMockBuilder(DataTablesColumnInterface::class)->getMock(),
            $this->getMockBuilder(DataTablesColumnInterface::class)->getMock(),
            $this->getMockBuilder(DataTablesColumnInterface::class)->getMock(),
            $this->getMockBuilder(DataTablesColumnInterface::class)->getMock(),
            $this->getMockBuilder(DataTablesColumnInterface::class)->getMock(),
            $this->getMockBuilder(DataTablesColumnInterface::class)->getMock(),
            $this->getMockBuilder(DataTablesColumnInterface::class)->getMock(),
        ];

        $columns[0]->expects($this->any())->method("getData")->willReturn("name");
        $columns[1]->expects($this->any())->method("getData")->willReturn("position");
        $columns[2]->expects($this->any())->method("getData")->willReturn("office");
        $columns[3]->expects($this->any())->method("getData")->willReturn("age");
        $columns[4]->expects($this->any())->method("getData")->willReturn("startDate");
        $columns[5]->expects($this->any())->method("getData")->willReturn("salary");
        $columns[6]->expects($this->any())->method("getData")->willReturn("actions");

        // Set a DataTables wrapper mock.
        $wrapper = $this->getMockBuilder(DataTablesWrapperInterface::class)->getMock();
        $wrapper->expects($this->any())->method("getColumns")->willReturn($columns);

        $obj = new DataTablesResponse();
        $obj->setWrapper($wrapper)->addRow();

        $obj->setRow("name", "GitHub");
        $res = ["name" => "GitHub", "position" => null, "office" => null, "age" => null, "startDate" => null, "salary" => null, "actions" => null];
        $this->assertCount(1, $obj->getData());
        $this->assertEquals($res, $obj->getData()[0]);
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new DataTablesResponse();

        $this->assertEquals([], $obj->getData());
        $this->assertEquals(0, $obj->getDraw());
        $this->assertNull($obj->getError());
        $this->assertEquals(0, $obj->getRecordsFiltered());
        $this->assertEquals(0, $obj->getRecordsTotal());
        $this->assertNull($obj->getWrapper());
        $this->assertEquals(0, $obj->rowsCount());
    }
}

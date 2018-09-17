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
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesResponse;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractJQueryDataTablesFrameworkTestCase;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\TestFixtures;

/**
 * DataTables response test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\API
 * @final
 */
final class DataTablesResponseTest extends AbstractJQueryDataTablesFrameworkTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = DataTablesResponse::parse($this->dataTablesWrapper, $this->dataTablesRequest);

        $this->assertEquals(0, $obj->countRows());
        $this->assertEquals([], $obj->getData());
        $this->assertEquals(0, $obj->getDraw());
        $this->assertNull($obj->getError());
        $this->assertEquals(0, $obj->getRecordsFiltered());
        $this->assertEquals(0, $obj->getRecordsTotal());
        $this->assertSame($this->dataTablesWrapper, $obj->getWrapper());
    }

    /**
     * Tests the addRow() method.
     *
     * @return void
     */
    public function testAddRow() {

        $obj = DataTablesResponse::parse($this->dataTablesWrapper, $this->dataTablesRequest);

        // ===
        $this->assertCount(0, $obj->getData());

        // ===
        $this->assertSame($obj, $obj->addRow());
        $this->assertCount(1, $obj->getData());
    }

    /**
     * Tests the setError() method.
     *
     * @return void
     */
    public function testSetError() {

        $obj = DataTablesResponse::parse($this->dataTablesWrapper, $this->dataTablesRequest);

        $obj->setError("error");
        $this->assertEquals("error", $obj->getError());
    }

    /**
     * Tests the setRecordFiltered() method.
     *
     * @return void
     */
    public function testSetRecordFiltered() {

        $obj = DataTablesResponse::parse($this->dataTablesWrapper, $this->dataTablesRequest);

        $obj->setRecordsFiltered(1);
        $this->assertEquals(1, $obj->getRecordsFiltered());
    }

    /**
     * Tests the setRecordTotal() method.
     *
     * @return void
     */
    public function testSetRecordTotal() {

        $obj = DataTablesResponse::parse($this->dataTablesWrapper, $this->dataTablesRequest);

        $obj->setRecordsTotal(2);
        $this->assertEquals(2, $obj->getRecordsTotal());
    }

    /**
     * Tests the setRow() method.
     *
     * @return void
     */
    public function testSetRow() {

        // Add the columns.
        $this->dataTablesWrapper
            ->addColumn(DataTablesColumn::newInstance("name", "name"))
            ->addColumn(DataTablesColumn::newInstance("position", "position"))
            ->addColumn(DataTablesColumn::newInstance("office", "office"))
            ->addColumn(DataTablesColumn::newInstance("age", "age"))
            ->addColumn(DataTablesColumn::newInstance("startDate", "startDate"))
            ->addColumn(DataTablesColumn::newInstance("salary", "salary"));

        $obj = $this->dataTablesWrapper->parse($this->request)->getResponse();

        $arg = TestFixtures::getEmployees()[0];
        $res = ["name" => "Tiger Nixon", "position" => "System Architect", "office" => "Edinburgh", "age" => 61, "startDate" => "2011-04-25", "salary" => 320800];

        $obj->addRow();

        $obj->setRow("name", $arg->getName());
        $obj->setRow("position", $arg->getPosition());
        $obj->setRow("office", $arg->getOffice());
        $obj->setRow("age", $arg->getAge());
        $obj->setRow("startDate", $arg->getStartDate()->format("Y-m-d"));
        $obj->setRow("salary", $arg->getSalary());

        $this->assertCount(1, $obj->getData());
        $this->assertEquals($res, $obj->getData()[0]);
    }

    /**
     * Tests the toArray() method.
     *
     * @return void
     */
    public function testToArray() {

        $obj = DataTablesResponse::parse($this->dataTablesWrapper, $this->dataTablesRequest);

        $obj->setError("error");
        $obj->setRecordsFiltered(1);
        $obj->setRecordsTotal(2);

        $res = ["data" => [], "draw" => 0, "recordsFiltered" => 1, "recordsTotal" => 2];
        $this->assertEquals($res, $obj->toArray());
    }

    /**
     * Tests the jsonSerialize() method.
     *
     * @return void
     * @depends testToArray
     */
    public function testJsonSerialize() {

        $obj = DataTablesResponse::parse($this->dataTablesWrapper, $this->dataTablesRequest);

        $obj->setError("error");
        $obj->setRecordsFiltered(1);
        $obj->setRecordsTotal(2);

        $res = ["data" => [], "draw" => 0, "recordsFiltered" => 1, "recordsTotal" => 2];
        $this->assertEquals($res, $obj->jsonSerialize());
    }

}

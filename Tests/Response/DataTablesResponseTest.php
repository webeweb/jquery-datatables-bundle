<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DatatablesBundle\Tests\Response;

use WBW\Bundle\JQuery\DatatablesBundle\Tests\AbstractDataTablesTest;

/**
 * DataTables response test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DatatablesBundle\Tests\Response
 * @final
 */
final class DataTablesResponseTest extends AbstractDataTablesTest {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstructor() {

        $obj = $this->dataTablesResponse;

        $this->assertEquals([], $obj->getData());
        $this->assertEquals(0, $obj->getDraw());
        $this->assertNull($obj->getError());
        $this->assertEquals(0, $obj->getRecordsFiltered());
        $this->assertEquals(0, $obj->getRecordsTotal());
    }

    /**
     * Tests the setError() method.
     *
     * @return void
     */
    public function testSetError() {

        $obj = $this->dataTablesResponse;

        $obj->setError("error");
        $this->assertEquals("error", $obj->getError());
    }

    /**
     * Tests the setRecordFiltered() method.
     *
     * @return void
     */
    public function testSetRecordFiltered() {

        $obj = $this->dataTablesResponse;

        $obj->setRecordsFiltered(1);
        $this->assertEquals(1, $obj->getRecordsFiltered());
    }

    /**
     * Tests the setRecordTotal() method.
     *
     * @return void
     */
    public function testSetRecordTotal() {

        $obj = $this->dataTablesResponse;

        $obj->setRecordsTotal(2);
        $this->assertEquals(2, $obj->getRecordsTotal());
    }

    /**
     * Tests the toArray() method.
     *
     * @return void
     */
    public function testToArray() {

        $obj = $this->dataTablesResponse;

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

        $obj = $this->dataTablesResponse;

        $obj->setError("error");
        $obj->setRecordsFiltered(1);
        $obj->setRecordsTotal(2);

        $res = ["data" => [], "draw" => 0, "recordsFiltered" => 1, "recordsTotal" => 2];
        $this->assertEquals($res, $obj->jsonSerialize());
    }

}

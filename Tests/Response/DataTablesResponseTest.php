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

use PHPUnit_Framework_TestCase;
use Symfony\Component\HttpFoundation\Request;
use WBW\Bundle\JQuery\DatatablesBundle\Request\DataTablesRequest;
use WBW\Bundle\JQuery\DatatablesBundle\Response\DataTablesResponse;

/**
 * DataTables response test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DatatablesBundle\Tests\Response
 * @final
 */
final class DataTablesResponseTest extends PHPUnit_Framework_TestCase {

    /**
     * DataTables request.
     *
     * @var DataTablesRequest
     */
    private $dataTablesRequest;

    /**
     * {@inheritdoc}
     */
    protected function setUp() {

        $this->dataTablesRequest = DataTablesRequest::newInstance(new Request());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstructor() {

        $obj = DataTablesResponse::newInstance($this->dataTablesRequest);

        $this->assertEquals([], $obj->getData());
        $this->assertEquals(0, $obj->getDraw());
        $this->assertEquals(null, $obj->getError());
        $this->assertEquals(0, $obj->getRecordsFiltered());
        $this->assertEquals(0, $obj->getRecordsTotal());
    }

    /**
     * Tests the setError() method.
     *
     * @return void
     */
    public function testSetError() {

        $obj = DataTablesResponse::newInstance($this->dataTablesRequest);

        $obj->setError("error");
        $this->assertEquals("error", $obj->getError());
    }

    /**
     * Tests the setRecordFiltered() method.
     *
     * @return void
     */
    public function testSetRecordFiltered() {

        $obj = DataTablesResponse::newInstance($this->dataTablesRequest);

        $obj->setRecordsFiltered(1);
        $this->assertEquals(1, $obj->getRecordsFiltered());
    }

    /**
     * Tests the setRecordTotal() method.
     *
     * @return void
     */
    public function testSetRecordTotal() {

        $obj = DataTablesResponse::newInstance($this->dataTablesRequest);

        $obj->setRecordsTotal(2);
        $this->assertEquals(2, $obj->getRecordsTotal());
    }

    /**
     * Tests the toArray() method.
     *
     * @return void
     */
    public function testToArray() {

        $obj = DataTablesResponse::newInstance($this->dataTablesRequest);

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

        $obj = DataTablesResponse::newInstance($this->dataTablesRequest);

        $obj->setError("error");
        $obj->setRecordsFiltered(1);
        $obj->setRecordsTotal(2);

        $res = ["data" => [], "draw" => 0, "recordsFiltered" => 1, "recordsTotal" => 2];
        $this->assertEquals($res, $obj->jsonSerialize());
    }

}

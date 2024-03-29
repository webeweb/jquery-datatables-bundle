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

use WBW\Bundle\JQuery\DataTablesBundle\Api\DataTablesColumnInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Api\DataTablesMappingInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Api\DataTablesOptionsInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Model\DataTablesWrapper;
use WBW\Bundle\JQuery\DataTablesBundle\Provider\DataTablesProviderInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractTestCase;

/**
 * DataTables wrapper test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Model
 */
class DataTablesWrapperTest extends AbstractTestCase {

    /**
     * Test addColumn()
     *
     * @return void
     */
    public function testAddColumn(): void {

        // Set a DataTables mapping mock.
        $map = $this->getMockBuilder(DataTablesMappingInterface::class)->getMock();

        // Set a DataTables column mock.
        $col = $this->getMockBuilder(DataTablesColumnInterface::class)->getMock();
        $col->expects($this->any())->method("getData")->willReturn("col");
        $col->expects($this->any())->method("getMapping")->willReturn($map);

        $obj = new DataTablesWrapper();

        $this->assertSame($obj, $obj->addColumn($this->dtColumn));
        $this->assertCount(1, $obj->getColumns());
        $this->assertSame($this->dtColumn, $obj->getColumns()["data"]);

        $this->assertSame($obj, $obj->addColumn($col));
        $this->assertCount(2, $obj->getColumns());
        $this->assertSame($col, $obj->getColumns()["col"]);
    }

    /**
     * Test getColumn()
     *
     * @return void
     */
    public function testGetColumn(): void {

        $obj = new DataTablesWrapper();

        $this->assertNull($obj->getColumn("data"));

        $this->assertSame($obj, $obj->addColumn($this->dtColumn));
        $this->assertSame($this->dtColumn, $obj->getColumn("data"));
    }

    /**
     * Test removeColumn()
     *
     * @return void
     */
    public function testRemoveColumn(): void {

        // Set a DataTables column mock.
        $col = $this->getMockBuilder(DataTablesColumnInterface::class)->getMock();
        $col->expects($this->any())->method("getData")->willReturn("col");
        $col->expects($this->any())->method("getMapping")->willReturn($this->dtMapping);

        $obj = new DataTablesWrapper();

        $this->assertSame($obj, $obj->addColumn($this->dtColumn));
        $this->assertSame($obj, $obj->addColumn($col));
        $this->assertCount(2, $obj->getColumns());

        $this->assertSame($obj, $obj->removeColumn($col));
        $this->assertCount(1, $obj->getColumns());

        $this->assertSame($obj, $obj->removeColumn($this->dtColumn));
        $this->assertCount(0, $obj->getColumns());
    }

    /**
     * Test setMethod()
     *
     * @return void
     */
    public function testSetMethod(): void {

        $obj = new DataTablesWrapper();

        $obj->setMethod("exception");
        $this->assertEquals("POST", $obj->getMethod());

        $obj->setMethod("GET");
        $this->assertEquals("GET", $obj->getMethod());
    }

    /**
     * Test setOptions()
     *
     * @return void
     */
    public function testSetOptions(): void {

        // Set a DataTables options mock.
        $arg = $this->getMockBuilder(DataTablesOptionsInterface::class)->getMock();

        $obj = new DataTablesWrapper();

        $obj->setOptions($arg);
        $this->assertSame($arg, $obj->getOptions());
    }

    /**
     * Test setProcessing()
     *
     * @return void
     */
    public function testSetProcessing(): void {

        $obj = new DataTablesWrapper();

        $obj->setProcessing(null);
        $this->assertTrue($obj->getProcessing());

        $obj->setProcessing(false);
        $this->assertFalse($obj->getProcessing());
    }

    /**
     * Test setProvider()
     *
     * @return void
     */
    public function testSetProvider(): void {

        // Set a DataTables provider mock.
        $arg = $this->getMockBuilder(DataTablesProviderInterface::class)->getMock();
        $arg->expects($this->any())->method("getName")->willReturn("name");

        $obj = new DataTablesWrapper();

        $obj->setProvider($arg);
        $this->assertSame($arg, $obj->getProvider());
    }

    /**
     * Test setRequest()
     *
     * @return void
     */
    public function testSetRequest(): void {

        $obj = new DataTablesWrapper();

        $obj->setRequest($this->dtRequest);
        $this->assertSame($this->dtRequest, $obj->getRequest());
    }

    /**
     * Test setResponse()
     *
     * @return void
     */
    public function testSetResponse(): void {

        $obj = new DataTablesWrapper();

        $obj->setResponse($this->dtResponse);
        $this->assertSame($this->dtResponse, $obj->getResponse());
    }

    /**
     * Test setServerSide()
     *
     * @return void
     */
    public function testSetServerSide(): void {

        $obj = new DataTablesWrapper();

        $obj->setServerSide(false);
        $this->assertFalse($obj->getServerSide());

        $obj->setServerSide(null);
        $this->assertTrue($obj->getServerSide());
    }

    /**
     * Test setUrl()
     *
     * @return void
     */
    public function testSetUrl(): void {

        $obj = new DataTablesWrapper();

        $obj->setUrl("anotherUrl");
        $this->assertEquals("anotherUrl", $obj->getUrl());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new DataTablesWrapper();

        $this->assertEquals([], $obj->getColumns());
        $this->assertNull($obj->getMapping()->getPrefix());
        $this->assertEquals("POST", $obj->getMethod());
        $this->assertNull($obj->getOptions());
        $this->assertTrue($obj->getProcessing());
        $this->assertNull($obj->getProvider());
        $this->assertNull($obj->getRequest());
        $this->assertNull($obj->getResponse());
        $this->assertTrue($obj->getServerSide());
        $this->assertNull($obj->getUrl());
    }
}

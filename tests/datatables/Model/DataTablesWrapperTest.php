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

use WBW\Bundle\DataTablesBundle\Api\DataTablesResponseInterface;
use WBW\Bundle\DataTablesBundle\Model\DataTablesColumnInterface;
use WBW\Bundle\DataTablesBundle\Model\DataTablesMappingInterface;
use WBW\Bundle\DataTablesBundle\Model\DataTablesOptionsInterface;
use WBW\Bundle\DataTablesBundle\Model\DataTablesRequestInterface;
use WBW\Bundle\DataTablesBundle\Model\DataTablesWrapper;
use WBW\Bundle\DataTablesBundle\Provider\DataTablesProviderInterface;
use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;

/**
 * DataTables wrapper test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Model
 */
class DataTablesWrapperTest extends AbstractTestCase {

    /**
     * Test removeColumn()
     *
     * @return void
     */
    public function testAddColumn(): void {

        // Set a DataTables mapping mock.
        $mapping = $this->getMockBuilder(DataTablesMappingInterface::class)->getMock();

        // Set a DataTables column mock.
        $column = $this->getMockBuilder(DataTablesColumnInterface::class)->getMock();
        $column->expects($this->any())->method("getData")->willReturn("data");
        $column->expects($this->any())->method("getMapping")->willReturn($mapping);

        $obj = new DataTablesWrapper();

        $this->assertSame($obj, $obj->addColumn($column));
        $this->assertCount(1, $obj->getColumns());
        $this->assertSame($column, $obj->getColumns()["data"]);

        $this->assertSame($obj, $obj->addColumn($column));
        $this->assertCount(1, $obj->getColumns());
        $this->assertSame($column, $obj->getColumns()["data"]);
    }

    /**
     * Test getColumn()
     *
     * @return void
     */
    public function testGetColumn(): void {

        // Set a DataTables column mock.
        $column = $this->getMockBuilder(DataTablesColumnInterface::class)->getMock();
        $column->expects($this->any())->method("getData")->willReturn("data");

        $obj = new DataTablesWrapper();
        $obj->addColumn($column);

        $this->assertSame($column, $obj->getColumn("data"));
        $this->assertNull($obj->getColumn("col"));
    }

    /**
     * Test removeColumn()
     *
     * @return void
     */
    public function testRemoveColumn(): void {

        // Set the DataTables column mocks.
        $one = $this->getMockBuilder(DataTablesColumnInterface::class)->getMock();
        $one->expects($this->any())->method("getData")->willReturn("one");

        $two = $this->getMockBuilder(DataTablesColumnInterface::class)->getMock();
        $two->expects($this->any())->method("getData")->willReturn("two");

        $obj = new DataTablesWrapper();
        $obj->addColumn($one);

        $this->assertSame($obj, $obj->removeColumn($two));
        $this->assertCount(1, $obj->getColumns());

        $this->assertSame($obj, $obj->removeColumn($one));
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
        $options = $this->getMockBuilder(DataTablesOptionsInterface::class)->getMock();

        $obj = new DataTablesWrapper();

        $obj->setOptions($options);
        $this->assertSame($options, $obj->getOptions());
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
        $provider = $this->getMockBuilder(DataTablesProviderInterface::class)->getMock();

        $obj = new DataTablesWrapper();

        $obj->setProvider($provider);
        $this->assertSame($provider, $obj->getProvider());
    }

    /**
     * Test setRequest()
     *
     * @return void
     */
    public function testSetRequest(): void {

        // Set a DataTables request mock.
        $request = $this->getMockBuilder(DataTablesRequestInterface::class)->getMock();

        $obj = new DataTablesWrapper();

        $obj->setRequest($request);
        $this->assertSame($request, $obj->getRequest());
    }

    /**
     * Test setResponse()
     *
     * @return void
     */
    public function testSetResponse(): void {

        // Set a DataTables response mock.
        $response = $this->getMockBuilder(DataTablesResponseInterface::class)->getMock();

        $obj = new DataTablesWrapper();

        $obj->setResponse($response);
        $this->assertSame($response, $obj->getResponse());
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

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

use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesColumnInterface;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesMappingInterface;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesOptionsInterface;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesWrapper;
use WBW\Bundle\JQuery\DataTablesBundle\Provider\DataTablesProviderInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractFrameworkTestCase;

/**
 * DataTables wrapper test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Wrapper
 * @final
 */
final class DataTablesWrapperTest extends AbstractFrameworkTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new DataTablesWrapper();

        $this->assertEquals([], $obj->getColumns());
        $this->assertNull($obj->getMapping()->getPrefix());
        $this->assertEquals("POST", $obj->getMethod());
        $this->assertNull($obj->getOptions());
        $this->assertEquals([], $obj->getOrder());
        $this->assertTrue($obj->getProcessing());
        $this->assertNull($obj->getProvider());
        $this->assertNull($obj->getRequest());
        $this->assertNull($obj->getResponse());
        $this->assertTrue($obj->getServerSide());
        $this->assertNull($obj->getUrl());
    }

    /**
     * Tests the addColumn() method.
     *
     * @return void
     */
    public function testAddColumn() {

        // Set a Mapping mock.
        $map = $this->getMockBuilder(DataTablesMappingInterface::class)->getMock();

        // Set a Column mock.
        $col = $this->getMockBuilder(DataTablesColumnInterface::class)->getMock();
        $col->expects($this->any())->method("getData")->willReturn("col");
        $col->expects($this->any())->method("getMapping")->willReturn($map);

        $obj = new DataTablesWrapper("url", "name");

        // ===
        $this->assertSame($obj, $obj->addColumn($this->dtColumn));
        $this->assertCount(1, $obj->getColumns());
        $this->assertSame($this->dtColumn, $obj->getColumns()["data"]);

        // ===
        $this->assertSame($obj, $obj->addColumn($col));
        $this->assertCount(2, $obj->getColumns());
        $this->assertSame($col, $obj->getColumns()["col"]);
    }

    /**
     * Tests the getColumn() method.
     *
     * @return void
     */
    public function testGetColumn() {

        $obj = new DataTablesWrapper("url", "name");

        // ===
        $this->assertNull($obj->getColumn("data"));

        // ===
        $this->assertSame($obj, $obj->addColumn($this->dtColumn));
        $this->assertSame($this->dtColumn, $obj->getColumn("data"));
    }

    /**
     * Tests the removeColumn() method.
     *
     * @return void
     */
    public function testRemoveColumn() {

        // Set a Column mock.
        $col = $this->getMockBuilder(DataTablesColumnInterface::class)->getMock();
        $col->expects($this->any())->method("getData")->willReturn("col");
        $col->expects($this->any())->method("getMapping")->willReturn($this->dtMapping);

        $obj = new DataTablesWrapper("url", "name");

        // ===
        $this->assertSame($obj, $obj->addColumn($this->dtColumn));
        $this->assertSame($obj, $obj->addColumn($col));
        $this->assertCount(2, $obj->getColumns());

        // ===
        $this->assertSame($obj, $obj->removeColumn($col));
        $this->assertCount(1, $obj->getColumns());

        // ===
        $this->assertSame($obj, $obj->removeColumn($this->dtColumn));
        $this->assertCount(0, $obj->getColumns());
    }

    /**
     * Tests the setMethod() method.
     *
     * @return void
     */
    public function testSetMethod() {

        $obj = new DataTablesWrapper("url", "name");

        // ===
        $obj->setMethod("exception");
        $this->assertEquals("POST", $obj->getMethod());

        // ===
        $obj->setMethod("GET");
        $this->assertEquals("GET", $obj->getMethod());
    }

    /**
     * Tests the setOptions() method.
     *
     * @return void
     */
    public function testSetOptions() {

        // Set an Options mock.
        $arg = $this->getMockBuilder(DataTablesOptionsInterface::class)->getMock();

        $obj = new DataTablesWrapper("url", "name");

        $obj->setOptions($arg);
        $this->assertSame($arg, $obj->getOptions());
    }

    /**
     * Tests the setOrder() method.
     *
     * @return void
     */
    public function testSetOrder() {

        $obj = new DataTablesWrapper("url", "name");

        $obj->setOrder(["order"]);
        $this->assertEquals(["order"], $obj->getOrder());
    }

    /**
     * Tests the setProcessing() method.
     *
     * @return void
     */
    public function testSetProcessing() {

        $obj = new DataTablesWrapper("url", "name");

        // ===
        $obj->setProcessing(null);
        $this->assertTrue($obj->getProcessing());

        // ===
        $obj->setProcessing(false);
        $this->assertFalse($obj->getProcessing());
    }

    /**
     * Tests the setProvider() method.
     *
     * @return void
     */
    public function testSetProvider() {

        // Set a Provider mock.
        $arg = $this->getMockBuilder(DataTablesProviderInterface::class)->getMock();
        $arg->expects($this->any())->method("getName")->willReturn("name");

        $obj = new DataTablesWrapper("url", "name");

        $obj->setProvider($arg);
        $this->assertSame($arg, $obj->getProvider());
    }

    /**
     * Tests the setRequest() method.
     *
     * @return void
     */
    public function testSetRequest() {

        $obj = new DataTablesWrapper("url", "name");

        $obj->setRequest($this->dtRequest);
        $this->assertSame($this->dtRequest, $obj->getRequest());
    }

    /**
     * Tests the setResponse() method.
     *
     * @return void
     */
    public function testSetResponse() {

        $obj = new DataTablesWrapper("url", "name");

        $obj->setResponse($this->dtResponse);
        $this->assertSame($this->dtResponse, $obj->getResponse());
    }

    /**
     * Tests the setServerSide() method.
     *
     * @return void
     */
    public function testSetServerSide() {

        $obj = new DataTablesWrapper("url", "name");

        // ===
        $obj->setServerSide(false);
        $this->assertFalse($obj->getServerSide());

        // ===
        $obj->setServerSide(null);
        $this->assertTrue($obj->getServerSide());
    }

    /**
     * Tests the setUrl() method.
     *
     * @return void
     */
    public function testSetUrl() {

        $obj = new DataTablesWrapper("url", "name");

        $obj->setUrl("anotherUrl");
        $this->assertEquals("anotherUrl", $obj->getUrl());
    }

}

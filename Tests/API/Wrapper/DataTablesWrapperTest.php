<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DatatablesBundle\Tests\API\Wrapper;

use PHPUnit_Framework_TestCase;
use WBW\Bundle\JQuery\DatatablesBundle\API\Column\DataTablesColumn;
use WBW\Bundle\JQuery\DatatablesBundle\API\Wrapper\DataTablesWrapper;

/**
 * DataTables wrapper test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DatatablesBundle\Tests\API\Wrapper
 * @final
 */
final class DataTablesWrapperTest extends PHPUnit_Framework_TestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void.
     */
    public function testConstructor() {

        $obj = new DataTablesWrapper("POST", "route", "prefix");

        $this->assertEquals([], $obj->getColumns());
        $this->assertEquals("prefix", $obj->getMapping()->getPrefix());
        $this->assertEquals("POST", $obj->getMethod());
        $this->assertEquals([], $obj->getOrder());
        $this->assertEquals(true, $obj->getProcessing());
        $this->assertEquals(null, $obj->getRequest());
        $this->assertEquals(null, $obj->getResponse());
        $this->assertEquals("route", $obj->getRoute());
        $this->assertEquals(true, $obj->getServerSide());
    }

    /**
     * Tests the addColumn() method.
     *
     * @return void
     */
    public function testAddColumn() {

        $obj = new DataTablesWrapper("POST", "route", "prefix");

        $obj->addColumn(new DataTablesColumn("name1", "title1"));
        $this->assertCount(1, $obj->getColumns());
        $this->assertEquals("name1", $obj->getColumns()["name1"]->getMapping()->getColumn());
        $this->assertEquals("prefix", $obj->getColumns()["name1"]->getMapping()->getPrefix());

        $obj->addColumn(new DataTablesColumn("name2", "title2"));
        $this->assertCount(2, $obj->getColumns());
        $this->assertEquals("name2", $obj->getColumns()["name2"]->getMapping()->getColumn());
        $this->assertEquals("prefix", $obj->getColumns()["name2"]->getMapping()->getPrefix());
    }

    public function testRemoveColumn() {

        $obj = new DataTablesWrapper("POST", "route", "prefix");

        $col1 = new DataTablesColumn("name1", "title1");
        $col2 = new DataTablesColumn("name2", "title2");

        $obj->addColumn($col1);
        $obj->addColumn($col2);
        $this->assertCount(2, $obj->getColumns());

        $obj->removeColumn($col1);
        $this->assertCount(1, $obj->getColumns());
        $this->assertEquals(null, $col1->getMapping()->getPrefix());

        $obj->removeColumn($col2);
        $this->assertCount(0, $obj->getColumns());
        $this->assertEquals(null, $col2->getMapping()->getPrefix());
    }

    /**
     * Tests the setMethod() method.
     *
     * @return void
     */
    public function testSetMethod() {

        $obj = new DataTablesWrapper("POST", "route", "prefix");

        $obj->setMethod("GET");
        $this->assertEquals("GET", $obj->getMethod());

        $obj->setMethod("exception");
        $this->assertEquals("GET", $obj->getMethod());
    }

    /**
     * Tests the setOrder() method.
     *
     * @return void
     */
    public function testSetOrder() {

        $obj = new DataTablesWrapper("POST", "aRoute", "prefix");

        $obj->setOrder(["order"]);
        $this->assertEquals(["order"], $obj->getOrder());
    }

    /**
     * Tests the setProcessing() method.
     *
     * @return void
     */
    public function testSetProcessing() {

        $obj = new DataTablesWrapper("POST", "route", "prefix");

        $obj->setProcessing(false);
        $this->assertEquals(false, $obj->getProcessing());

        $obj->setProcessing(null);
        $this->assertEquals(true, $obj->getProcessing());
    }

    /**
     * Tests the setRoute() method.
     *
     * @return void
     */
    public function testSetRoute() {

        $obj = new DataTablesWrapper("POST", "route", "prefix");

        $obj->setRoute("anotherRoute");
        $this->assertEquals("anotherRoute", $obj->getRoute());
    }

    /**
     * Tests the setServerSide() method.
     *
     * @return void
     */
    public function testSetServerSide() {

        $obj = new DataTablesWrapper("POST", "route", "prefix");

        $obj->setServerSide(false);
        $this->assertEquals(false, $obj->getServerSide());

        $obj->setServerSide(null);
        $this->assertEquals(true, $obj->getServerSide());
    }

}

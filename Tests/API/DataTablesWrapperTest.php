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

use Symfony\Component\HttpFoundation\Request;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesColumn;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesOptions;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesWrapper;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractJQueryDataTablesFrameworkTestCase;

/**
 * DataTables wrapper test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Wrapper
 * @final
 */
final class DataTablesWrapperTest extends AbstractJQueryDataTablesFrameworkTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new DataTablesWrapper("POST", "url", "name");

        $this->assertEquals([], $obj->getColumns());
        $this->assertNull($obj->getMapping()->getPrefix());
        $this->assertEquals("POST", $obj->getMethod());
        $this->assertNull($obj->getOptions());
        $this->assertEquals("name", $obj->getName());
        $this->assertEquals([], $obj->getOrder());
        $this->assertTrue($obj->getProcessing());
        $this->assertNull($obj->getRequest());
        $this->assertNull($obj->getResponse());
        $this->assertTrue($obj->getServerSide());
        $this->assertEquals("url", $obj->getUrl());
    }

    /**
     * Tests the addColumn() method.
     *
     * @return void
     */
    public function testAddColumn() {

        $obj = new DataTablesWrapper("POST", "url", "name");
        $obj->getMapping()->setPrefix("prefix");

        // ===
        $this->assertSame($obj, $obj->addColumn(DataTablesColumn::newInstance("name1", "title1")));
        $this->assertCount(1, $obj->getColumns());
        $this->assertEquals("name1", $obj->getColumns()["name1"]->getMapping()->getColumn());
        $this->assertEquals("prefix", $obj->getColumns()["name1"]->getMapping()->getPrefix());

        // ===
        $this->assertSame($obj, $obj->addColumn(DataTablesColumn::newInstance("name2", "title2")));
        $this->assertCount(2, $obj->getColumns());
        $this->assertEquals("name2", $obj->getColumns()["name2"]->getMapping()->getColumn());
        $this->assertEquals("prefix", $obj->getColumns()["name2"]->getMapping()->getPrefix());
    }

    /**
     * Tests the getColumn() method.
     *
     * @return void
     */
    public function testGetColumn() {

        $obj = new DataTablesWrapper("POST", "url", "name");
        $arg = DataTablesColumn::newInstance("name1", "title1");

        // ===
        $this->assertNull($obj->getColumn("name1"));

        // ===
        $this->assertSame($obj, $obj->addColumn($arg));
        $this->assertSame($arg, $obj->getColumn("name1"));
    }

    /**
     * Tests the parse() method.
     *
     * @return void
     */
    public function testParse() {

        $obj = new DataTablesWrapper("POST", "url", "name");

        $obj->parse(new Request());
        $this->assertNotNull($obj->getRequest());
        $this->assertNotNull($obj->getResponse());
    }

    /**
     * Tests the removeColumn() method.
     *
     * @return void
     */
    public function testRemoveColumn() {

        $obj = new DataTablesWrapper("POST", "url", "name");

        $col1 = DataTablesColumn::newInstance("name1", "title1");
        $col2 = DataTablesColumn::newInstance("name2", "title2");

        // ===
        $this->assertSame($obj, $obj->addColumn($col1));
        $this->assertSame($obj, $obj->addColumn($col2));
        $this->assertCount(2, $obj->getColumns());

        // ===
        $this->assertSame($obj, $obj->removeColumn($col1));
        $this->assertCount(1, $obj->getColumns());
        $this->assertNull($col1->getMapping()->getPrefix());

        // ===
        $this->assertSame($obj, $obj->removeColumn($col2));
        $this->assertCount(0, $obj->getColumns());
        $this->assertNull($col2->getMapping()->getPrefix());
    }

    /**
     * Tests the setMethod() method.
     *
     * @return void
     */
    public function testSetMethod() {

        $obj = new DataTablesWrapper("POST", "url", "name");

        // ===
        $obj->setMethod("exception");
        $this->assertEquals("POST", $obj->getMethod());

        // ===
        $obj->setMethod("GET");
        $this->assertEquals("GET", $obj->getMethod());
    }

    /**
     * Tests the setName() method.
     *
     * @return void
     */
    public function testSetName() {

        $obj = new DataTablesWrapper("POST", "url", "name");

        $obj->setName("othername");
        $this->assertEquals("othername", $obj->getName());
    }

    /**
     * Tests the setOptions() method.
     *
     * @return void
     */
    public function testSetOptions() {

        $obj = new DataTablesWrapper("POST", "url", "name");

        $arg = new DataTablesOptions();

        $obj->setOptions($arg);
        $this->assertSame($arg, $obj->getOptions());
    }

    /**
     * Tests the setOrder() method.
     *
     * @return void
     */
    public function testSetOrder() {

        $obj = new DataTablesWrapper("POST", "url", "name");

        $obj->setOrder(["order"]);
        $this->assertEquals(["order"], $obj->getOrder());
    }

    /**
     * Tests the setProcessing() method.
     *
     * @return void
     */
    public function testSetProcessing() {

        $obj = new DataTablesWrapper("POST", "url", "name");

        // ===
        $obj->setProcessing(null);
        $this->assertTrue($obj->getProcessing());

        // ===
        $obj->setProcessing(false);
        $this->assertFalse($obj->getProcessing());
    }

    /**
     * Tests the setServerSide() method.
     *
     * @return void
     */
    public function testSetServerSide() {

        $obj = new DataTablesWrapper("POST", "url", "name");

        // ===
        $obj->setServerSide(null);
        $this->assertTrue($obj->getServerSide());

        // ===
        $obj->setServerSide(false);
        $this->assertFalse($obj->getServerSide());
    }

    /**
     * Tests the setUrl() method.
     *
     * @return void
     */
    public function testSetUrl() {

        $obj = new DataTablesWrapper("POST", "url", "name");

        $obj->setUrl("anotherUrl");
        $this->assertEquals("anotherUrl", $obj->getUrl());
    }

}

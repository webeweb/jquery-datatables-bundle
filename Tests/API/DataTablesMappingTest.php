<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\API;

use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesColumnInterface;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesMapping;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractTestCase;

/**
 * DataTables mapping test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\API
 */
class DataTablesMappingTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new DataTablesMapping();

        $this->assertNull($obj->getColumn());
        $this->assertNull($obj->getPrefix());
    }

    /**
     * Tests the setColumn() method.
     *
     * @return void
     */
    public function testSetColumn() {

        $obj = new DataTablesMapping();

        $obj->setColumn("column");
        $this->assertEquals("column", $obj->getColumn());
    }

    /**
     * Tests the setParent() method.
     *
     * @return void
     */
    public function testSetParent() {

        // Set a DataTables column mock.
        $column = $this->getMockBuilder(DataTablesColumnInterface::class)->getMock();

        $obj = new DataTablesMapping();

        $obj->setParent($column);
        $this->assertSame($column, $obj->getParent());
    }

    /**
     * Tests the setPrefix() method.
     *
     * @return void
     */
    public function testSetPrefix() {

        $obj = new DataTablesMapping();

        $obj->setPrefix("prefix");
        $this->assertEquals("prefix", $obj->getPrefix());
    }
}

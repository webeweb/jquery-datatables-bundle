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
use WBW\Bundle\JQuery\DataTablesBundle\Model\DataTablesMapping;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractTestCase;

/**
 * DataTables mapping test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Model
 */
class DataTablesMappingTest extends AbstractTestCase {

    /**
     * Test setColumn()
     *
     * @return void
     */
    public function testSetColumn(): void {

        $obj = new DataTablesMapping();

        $obj->setColumn("column");
        $this->assertEquals("column", $obj->getColumn());
    }

    /**
     * Test setParent()
     *
     * @return void
     */
    public function testSetParent(): void {

        // Set a DataTables column mock.
        $column = $this->getMockBuilder(DataTablesColumnInterface::class)->getMock();

        $obj = new DataTablesMapping();

        $obj->setParent($column);
        $this->assertSame($column, $obj->getParent());
    }

    /**
     * Test setPrefix()
     *
     * @return void
     */
    public function testSetPrefix(): void {

        $obj = new DataTablesMapping();

        $obj->setPrefix("prefix");
        $this->assertEquals("prefix", $obj->getPrefix());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new DataTablesMapping();

        $this->assertNull($obj->getColumn());
        $this->assertNull($obj->getPrefix());
    }
}

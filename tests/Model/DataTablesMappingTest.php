<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Model;

use WBW\Bundle\DataTablesBundle\Model\DataTablesColumnInterface;
use WBW\Bundle\DataTablesBundle\Model\DataTablesMapping;
use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;

/**
 * DataTables mapping test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Model
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

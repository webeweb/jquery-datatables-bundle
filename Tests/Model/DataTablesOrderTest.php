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

use WBW\Bundle\JQuery\DataTablesBundle\Model\DataTablesOrder;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractTestCase;

/**
 * DataTables order test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Model
 */
class DataTablesOrderTest extends AbstractTestCase {

    /**
     * Tests setColumn()
     *
     * @retrun void
     */
    public function testSetColumn(): void {

        $obj = new DataTablesOrder();

        $obj->setColumn(1);
        $this->assertEquals(1, $obj->getColumn());
    }

    /**
     * Tests setDir()
     *
     * @retrun void
     */
    public function testSetDir(): void {

        $obj = new DataTablesOrder();

        $obj->setDir("asc");
        $this->assertEquals("ASC", $obj->getDir());

        $obj->setDir("desc");
        $this->assertEquals("DESC", $obj->getDir());

        $obj->setDir("exception");
        $this->assertEquals("ASC", $obj->getDir());
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construt(): void {

        $obj = new DataTablesOrder();

        $this->assertNull($obj->getColumn());
        $this->assertNull($obj->getDir());
    }
}

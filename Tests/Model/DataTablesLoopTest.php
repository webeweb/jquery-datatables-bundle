<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Model;

use WBW\Bundle\JQuery\DataTablesBundle\Model\DataTablesLoop;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractTestCase;

/**
 * DataTables loop test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Model
 */
class DataTablesLoopTest extends AbstractTestCase {

    /**
     * Tests the isFirst() method.
     *
     * @return void
     */
    public function testIsFirst(): void {

        $obj = new DataTablesLoop(9);

        $this->assertTrue($obj->isFirst());
        $this->assertFalse($obj->isLast());
    }

    /**
     * Tests the isLast() method.
     *
     * @return void
     */
    public function testIsLast(): void {

        $obj = new DataTablesLoop(2);
        $obj->next();

        $this->assertTrue($obj->isLast());
        $this->assertFalse($obj->isFirst());
    }

    /**
     * Tests the next() method.
     *
     * @return void
     */
    public function testNext(): void {

        $obj = new DataTablesLoop(9);

        $obj->next();
        $this->assertEquals(2, $obj->getIndex());
        $this->assertEquals(1, $obj->getIndex0());
        $this->assertEquals(8, $obj->getRevIndex());
        $this->assertEquals(7, $obj->getRevIndex0());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new DataTablesLoop(9);

        $this->assertEquals(1, $obj->getIndex());
        $this->assertEquals(0, $obj->getIndex0());
        $this->assertEquals(9, $obj->getLength());
        $this->assertEquals(9, $obj->getRevIndex());
        $this->assertEquals(8, $obj->getRevIndex0());
    }
}
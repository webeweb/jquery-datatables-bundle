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

use Exception;
use WBW\Bundle\JQuery\DataTablesBundle\Model\DataTablesOptions;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractTestCase;

/**
 * DataTables options test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Model
 */
class DataTablesOptionsTest extends AbstractTestCase {

    /**
     * Tests addOption()
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testAddOption(): void {

        $obj = new DataTablesOptions();

        $this->assertSame($obj, $obj->addOption("name", "value"));
        $this->assertEquals(["name" => "value"], $obj->getOptions());
    }

    /**
     * Tests getOption()
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testGetOption(): void {

        $obj = new DataTablesOptions();

        $this->assertSame($obj, $obj->addOption("name", "value"));
        $this->assertNotNull($obj->getOption("name"));
        $this->assertNull($obj->getOption("exception"));
    }

    /**
     * Tests hasOption()
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testHasOption(): void {

        $obj = new DataTablesOptions();

        $this->assertSame($obj, $obj->addOption("name", "value"));
        $this->assertTrue($obj->hasOption("name"));
        $this->assertFalse($obj->hasOption("exception"));
    }

    /**
     * Tests removeOption()
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testRemoveOption(): void {

        $obj = new DataTablesOptions();

        $this->assertSame($obj, $obj->addOption("name", "value"));
        $this->assertEquals(["name" => "value"], $obj->getOptions());

        $this->assertSame($obj, $obj->removeOption("name"));
        $this->assertEquals([], $obj->getOptions());
    }

    /**
     * Tests setOption()
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testSetOption(): void {

        $obj = new DataTablesOptions();

        $obj->setOption("name", "value");
        $this->assertEquals(["name" => "value"], $obj->getOptions());
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new DataTablesOptions();

        $this->assertEquals([], $obj->getOptions());
    }
}

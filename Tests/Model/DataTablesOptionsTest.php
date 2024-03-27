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

use Throwable;
use WBW\Bundle\DataTablesBundle\Model\DataTablesOptions;
use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;

/**
 * DataTables options test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Model
 */
class DataTablesOptionsTest extends AbstractTestCase {

    /**
     * Test addOption()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testAddOption(): void {

        $obj = new DataTablesOptions();

        $this->assertSame($obj, $obj->addOption("name", "value"));
        $this->assertEquals(["name" => "value"], $obj->getOptions());
    }

    /**
     * Test getOption()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testGetOption(): void {

        $obj = new DataTablesOptions();

        $this->assertSame($obj, $obj->addOption("name", "value"));
        $this->assertNotNull($obj->getOption("name"));
        $this->assertNull($obj->getOption("exception"));
    }

    /**
     * Test hasOption()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testHasOption(): void {

        $obj = new DataTablesOptions();

        $this->assertSame($obj, $obj->addOption("name", "value"));
        $this->assertTrue($obj->hasOption("name"));
        $this->assertFalse($obj->hasOption("exception"));
    }

    /**
     * Test removeOption()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testRemoveOption(): void {

        $obj = new DataTablesOptions();

        $this->assertSame($obj, $obj->addOption("name", "value"));
        $this->assertEquals(["name" => "value"], $obj->getOptions());

        $this->assertSame($obj, $obj->removeOption("name"));
        $this->assertEquals([], $obj->getOptions());
    }

    /**
     * Test setOption()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testSetOption(): void {

        $obj = new DataTablesOptions();

        $obj->setOption("name", "value");
        $this->assertEquals(["name" => "value"], $obj->getOptions());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new DataTablesOptions();

        $this->assertEquals([], $obj->getOptions());
    }
}

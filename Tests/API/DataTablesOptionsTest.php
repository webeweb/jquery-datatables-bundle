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

use Exception;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesOptions;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Library\Core\Exception\Argument\IllegalArgumentException;

/**
 * DataTables options test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\API
 */
class DataTablesOptionsTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new DataTablesOptions();

        $this->assertEquals([], $obj->getOptions());
    }

    /**
     * Tests the addOption() method.
     *
     * @return void
     */
    public function testAddOption() {

        $obj = new DataTablesOptions();

        $this->assertSame($obj, $obj->addOption("name", "value"));
        $this->assertEquals(["name" => "value"], $obj->getOptions());
    }

    /**
     * Tests the addOption() method.
     *
     * @return void
     */
    public function testAddOptionWithIllegalArgumentException() {

        $obj = new DataTablesOptions();

        try {

            $obj->addOption(1, "value");
        } catch (Exception $ex) {

            $this->assertInstanceOf(IllegalArgumentException::class, $ex);
            $this->assertEquals("The argument \"1\" is not a string", $ex->getMessage());
        }
    }

    /**
     * Tests the getOption() method.
     *
     * @return void
     * @depends testAddOption
     */
    public function testGetOption() {

        $obj = new DataTablesOptions();

        $this->assertSame($obj, $obj->addOption("name", "value"));
        $this->assertNotNull($obj->getOption("name"));
        $this->assertNull($obj->getOption("exception"));
    }

    /**
     * Tests the hasOption() method.
     *
     * @return void
     * @depends testAddOption
     */
    public function testHasOption() {

        $obj = new DataTablesOptions();

        $this->assertSame($obj, $obj->addOption("name", "value"));
        $this->assertTrue($obj->hasOption("name"));
        $this->assertFalse($obj->hasOption("exception"));
    }

    /**
     * Tests the removeOption() method.
     *
     * @return void
     * @depends testAddOption
     */
    public function testRemoveOption() {

        $obj = new DataTablesOptions();

        $this->assertSame($obj, $obj->addOption("name", "value"));
        $this->assertEquals(["name" => "value"], $obj->getOptions());

        $this->assertSame($obj, $obj->removeOption("name"));
        $this->assertEquals([], $obj->getOptions());
    }

    /**
     * Tests the setOption() method.
     *
     * @return void
     */
    public function testSetOption() {

        $obj = new DataTablesOptions();

        $obj->setOption("name", "value");
        $this->assertEquals(["name" => "value"], $obj->getOptions());
    }

    /**
     * Tests the setOption() method.
     *
     * @return void
     */
    public function testSetOptionWithIllegalArgumentException() {

        $obj = new DataTablesOptions();

        try {

            $obj->setOption(1, "value");
        } catch (Exception $ex) {

            $this->assertInstanceOf(IllegalArgumentException::class, $ex);
            $this->assertEquals("The argument \"1\" is not a string", $ex->getMessage());
        }
    }

}

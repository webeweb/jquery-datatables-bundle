<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DatatablesBundle\Tests\API;

use PHPUnit_Framework_TestCase;
use WBW\Bundle\JQuery\DatatablesBundle\API\DataTablesSearch;

/**
 * DataTables search test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DatatablesBundle\Tests\API
 * @final
 */
final class DataTablesSearchTest extends PHPUnit_Framework_TestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstructor() {

        $obj = new DataTablesSearch();

        $this->assertNull($obj->getRegex());
        $this->assertNull($obj->getValue());
    }

    /**
     * Tests the setRegex() method.
     *
     * @return void
     */
    public function testSetRegex() {

        $obj = new DataTablesSearch();

        $obj->setRegex(true);
        $this->assertTrue($obj->getRegex());
    }

    /**
     * Tests the setValue() method.
     *
     * @return void
     */
    public function testSetValue() {

        $obj = new DataTablesSearch();

        $obj->setValue("value");
        $this->assertEquals("value", $obj->getValue());
    }

}

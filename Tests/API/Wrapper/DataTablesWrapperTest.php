<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DatatablesBundle\Tests\API\Wrapper;

use PHPUnit_Framework_TestCase;
use WBW\Bundle\JQuery\DatatablesBundle\API\Wrapper\DataTablesWrapper;

/**
 * DataTables wrapper test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DatatablesBundle\Tests\API\Wrapper
 * @final
 */
final class DataTablesWrapperTest extends PHPUnit_Framework_TestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void.
     */
    public function testConstructor() {

        $obj = new DataTablesWrapper("POST", "route", "prefix");

        $this->assertEquals([], $obj->getColumns());
        $this->assertEquals("prefix", $obj->getMapping()->getPrefix());
        $this->assertEquals("POST", $obj->getMethod());
        $this->assertEquals([], $obj->getOrder());
        $this->assertEquals(true, $obj->getProcessing());
        $this->assertEquals(null, $obj->getRequest());
        $this->assertEquals(null, $obj->getResponse());
        $this->assertEquals("route", $obj->getRoute());
        $this->assertEquals(true, $obj->getServerSide());
    }

    /**
     * Tests the setOrder() method.
     *
     * @return void
     */
    public function testSetOrder() {

        $obj = new DataTablesWrapper("POST", "route", "prefix");

        $obj->setOrder(["order"]);
        $this->assertEquals(["order"], $obj->getOrder());
    }

    /**
     * Tests the setProcessing() method.
     *
     * @return void
     */
    public function testSetProcessing() {

        $obj = new DataTablesWrapper("POST", "route", "prefix");

        $obj->setProcessing(false);
        $this->assertEquals(false, $obj->getProcessing());
    }

    /**
     * Tests the setServerSide() method.
     *
     * @return void
     */
    public function testSetServerSide() {

        $obj = new DataTablesWrapper("POST", "route", "prefix");

        $obj->setServerSide(false);
        $this->assertEquals(false, $obj->getServerSide());
    }

}

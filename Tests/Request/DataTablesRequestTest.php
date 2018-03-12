<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DatatablesBundle\Tests\Request;

use PHPUnit_Framework_TestCase;
use Symfony\Component\HttpFoundation\Request;
use WBW\Bundle\JQuery\DatatablesBundle\Request\DataTablesRequest;

/**
 * DataTables request test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DatatablesBundle\Tests\Request
 * @final
 */
final class DataTablesRequestTest extends PHPUnit_Framework_TestCase {

    /**
     * Tests the getColumns() method.
     *
     * @return void.
     */
    public function testGetColumns() {

        $obj = DataTablesRequest::newInstance(new Request());

        $this->assertEquals([], $obj->getColumns());
    }

    /**
     * Tests the getDraw() method.
     *
     * @return void.
     */
    public function testGetDraw() {

        $obj = DataTablesRequest::newInstance(new Request());

        $this->assertEquals(0, $obj->getDraw());
    }

    /**
     * Tests the getLength() method.
     *
     * @return void.
     */
    public function testGetLength() {

        $obj = DataTablesRequest::newInstance(new Request());

        $this->assertEquals(0, $obj->getLength());
    }

    /**
     * Tests the getOrder() method.
     *
     * @return void.
     */
    public function testGetOrder() {

        $obj = DataTablesRequest::newInstance(new Request());

        $this->assertEquals([], $obj->getOrder());
    }

    /**
     * Tests the getSearch() method.
     *
     * @return void.
     */
    public function testGetSearch() {

        $obj = DataTablesRequest::newInstance(new Request());

        $this->assertEquals([], $obj->getSearch());
    }

    /**
     * Tests the getStart() method.
     *
     * @return void.
     */
    public function testGetStart() {

        $obj = DataTablesRequest::newInstance(new Request());

        $this->assertEquals(0, $obj->getStart());
    }

}

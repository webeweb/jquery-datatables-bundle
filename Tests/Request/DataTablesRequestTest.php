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
     * Tests the __construct() method.
     *
     * @return void.
     */
    public function testConstructor() {

        $obj = DataTablesRequest::newInstance(new Request());

        $this->assertEquals([], $obj->getColumns());
        $this->assertEquals(0, $obj->getDraw());
        $this->assertEquals(0, $obj->getLength());
        $this->assertEquals([], $obj->getOrder());
        $this->assertEquals([], $obj->getSearch());
        $this->assertEquals(0, $obj->getStart());
    }

    /**
     * Tests the getDraw() method.
     *
     * @return void.
     */
    public function testGetDraw() {

        $obj = DataTablesRequest::newInstance(new Request());

        $obj->setDraw(1);
        $this->assertEquals(1, $obj->getDraw());
    }

}

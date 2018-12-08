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

use Symfony\Component\HttpFoundation\ParameterBag;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesRequest;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractTestCase;

/**
 * DataTables request test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\API
 */
class DataTablesRequestTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new DataTablesRequest();

        $this->assertEquals([], $obj->getColumns());
        $this->assertEquals(0, $obj->getDraw());
        $this->assertEquals(10, $obj->getLength());
        $this->assertEquals([], $obj->getOrder());
        $this->assertInstanceOf(ParameterBag::class, $obj->getQuery());
        $this->assertInstanceOf(ParameterBag::class, $obj->getRequest());
        $this->assertNull($obj->getSearch());
        $this->assertEquals(0, $obj->getStart());
        $this->assertNull($obj->getWrapper());
    }

    /**
     * Tests the getColumn() method.
     *
     * @return void
     */
    public function testGetColumn() {

        $obj = new DataTablesRequest();

        $this->assertNull($obj->getColumn("data"));

        $obj->setColumns([$this->dtColumn]);
        $this->assertSame($this->dtColumn, $obj->getColumn("data"));
    }

    /**
     * Tests the setColumns() method.
     *
     * @return void
     */
    public function testSetColumns() {

        $obj = new DataTablesRequest();

        $obj->setColumns(["columns"]);
        $this->assertEquals(["columns"], $obj->getColumns());
    }

    /**
     * Tests the setDraw() method.
     *
     * @return void
     */
    public function testSetDraw() {

        $obj = new DataTablesRequest();

        $obj->setDraw(1);
        $this->assertEquals(1, $obj->getDraw());
    }

    /**
     * Tests the setLength() method.
     *
     * @return void
     */
    public function testSetLength() {

        $obj = new DataTablesRequest();

        $obj->setLength(10);
        $this->assertEquals(10, $obj->getLength());
    }

    /**
     * Tests the setOrder() method.
     *
     * @return void
     */
    public function testSetOrder() {

        $obj = new DataTablesRequest();

        $obj->setOrder(["order"]);
        $this->assertEquals(["order"], $obj->getOrder());
    }

    /**
     * Tests the setSearch() method.
     *
     * @return void
     */
    public function testSetSearch() {

        $obj = new DataTablesRequest();

        $obj->setSearch($this->dtSearch);
        $this->assertSame($this->dtSearch, $obj->getSearch());
    }

    /**
     * Tests the setStart() method.
     *
     * @return void
     */
    public function testSetStart() {

        $obj = new DataTablesRequest();

        $obj->setStart(0);
        $this->assertEquals(0, $obj->getStart());
    }

}

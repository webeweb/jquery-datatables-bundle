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

use Symfony\Component\HttpFoundation\ParameterBag;
use WBW\Bundle\JQuery\DataTablesBundle\Model\DataTablesRequest;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractTestCase;

/**
 * DataTables request test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Model
 */
class DataTablesRequestTest extends AbstractTestCase {

    /**
     * Tests getColumn()
     *
     * @return void
     */
    public function testGetColumn(): void {

        $obj = new DataTablesRequest();

        $this->assertNull($obj->getColumn("data"));

        $obj->setColumns([$this->dtColumn]);
        $this->assertSame($this->dtColumn, $obj->getColumn("data"));
    }

    /**
     * Tests setColumns()
     *
     * @return void
     */
    public function testSetColumns(): void {

        $obj = new DataTablesRequest();

        $obj->setColumns(["columns"]);
        $this->assertEquals(["columns"], $obj->getColumns());
    }

    /**
     * Tests setDraw()
     *
     * @return void
     */
    public function testSetDraw(): void {

        $obj = new DataTablesRequest();

        $obj->setDraw(1);
        $this->assertEquals(1, $obj->getDraw());
    }

    /**
     * Tests setLength()
     *
     * @return void
     */
    public function testSetLength(): void {

        $obj = new DataTablesRequest();

        $obj->setLength(10);
        $this->assertEquals(10, $obj->getLength());
    }

    /**
     * Tests setOrder()
     *
     * @return void
     */
    public function testSetOrder(): void {

        $obj = new DataTablesRequest();

        $obj->setOrder(["order"]);
        $this->assertEquals(["order"], $obj->getOrder());
    }

    /**
     * Tests setSearch()
     *
     * @return void
     */
    public function testSetSearch(): void {

        $obj = new DataTablesRequest();

        $obj->setSearch($this->dtSearch);
        $this->assertSame($this->dtSearch, $obj->getSearch());
    }

    /**
     * Tests setStart()
     *
     * @return void
     */
    public function testSetStart(): void {

        $obj = new DataTablesRequest();

        $obj->setStart(0);
        $this->assertEquals(0, $obj->getStart());
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

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
}

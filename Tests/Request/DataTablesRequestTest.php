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

use Symfony\Component\HttpFoundation\Request;
use WBW\Bundle\JQuery\DatatablesBundle\Request\DataTablesRequest;
use WBW\Bundle\JQuery\DatatablesBundle\Tests\AbstractFrameworkTestCase;

/**
 * DataTables request test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DatatablesBundle\Tests\Request
 * @final
 */
final class DataTablesRequestTest extends AbstractFrameworkTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstructor() {

        $obj = new DataTablesRequest($this->dataTablesWrapper, new Request());

        $this->assertEquals([], $obj->getColumns());
        $this->assertEquals(0, $obj->getDraw());
        $this->assertEquals(0, $obj->getLength());
        $this->assertEquals([], $obj->getOrder());
        $this->assertEquals([], $obj->getSearch());
        $this->assertEquals(0, $obj->getStart());
        $this->assertSame($this->dataTablesWrapper, $obj->getWrapper());
    }

    /**
     * Tests the getColumn() method.
     *
     * @return void
     */
    public function testGetColumn() {

        $obj = new DataTablesRequest($this->dataTablesWrapper, $this->request);

        $this->assertCount(7, $obj->getColumns());
        $this->assertEquals(1, $obj->getDraw());
        $this->assertEquals(10, $obj->getLength());
        $this->assertCount(1, $obj->getOrder());
        $this->assertCount(2, $obj->getSearch());
        $this->assertEquals(0, $obj->getStart());

        $this->assertNotNull($obj->getColumn("id"));
        $this->assertNotNull($obj->getColumn("name"));
        $this->assertNotNull($obj->getColumn("position"));
        $this->assertNotNull($obj->getColumn("office"));
        $this->assertNotNull($obj->getColumn("age"));
        $this->assertNotNull($obj->getColumn("startDate"));
        $this->assertNotNull($obj->getColumn("salary"));
        $this->assertNull($obj->getColumn("exception"));
    }

}

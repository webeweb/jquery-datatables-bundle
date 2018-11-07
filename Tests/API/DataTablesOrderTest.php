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

use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesOrder;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractFrameworkTestCase;

/**
 * DataTables order test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\API
 */
class DataTablesOrderTest extends AbstractFrameworkTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstrutor() {

        $obj = new DataTablesOrder();

        $this->assertNull($obj->getColumn());
        $this->assertNull($obj->getDir());
    }

    /**
     * Tests the setColumn() method.
     *
     * @retrun void
     */
    public function testSetColumn() {

        $obj = new DataTablesOrder();

        $obj->setColumn("column");
        $this->assertEquals("column", $obj->getColumn());
    }

    /**
     * Tests the setDir() method.
     *
     * @retrun void
     */
    public function testSetDir() {

        $obj = new DataTablesOrder();

        $obj->setDir("asc");
        $this->assertEquals("ASC", $obj->getDir());

        $obj->setDir("desc");
        $this->assertEquals("DESC", $obj->getDir());

        $obj->setDir("exception");
        $this->assertEquals("ASC", $obj->getDir());
    }

}

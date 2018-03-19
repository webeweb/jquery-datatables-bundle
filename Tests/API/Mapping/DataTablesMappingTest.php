<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DatatablesBundle\Tests\API\Mapping;

use PHPUnit_Framework_TestCase;
use WBW\Bundle\JQuery\DatatablesBundle\API\Mapping\DataTablesMapping;

/**
 * DataTables mapping test.
 *
 * @author Camille A. <camille@ingeneo.eu>
 * @package WBW\Bundle\JQuery\DatatablesBundle\API\Mapping
 * @final
 */
final class DataTablesMappingTest extends PHPUnit_Framework_TestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void.
     */
    public function testConstructor() {

        $obj = new DataTablesMapping();

        $this->assertEquals(null, $obj->getColumn());
        $this->assertEquals(null, $obj->getPrefix());
    }

    /**
     * Tests the setColumn() method.
     *
     * @return void
     */
    public function testSetColumn() {

        $obj = new DataTablesMapping();

        $obj->setColumn("column");
        $this->assertEquals("column", $obj->getColumn());
    }

    /**
     * Tests the setPrefix() method.
     *
     * @return void
     */
    public function testSetPrefix() {

        $obj = new DataTablesMapping();

        $obj->setPrefix("prefix");
        $this->assertEquals("prefix", $obj->getPrefix());
    }

}

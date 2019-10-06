<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Helper;

use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesColumn;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesMapping;
use WBW\Bundle\JQuery\DataTablesBundle\Helper\DataTablesMappingHelper;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractTestCase;

/**
 * DataTables mapping helper test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Helper
 */
class DataTablesMappingHelperTest extends AbstractTestCase {

    /**
     * Tests the getAlias() method.
     *
     * @return void
     */
    public function testGetAlias() {

        $obj = new DataTablesMapping();

        $this->assertNull(DataTablesMappingHelper::getAlias($obj));

        $obj->setColumn("column");
        $this->assertEquals("column", DataTablesMappingHelper::getAlias($obj));

        $obj->setPrefix("prefix");
        $this->assertEquals("prefix.column", DataTablesMappingHelper::getAlias($obj));
    }

    /**
     * Tests the getComparator() method.
     *
     * @return void
     */
    public function testGetComparator() {

        // Set a DataTables column mock.
        $column = new DataTablesColumn();

        $obj = new DataTablesMapping();
        $obj->setPrefix("prefix");
        $obj->setColumn("column");

        $this->assertEquals("LIKE", DataTablesMappingHelper::getComparator($obj));

        $obj->setParent($column);
        $this->assertEquals("LIKE", DataTablesMappingHelper::getComparator($obj));

        $column->setType("date");
        $this->assertEquals("=", DataTablesMappingHelper::getComparator($obj));

        $column->setType("html");
        $this->assertEquals("LIKE", DataTablesMappingHelper::getComparator($obj));

        $column->setType("html-num");
        $this->assertEquals("=", DataTablesMappingHelper::getComparator($obj));

        $column->setType("num");
        $this->assertEquals("=", DataTablesMappingHelper::getComparator($obj));

        $column->setType("num-fmt");
        $this->assertEquals("=", DataTablesMappingHelper::getComparator($obj));

        $column->setType("string");
        $this->assertEquals("LIKE", DataTablesMappingHelper::getComparator($obj));
    }

    /**
     * Tests the getParam() method.
     *
     * @return void
     */
    public function testGetParam() {

        $obj = new DataTablesMapping();
        $obj->setPrefix("prefix");
        $obj->setColumn("column");

        $this->assertEquals(":prefixcolumn", DataTablesMappingHelper::getParam($obj));
    }

    /**
     * Tests the getWhere() method.
     *
     * @return void
     */
    public function testGetWhere() {

        $obj = new DataTablesMapping();
        $obj->setPrefix("prefix");
        $obj->setColumn("column");

        $this->assertEquals("prefix.column LIKE :prefixcolumn", DataTablesMappingHelper::getWhere($obj));
    }
}

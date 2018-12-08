<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Helper;

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

        // ===
        $this->assertNull(DataTablesMappingHelper::getAlias($obj));

        // ===
        $obj->setColumn("column");
        $this->assertEquals("column", DataTablesMappingHelper::getAlias($obj));

        // ===
        $obj->setPrefix("prefix");
        $this->assertEquals("prefix.column", DataTablesMappingHelper::getAlias($obj));
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

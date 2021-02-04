<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\API;

use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesColumnInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractTestCase;

/**
 * DataTables column interface test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\API
 */
class DataTablesColumnInterfaceTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("td", DataTablesColumnInterface::DATATABLES_CELL_TYPE_TD);
        $this->assertEquals("th", DataTablesColumnInterface::DATATABLES_CELL_TYPE_TH);

        $this->assertEquals("asc", DataTablesColumnInterface::DATATABLES_ORDER_SEQUENCE_ASC);
        $this->assertEquals("desc", DataTablesColumnInterface::DATATABLES_ORDER_SEQUENCE_DESC);

        $this->assertEquals("data", DataTablesColumnInterface::DATATABLES_PARAMETER_DATA);
        $this->assertEquals("name", DataTablesColumnInterface::DATATABLES_PARAMETER_NAME);
        $this->assertEquals("search", DataTablesColumnInterface::DATATABLES_PARAMETER_SEARCH);

        $this->assertEquals("date", DataTablesColumnInterface::DATATABLES_TYPE_DATE);
        $this->assertEquals("html", DataTablesColumnInterface::DATATABLES_TYPE_HTML);
        $this->assertEquals("html-num", DataTablesColumnInterface::DATATABLES_TYPE_HTML_NUM);
        $this->assertEquals("num", DataTablesColumnInterface::DATATABLES_TYPE_NUM);
        $this->assertEquals("num-fmt", DataTablesColumnInterface::DATATABLES_TYPE_NUM_FMT);
        $this->assertEquals("string", DataTablesColumnInterface::DATATABLES_TYPE_STRING);
    }
}

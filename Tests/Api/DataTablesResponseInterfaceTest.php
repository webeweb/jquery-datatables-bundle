<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Api;

use WBW\Bundle\DataTablesBundle\Api\DataTablesResponseInterface;
use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;

/**
 * DataTables response interface test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Api
 */
class DataTablesResponseInterfaceTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("DT_RowAttr", DataTablesResponseInterface::DATATABLES_ROW_ATTR);
        $this->assertEquals("DT_RowClass", DataTablesResponseInterface::DATATABLES_ROW_CLASS);
        $this->assertEquals("DT_RowData", DataTablesResponseInterface::DATATABLES_ROW_DATA);
        $this->assertEquals("DT_RowId", DataTablesResponseInterface::DATATABLES_ROW_ID);
    }
}

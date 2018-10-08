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

use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesColumnInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Helper\DataTablesColumnHelper;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractFrameworkTestCase;

/**
 * DataTables column helper test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Helper
 * @final
 */
final class DataTablesColumnHelperTest extends AbstractFrameworkTestCase {

    /**
     * Tests the dtCellTypes() method.
     *
     * @return void
     */
    public function testDtCellTypes() {

        $res = [
            DataTablesColumnInterface::DATATABLES_CELL_TYPE_TD,
            DataTablesColumnInterface::DATATABLES_CELL_TYPE_TH,
        ];
        $this->assertEquals($res, DataTablesColumnHelper::dtCellTypes());
    }

    /**
     * Tests the dtOrderSequences() method.
     *
     * @return void
     */
    public function testDtOrderSequences() {

        $res = [
            DataTablesColumnInterface::DATATABLES_ORDER_SEQUENCE_ASC,
            DataTablesColumnInterface::DATATABLES_ORDER_SEQUENCE_DESC,
        ];
        $this->assertEquals($res, DataTablesColumnHelper::dtOrderSequences());
    }

    /**
     * Tests the dtTypes() method.
     *
     * @return void
     */
    public function testDtTypes() {

        $res = [
            DataTablesColumnInterface::DATATABLES_TYPE_DATE,
            DataTablesColumnInterface::DATATABLES_TYPE_HTML,
            DataTablesColumnInterface::DATATABLES_TYPE_HTML_NUM,
            DataTablesColumnInterface::DATATABLES_TYPE_NUM,
            DataTablesColumnInterface::DATATABLES_TYPE_NUM_FMT,
            DataTablesColumnInterface::DATATABLES_TYPE_STRING,
        ];
        $this->assertEquals($res, DataTablesColumnHelper::dtTypes());
    }

}

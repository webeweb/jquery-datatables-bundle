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
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesEnumerator;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesOrderInterface;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesRequestInterface;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesResponseInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractTestCase;

/**
 * DataTables enumerator test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\API
 */
class DataTablesEnumeratorTest extends AbstractTestCase {

    /**
     * Tests the enumCellTypes() method.
     *
     * @return void
     */
    public function testEnumCellTypes() {

        $res = [
            DataTablesColumnInterface::DATATABLES_CELL_TYPE_TD,
            DataTablesColumnInterface::DATATABLES_CELL_TYPE_TH,
        ];
        $this->assertEquals($res, DataTablesEnumerator::enumCellTypes());
    }

    /**
     * Tests the enumDirs() method.
     *
     * @return void
     */
    public function testEnumDirs() {

        $res = [
            DataTablesOrderInterface::DATATABLES_DIR_ASC,
            DataTablesOrderInterface::DATATABLES_DIR_DESC,
        ];
        $this->assertEquals($res, DataTablesEnumerator::enumDirs());
    }

    /**
     * Tests the enumOrderSequences() method.
     *
     * @return void
     */
    public function testEnumOrderSequences() {

        $res = [
            DataTablesColumnInterface::DATATABLES_ORDER_SEQUENCE_ASC,
            DataTablesColumnInterface::DATATABLES_ORDER_SEQUENCE_DESC,
        ];
        $this->assertEquals($res, DataTablesEnumerator::enumOrderSequences());
    }

    /**
     * Tests the enumParameters() method.
     *
     * @return void
     */
    public function testEnumParameters() {

        $res = [
            DataTablesRequestInterface::DATATABLES_PARAMETER_COLUMNS,
            DataTablesRequestInterface::DATATABLES_PARAMETER_DRAW,
            DataTablesRequestInterface::DATATABLES_PARAMETER_LENGTH,
            DataTablesRequestInterface::DATATABLES_PARAMETER_ORDER,
            DataTablesRequestInterface::DATATABLES_PARAMETER_SEARCH,
            DataTablesRequestInterface::DATATABLES_PARAMETER_START,
        ];
        $this->assertEquals($res, DataTablesEnumerator::enumParameters());
    }

    /**
     * Tests the enumRows() method.
     *
     * @@return void
     */
    public function testEnumRows() {

        $res = [
            DataTablesResponseInterface::DATATABLES_ROW_ATTR,
            DataTablesResponseInterface::DATATABLES_ROW_CLASS,
            DataTablesResponseInterface::DATATABLES_ROW_DATA,
            DataTablesResponseInterface::DATATABLES_ROW_ID,
        ];
        $this->assertEquals($res, DataTablesEnumerator::enumRows());
    }

    /**
     * Tests the enumTypes() method.
     *
     * @return void
     */
    public function testEnumTypes() {

        $res = [
            DataTablesColumnInterface::DATATABLES_TYPE_DATE,
            DataTablesColumnInterface::DATATABLES_TYPE_HTML,
            DataTablesColumnInterface::DATATABLES_TYPE_HTML_NUM,
            DataTablesColumnInterface::DATATABLES_TYPE_NUM,
            DataTablesColumnInterface::DATATABLES_TYPE_NUM_FMT,
            DataTablesColumnInterface::DATATABLES_TYPE_STRING,
        ];
        $this->assertEquals($res, DataTablesEnumerator::enumTypes());
    }
}

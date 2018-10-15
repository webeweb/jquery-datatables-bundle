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

use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesColumnInterface;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesEnumerator;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractFrameworkTestCase;

/**
 * DataTables enumerator test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\API
 * @final
 */
final class DataTablesEnumeratorTest extends AbstractFrameworkTestCase {

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

<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Model;

use WBW\Bundle\DataTablesBundle\Model\DataTablesColumnInterface;
use WBW\Bundle\DataTablesBundle\Model\DataTablesEnumerator;
use WBW\Bundle\DataTablesBundle\Model\DataTablesOrderInterface;
use WBW\Bundle\DataTablesBundle\Model\DataTablesRequestInterface;
use WBW\Bundle\DataTablesBundle\Model\DataTablesResponseInterface;
use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;

/**
 * DataTables enumerator test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Model
 */
class DataTablesEnumeratorTest extends AbstractTestCase {

    /**
     * Test enumCellTypes()
     *
     * @return void
     */
    public function testEnumCellTypes(): void {

        $exp = [
            DataTablesColumnInterface::DATATABLES_CELL_TYPE_TD,
            DataTablesColumnInterface::DATATABLES_CELL_TYPE_TH,
        ];

        $this->assertEquals($exp, DataTablesEnumerator::enumCellTypes());
    }

    /**
     * Test enumDirs()
     *
     * @return void
     */
    public function testEnumDirs(): void {

        $exp = [
            DataTablesOrderInterface::DATATABLES_DIR_ASC,
            DataTablesOrderInterface::DATATABLES_DIR_DESC,
        ];

        $this->assertEquals($exp, DataTablesEnumerator::enumDirs());
    }

    /**
     * Test enumOrderSequences()
     *
     * @return void
     */
    public function testEnumOrderSequences(): void {

        $exp = [
            DataTablesColumnInterface::DATATABLES_ORDER_SEQUENCE_ASC,
            DataTablesColumnInterface::DATATABLES_ORDER_SEQUENCE_DESC,
        ];

        $this->assertEquals($exp, DataTablesEnumerator::enumOrderSequences());
    }

    /**
     * Test enumParameters()
     *
     * @return void
     */
    public function testEnumParameters(): void {

        $exp = [
            DataTablesRequestInterface::DATATABLES_PARAMETER_COLUMNS,
            DataTablesRequestInterface::DATATABLES_PARAMETER_DRAW,
            DataTablesRequestInterface::DATATABLES_PARAMETER_LENGTH,
            DataTablesRequestInterface::DATATABLES_PARAMETER_ORDER,
            DataTablesRequestInterface::DATATABLES_PARAMETER_SEARCH,
            DataTablesRequestInterface::DATATABLES_PARAMETER_START,
        ];

        $this->assertEquals($exp, DataTablesEnumerator::enumParameters());
    }

    /**
     * Test enumRows()
     *
     * @return void
     */
    public function testEnumRows(): void {

        $exp = [
            DataTablesResponseInterface::DATATABLES_ROW_ATTR,
            DataTablesResponseInterface::DATATABLES_ROW_CLASS,
            DataTablesResponseInterface::DATATABLES_ROW_DATA,
            DataTablesResponseInterface::DATATABLES_ROW_ID,
        ];

        $this->assertEquals($exp, DataTablesEnumerator::enumRows());
    }

    /**
     * Test enumTypes()
     *
     * @return void
     */
    public function testEnumTypes(): void {

        $exp = [
            DataTablesColumnInterface::DATATABLES_TYPE_DATE,
            DataTablesColumnInterface::DATATABLES_TYPE_HTML,
            DataTablesColumnInterface::DATATABLES_TYPE_HTML_NUM,
            DataTablesColumnInterface::DATATABLES_TYPE_NUM,
            DataTablesColumnInterface::DATATABLES_TYPE_NUM_FMT,
            DataTablesColumnInterface::DATATABLES_TYPE_STRING,
        ];

        $this->assertEquals($exp, DataTablesEnumerator::enumTypes());
    }
}

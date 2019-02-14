<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests;

use WBW\Bundle\JQuery\DataTablesBundle\DataTablesVersionInterface;

/**
 * DataTables version interface test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests
 */
class DataTablesVersionInterfaceTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $this->assertEquals("1.10.18", DataTablesVersionInterface::DATATABLES_VERSION);
        $this->assertEquals("2.3.2", DataTablesVersionInterface::DATATABLES_AUTOFILL_VERSION);
        $this->assertEquals("1.5.4", DataTablesVersionInterface::DATATABLES_BUTTONS_VERSION);
        $this->assertEquals("1.5.0", DataTablesVersionInterface::DATATABLES_COLREORDER_VERSION);
        $this->assertEquals("3.2.5", DataTablesVersionInterface::DATATABLES_FIXEDCOLUMNS_VERSION);
        $this->assertEquals("3.1.4", DataTablesVersionInterface::DATATABLES_FIXEDHEADER_VERSION);
        $this->assertEquals("2.5.0", DataTablesVersionInterface::DATATABLES_JSZIP_VERSION);
        $this->assertEquals("2.5.0", DataTablesVersionInterface::DATATABLES_KEYTABLE_VERSION);
        $this->assertEquals("0.1.36", DataTablesVersionInterface::DATATABLES_PDFMAKE_VERSION);
        $this->assertEquals("2.2.2", DataTablesVersionInterface::DATATABLES_RESPONSIVE_VERSION);
        $this->assertEquals("1.1.0", DataTablesVersionInterface::DATATABLES_ROWGROUP_VERSION);
        $this->assertEquals("1.2.4", DataTablesVersionInterface::DATATABLES_ROWREORDER_VERSION);
        $this->assertEquals("1.5.0", DataTablesVersionInterface::DATATABLES_SCROLLER_VERSION);
        $this->assertEquals("1.2.6", DataTablesVersionInterface::DATATABLES_SELECT_VERSION);
    }
}

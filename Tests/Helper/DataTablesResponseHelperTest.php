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

use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesResponseInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Helper\DataTablesResponseHelper;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractFrameworkTestCase;

/**
 * DataTables response helper test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Helper
 * @final
 */
final class DataTablesResponseHelperTest extends AbstractFrameworkTestCase {

    /**
     * Tests the dtRows() method.
     *
     * @@return void
     */
    public function testDtRows() {

        $res = [
            DataTablesResponseInterface::DATATABLES_ROW_ATTR,
            DataTablesResponseInterface::DATATABLES_ROW_CLASS,
            DataTablesResponseInterface::DATATABLES_ROW_DATA,
            DataTablesResponseInterface::DATATABLES_ROW_ID,
        ];
        $this->assertEquals($res, DataTablesResponseHelper::dtRows());
    }

}

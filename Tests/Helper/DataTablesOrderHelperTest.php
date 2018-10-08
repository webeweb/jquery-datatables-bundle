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

use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesOrderInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Helper\DataTablesOrderHelper;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractFrameworkTestCase;

/**
 * DataTables order helper test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Helper
 * @final
 */
final class DataTablesOrderHelperTest extends AbstractFrameworkTestCase {

    /**
     * Tests the dtDirs() method.
     *
     * @return void
     */
    public function testDtDirs() {

        $res = [
            DataTablesOrderInterface::DATATABLES_DIR_ASC,
            DataTablesOrderInterface::DATATABLES_DIR_DESC,
        ];
        $this->assertEquals($res, DataTablesOrderHelper::dtDirs());
    }

}

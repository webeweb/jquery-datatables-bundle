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

use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesRequestInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Helper\DataTablesRequestHelper;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractFrameworkTestCase;

/**
 * DataTables request helper test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Helper
 * @final
 */
final class DataTablesRequestHelperTest extends AbstractFrameworkTestCase {

    /**
     * Tests the dtParameters() method.
     *
     * @return void
     */
    public function testDtParameters() {

        $res = [
            DataTablesRequestInterface::DATATABLES_PARAMETER_COLUMNS,
            DataTablesRequestInterface::DATATABLES_PARAMETER_DRAW,
            DataTablesRequestInterface::DATATABLES_PARAMETER_LENGTH,
            DataTablesRequestInterface::DATATABLES_PARAMETER_ORDER,
            DataTablesRequestInterface::DATATABLES_PARAMETER_SEARCH,
            DataTablesRequestInterface::DATATABLES_PARAMETER_START,
        ];
        $this->assertEquals($res, DataTablesRequestHelper::dtParameters());
    }

}

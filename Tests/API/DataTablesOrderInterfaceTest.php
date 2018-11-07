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

use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesOrderInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractFrameworkTestCase;

/**
 * DataTables order interface test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\API
 */
class DataTablesOrderInterfaceTest extends AbstractFrameworkTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $this->assertEquals("asc", DataTablesOrderInterface::DATATABLES_DIR_ASC);
        $this->assertEquals("desc", DataTablesOrderInterface::DATATABLES_DIR_DESC);

        $this->assertEquals("column", DataTablesOrderInterface::DATATABLES_PARAMETER_COLUMN);
        $this->assertEquals("dir", DataTablesOrderInterface::DATATABLES_PARAMETER_DIR);
    }

}

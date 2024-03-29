<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Model;

use WBW\Bundle\DataTablesBundle\Model\DataTablesOrderInterface;
use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;

/**
 * DataTables order interface test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Api
 */
class DataTablesOrderInterfaceTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("asc", DataTablesOrderInterface::DATATABLES_DIR_ASC);
        $this->assertEquals("desc", DataTablesOrderInterface::DATATABLES_DIR_DESC);

        $this->assertEquals("column", DataTablesOrderInterface::DATATABLES_PARAMETER_COLUMN);
        $this->assertEquals("dir", DataTablesOrderInterface::DATATABLES_PARAMETER_DIR);
    }
}

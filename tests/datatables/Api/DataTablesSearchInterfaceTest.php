<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Api;

use WBW\Bundle\DataTablesBundle\Api\DataTablesSearchInterface;
use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;

/**
 * DataTables search interface test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Api
 */
class DataTablesSearchInterfaceTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("regex", DataTablesSearchInterface::DATATABLES_PARAMETER_REGEX);
        $this->assertEquals("value", DataTablesSearchInterface::DATATABLES_PARAMETER_VALUE);
    }
}
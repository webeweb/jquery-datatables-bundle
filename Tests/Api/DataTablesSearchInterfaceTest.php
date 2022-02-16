<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Api;

use WBW\Bundle\JQuery\DataTablesBundle\Api\DataTablesSearchInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractTestCase;

/**
 * DataTables search interface test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Api
 */
class DataTablesSearchInterfaceTest extends AbstractTestCase {

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("regex", DataTablesSearchInterface::DATATABLES_PARAMETER_REGEX);
        $this->assertEquals("value", DataTablesSearchInterface::DATATABLES_PARAMETER_VALUE);
    }
}

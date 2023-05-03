<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Exception;

use WBW\Bundle\JQuery\DataTablesBundle\Exception\BadDataTablesColumnException;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractTestCase;

/**
 * Bad DataTables column exception test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Exception
 */
class BadDataTablesColumnExceptionTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new BadDataTablesColumnException("exception");

        $this->assertEquals('The DataTables column with name "exception" does not exist', $obj->getMessage());
    }
}

<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\DataTablesBundle\Tests\Exception;

use WBW\Bundle\DataTablesBundle\Exception\BadDataTablesColumnException;
use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;

/**
 * Bad DataTables column exception test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Exception
 */
class BadDataTablesColumnExceptionTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new BadDataTablesColumnException("test");

        $this->assertEquals('The DataTables column with name "test" does not exist', $obj->getMessage());
    }
}

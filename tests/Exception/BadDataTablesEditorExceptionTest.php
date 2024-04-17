<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Exception;

use Exception;
use WBW\Bundle\DataTablesBundle\Exception\BadDataTablesEditorException;
use WBW\Bundle\DataTablesBundle\Provider\DataTablesEditorInterface;
use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;

/**
 * Bad DataTables editor exception test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Exception
 */
class BadDataTablesEditorExceptionTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new BadDataTablesEditorException(new Exception());

        $this->assertEquals('The DataTables editor "Exception" must implement ' . DataTablesEditorInterface::class, $obj->getMessage());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__constructWithNull(): void {

        $obj = new BadDataTablesEditorException(null);

        $this->assertEquals("The DataTables editor is null", $obj->getMessage());
    }
}

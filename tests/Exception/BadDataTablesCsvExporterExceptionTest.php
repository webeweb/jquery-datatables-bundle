<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Exception;

use Exception;
use WBW\Bundle\DataTablesBundle\Exception\BadDataTablesCsvExporterException;
use WBW\Bundle\DataTablesBundle\Provider\DataTablesCsvExporterInterface;
use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;

/**
 * Bad DataTables CSV exporter exception test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Exception
 */
class BadDataTablesCsvExporterExceptionTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new BadDataTablesCsvExporterException(new Exception());

        $this->assertEquals('The DataTables CSV exporter "Exception" must implement ' . DataTablesCsvExporterInterface::class, $obj->getMessage());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__constructWithNull(): void {

        $obj = new BadDataTablesCsvExporterException(null);

        $this->assertEquals("The DataTables CSV exporter is null", $obj->getMessage());
    }
}

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

namespace WBW\Bundle\DataTablesBundle\Tests\Helper;

use Symfony\Component\HttpFoundation\Request;
use Throwable;
use WBW\Bundle\DataTablesBundle\Helper\DataTablesExportHelper;
use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;

/**
 * DataTables export helper test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Helper
 */
class DataTablesExportHelperTest extends AbstractTestCase {

    /**
     * Test convert()
     *
     * @return void
     */
    public function testConvert(): void {

        $arg = ["é"];
        $exp = ["é"];

        $this->assertEquals($exp, DataTablesExportHelper::convert($arg));
    }

    /**
     * Test convert()
     *
     * @return void
     */
    public function testConvertWithWindows(): void {

        $arg = ["é"];
        $exp = ["\xe9"];

        $this->assertEquals($exp, DataTablesExportHelper::convert($arg, true));
    }

    /**
     * Test isWindows()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testIsWindows(): void {

        // Set a Request mock.
        $request = new Request([], [], [], [], [], ["HTTP_USER_AGENT" => "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:64.0) Gecko/20100101 Firefox/64.0"]);

        $this->assertTrue(DataTablesExportHelper::isWindows($request));
    }

    /**
     * Test isWindows()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testIsWindowsWithLinuxUserAgent(): void {

        // Set a Request mock.
        $request = new Request([], [], [], [], [], ["HTTP_USER_AGENT" => "Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko/20100101 Firefox/64.0"]);

        $this->assertFalse(DataTablesExportHelper::isWindows($request));
    }

    /**
     * Test isWindows()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testIsWindowsWithoutUserAgent(): void {

        // Set a Request mock.
        $request = new Request();

        $this->assertFalse(DataTablesExportHelper::isWindows($request));
    }
}

<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Helper;

use Symfony\Component\HttpFoundation\Request;
use WBW\Bundle\JQuery\DataTablesBundle\Helper\DataTablesExportHelper;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractTestCase;

/**
 * DataTables export helper test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Helper
 */
class DataTablesExportHelperTest extends AbstractTestCase {

    /**
     * Test convert()
     *
     * @return void
     */
    public function testConvert(): void {

        $arg = ["é"];
        $res = ["é"];
        $this->assertEquals($res, DataTablesExportHelper::convert($arg));
    }

    /**
     * Test convert()
     *
     * @return void
     */
    public function testConvertWithWindows(): void {

        $arg = ["é"];
        $res = ["\xe9"];
        $this->assertEquals($res, DataTablesExportHelper::convert($arg, true));
    }

    /**
     * Test isWindows()
     *
     * @return void
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
     */
    public function testIsWindowsWithoutUserAgent(): void {

        // Set a Request mock.
        $request = new Request();

        $this->assertFalse(DataTablesExportHelper::isWindows($request));
    }
}

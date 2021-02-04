<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\API;

use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesSearch;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractTestCase;

/**
 * DataTables search test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\API
 */
class DataTablesSearchTest extends AbstractTestCase {

    /**
     * Tests the setRegex() method.
     *
     * @return void
     */
    public function testSetRegex(): void {

        $obj = new DataTablesSearch();

        $obj->setRegex(true);
        $this->assertTrue($obj->getRegex());
    }

    /**
     * Tests the setValue() method.
     *
     * @return void
     */
    public function testSetValue(): void {

        $obj = new DataTablesSearch();

        $obj->setValue("value");
        $this->assertEquals("value", $obj->getValue());
    }

    /**
     * Tests the __construct() method.
     */
    public function test__construct(): void {

        $obj = new DataTablesSearch();

        $this->assertFalse($obj->getRegex());
        $this->assertEquals("", $obj->getValue());
    }
}

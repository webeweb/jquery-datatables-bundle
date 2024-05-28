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

namespace WBW\Bundle\DataTablesBundle\Tests\Model;

use WBW\Bundle\DataTablesBundle\Model\DataTablesSearch;
use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;

/**
 * DataTables search test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Model
 */
class DataTablesSearchTest extends AbstractTestCase {

    /**
     * Test setRegex()
     *
     * @return void
     */
    public function testSetRegex(): void {

        $obj = new DataTablesSearch();

        $obj->setRegex(true);
        $this->assertTrue($obj->getRegex());
    }

    /**
     * Test setValue()
     *
     * @return void
     */
    public function testSetValue(): void {

        $obj = new DataTablesSearch();

        $obj->setValue("value");
        $this->assertEquals("value", $obj->getValue());
    }

    /**
     * Test __construct()
     */
    public function test__construct(): void {

        $obj = new DataTablesSearch();

        $this->assertFalse($obj->getRegex());
        $this->assertEquals("", $obj->getValue());
    }
}

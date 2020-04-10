<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\API;

use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesWrapperInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\API\TestDataTablesWrapperTrait;

/**
 * DataTables wrapper trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\API
 */
class DataTablesWrapperTraitTest extends AbstractTestCase {

    /**
     * Tests the setWrapper() method.
     *
     * @return void
     */
    public function testSetWrapper() {

        // Set a DataTables wrapper mock.
        $wrapper = $this->getMockBuilder(DataTablesWrapperInterface::class)->getMock();

        $obj = new TestDataTablesWrapperTrait();

        $obj->setWrapper($wrapper);
        $this->assertSame($wrapper, $obj->getWrapper());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct() {

        $obj = new TestDataTablesWrapperTrait();

        $this->assertNull($obj->getWrapper());
    }
}

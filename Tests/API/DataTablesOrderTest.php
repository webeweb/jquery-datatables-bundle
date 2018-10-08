<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\API;

use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesOrder;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractFrameworkTestCase;

/**
 * DataTables order test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\API
 * @final
 */
final class DataTablesOrderTest extends AbstractFrameworkTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstrutor() {

        $obj = new DataTablesOrder();

        $this->assertNull($obj->getColumn());
        $this->assertNull($obj->getDir());
    }

}

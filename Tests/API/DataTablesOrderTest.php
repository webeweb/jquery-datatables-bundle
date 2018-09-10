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
use WBW\Bundle\JQuery\DataTablesBundle\Tests\Cases\AbstractJQueryDataTablesFrameworkTestCase;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\App\TestFixtures;

/**
 * DataTables order test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\API
 * @final
 */
final class DataTablesOrderTest extends AbstractJQueryDataTablesFrameworkTestCase {

    /**
     * Tests the parse() method.
     *
     * @return void
     */
    public function testParse() {

        // Get the POST data.
        $postData = TestFixtures::getPostData();

        // Set the POST data.
        $postData["order"][0]["column"] = "0";
        $postData["order"][0]["dir"]    = "asc";

        // ===
        $res = DataTablesOrder::parse($postData["order"]);
        $this->assertCount(1, $res);
        $this->assertEquals(0, $res[0]->getColumn());
        $this->assertEquals("ASC", $res[0]->getDir());

        // Set an invalid order.
        $postData["order"][0]["column"] = "0";
        $postData["order"][0]["dir"]    = "exception";

        $res1 = DataTablesOrder::parse($postData["order"]);
        $this->assertCount(1, $res1);
        $this->assertEquals(0, $res1[0]->getColumn());
        $this->assertEquals("ASC", $res1[0]->getDir());

        // Set an invalid order.
        $postData["order"][0]["column"] = "0";
        unset($postData["order"][0]["dir"]);

        $res2 = DataTablesOrder::parse($postData["order"]);
        $this->assertCount(0, $res2);

        // Set an invalid order.
        unset($postData["order"][0]["column"]);
        unset($postData["order"][0]["dir"]);

        $res3 = DataTablesOrder::parse($postData["order"]);
        $this->assertCount(0, $res3);
    }

}

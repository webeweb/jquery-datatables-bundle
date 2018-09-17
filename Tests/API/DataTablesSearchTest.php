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

use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesSearch;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractJQueryDataTablesFrameworkTestCase;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\TestFixtures;

/**
 * DataTables search test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\API
 * @final
 */
final class DataTablesSearchTest extends AbstractJQueryDataTablesFrameworkTestCase {

    /**
     * Tests the parse() method.
     *
     * @return void
     */
    public function testParse() {

        // Get the POST data.
        $postData = TestFixtures::getPOSTData();

        // Set the POST data.
        $postData["search"]["regex"] = "true";
        $postData["search"]["value"] = "value";

        // ===
        $res = DataTablesSearch::parse($postData["search"]);
        $this->assertTrue($res->getRegex());
        $this->assertEquals("value", $res->getValue());

        // Set an invalid search.
        $postData["search"]["regex"] = "false";
        unset($postData["search"]["value"]);

        $res1 = DataTablesSearch::parse($postData["search"]);
        $this->assertFalse($res1->getRegex());
        $this->assertEquals("", $res1->getValue());

        // Set an invalid search.
        unset($postData["search"]["regex"]);
        unset($postData["search"]["value"]);

        $res2 = DataTablesSearch::parse($postData["search"]);
        $this->assertFalse($res2->getRegex());
        $this->assertEquals("", $res2->getValue());
    }

}

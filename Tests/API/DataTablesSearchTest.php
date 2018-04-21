<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DatatablesBundle\Tests\API;

use PHPUnit_Framework_TestCase;
use WBW\Bundle\JQuery\DatatablesBundle\API\DataTablesSearch;
use WBW\Bundle\JQuery\DatatablesBundle\Tests\AbstractFrameworkTestCase;

/**
 * DataTables search test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DatatablesBundle\Tests\API
 * @final
 */
final class DataTablesSearchTest extends PHPUnit_Framework_TestCase {

    /**
     * Tests the parse() method.
     *
     * @return void
     */
    public function testParse() {

        // Get the POST data.
        $postData = AbstractFrameworkTestCase::getPostData();

        // Set the POST data.
        $postData["search"]["regex"] = "true";
        $postData["search"]["value"] = "value";

        //
        $res = DataTablesSearch::parse($postData["search"]);
        $this->assertTrue($res->getRegex());
        $this->assertEquals("value", $res->getValue());

        // Set an invalid search.
        $postData["search"]["regex"] = "false";
        unset($postData["search"]["value"]);

        $res1 = DataTablesSearch::parse($postData["search"]);
        $this->assertNull($res1);

        // Set an invalid search.
        unset($postData["search"]["regex"]);
        unset($postData["search"]["value"]);

        $res2 = DataTablesSearch::parse($postData["search"]);
        $this->assertNull($res2);
    }

}

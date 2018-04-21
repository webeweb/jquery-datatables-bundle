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
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstructor() {

        $obj = new DataTablesSearch();

        $this->assertNull($obj->getRegex());
        $this->assertNull($obj->getValue());
    }

    /**
     * Tests the parse() method.
     *
     * @return void
     */
    public function testParse() {

        // Get the POST data.
        $postData = AbstractFrameworkTestCase::getPostData();

        //
        $res0 = DataTablesSearch::parse($postData["search"]);
        $this->assertFalse($res0->getRegex());
        $this->assertEquals("", $res0->getValue());

        // Set a different search.
        $postData["search"]["regex"] = "true";
        $postData["search"]["value"] = "value";

        $res1 = DataTablesSearch::parse($postData["search"]);
        $this->assertTrue($res1->getRegex());
        $this->assertEquals("value", $res1->getValue());

        // Set an invalid search.
        $postData["search"]["regex"] = "false";
        unset($postData["search"]["value"]);

        $res2 = DataTablesSearch::parse($postData["search"]);
        $this->assertNull($res2);

        // Set an invalid search.
        unset($postData["search"]["regex"]);
        unset($postData["search"]["value"]);

        $res3 = DataTablesSearch::parse($postData["search"]);
        $this->assertNull($res3);
    }

    /**
     * Tests the setRegex() method.
     *
     * @return void
     */
    public function testSetRegex() {

        $obj = new DataTablesSearch();

        $obj->setRegex(true);
        $this->assertTrue($obj->getRegex());
    }

    /**
     * Tests the setValue() method.
     *
     * @return void
     */
    public function testSetValue() {

        $obj = new DataTablesSearch();

        $obj->setValue("value");
        $this->assertEquals("value", $obj->getValue());
    }

}

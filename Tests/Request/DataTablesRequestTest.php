<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DatatablesBundle\Tests\Request;

use PHPUnit_Framework_TestCase;
use Symfony\Component\HttpFoundation\Request;
use WBW\Bundle\JQuery\DatatablesBundle\Request\DataTablesRequest;

/**
 * DataTables request test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DatatablesBundle\Tests\Request
 * @final
 */
final class DataTablesRequestTest extends PHPUnit_Framework_TestCase {

    /**
     * Get a array.
     *
     * @return array Returns the array.
     */
    public static function getArray() {

        // Initialize.
        $output = [];

        // ID
        $output["columns"][0]["data"]            = "id";
        $output["columns"][0]["name"]            = "id";
        $output["columns"][0]["orderable"]       = "true";
        $output["columns"][0]["search"]["regex"] = "false";
        $output["columns"][0]["search"]["value"] = "";
        $output["columns"][0]["searchable"]      = "";

        // Firstname
        $output["columns"][1]["data"]            = "firstname";
        $output["columns"][1]["name"]            = "firstname";
        $output["columns"][1]["orderable"]       = "true";
        $output["columns"][1]["search"]["regex"] = "false";
        $output["columns"][1]["search"]["value"] = "";
        $output["columns"][1]["searchable"]      = "";

        // Lastname
        $output["columns"][2]["data"]            = "lastname";
        $output["columns"][2]["name"]            = "lastname";
        $output["columns"][2]["orderable"]       = "true";
        $output["columns"][2]["search"]["regex"] = "false";
        $output["columns"][2]["search"]["value"] = "";
        $output["columns"][2]["searchable"]      = "";

        //
        $output["draw"]   = "1";
        $output["length"] = "10";

        // Order
        $output["order"][0]["column"] = "0";
        $output["order"][0]["dir"]    = "asc";

        // Search
        $output["search"]["regex"] = "false";
        $output["search"]["value"] = "";

        // Start
        $output["start"] = "0";

        // Return
        return $output;
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstructor() {

        $obj = DataTablesRequest::newInstance(new Request());

        $this->assertEquals([], $obj->getColumns());
        $this->assertEquals(0, $obj->getDraw());
        $this->assertEquals(0, $obj->getLength());
        $this->assertEquals([], $obj->getOrder());
        $this->assertEquals([], $obj->getSearch());
        $this->assertEquals(0, $obj->getStart());
    }

    /**
     * Tests the getColumn() method.
     *
     * @return void
     */
    public function testGetColumn() {

        $query      = [];
        $post       = self::getArray();
        $attributes = [];
        $cookies    = [];
        $files      = [];
        $server     = ["REQUEST_METHOD" => "POST"];

        $obj = DataTablesRequest::newInstance(new Request($query, $post, $attributes, $cookies, $files, $server));

        $this->assertCount(3, $obj->getColumns());
        $this->assertEquals(1, $obj->getDraw());
        $this->assertEquals(10, $obj->getLength());
        $this->assertCount(1, $obj->getOrder());
        $this->assertCount(2, $obj->getSearch());
        $this->assertEquals(0, $obj->getStart());

        $this->assertNotNull($obj->getColumn("id"));
        $this->assertNotNull($obj->getColumn("firstname"));
        $this->assertNotNull($obj->getColumn("lastname"));
        $this->assertNull($obj->getColumn("exceptions"));
    }

    /**
     * Tests the setDraw() method.
     *
     * @return void
     */
    public function testSetDraw() {

        $obj = DataTablesRequest::newInstance(new Request());

        $obj->setDraw(1);
        $this->assertEquals(1, $obj->getDraw());
    }

}

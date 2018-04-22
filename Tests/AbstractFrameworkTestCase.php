<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DatatablesBundle\Tests;

use Symfony\Component\HttpFoundation\Request;
use WBW\Bundle\BootstrapBundle\Tests\AbstractFrameworkTestCase as BaseFrameworkTestCase;
use WBW\Bundle\JQuery\DatatablesBundle\API\DataTablesRequest;
use WBW\Bundle\JQuery\DatatablesBundle\API\DataTablesResponse;
use WBW\Bundle\JQuery\DatatablesBundle\API\DataTablesWrapper;

/**
 * Abstract framework test case.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DatatablesBundle\Tests
 * @abstract
 */
abstract class AbstractFrameworkTestCase extends BaseFrameworkTestCase {

    /**
     * DataTables request.
     *
     * @var DataTablesRequest
     */
    protected $dataTablesRequest;

    /**
     * DataTables response.
     *
     * @var DataTablesResponse
     */
    protected $dataTablesResponse;

    /**
     * DataTables wrapper.
     *
     * @var DataTablesWrapper
     */
    protected $dataTablesWrapper;

    /**
     * Request.
     *
     * @var Request.
     */
    protected $request;

    /**
     * Get the POST data.
     *
     * @return array Returns the POST data.
     */
    public static function getPostData() {

        // Initialize.
        $output = [];

        // Name
        $output["columns"][0]["data"]            = "name";
        $output["columns"][0]["name"]            = "Name";
        $output["columns"][0]["orderable"]       = "true";
        $output["columns"][0]["search"]["regex"] = "false";
        $output["columns"][0]["search"]["value"] = "";
        $output["columns"][0]["searchable"]      = "true";

        // Position
        $output["columns"][1]["data"]            = "position";
        $output["columns"][1]["name"]            = "Position";
        $output["columns"][1]["orderable"]       = "true";
        $output["columns"][1]["search"]["regex"] = "false";
        $output["columns"][1]["search"]["value"] = "";
        $output["columns"][1]["searchable"]      = "true";

        // Office
        $output["columns"][2]["data"]            = "office";
        $output["columns"][2]["name"]            = "Office";
        $output["columns"][2]["orderable"]       = "true";
        $output["columns"][2]["search"]["regex"] = "false";
        $output["columns"][2]["search"]["value"] = "";
        $output["columns"][2]["searchable"]      = "true";

        // Age
        $output["columns"][3]["data"]            = "age";
        $output["columns"][3]["name"]            = "Age";
        $output["columns"][3]["orderable"]       = "true";
        $output["columns"][3]["search"]["regex"] = "false";
        $output["columns"][3]["search"]["value"] = "";
        $output["columns"][3]["searchable"]      = "true";

        // Start date
        $output["columns"][4]["data"]            = "startDate";
        $output["columns"][4]["name"]            = "Start date";
        $output["columns"][4]["orderable"]       = "true";
        $output["columns"][4]["search"]["regex"] = "false";
        $output["columns"][4]["search"]["value"] = "";
        $output["columns"][4]["searchable"]      = "true";

        // Salary
        $output["columns"][5]["data"]            = "salary";
        $output["columns"][5]["name"]            = "Salary";
        $output["columns"][5]["orderable"]       = "true";
        $output["columns"][5]["search"]["regex"] = "false";
        $output["columns"][5]["search"]["value"] = "";
        $output["columns"][5]["searchable"]      = "true";

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
     * {@inheritdoc}
     */
    protected function setUp() {
        parent::setUp();

        // Set a DataTables wrappper mock.
        $this->dataTablesWrapper = new DataTablesWrapper("prefix", "POST", "route");

        // Set a DataTables request mock.
        $this->dataTablesRequest = DataTablesRequest::parse($this->dataTablesWrapper, new Request());

        // Set a DataTables response mock.
        $this->dataTablesResponse = DataTablesResponse::parse($this->dataTablesWrapper, $this->dataTablesRequest);

        // Set a Request mock.
        $this->request = new Request([], self::getPostData(), [], [], [], ["REQUEST_METHOD" => "POST"]);
    }

}

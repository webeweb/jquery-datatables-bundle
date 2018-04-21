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

        // ID
        $output["columns"][0]["data"]            = "id";
        $output["columns"][0]["name"]            = "id";
        $output["columns"][0]["orderable"]       = "true";
        $output["columns"][0]["search"]["regex"] = "false";
        $output["columns"][0]["search"]["value"] = "";
        $output["columns"][0]["searchable"]      = "";

        // Name
        $output["columns"][1]["data"]            = "name";
        $output["columns"][1]["name"]            = "name";
        $output["columns"][1]["orderable"]       = "true";
        $output["columns"][1]["search"]["regex"] = "false";
        $output["columns"][1]["search"]["value"] = "";
        $output["columns"][1]["searchable"]      = "";

        // Position
        $output["columns"][2]["data"]            = "position";
        $output["columns"][2]["name"]            = "position";
        $output["columns"][2]["orderable"]       = "true";
        $output["columns"][2]["search"]["regex"] = "false";
        $output["columns"][2]["search"]["value"] = "";
        $output["columns"][2]["searchable"]      = "";

        // Office
        $output["columns"][3]["data"]            = "office";
        $output["columns"][3]["name"]            = "office";
        $output["columns"][3]["orderable"]       = "true";
        $output["columns"][3]["search"]["regex"] = "false";
        $output["columns"][3]["search"]["value"] = "";
        $output["columns"][3]["searchable"]      = "";

        // Age
        $output["columns"][4]["data"]            = "age";
        $output["columns"][4]["name"]            = "age";
        $output["columns"][4]["orderable"]       = "true";
        $output["columns"][4]["search"]["regex"] = "false";
        $output["columns"][4]["search"]["value"] = "";
        $output["columns"][4]["searchable"]      = "";

        // Start date
        $output["columns"][5]["data"]            = "startDate";
        $output["columns"][5]["name"]            = "startDate";
        $output["columns"][5]["orderable"]       = "true";
        $output["columns"][5]["search"]["regex"] = "false";
        $output["columns"][5]["search"]["value"] = "";
        $output["columns"][5]["searchable"]      = "";

        // Salary
        $output["columns"][6]["data"]            = "salary";
        $output["columns"][6]["name"]            = "salary";
        $output["columns"][6]["orderable"]       = "true";
        $output["columns"][6]["search"]["regex"] = "false";
        $output["columns"][6]["search"]["value"] = "";
        $output["columns"][6]["searchable"]      = "";

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
        $this->dataTablesResponse = new DataTablesResponse($this->dataTablesWrapper, $this->dataTablesRequest);

        // Set a Request mock.
        $this->request = new Request([], self::getPostData(), [], [], [], ["REQUEST_METHOD" => "POST"]);
    }

}

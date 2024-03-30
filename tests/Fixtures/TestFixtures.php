<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Fixtures;

use WBW\Bundle\DataTablesBundle\Factory\DataTablesFactory;
use WBW\Bundle\DataTablesBundle\Model\DataTablesWrapperInterface;
use WBW\Bundle\DataTablesBundle\Tests\Fixtures\Provider\EmployeeDataTablesProvider;

/**
 * Test fixtures.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Fixtures\App
 */
class TestFixtures {

    /**
     * Get the POST data.
     *
     * @return array<string,mixed> Returns the POST data.
     */
    public static function getPostData(): array {

        $fixtures = [];

        // Name
        $fixtures["columns"][0]["data"]            = "name";
        $fixtures["columns"][0]["name"]            = "Name";
        $fixtures["columns"][0]["orderable"]       = "true";
        $fixtures["columns"][0]["search"]["regex"] = "false";
        $fixtures["columns"][0]["search"]["value"] = "";
        $fixtures["columns"][0]["searchable"]      = "true";

        // Position
        $fixtures["columns"][1]["data"]            = "position";
        $fixtures["columns"][1]["name"]            = "Position";
        $fixtures["columns"][1]["orderable"]       = "true";
        $fixtures["columns"][1]["search"]["regex"] = "false";
        $fixtures["columns"][1]["search"]["value"] = "";
        $fixtures["columns"][1]["searchable"]      = "true";

        // Office
        $fixtures["columns"][2]["data"]            = "office";
        $fixtures["columns"][2]["name"]            = "Office";
        $fixtures["columns"][2]["orderable"]       = "true";
        $fixtures["columns"][2]["search"]["regex"] = "false";
        $fixtures["columns"][2]["search"]["value"] = "";
        $fixtures["columns"][2]["searchable"]      = "true";

        // Age
        $fixtures["columns"][3]["data"]            = "age";
        $fixtures["columns"][3]["name"]            = "Age";
        $fixtures["columns"][3]["orderable"]       = "true";
        $fixtures["columns"][3]["search"]["regex"] = "false";
        $fixtures["columns"][3]["search"]["value"] = "";
        $fixtures["columns"][3]["searchable"]      = "true";

        // Start date
        $fixtures["columns"][4]["data"]            = "startDate";
        $fixtures["columns"][4]["name"]            = "Start date";
        $fixtures["columns"][4]["orderable"]       = "true";
        $fixtures["columns"][4]["search"]["regex"] = "false";
        $fixtures["columns"][4]["search"]["value"] = "";
        $fixtures["columns"][4]["searchable"]      = "true";

        // Salary
        $fixtures["columns"][5]["data"]            = "salary";
        $fixtures["columns"][5]["name"]            = "Salary";
        $fixtures["columns"][5]["orderable"]       = "true";
        $fixtures["columns"][5]["search"]["regex"] = "false";
        $fixtures["columns"][5]["search"]["value"] = "";
        $fixtures["columns"][5]["searchable"]      = "true";

        // Actions.
        $fixtures["columns"][6]["data"]            = "actions";
        $fixtures["columns"][6]["name"]            = "Actions";
        $fixtures["columns"][6]["orderable"]       = "false";
        $fixtures["columns"][6]["search"]["regex"] = "false";
        $fixtures["columns"][6]["search"]["value"] = "";
        $fixtures["columns"][6]["searchable"]      = "false";

        //
        $fixtures["draw"]   = "1";
        $fixtures["length"] = "10";

        // Order
        $fixtures["order"][0]["column"] = "0";
        $fixtures["order"][0]["dir"]    = "asc";

        // Search
        $fixtures["search"]["regex"] = "false";
        $fixtures["search"]["value"] = "";

        // Start
        $fixtures["start"] = "0";

        return $fixtures;
    }

    /**
     * Get a wrapper.
     *
     * @return DataTablesWrapperInterface Returns the wrapper.
     */
    public static function getWrapper(): DataTablesWrapperInterface {

        $fixture = DataTablesFactory::newWrapper("/datatables/employee/index", new EmployeeDataTablesProvider());

        $fixture->addColumn(DataTablesFactory::newColumn("name", "Name"));
        $fixture->addColumn(DataTablesFactory::newColumn("position", "Position"));
        $fixture->addColumn(DataTablesFactory::newColumn("office", "Office"));
        $fixture->addColumn(DataTablesFactory::newColumn("age", "Age"));
        $fixture->addColumn(DataTablesFactory::newColumn("startDate", "Start date"));
        $fixture->addColumn(DataTablesFactory::newColumn("salary", "Salary"));
        $fixture->addColumn(DataTablesFactory::newColumn("actions", "Actions")->setOrderable(false)->setSearchable(false));

        return $fixture;
    }
}

<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Helper;

use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesWrapper;
use WBW\Bundle\JQuery\DataTablesBundle\Helper\DataTablesHelper;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\Cases\AbstractJQueryDataTablesFrameworkTestCase;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\App\TestFixtures;

/**
 * DataTables helper test.
 *
 * @author Camille A. <camille@ingeneo.eu>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Helper
 */
final class DataTablesHelperTest extends AbstractJQueryDataTablesFrameworkTestCase {

    /**
     * Tests the getName() method.
     *
     * @return void
     */
    public function testGetName() {

        $this->assertEquals("dtemployee", DataTablesHelper::getName(new DataTablesWrapper("POST", "url", "employee")));
        $this->assertEquals("dtemployee", DataTablesHelper::getName(new DataTablesWrapper("POST", "url", "employee_")));
        $this->assertEquals("dtemployee", DataTablesHelper::getName(new DataTablesWrapper("POST", "url", "employee-")));
    }

    /**
     * Tests the getOptions() method.
     *
     * @return void
     */
    public function testGetOptions() {

        $obj = TestFixtures::getWrapper();

        $res = [
            "ajax"       => [
                "method" => "POST",
                "url"    => "/datatables/employee/index",
            ],
            "order"      => [],
            "columns"    => [
                ["cellType" => "td", "data" => "name", "name" => "Name"],
                ["cellType" => "td", "data" => "position", "name" => "Position"],
                ["cellType" => "td", "data" => "office", "name" => "Office"],
                ["cellType" => "td", "data" => "age", "name" => "Age"],
                ["cellType" => "td", "data" => "startDate", "name" => "Start date"],
                ["cellType" => "td", "data" => "salary", "name" => "Salary"],
                ["cellType" => "td", "data" => "actions", "name" => "Actions", "orderable" => false, "searchable" => false],
            ],
            "processing" => "true",
            "serverSide" => "true",
        ];
        $this->assertEquals($res, DataTablesHelper::getOptions($obj));
    }

}

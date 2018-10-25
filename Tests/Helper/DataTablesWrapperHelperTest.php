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

use Exception;
use WBW\Bundle\JQuery\DataTablesBundle\Factory\DataTablesFactory;
use WBW\Bundle\JQuery\DataTablesBundle\Helper\DataTablesWrapperHelper;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractFrameworkTestCase;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\TestFixtures;
use WBW\Library\Core\Exception\FileSystem\FileNotFoundException;

/**
 * DataTables wrapper helper test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Helper
 * @final
 */
final class DataTablesWrapperHelperTest extends AbstractFrameworkTestCase {

    /**
     * Tests the getLanguageURL() method.
     *
     * @return void
     */
    public function testGetLanguageURL() {


        $res = "/bundles/jquerydatatables/datatables-i18n-1.10.16/French.json";
        $this->assertEquals($res, DataTablesWrapperHelper::getLanguageURL("French"));
    }

    /**
     * Tests the getLanguageURL() method.
     *
     * @return void
     */
    public function testGetLanguageURLWithFileNotFoundException() {

        try {

            DataTablesWrapperHelper::getLanguageURL("exception");
        } catch (Exception $ex) {

            $this->assertInstanceOf(FileNotFoundException::class, $ex);
            $this->assertEquals("The file \"/bundles/jquerydatatables/datatables-i18n-1.10.16/exception.json\" is not found", $ex->getMessage());
        }
    }

    /**
     * Tests the getName() method.
     *
     * @return void
     */
    public function testGetName() {

        $this->assertEquals("dtemployee", DataTablesWrapperHelper::getName(DataTablesFactory::newWrapper("url", "employee")));
        $this->assertEquals("dtemployee", DataTablesWrapperHelper::getName(DataTablesFactory::newWrapper("url", "employee_")));
        $this->assertEquals("dtemployee", DataTablesWrapperHelper::getName(DataTablesFactory::newWrapper("url", "employee-")));
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
                "type" => "POST",
                "url"  => "/datatables/employee/index",
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
            "processing" => true,
            "serverSide" => true,
        ];
        $this->assertEquals($res, DataTablesWrapperHelper::getOptions($obj));
    }

}

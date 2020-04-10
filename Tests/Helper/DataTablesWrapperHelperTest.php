<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Helper;

use Exception;
use Symfony\Component\Filesystem\Exception\FileNotFoundException;
use WBW\Bundle\JQuery\DataTablesBundle\Factory\DataTablesFactory;
use WBW\Bundle\JQuery\DataTablesBundle\Helper\DataTablesWrapperHelper;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\TestFixtures;

/**
 * DataTables wrapper helper test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Helper
 */
class DataTablesWrapperHelperTest extends AbstractTestCase {

    /**
     * Tests the getLanguageUrl() method.
     *
     * @return void
     */
    public function testGetLanguageURLWithFileNotFoundException() {

        try {

            DataTablesWrapperHelper::getLanguageUrl("exception");
        } catch (Exception $ex) {

            $this->assertInstanceOf(FileNotFoundException::class, $ex);
            $this->assertEquals("File \"/bundles/wbwjquerydatatables/datatables-i18n/exception.json\" could not be found.", $ex->getMessage());
        }
    }

    /**
     * Tests the getLanguageUrl() method.
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testGetLanguageUrl() {

        $res = "/bundles/wbwjquerydatatables/datatables-i18n/French.json";
        $this->assertEquals($res, DataTablesWrapperHelper::getLanguageUrl("French"));
    }

    /**
     * Tests the getName() method.
     *
     * @return void
     */
    public function testGetName() {

        $this->dtProvider->expects($this->any())->method("getName")->willReturn("employee");
        $this->assertEquals("dtemployee", DataTablesWrapperHelper::getName(DataTablesFactory::newWrapper("url", $this->dtProvider)));

        $this->dtProvider->expects($this->any())->method("getName")->willReturn("employee_");
        $this->assertEquals("dtemployee", DataTablesWrapperHelper::getName(DataTablesFactory::newWrapper("url", $this->dtProvider)));

        $this->dtProvider->expects($this->any())->method("getName")->willReturn("employee-");
        $this->assertEquals("dtemployee", DataTablesWrapperHelper::getName(DataTablesFactory::newWrapper("url", $this->dtProvider)));
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

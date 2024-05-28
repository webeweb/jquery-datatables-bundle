<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\DataTablesBundle\Tests\Helper;

use Symfony\Component\Filesystem\Exception\FileNotFoundException;
use Symfony\Component\HttpFoundation\Request;
use Throwable;
use WBW\Bundle\DataTablesBundle\Factory\DataTablesFactory;
use WBW\Bundle\DataTablesBundle\Helper\DataTablesWrapperHelper;
use WBW\Bundle\DataTablesBundle\Provider\DataTablesProviderInterface;
use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\DataTablesBundle\Tests\Fixtures\TestFixtures;

/**
 * DataTables wrapper helper test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Helper
 */
class DataTablesWrapperHelperTest extends AbstractTestCase {

    /**
     * Test getLanguageUrl()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testGetLanguageUrl(): void {

        $exp = "/bundles/wbwdatatables/datatables-i18n/French.json";

        $this->assertEquals($exp, DataTablesWrapperHelper::getLanguageUrl("French"));
    }

    /**
     * Test getLanguageUrl()
     *
     * @return void
     */
    public function testGetLanguageUrlWithFileNotFoundException(): void {

        try {
            DataTablesWrapperHelper::getLanguageUrl("exception");
        } catch (Throwable $ex) {

            $this->assertInstanceOf(FileNotFoundException::class, $ex);
            $this->assertEquals('File "/bundles/wbwdatatables/datatables-i18n/exception.json" could not be found.', $ex->getMessage());
        }
    }

    /**
     * Test getName()
     *
     * @return void
     */
    public function testGetName(): void {

        // Set a DataTables provider mock.
        $dtProvider = $this->getMockBuilder(DataTablesProviderInterface::class)->getMock();

        $dtProvider->expects($this->any())->method("getName")->willReturn("employee");
        $this->assertEquals("dtemployee", DataTablesWrapperHelper::getName(DataTablesFactory::newWrapper("url", $dtProvider)));

        $dtProvider->expects($this->any())->method("getName")->willReturn("employee_");
        $this->assertEquals("dtemployee", DataTablesWrapperHelper::getName(DataTablesFactory::newWrapper("url", $dtProvider)));

        $dtProvider->expects($this->any())->method("getName")->willReturn("employee-");
        $this->assertEquals("dtemployee", DataTablesWrapperHelper::getName(DataTablesFactory::newWrapper("url", $dtProvider)));
    }

    /**
     * Test getOptions()
     *
     * @return void
     */
    public function testGetOptions(): void {

        $obj = TestFixtures::getWrapper();

        $exp = [
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

        $this->assertEquals($exp, DataTablesWrapperHelper::getOptions($obj));
    }

    /**
     * Test hasSearch()
     *
     * @return void
     */
    public function testHasSearch(): void {

        // Set a request mock.
        $request = new Request([], TestFixtures::getPostData(), [], [], [], ["REQUEST_METHOD" => "POST"]);

        $obj = TestFixtures::getWrapper();
        DataTablesFactory::parseWrapper($obj, $request);

        $this->assertFalse(DataTablesWrapperHelper::hasSearch($obj));
    }
}

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

namespace WBW\Bundle\DataTablesBundle\Tests\Factory;

use PHPUnit\Framework\MockObject\MockObject;
use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Security\Core\User\UserInterface;
use WBW\Bundle\DataTablesBundle\Model\DataTablesColumnInterface;
use WBW\Bundle\DataTablesBundle\Model\DataTablesOptionsInterface;
use WBW\Bundle\DataTablesBundle\Model\DataTablesOrderInterface;
use WBW\Bundle\DataTablesBundle\Model\DataTablesRequestInterface;
use WBW\Bundle\DataTablesBundle\Model\DataTablesResponseInterface;
use WBW\Bundle\DataTablesBundle\Model\DataTablesSearchInterface;
use WBW\Bundle\DataTablesBundle\Model\DataTablesWrapper;
use WBW\Bundle\DataTablesBundle\Model\DataTablesWrapperInterface;
use WBW\Bundle\DataTablesBundle\Provider\DataTablesProviderInterface;
use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\DataTablesBundle\Tests\Fixtures\Factory\TestDataTablesFactory;
use WBW\Bundle\DataTablesBundle\Tests\Fixtures\TestFixtures;

/**
 * DataTables factory test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Factory
 */
class DataTablesFactoryTest extends AbstractTestCase {

    /**
     * DataTables column.
     *
     * @var MockObject|DataTablesColumnInterface|null
     */
    private $column;

    /**
     * POST data.
     *
     * @var array<mixed>|null
     */
    private $postData;

    /**
     * DataTables wrapper.
     *
     * @var MockObject|DataTablesWrapperInterface|null
     */
    private $wrapper;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void {
        parent::setUp();

        /** @var DataTablesSearchInterface|null $search */
        $search = null;

        // Set a getSearch() and setSearch mocks.
        $getSearch = function() use (&$search) {
            return $search;
        };
        $setSearch = function($value) use (&$search) {
            $search = $value;
            return $this->column;
        };

        // Set a getColumn() mock.
        $getColumn = function(string $data) {
            return "name" === $data ? $this->column : null;
        };

        // Set a DataTables column mock.
        $this->column = $this->getMockBuilder(DataTablesColumnInterface::class)->getMock();
        $this->column->expects($this->any())->method("getData")->willReturn("name");
        $this->column->expects($this->any())->method("getName")->willReturn("Name");
        $this->column->expects($this->any())->method("getOrderable")->willReturn(true);
        $this->column->expects($this->any())->method("getSearch")->willReturnCallback($getSearch);
        $this->column->expects($this->any())->method("setSearch")->willReturnCallback($setSearch);

        // Set a DataTables wrapper mock.
        $this->wrapper = $this->getMockBuilder(DataTablesWrapperInterface::class)->getMock();
        $this->wrapper->expects($this->any())->method("getColumn")->willReturnCallback($getColumn);

        // Set a request mock.
        $this->postData = TestFixtures::getPostData();
    }

    /**
     * Test newColumn()
     *
     * @return void
     */
    public function testNewColumn(): void {

        $obj = TestDataTablesFactory::newColumn("data", "name");

        $this->assertInstanceOf(DataTablesColumnInterface::class, $obj);

        $this->assertEquals("data", $obj->getMapping()->getColumn());
        $this->assertEquals(DataTablesColumnInterface::DATATABLES_CELL_TYPE_TD, $obj->getCellType());
        $this->assertEquals("data", $obj->getData());
        $this->assertEquals("name", $obj->getName());
        $this->assertEquals("name", $obj->getTitle());
    }

    /**
     * Test newColumn()
     *
     * @return void
     */
    public function testNewColumnWithCellType(): void {

        $obj = TestDataTablesFactory::newColumn("data", "name", DataTablesColumnInterface::DATATABLES_CELL_TYPE_TH);

        $this->assertInstanceOf(DataTablesColumnInterface::class, $obj);

        $this->assertEquals("data", $obj->getMapping()->getColumn());
        $this->assertEquals(DataTablesColumnInterface::DATATABLES_CELL_TYPE_TH, $obj->getCellType());
        $this->assertEquals("data", $obj->getData());
        $this->assertEquals("name", $obj->getName());
        $this->assertEquals("name", $obj->getTitle());
    }

    /**
     * Test newOptions()
     *
     * @return void
     */
    public function testNewOptions(): void {

        $obj = TestDataTablesFactory::newOptions();

        $this->assertInstanceOf(DataTablesOptionsInterface::class, $obj);
    }

    /**
     * Test newResponse()
     *
     * @return void
     */
    public function testNewResponse(): void {

        // Set a DataTables request mock.
        $request = $this->getMockBuilder(DataTablesRequestInterface::class)->getMock();

        // Set the DataTables wrapper mock.
        $this->wrapper->expects($this->any())->method("getRequest")->willReturn($request);

        $obj = TestDataTablesFactory::newResponse($this->wrapper);

        $this->assertInstanceOf(DataTablesResponseInterface::class, $obj);

        $this->assertEquals([], $obj->getData());
        $this->assertEquals(0, $obj->getDraw());
        $this->assertNull($obj->getError());
        $this->assertEquals(0, $obj->getRecordsFiltered());
        $this->assertEquals(0, $obj->getRecordsTotal());
        $this->assertSame($this->wrapper, $obj->getWrapper());
        $this->assertEquals(0, $obj->rowsCount());
    }

    /**
     * Test newWrapper()
     *
     * @return void
     */
    public function testNewWrapper(): void {

        // Set a DataTables provider mock.
        $provider = $this->getMockBuilder(DataTablesProviderInterface::class)->getMock();
        $provider->expects($this->any())->method("getMethod")->willReturn("POST");
        $provider->expects($this->any())->method("getPrefix")->willReturn("");

        // Set a User mock.
        $user = $this->getMockBuilder(UserInterface::class)->getMock();

        $obj = TestDataTablesFactory::newWrapper("url", $provider, $user);

        $this->assertInstanceOf(DataTablesWrapperInterface::class, $obj);

        $this->assertEquals([], $obj->getColumns());
        $this->assertEquals("", $obj->getMapping()->getPrefix());
        $this->assertEquals("POST", $obj->getMethod());
        $this->assertNull($obj->getOptions());
        $this->assertTrue($obj->getProcessing());
        $this->assertSame($provider, $obj->getProvider());
        $this->assertNull($obj->getRequest());
        $this->assertNull($obj->getResponse());
        $this->assertTrue($obj->getServerSide());
        $this->assertEquals("url", $obj->getUrl());
        $this->assertSame($user, $obj->getUser());
    }

    /**
     * Test parseColumn()
     *
     * @return void
     */
    public function testParseColumn(): void {

        // Set the DataTables column mock.
        $this->column->expects($this->any())->method("getSearchable")->willReturn(true);

        // Set a raw column mock.
        $rawColumn = $this->postData["columns"][0];

        $obj = TestDataTablesFactory::parseColumn($rawColumn, $this->wrapper);

        $this->assertInstanceOf(DataTablesColumnInterface::class, $obj);

        $this->assertEquals("name", $obj->getData());
        $this->assertEquals("Name", $obj->getName());
        $this->assertTrue($obj->getOrderable());
        $this->assertFalse($obj->getSearch()->getRegex());
        $this->assertEquals("", $obj->getSearch()->getValue());
        $this->assertTrue($obj->getSearchable());
    }

    /**
     * Test parseColumn()
     *
     * @return void
     */
    public function testParseColumnWithBadData(): void {

        // Set a raw column mock.
        $rawColumn = $this->postData["columns"][0];

        $rawColumn["data"] = "exception";

        $obj = TestDataTablesFactory::parseColumn($rawColumn, $this->wrapper);

        $this->assertNull($obj);
    }

    /**
     * Test parseColumn()
     *
     * @return void
     */
    public function testParseColumnWithBadName(): void {

        // Set a raw column mock.
        $rawColumn = $this->postData["columns"][0];

        $rawColumn["name"] = "exception";

        $obj = TestDataTablesFactory::parseColumn($rawColumn, $this->wrapper);

        $this->assertNull($obj);
    }

    /**
     * Test parseColumn()
     *
     * @return void
     */
    public function testParseColumnWithNoData(): void {

        // Set a raw column mock.
        $rawColumn = $this->postData["columns"][0];

        unset($rawColumn["data"]);

        $obj = TestDataTablesFactory::parseColumn($rawColumn, $this->wrapper);

        $this->assertNull($obj);
    }

    /**
     * Test parseColumn()
     *
     * @return void
     */
    public function testParseColumnWithNoName(): void {

        // Set a raw column mock.
        $rawColumn = $this->postData["columns"][0];

        unset($rawColumn["name"]);

        $obj = TestDataTablesFactory::parseColumn($rawColumn, $this->wrapper);

        $this->assertNull($obj);
    }

    /**
     * Test parseColumn()
     *
     * @return void
     */
    public function testParseColumnWithNoSearchable(): void {

        // Set a raw column mock.
        $rawColumn = $this->postData["columns"][0];

        $obj = TestDataTablesFactory::parseColumn($rawColumn, $this->wrapper);

        $this->assertEquals("name", $obj->getData());
        $this->assertEquals("Name", $obj->getName());
        $this->assertTrue($obj->getOrderable());
        $this->assertFalse($obj->getSearch()->getRegex());
        $this->assertEquals("", $obj->getSearch()->getValue());
        $this->assertFalse($obj->getSearchable());
    }

    /**
     * Test parseColumns()
     *
     * @return void
     */
    public function testParseColumns(): void {

        // Set a raw columns mock.
        $rawColumns = $this->postData["columns"];

        $obj = TestDataTablesFactory::parseColumns($rawColumns, $this->wrapper);

        $this->assertCount(1, $obj);
    }

    /**
     * Test parseColumns()
     *
     * @return void
     */
    public function testParseColumnsWithNoData(): void {

        // Set a raw column mock.
        $rawColumns = $this->postData["columns"];

        unset($rawColumns[0]["data"]);

        $obj = TestDataTablesFactory::parseColumns($rawColumns, $this->wrapper);

        $this->assertCount(0, $obj);
    }

    /**
     * Test parseOrder()
     *
     * @return void
     */
    public function testParseOrder(): void {

        // Set a raw order mock.
        $rawOrder = $this->postData["order"][0];

        $obj = TestDataTablesFactory::parseOrder($rawOrder);

        $this->assertInstanceOf(DataTablesOrderInterface::class, $obj);

        $this->assertEquals(0, $obj->getColumn());
        $this->assertEquals("ASC", $obj->getDir());
    }

    /**
     * Test parseOrder()
     *
     * @return void
     */
    public function testParseOrderWithInvalidDir(): void {

        // Set a raw order mock.
        $rawOrder = $this->postData["order"][0];

        $rawOrder["dir"] = "exception";

        $obj = TestDataTablesFactory::parseOrder($rawOrder);

        $this->assertEquals(0, $obj->getColumn());
        $this->assertEquals("ASC", $obj->getDir());
    }

    /**
     * Test parseOrder()
     *
     * @return void
     */
    public function testParseOrderWithNoColumn(): void {

        // Set a raw order mock.
        $rawOrder = $this->postData["order"][0];

        unset($rawOrder["column"]);

        $obj = TestDataTablesFactory::parseOrder($rawOrder);

        $this->assertNull($obj->getColumn());
        $this->assertNull($obj->getDir());
    }

    /**
     * Test parseOrder()
     *
     * @return void
     */
    public function testParseOrderWithNoDir(): void {

        // Set a raw order mock.
        $rawOrder = $this->postData["order"][0];

        unset($rawOrder["dir"]);

        $obj = TestDataTablesFactory::parseOrder($rawOrder);

        $this->assertNull($obj->getColumn());
        $this->assertNull($obj->getDir());
    }

    /**
     * Test parseOrders()
     *
     * @return void
     */
    public function testParseOrders(): void {

        // Set a raw order mock.
        $rawOrders = $this->postData["order"];

        $obj = TestDataTablesFactory::parseOrders($rawOrders);

        $this->assertCount(1, $obj);
        $this->assertEquals(0, $obj[0]->getColumn());
        $this->assertEquals("ASC", $obj[0]->getDir());
    }

    /**
     * Test parseRequest()
     *
     * @return void
     */
    public function testParseRequestWithGet(): void {

        // Set a Request mock.
        $request = new Request(array_merge($this->postData, ["query" => "query"]), ["request" => "request"], [], [], [], ["REQUEST_METHOD" => "GET"]);

        $obj = TestDataTablesFactory::parseRequest($this->wrapper, $request);

        $this->assertInstanceOf(DataTablesRequestInterface::class, $obj);

        $this->assertEquals(1, $obj->getDraw());
        $this->assertEquals(10, $obj->getLength());
        $this->assertEquals("query", $obj->getQuery()->get("query"));
        $this->assertEquals("request", $obj->getRequest()->get("request"));
        $this->assertFalse($obj->getSearch()->getRegex());
        $this->assertEquals("", $obj->getSearch()->getValue());
        $this->assertEquals(0, $obj->getStart());

        $this->assertCount(1, $obj->getColumns());
    }

    /**
     * Test parseRequest()
     *
     * @return void
     */
    public function testParseRequestWithPost(): void {

        // Set a Request mock.
        $request = new Request(["query" => "query"], array_merge($this->postData, ["request" => "request"]), [], [], [], ["REQUEST_METHOD" => "POST"]);

        $obj = TestDataTablesFactory::parseRequest($this->wrapper, $request);

        $this->assertInstanceOf(DataTablesRequestInterface::class, $obj);

        $this->assertEquals(1, $obj->getDraw());
        $this->assertEquals(10, $obj->getLength());
        $this->assertEquals("query", $obj->getQuery()->get("query"));
        $this->assertEquals("request", $obj->getRequest()->get("request"));
        $this->assertFalse($obj->getSearch()->getRegex());
        $this->assertEquals("", $obj->getSearch()->getValue());
        $this->assertEquals(0, $obj->getStart());

        $this->assertCount(1, $obj->getColumns());
    }

    /**
     * Test parseSearch()
     *
     * @return void
     */
    public function testParseSearch(): void {

        // Set a raw search mock.
        $rawSearch = $this->postData["search"];

        $rawSearch["regex"] = "true";
        $rawSearch["value"] = "value";

        $obj = TestDataTablesFactory::parseSearch($rawSearch);

        $this->assertInstanceOf(DataTablesSearchInterface::class, $obj);

        $this->assertTrue($obj->getRegex());
        $this->assertEquals("value", $obj->getValue());
    }

    /**
     * Test parseSearch()
     *
     * @return void
     */
    public function testParseSearchWithNoRegex(): void {

        // Set a raw search mock.
        $rawSearch = $this->postData["search"];

        unset($rawSearch["regex"]);

        $obj = TestDataTablesFactory::parseSearch($rawSearch);

        $this->assertFalse($obj->getRegex());
        $this->assertEquals("", $obj->getValue());
    }

    /**
     * Test parseSearch()
     *
     * @return void
     */
    public function testParseSearchWithNoValue(): void {

        // Set a raw search mock.
        $rawSearch = $this->postData["search"];

        unset($rawSearch["value"]);

        $obj = TestDataTablesFactory::parseSearch($rawSearch);

        $this->assertFalse($obj->getRegex());
        $this->assertEquals("", $obj->getValue());
    }

    /**
     * Test parseWrapper()
     *
     * @return void
     */
    public function testParseWrapper(): void {

        // Set a Parameter bag mock.
        $parameterBag = $this->getMockBuilder(ParameterBag::class)->getMock();
        $parameterBag->expects($this->any())->method("keys")->willReturn([]);
        $parameterBag->expects($this->any())->method("all")->willReturn([]);
        $parameterBag->expects($this->any())->method("getInt")->willReturn(1);

        // TODO: Remove when dropping support for Symfony 6
        if (70000 <= Kernel::VERSION_ID) {

            $classname = "Symfony\\Component\\HttpFoundation\\InputBag";

            $parameterBag = new $classname();
        }

        // Set a Request mock.
        $request = $this->getMockBuilder(Request::class)->disableOriginalConstructor()->getMock();

        $request->query   = $parameterBag;
        $request->request = $parameterBag;

        $wrapper = new DataTablesWrapper();

        TestDataTablesFactory::parseWrapper($wrapper, $request);

        $this->assertNotNull($wrapper->getRequest());
        $this->assertNotNull($wrapper->getResponse());
    }
}

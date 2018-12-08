<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests;

use Symfony\Component\HttpFoundation\Request;
use WBW\Bundle\CoreBundle\Tests\AbstractTestCase as TestCase;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesColumnInterface;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesMappingInterface;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesOptionsInterface;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesOrderInterface;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesRequestInterface;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesResponseInterface;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesSearchInterface;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesWrapperInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Provider\DataTablesProviderInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\TestFixtures;

/**
 * Abstract framework test case.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests
 * @abstract
 */
abstract class AbstractTestCase extends TestCase {

    /**
     * DataTables column.
     *
     * @var DataTablesColumnInterface
     */
    protected $dtColumn;

    /**
     * DataTables mapping.
     *
     * @var DataTablesMappingInterface
     */
    protected $dtMapping;

    /**
     * DataTables option.
     *
     * @var DataTablesOptionsInterface
     */
    protected $dtOptions;

    /**
     * DataTables order.
     *
     * @var DataTablesOrderInterface
     */
    protected $dtOrder;

    /**
     * DataTables provider.
     *
     * @var DataTablesProviderInterface
     */
    protected $dtProvider;

    /**
     * DataTables request.
     *
     * @var DataTablesRequestInterface
     */
    protected $dtRequest;

    /**
     * DataTables response.
     *
     * @var DataTablesResponseInterface
     */
    protected $dtResponse;

    /**
     * DataTables search.
     *
     * @var DataTablesSearchInterface
     */
    protected $dtSearch;

    /**
     * DataTables wrapper.
     *
     * @var DataTablesWrapperInterface
     */
    protected $dtWrapper;

    /**
     * Request.
     *
     * @var Request
     */
    protected $request;

    /**
     * {@inheritdoc}
     */
    protected function setUp() {
        parent::setUp();

        // Set a Mapping mock.
        $this->dtMapping = $this->getMockBuilder(DataTablesMappingInterface::class)->getMock();
        $this->dtMapping->expects($this->any())->method("getColumn")->willReturn("column");
        $this->dtMapping->expects($this->any())->method("getPrefix")->willReturn("prefix");

        // Set a Column mock.
        $this->dtColumn = $this->getMockBuilder(DataTablesColumnInterface::class)->getMock();
        $this->dtColumn->expects($this->any())->method("getData")->willReturn("data");
        $this->dtColumn->expects($this->any())->method("getMapping")->willReturn($this->dtMapping);

        // Set an Options mock.
        $this->dtOptions = $this->getMockBuilder(DataTablesOptionsInterface::class)->getMock();

        // Set an Order mock.
        $this->dtOrder = $this->getMockBuilder(DataTablesOrderInterface::class)->getMock();

        // Set a Provider mock.
        $this->dtProvider = $this->getMockBuilder(DataTablesProviderInterface::class)->getMock();

        // Set a Request mock.
        $this->dtRequest = $this->getMockBuilder(DataTablesRequestInterface::class)->getMock();
        $this->dtRequest->expects($this->any())->method("getDraw")->willReturn(0);

        // Set a Response mock.
        $this->dtResponse = $this->getMockBuilder(DataTablesResponseInterface::class)->getMock();

        // Set a Search mock.
        $this->dtSearch = $this->getMockBuilder(DataTablesSearchInterface::class)->getMock();

        // Set a Wrapper mock.
        $this->dtWrapper = TestFixtures::getWrapper();


        // Set the request parameters.
        $get  = ["query" => "query"];
        $post = array_merge(TestFixtures::getPOSTData(), ["request" => "request"]);

        // Set a Request mock.
        $this->request = new Request($get, $post, [], [], [], ["REQUEST_METHOD" => "POST"]);
    }

}

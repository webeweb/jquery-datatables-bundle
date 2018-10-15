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
use WBW\Bundle\BootstrapBundle\Tests\AbstractFrameworkTestCase as BaseFrameworkTest;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesRequestInterface;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesResponse;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesResponseInterface;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesWrapper;
use WBW\Bundle\JQuery\DataTablesBundle\Factory\DataTablesFactory;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\TestFixtures;

/**
 * Abstract jQuery DataTables framework test case.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests
 * @abstract
 */
abstract class AbstractFrameworkTestCase extends BaseFrameworkTest {

    /**
     * DataTables request.
     *
     * @var DataTablesRequestInterface
     */
    protected $dataTablesRequest;

    /**
     * DataTables response.
     *
     * @var DataTablesResponseInterface
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
     * {@inheritdoc}
     */
    protected function setUp() {
        parent::setUp();

        // Set a DataTables wrappper mock.
        $this->dataTablesWrapper = new DataTablesWrapper("POST", "url", "name");
        $this->dataTablesWrapper->getMapping()->setPrefix("p");

        // Set a DataTables request mock.
        //$this->dataTablesRequest = DataTablesFactory::parseRequest($this->dataTablesWrapper, new Request());
        // Set a DataTables response mock.
        //$this->dataTablesResponse = DataTablesFactory::newResponse($this->dataTablesWrapper);
        // Set a Request mock.
        $this->request = new Request(["query" => "query"], array_merge(TestFixtures::getPOSTData(), ["request" => "request"]), [], [], [], ["REQUEST_METHOD" => "POST"]);
    }

}

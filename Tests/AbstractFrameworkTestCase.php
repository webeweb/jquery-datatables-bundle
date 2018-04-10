<?php

/*
 * Disclaimer: This source code is protected by copyright law and by
 * international conventions.
 *
 * Any reproduction or partial or total distribution of the source code, by any
 * means whatsoever, is strictly forbidden.
 *
 * Anyone not complying with these provisions will be guilty of the offense of
 * infringement and the penal sanctions provided for by law.
 *
 * © 2018 All rights reserved.
 */

namespace WBW\Bundle\JQuery\DatatablesBundle\Tests;

use Symfony\Component\HttpFoundation\Request;
use WBW\Bundle\BootstrapBundle\Tests\AbstractFrameworkTestCase as BaseFrameworkTestCase;
use WBW\Bundle\JQuery\DatatablesBundle\Request\DataTablesRequest;
use WBW\Bundle\JQuery\DatatablesBundle\Response\DataTablesResponse;
use WBW\Bundle\JQuery\DatatablesBundle\Wrapper\DataTablesWrapper;

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
     * {@inheritdoc}
     */
    protected function setUp() {
        parent::setUp();

        // Set a DataTables wrappper mock.
        $this->dataTablesWrapper = new DataTablesWrapper("prefix", "POST", "route");

        // Set a DataTables request mock.
        $this->dataTablesRequest = new DataTablesRequest($this->dataTablesWrapper, new Request());

        // Set a DataTables response mock.
        $this->dataTablesResponse = new DataTablesResponse($this->dataTablesRequest);
    }

}

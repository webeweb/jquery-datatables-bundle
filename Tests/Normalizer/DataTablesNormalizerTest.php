<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Normalizer;

use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesColumn;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesResponse;
use WBW\Bundle\JQuery\DataTablesBundle\Normalizer\DataTablesNormalizer;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractTestCase;

/**
 * DataTables normalizer test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Normalizer
 */
class DataTablesNormalizerTest extends AbstractTestCase {

    /**
     * Tests the normalizeColumn() method.
     *
     * @return void
     */
    public function testNormalizeColumn() {

        // Set a DataTables column mock.
        $arg = new DataTablesColumn();

        $arg->setClassname("classname");
        $arg->setContentPadding("contentPadding");
        $arg->setData("data");
        $arg->setDefaultContent("defaultContent");
        $arg->setName("name");
        $arg->setOrderData("orderData");
        $arg->setOrderDataType("orderDataType");
        $arg->setOrderSequence("asc");
        $arg->setOrderable(false);
        $arg->setSearchable(false);
        $arg->setType("string");
        $arg->setVisible(false);
        $arg->setWidth("width");

        $res = [
            "cellType"       => "td",
            "classname"      => "classname",
            "contentPadding" => "contentPadding",
            "data"           => "data",
            "defaultContent" => "defaultContent",
            "name"           => "name",
            "orderData"      => "orderData",
            "orderDataType"  => "orderDataType",
            "orderSequence"  => "asc",
            "orderable"      => false,
            "searchable"     => false,
            "type"           => "string",
            "visible"        => false,
            "width"          => "width",
        ];
        $this->assertEquals($res, DataTablesNormalizer::normalizeColumn($arg));
    }

    /**
     * Tests the normalizeColumn() method.
     *
     * @return void
     */
    public function testNormalizeColumnWithoutArguments() {

        // Set a DataTables column mock.
        $arg = new DataTablesColumn();

        $res = ["cellType" => "td"];
        $this->assertEquals($res, DataTablesNormalizer::normalizeColumn($arg));
    }

    /**
     * Tests the normalizeResponse() method.
     *
     * @return void
     */
    public function testNormalizeResponse() {

        // Set a DataTables response mock.
        $arg = new DataTablesResponse();

        $arg->setError("error");
        $arg->setRecordsFiltered(1);
        $arg->setRecordsTotal(2);

        $res = [
            "data"            => [],
            "draw"            => 0,
            "recordsFiltered" => 1,
            "recordsTotal"    => 2,
        ];
        $this->assertEquals($res, DataTablesNormalizer::normalizeResponse($arg));
    }
}

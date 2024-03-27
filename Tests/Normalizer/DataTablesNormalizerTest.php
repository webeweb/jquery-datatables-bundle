<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Normalizer;

use WBW\Bundle\DataTablesBundle\Model\DataTablesColumn;
use WBW\Bundle\DataTablesBundle\Model\DataTablesResponse;
use WBW\Bundle\DataTablesBundle\Normalizer\DataTablesNormalizer;
use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;

/**
 * DataTables normalizer test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Normalizer
 */
class DataTablesNormalizerTest extends AbstractTestCase {

    /**
     * Test normalizeColumn()
     *
     * @return void
     */
    public function testNormalizeColumn(): void {

        // Set a DataTables column mock.
        $arg = new DataTablesColumn();

        $arg->setClassname("classname");
        $arg->setContentPadding("contentPadding");
        $arg->setData("data");
        $arg->setDefaultContent("defaultContent");
        $arg->setName("name");
        $arg->setOrderData([1]);
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
            "orderData"      => [1],
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
     * Test normalizeColumn()
     *
     * @return void
     */
    public function testNormalizeColumnWithoutArguments(): void {

        // Set a DataTables column mock.
        $arg = new DataTablesColumn();

        $res = ["cellType" => "td"];
        $this->assertEquals($res, DataTablesNormalizer::normalizeColumn($arg));
    }

    /**
     * Test normalizeResponse()
     *
     * @return void
     */
    public function testNormalizeResponse(): void {

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

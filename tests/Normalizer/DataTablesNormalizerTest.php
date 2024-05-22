<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Normalizer;

use WBW\Bundle\DataTablesBundle\Model\DataTablesColumnInterface;
use WBW\Bundle\DataTablesBundle\Model\DataTablesResponseInterface;
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
        $arg = $this->getMockBuilder(DataTablesColumnInterface::class)->getMock();

        $arg->expects($this->any())->method("getCellType")->willReturn("td");
        $arg->expects($this->any())->method("getClassname")->willReturn("classname");
        $arg->expects($this->any())->method("getContentPadding")->willReturn("contentPadding");
        $arg->expects($this->any())->method("getData")->willReturn("data");
        $arg->expects($this->any())->method("getDefaultContent")->willReturn("defaultContent");
        $arg->expects($this->any())->method("getName")->willReturn("name");
        $arg->expects($this->any())->method("getOrderData")->willReturn([1]);
        $arg->expects($this->any())->method("getOrderDataType")->willReturn("orderDataType");
        $arg->expects($this->any())->method("getOrderSequence")->willReturn("asc");
        $arg->expects($this->any())->method("getOrderable")->willReturn(false);
        $arg->expects($this->any())->method("getSearchable")->willReturn(false);
        $arg->expects($this->any())->method("getType")->willReturn("string");
        $arg->expects($this->any())->method("getVisible")->willReturn(false);
        $arg->expects($this->any())->method("getWidth")->willReturn("width");

        $exp = [
            "cellType"       => "td",
            "className"      => "classname",
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

        $this->assertEquals($exp, DataTablesNormalizer::normalizeColumn($arg));
    }

    /**
     * Test normalizeColumn()
     *
     * @return void
     */
    public function testNormalizeColumnWithoutArguments(): void {

        // Set a DataTables column mock.
        $arg = $this->getMockBuilder(DataTablesColumnInterface::class)->getMock();

        $arg->expects($this->any())->method("getCellType")->willReturn("td");
        $arg->expects($this->any())->method("getOrderable")->willReturn(true);
        $arg->expects($this->any())->method("getSearchable")->willReturn(true);
        $arg->expects($this->any())->method("getVisible")->willReturn(true);

        $exp = ["cellType" => "td"];

        $this->assertEquals($exp, DataTablesNormalizer::normalizeColumn($arg));
    }

    /**
     * Test normalizeResponse()
     *
     * @return void
     */
    public function testNormalizeResponse(): void {

        // Set a DataTables response mock.
        $arg = $this->getMockBuilder(DataTablesResponseInterface::class)->getMock();

        $arg->expects($this->any())->method("getError")->willReturn("error");
        $arg->expects($this->any())->method("getRecordsFiltered")->willReturn(1);
        $arg->expects($this->any())->method("getRecordsTotal")->willReturn(2);

        $exp = [
            "data"            => [],
            "draw"            => 0,
            "recordsFiltered" => 1,
            "recordsTotal"    => 2,
        ];

        $this->assertEquals($exp, DataTablesNormalizer::normalizeResponse($arg));
    }
}

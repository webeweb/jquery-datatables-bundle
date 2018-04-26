<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Twig\Extension;

use Twig_Node;
use Twig_SimpleFunction;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractFrameworkTestCase;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Provider\EmployeeDataTablesProvider;
use WBW\Bundle\JQuery\DataTablesBundle\Twig\Extension\DataTablesTwigExtension;

/**
 * DataTables Twig extension test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Twig\Extension
 */
final class DataTablesTwigExtensionTest extends AbstractFrameworkTestCase {

    /**
     * {@inheritdoc}
     */
    protected function setUp() {
        parent::setUp();

        // Add each DataTables column.
        foreach ((new EmployeeDataTablesProvider())->getColumns() as $dtColumn) {
            $this->dataTablesWrapper->addColumn($dtColumn);
        }
    }

    /**
     * Tests the getFunctions() method.
     *
     * @return void
     */
    public function testGetFunctions() {

        $obj = new DataTablesTwigExtension();

        $res = $obj->getFunctions();

        $this->assertCount(1, $res);
        $this->assertInstanceOf(Twig_SimpleFunction::class, $res[0]);
        $this->assertEquals("dataTablesHTML", $res[0]->getName());
        $this->assertEquals([$obj, "dataTablesHTMLFunction"], $res[0]->getCallable());
        $this->assertEquals(["html"], $res[0]->getSafe(new Twig_Node()));
    }

    /**
     * Tests the dataTablesHTML() method.
     *
     * @return void
     */
    public function testDataTablesHTML() {

        $obj = new DataTablesTwigExtension();

        // ===
        $arg0 = [];
        $res0 = "<table class=\"table\">
<thead>
<tr>
<th row=\"scope\">Name</th>
<th>Position</th>
<th>Office</th>
<th>Age</th>
<th>Start date</th>
<th>Salary</th>
<th>Actions</th>
</tr>
</thead>
<tfoot>
<tr>
<th>Name</th>
<th>Position</th>
<th>Office</th>
<th>Age</th>
<th>Start date</th>
<th>Salary</th>
<th>Actions</th>
</tr>
</tfoot>
</table>";
        $this->assertEquals($res0, $obj->dataTablesHTMLFunction($this->dataTablesWrapper, $arg0));

        // ===
        $arg1 = ["class" => "class"];
        $res1 = "<table class=\"table class\">
<thead>
<tr>
<th row=\"scope\">Name</th>
<th>Position</th>
<th>Office</th>
<th>Age</th>
<th>Start date</th>
<th>Salary</th>
<th>Actions</th>
</tr>
</thead>
<tfoot>
<tr>
<th>Name</th>
<th>Position</th>
<th>Office</th>
<th>Age</th>
<th>Start date</th>
<th>Salary</th>
<th>Actions</th>
</tr>
</tfoot>
</table>";
        $this->assertEquals($res1, $obj->dataTablesHTMLFunction($this->dataTablesWrapper, $arg1));

        // ===
        $arg2 = ["thead" => false];
        $res2 = "<table class=\"table\">
<tfoot>
<tr>
<th>Name</th>
<th>Position</th>
<th>Office</th>
<th>Age</th>
<th>Start date</th>
<th>Salary</th>
<th>Actions</th>
</tr>
</tfoot>
</table>";
        $this->assertEquals($res2, $obj->dataTablesHTMLFunction($this->dataTablesWrapper, $arg2));

        // ===
        $arg3 = ["tfoot" => false];
        $res3 = "<table class=\"table\">
<thead>
<tr>
<th row=\"scope\">Name</th>
<th>Position</th>
<th>Office</th>
<th>Age</th>
<th>Start date</th>
<th>Salary</th>
<th>Actions</th>
</tr>
</thead>
</table>";
        $this->assertEquals($res3, $obj->dataTablesHTMLFunction($this->dataTablesWrapper, $arg3));

        // ===
        $i = 0;
        foreach ($this->dataTablesWrapper->getColumns() as $dtColumn) {
            $dtColumn->setClassname($dtColumn->getData());
            $dtColumn->setWidth( ++$i);
        }

        $arg9 = ["class" => "class", "thead" => true, "tfoot" => true];
        $res9 = "<table class=\"table class\">
<thead>
<tr>
<th row=\"scope\" class=\"name\" width=\"1\">Name</th>
<th class=\"position\" width=\"2\">Position</th>
<th class=\"office\" width=\"3\">Office</th>
<th class=\"age\" width=\"4\">Age</th>
<th class=\"startDate\" width=\"5\">Start date</th>
<th class=\"salary\" width=\"6\">Salary</th>
<th class=\"actions\" width=\"7\">Actions</th>
</tr>
</thead>
<tfoot>
<tr>
<th class=\"name\" width=\"1\">Name</th>
<th class=\"position\" width=\"2\">Position</th>
<th class=\"office\" width=\"3\">Office</th>
<th class=\"age\" width=\"4\">Age</th>
<th class=\"startDate\" width=\"5\">Start date</th>
<th class=\"salary\" width=\"6\">Salary</th>
<th class=\"actions\" width=\"7\">Actions</th>
</tr>
</tfoot>
</table>";
        $this->assertEquals($res9, $obj->dataTablesHTMLFunction($this->dataTablesWrapper, $arg9));
    }

}

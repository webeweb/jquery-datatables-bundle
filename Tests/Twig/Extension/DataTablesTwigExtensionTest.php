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

        $this->assertCount(3, $res);

        $this->assertInstanceOf(Twig_SimpleFunction::class, $res[0]);
        $this->assertEquals("jQueryDataTables", $res[0]->getName());
        $this->assertEquals([$obj, "jQueryDataTablesFunction"], $res[0]->getCallable());
        $this->assertEquals(["html"], $res[0]->getSafe(new Twig_Node()));

        $this->assertInstanceOf(Twig_SimpleFunction::class, $res[1]);
        $this->assertEquals("jQueryDataTablesStandalone", $res[1]->getName());
        $this->assertEquals([$obj, "jQueryDataTablesStandaloneFunction"], $res[1]->getCallable());
        $this->assertEquals(["html"], $res[1]->getSafe(new Twig_Node()));

        $this->assertInstanceOf(Twig_SimpleFunction::class, $res[2]);
        $this->assertEquals("renderDataTables", $res[2]->getName());
        $this->assertEquals([$obj, "renderDataTablesFunction"], $res[2]->getCallable());
        $this->assertEquals(["html"], $res[2]->getSafe(new Twig_Node()));
    }

    /**
     * Tests the datatables-i18n-<version> directory.
     *
     * @return void
     */
    public function testI18n() {

        // Initialize the language directory.
        $langDirectory = getcwd() . "/Resources/public/datatables-i18n-1.10.16";

        // ===
        $found = 0;

        // Read the directory.
        $stream = opendir($langDirectory);
        while (false !== ($file   = readdir($stream))) {

            // Check the filename.
            if (true === in_array($file, [".", ".."])) {
                continue;
            }

            // Count the filename.
            ++$found;

            // Check the JSON content.
            $this->assertJson(file_get_contents($langDirectory . "/" . $file), $file);
        }
        closedir($stream);

        // Check the translations count.
        $this->assertEquals(70, $found);
    }

    /**
     * Tests the jQueryDataTablesFunction() {
     *
     * @return void
     */
    public function testJQueryDataTablesFunction() {

        $obj = new DataTablesTwigExtension();

        // ===
        $arg0 = [];
        $res0 = <<< 'EOT'
<script type="text/javascript">
    $(document).ready(function () {
        var dtname = $("#dtname").DataTable({
            "ajax": {
                "type": "POST",
                "url": "url"
            },
            "columns": [
                {
                    "cellType": "td",
                    "data": "name",
                    "name": "Name"
                },
                {
                    "cellType": "td",
                    "data": "position",
                    "name": "Position"
                },
                {
                    "cellType": "td",
                    "data": "office",
                    "name": "Office"
                },
                {
                    "cellType": "td",
                    "data": "age",
                    "name": "Age"
                },
                {
                    "cellType": "td",
                    "data": "startDate",
                    "name": "Start date"
                },
                {
                    "cellType": "td",
                    "data": "salary",
                    "name": "Salary"
                },
                {
                    "cellType": "td",
                    "data": "actions",
                    "name": "Actions",
                    "orderable": false,
                    "searchable": false
                }
            ],
            "order": [],
            "processing": true,
            "serverSide": true
        });
    });
</script>
EOT;
        $this->assertEquals($res0, $obj->jQueryDataTablesFunction($this->dataTablesWrapper, $arg0));

        // ===
        $arg9 = ["selector" => "#selector", "language" => "French"];
        $res9 = <<< 'EOT'
<script type="text/javascript">
    $(document).ready(function () {
        var dtname = $("#selector").DataTable({
            "ajax": {
                "type": "POST",
                "url": "url"
            },
            "columns": [
                {
                    "cellType": "td",
                    "data": "name",
                    "name": "Name"
                },
                {
                    "cellType": "td",
                    "data": "position",
                    "name": "Position"
                },
                {
                    "cellType": "td",
                    "data": "office",
                    "name": "Office"
                },
                {
                    "cellType": "td",
                    "data": "age",
                    "name": "Age"
                },
                {
                    "cellType": "td",
                    "data": "startDate",
                    "name": "Start date"
                },
                {
                    "cellType": "td",
                    "data": "salary",
                    "name": "Salary"
                },
                {
                    "cellType": "td",
                    "data": "actions",
                    "name": "Actions",
                    "orderable": false,
                    "searchable": false
                }
            ],
            "language": {
                "url": "/bundles/jquerydatatables/datatables-i18n-1.10.16/French.json"
            },
            "order": [],
            "processing": true,
            "serverSide": true
        });
    });
</script>
EOT;
        $this->assertEquals($res9, $obj->jQueryDataTablesFunction($this->dataTablesWrapper, $arg9));
    }

    /**
     * Tests the jQueryDataTablesStandaloneFunction() {
     *
     * @return void
     */
    public function testJQueryDataTablesStandaloneFunction() {

        $obj = new DataTablesTwigExtension();

        // ===
        $res0 = <<< 'EOT'
<script type="text/javascript">
    $(document).ready(function () {
        $(".table").DataTable({});
    });
</script>
EOT;
        $this->assertEquals($res0, $obj->jQueryDataTablesStandaloneFunction());

        // ===
        $arg9 = ["selector" => "#selector", "language" => "French", "options" => ["columnDefs" => [["orderable" => false, "targets" => -1]]]];
        $res9 = <<< 'EOT'
<script type="text/javascript">
    $(document).ready(function () {
        $("#selector").DataTable({
            "columnDefs": [
                {
                    "orderable": false,
                    "targets": -1
                }
            ],
            "language": {
                "url": "/bundles/jquerydatatables/datatables-i18n-1.10.16/French.json"
            }
        });
    });
</script>
EOT;
        $this->assertEquals($res9, $obj->jQueryDataTablesStandaloneFunction($arg9));
    }

    /**
     * Tests the renderDataTablesFunction() method.
     *
     * @return void
     */
    public function testRenderDataTablesFunction() {

        $obj = new DataTablesTwigExtension();

        // ===
        $arg0 = [];
        $res0 = <<< 'EOT'
<table class="table" id="dtname">
    <thead>
        <tr>
            <th scope="row">Name</th>
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
</table>
EOT;
        $this->assertEquals($res0, $obj->renderDataTablesFunction($this->dataTablesWrapper, $arg0));

        // ===
        $arg1 = ["class" => "class"];
        $res1 = <<< 'EOT'
<table class="table class" id="dtname">
    <thead>
        <tr>
            <th scope="row">Name</th>
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
</table>
EOT;
        $this->assertEquals($res1, $obj->renderDataTablesFunction($this->dataTablesWrapper, $arg1));

        // ===
        $arg2 = ["thead" => false];
        $res2 = <<< 'EOT'
<table class="table" id="dtname">
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
</table>
EOT;
        $this->assertEquals($res2, $obj->renderDataTablesFunction($this->dataTablesWrapper, $arg2));

        // ===
        $arg3 = ["tfoot" => false];
        $res3 = <<< 'EOT'
<table class="table" id="dtname">
    <thead>
        <tr>
            <th scope="row">Name</th>
            <th>Position</th>
            <th>Office</th>
            <th>Age</th>
            <th>Start date</th>
            <th>Salary</th>
            <th>Actions</th>
        </tr>
    </thead>
</table>
EOT;
        $this->assertEquals($res3, $obj->renderDataTablesFunction($this->dataTablesWrapper, $arg3));

        // ===
        $i = 0;
        foreach ($this->dataTablesWrapper->getColumns() as $dtColumn) {
            $dtColumn->setClassname($dtColumn->getData());
            $dtColumn->setWidth( ++$i);
        }

        $arg9 = ["class" => "class", "thead" => true, "tfoot" => true];
        $res9 = <<< 'EOT'
<table class="table class" id="dtname">
    <thead>
        <tr>
            <th scope="row" class="name" width="1">Name</th>
            <th class="position" width="2">Position</th>
            <th class="office" width="3">Office</th>
            <th class="age" width="4">Age</th>
            <th class="startDate" width="5">Start date</th>
            <th class="salary" width="6">Salary</th>
            <th class="actions" width="7">Actions</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th class="name" width="1">Name</th>
            <th class="position" width="2">Position</th>
            <th class="office" width="3">Office</th>
            <th class="age" width="4">Age</th>
            <th class="startDate" width="5">Start date</th>
            <th class="salary" width="6">Salary</th>
            <th class="actions" width="7">Actions</th>
        </tr>
    </tfoot>
</table>
EOT;
        $this->assertEquals($res9, $obj->renderDataTablesFunction($this->dataTablesWrapper, $arg9));
    }

}

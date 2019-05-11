<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Twig\Extension;

use Exception;
use Twig\Node\Node;
use Twig\TwigFilter;
use Twig\TwigFunction;
use WBW\Bundle\CoreBundle\Twig\Extension\RendererTwigExtension;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\JQuery\DataTablesBundle\Twig\Extension\DataTablesTwigExtension;

/**
 * DataTables Twig extension test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Twig\Extension
 */
class DataTablesTwigExtensionTest extends AbstractTestCase {

    /**
     * Renderer Twig extension.
     *
     * @var RendererTwigExtension
     */
    private $rendererTwigExtension;

    /**
     * {@inheritDoc}
     */
    protected function setUp() {
        parent::setUp();

        // Set a Renderer Twig extension mock.
        $this->rendererTwigExtension = new RendererTwigExtension($this->twigEnvironment);
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new DataTablesTwigExtension($this->twigEnvironment, $this->rendererTwigExtension);

        $this->assertEquals("wbw.jquery.datatables.twig.extension", DataTablesTwigExtension::SERVICE_NAME);
        $this->assertSame($this->twigEnvironment, $obj->getTwigEnvironment());
    }

    /**
     * Tests the getFilters() method.
     *
     * @return void
     */
    public function testGetFilters() {

        $obj = new DataTablesTwigExtension($this->twigEnvironment, $this->rendererTwigExtension);

        $res = $obj->getFilters();
        $this->assertCount(2, $res);

        $this->assertInstanceOf(TwigFilter::class, $res[0]);
        $this->assertEquals("jQueryDataTablesName", $res[0]->getName());
        $this->assertEquals([$obj, "jQueryDataTablesNameFunction"], $res[0]->getCallable());
        $this->assertEquals(["html"], $res[0]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFilter::class, $res[1]);
        $this->assertEquals("jQueryDTName", $res[1]->getName());
        $this->assertEquals([$obj, "jQueryDataTablesNameFunction"], $res[1]->getCallable());
        $this->assertEquals(["html"], $res[1]->getSafe(new Node()));
    }

    /**
     * Tests the getFunctions() method.
     *
     * @return void
     */
    public function testGetFunctions() {

        $obj = new DataTablesTwigExtension($this->twigEnvironment, $this->rendererTwigExtension);

        $res = $obj->getFunctions();
        $this->assertCount(8, $res);

        $this->assertInstanceOf(TwigFunction::class, $res[0]);
        $this->assertEquals("jQueryDataTables", $res[0]->getName());
        $this->assertEquals([$obj, "jQueryDataTablesFunction"], $res[0]->getCallable());
        $this->assertEquals(["html"], $res[0]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[1]);
        $this->assertEquals("jQueryDT", $res[1]->getName());
        $this->assertEquals([$obj, "jQueryDataTablesFunction"], $res[1]->getCallable());
        $this->assertEquals(["html"], $res[1]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[2]);
        $this->assertEquals("renderDataTables", $res[2]->getName());
        $this->assertEquals([$obj, "renderDataTablesFunction"], $res[2]->getCallable());
        $this->assertEquals(["html"], $res[2]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[3]);
        $this->assertEquals("renderDT", $res[3]->getName());
        $this->assertEquals([$obj, "renderDataTablesFunction"], $res[3]->getCallable());
        $this->assertEquals(["html"], $res[3]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[4]);
        $this->assertEquals("jQueryDataTablesStandalone", $res[4]->getName());
        $this->assertEquals([$obj, "jQueryDataTablesStandaloneFunction"], $res[4]->getCallable());
        $this->assertEquals(["html"], $res[4]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[5]);
        $this->assertEquals("jQueryDTStandalone", $res[5]->getName());
        $this->assertEquals([$obj, "jQueryDataTablesStandaloneFunction"], $res[5]->getCallable());
        $this->assertEquals(["html"], $res[5]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[6]);
        $this->assertEquals("jQueryDataTablesName", $res[6]->getName());
        $this->assertEquals([$obj, "jQueryDataTablesNameFunction"], $res[6]->getCallable());
        $this->assertEquals(["html"], $res[6]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[7]);
        $this->assertEquals("jQueryDTName", $res[7]->getName());
        $this->assertEquals([$obj, "jQueryDataTablesNameFunction"], $res[7]->getCallable());
        $this->assertEquals(["html"], $res[7]->getSafe(new Node()));
    }

    /**
     * Tests the datatables-i18n-<version> directory.
     *
     * @return void
     */
    public function testI18n() {

        // Initialize the language directory.
        $langDirectory = getcwd() . "/Resources/public/datatables-i18n";

        $found = 0;

        // Read the directory.
        $stream = opendir($langDirectory);
        while (false !== ($file = readdir($stream))) {

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
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testJQueryDataTablesFunction() {

        $obj = new DataTablesTwigExtension($this->twigEnvironment, $this->rendererTwigExtension);

        $arg = ["selector" => "#selector", "language" => "French"];
        $res = <<< EOT
<script type="text/javascript">
    $(document).ready(function () {
        var dtemployee = $("#selector").DataTable({
            "ajax": {
                "type": "POST",
                "url": "/datatables/employee/index"
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
                "url": "/bundles/wbwjquerydatatables/datatables-i18n/French.json"
            },
            "order": [],
            "processing": true,
            "serverSide": true
        });
    });
</script>
EOT;
        $this->assertEquals($res, $obj->jQueryDataTablesFunction($this->dtWrapper, $arg));
    }

    /**
     * Tests the jQueryDataTablesFunction() {
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testJQueryDataTablesFunctionWithoutArguments() {

        $obj = new DataTablesTwigExtension($this->twigEnvironment, $this->rendererTwigExtension);

        $arg = [];
        $res = <<< EOT
<script type="text/javascript">
    $(document).ready(function () {
        var dtemployee = $("#dtemployee").DataTable({
            "ajax": {
                "type": "POST",
                "url": "/datatables/employee/index"
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
        $this->assertEquals($res, $obj->jQueryDataTablesFunction($this->dtWrapper, $arg));
    }

    /**
     * Tests the jQueryDataTablesStandaloneFunction() {
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testJQueryDataTablesStandaloneFunction() {

        $obj = new DataTablesTwigExtension($this->twigEnvironment, $this->rendererTwigExtension);

        $arg = ["selector" => "#selector", "language" => "French", "options" => ["columnDefs" => [["orderable" => false, "targets" => -1]]]];
        $res = <<< EOT
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
                "url": "/bundles/wbwjquerydatatables/datatables-i18n/French.json"
            }
        });
    });
</script>
EOT;
        $this->assertEquals($res, $obj->jQueryDataTablesStandaloneFunction($arg));
    }

    /**
     * Tests the jQueryDataTablesStandaloneFunction() {
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testJQueryDataTablesStandaloneFunctionWithoutArguments() {

        $obj = new DataTablesTwigExtension($this->twigEnvironment, $this->rendererTwigExtension);

        $res = <<< EOT
<script type="text/javascript">
    $(document).ready(function () {
        $(".table").DataTable({});
    });
</script>
EOT;
        $this->assertEquals($res, $obj->jQueryDataTablesStandaloneFunction());
    }

    /**
     * Tests the renderDataTablesFunction() method.
     *
     * @return void
     */
    public function testRenderDataTablesFunction() {

        $obj = new DataTablesTwigExtension($this->twigEnvironment, $this->rendererTwigExtension);

        $i = 0;
        foreach ($this->dtWrapper->getColumns() as $dtColumn) {
            $dtColumn->setClassname($dtColumn->getData());
            $dtColumn->setWidth(++$i);
        }

        $arg = ["class" => "class", "thead" => true, "tfoot" => true];
        $res = <<< EOT
<table class="table class" id="dtemployee">
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
        $this->assertEquals($res, $obj->renderDataTablesFunction($this->dtWrapper, $arg));
    }

    /**
     * Tests the renderDataTablesFunction() method.
     *
     * @return void
     */
    public function testRenderDataTablesFunctionWithClass() {

        $obj = new DataTablesTwigExtension($this->twigEnvironment, $this->rendererTwigExtension);

        $arg = ["class" => "class"];
        $res = <<< EOT
<table class="table class" id="dtemployee">
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
        $this->assertEquals($res, $obj->renderDataTablesFunction($this->dtWrapper, $arg));
    }

    /**
     * Tests the renderDataTablesFunction() method.
     *
     * @return void
     */
    public function testRenderDataTablesFunctionWithTFoot() {

        $obj = new DataTablesTwigExtension($this->twigEnvironment, $this->rendererTwigExtension);

        $arg = ["tfoot" => false];
        $res = <<< EOT
<table class="table" id="dtemployee">
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
        $this->assertEquals($res, $obj->renderDataTablesFunction($this->dtWrapper, $arg));
    }

    /**
     * Tests the renderDataTablesFunction() method.
     *
     * @return void
     */
    public function testRenderDataTablesFunctionWithTHead() {

        $obj = new DataTablesTwigExtension($this->twigEnvironment, $this->rendererTwigExtension);

        $arg = ["thead" => false];
        $res = <<< EOT
<table class="table" id="dtemployee">
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
        $this->assertEquals($res, $obj->renderDataTablesFunction($this->dtWrapper, $arg));
    }

    /**
     * Tests the renderDataTablesFunction() method.
     *
     * @return void
     */
    public function testRenderDataTablesFunctionWithoutArguments() {

        $obj = new DataTablesTwigExtension($this->twigEnvironment, $this->rendererTwigExtension);

        $arg = [];
        $res = <<< EOT
<table class="table" id="dtemployee">
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
        $this->assertEquals($res, $obj->renderDataTablesFunction($this->dtWrapper, $arg));
    }
}

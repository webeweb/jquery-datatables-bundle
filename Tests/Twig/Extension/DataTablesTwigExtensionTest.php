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

use Throwable;
use Twig\Extension\ExtensionInterface;
use Twig\Node\Node;
use Twig\TwigFilter;
use Twig\TwigFunction;
use WBW\Bundle\CoreBundle\Twig\Extension\AssetsTwigExtension;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\JQuery\DataTablesBundle\Twig\Extension\DataTablesTwigExtension;

/**
 * DataTables Twig extension test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Twig\Extension
 */
class DataTablesTwigExtensionTest extends AbstractTestCase {

    /**
     * Asset Twig extension.
     *
     * @var AssetsTwigExtension
     */
    private $assetsTwigExtension;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set a Renderer Twig extension mock.
        $this->assetsTwigExtension = new AssetsTwigExtension($this->twigEnvironment);
    }

    /**
     * Test getFilters()
     *
     * @return void
     */
    public function testGetFilters(): void {

        $obj = new DataTablesTwigExtension($this->twigEnvironment, $this->assetsTwigExtension, "test");

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
     * Test getFunctions()
     *
     * @return void
     */
    public function testGetFunctions(): void {

        $obj = new DataTablesTwigExtension($this->twigEnvironment, $this->assetsTwigExtension, "test");

        $res = $obj->getFunctions();
        $this->assertCount(10, $res);

        $this->assertInstanceOf(TwigFunction::class, $res[0]);
        $this->assertEquals("jQueryDataTables", $res[0]->getName());
        $this->assertEquals([$obj, "jQueryDataTablesFunction"], $res[0]->getCallable());
        $this->assertEquals(["html"], $res[0]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[1]);
        $this->assertEquals("jQueryDT", $res[1]->getName());
        $this->assertEquals([$obj, "jQueryDataTablesFunction"], $res[1]->getCallable());
        $this->assertEquals(["html"], $res[1]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[2]);
        $this->assertEquals("jQueryDataTablesName", $res[2]->getName());
        $this->assertEquals([$obj, "jQueryDataTablesNameFunction"], $res[2]->getCallable());
        $this->assertEquals(["html"], $res[2]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[3]);
        $this->assertEquals("jQueryDTName", $res[3]->getName());
        $this->assertEquals([$obj, "jQueryDataTablesNameFunction"], $res[3]->getCallable());
        $this->assertEquals(["html"], $res[3]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[4]);
        $this->assertEquals("jQueryDataTablesOptions", $res[4]->getName());
        $this->assertEquals([$obj, "jQueryDataTablesOptionsFunction"], $res[4]->getCallable());
        $this->assertEquals(["html"], $res[4]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[5]);
        $this->assertEquals("jQueryDTOptions", $res[5]->getName());
        $this->assertEquals([$obj, "jQueryDataTablesOptionsFunction"], $res[5]->getCallable());
        $this->assertEquals(["html"], $res[5]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[6]);
        $this->assertEquals("jQueryDataTablesStandalone", $res[6]->getName());
        $this->assertEquals([$obj, "jQueryDataTablesStandaloneFunction"], $res[6]->getCallable());
        $this->assertEquals(["html"], $res[6]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[7]);
        $this->assertEquals("jQueryDTStandalone", $res[7]->getName());
        $this->assertEquals([$obj, "jQueryDataTablesStandaloneFunction"], $res[7]->getCallable());
        $this->assertEquals(["html"], $res[7]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[8]);
        $this->assertEquals("renderDataTables", $res[8]->getName());
        $this->assertEquals([$obj, "renderDataTablesFunction"], $res[8]->getCallable());
        $this->assertEquals(["html"], $res[8]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[9]);
        $this->assertEquals("renderDT", $res[9]->getName());
        $this->assertEquals([$obj, "renderDataTablesFunction"], $res[9]->getCallable());
        $this->assertEquals(["html"], $res[9]->getSafe(new Node()));
    }

    /**
     * Test the datatables-i18n-<version> directory.
     *
     * @return void
     */
    public function testI18n(): void {

        $directory = realpath(__DIR__ . "/../../../Resources/public/datatables-i18n");

        $found = 0;

        $stream = opendir($directory);
        while (false !== ($file = readdir($stream))) {

            if (true === in_array($file, [".", ".."])) {
                continue;
            }

            ++$found;

            $this->assertJson(file_get_contents($directory . "/" . $file), $file);
        }

        closedir($stream);

        $this->assertEquals(70, $found);
    }

    /**
     * Test jQueryDataTablesFunction()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testJQueryDataTablesFunction(): void {

        $obj = new DataTablesTwigExtension($this->twigEnvironment, $this->assetsTwigExtension, "test");

        $arg = [
            "selector" => "#selector",
            "language" => "French",
        ];
        $res = file_get_contents(__DIR__ . "/DataTablesTwigExtensionTest.testJQueryDataTablesFunction.html.txt");
        $this->assertEquals($res, $obj->jQueryDataTablesFunction($this->dtWrapper, $arg) . "\n");
    }

    /**
     * Test jQueryDataTablesFunction()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testJQueryDataTablesFunctionWithoutArguments(): void {

        $obj = new DataTablesTwigExtension($this->twigEnvironment, $this->assetsTwigExtension, "test");

        $arg = [];
        $res = file_get_contents(__DIR__ . "/DataTablesTwigExtensionTest.testJQueryDataTablesFunctionWithoutArguments.html.txt");
        $this->assertEquals($res, $obj->jQueryDataTablesFunction($this->dtWrapper, $arg) . "\n");
    }

    /**
     * Test jQueryDataTablesNameFunction()
     *
     * @return void
     */
    public function testJQueryDataTablesNameFunction(): void {

        $obj = new DataTablesTwigExtension($this->twigEnvironment, $this->assetsTwigExtension, "test");

        $this->assertSame("dtemployee", $obj->jQueryDataTablesNameFunction($this->dtWrapper));
    }

    /**
     * Test jQueryDataTablesOptionsFunction()
     *
     * @return void
     */
    public function testJQueryDataTablesOptionsFunction(): void {

        $obj = new DataTablesTwigExtension($this->twigEnvironment, $this->assetsTwigExtension, "test");

        $res = [
            "ajax"       => [
                "type" => "POST",
                "url"  => "/datatables/employee/index",
            ],
            "columns"    => [
                [
                    "cellType" => "td",
                    "data"     => "name",
                    "name"     => "Name",
                ],
                [
                    "cellType" => "td",
                    "data"     => "position",
                    "name"     => "Position",
                ],
                [
                    "cellType" => "td",
                    "data"     => "office",
                    "name"     => "Office",
                ],
                [
                    "cellType" => "td",
                    "data"     => "age",
                    "name"     => "Age",
                ],
                [
                    "cellType" => "td",
                    "data"     => "startDate",
                    "name"     => "Start date",
                ],
                [
                    "cellType" => "td",
                    "data"     => "salary",
                    "name"     => "Salary",
                ],
                [
                    "cellType"   => "td",
                    "data"       => "actions",
                    "name"       => "Actions",
                    "orderable"  => false,
                    "searchable" => false,
                ],
            ],
            "processing" => true,
            "serverSide" => true,
        ];
        $this->assertSame($res, $obj->jQueryDataTablesOptionsFunction($this->dtWrapper));
    }

    /**
     * Test jQueryDataTablesStandaloneFunction()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testJQueryDataTablesStandaloneFunction(): void {

        $obj = new DataTablesTwigExtension($this->twigEnvironment, $this->assetsTwigExtension, "test");

        $arg = ["selector" => "#selector", "language" => "French", "options" => ["columnDefs" => [["orderable" => false, "targets" => -1]]]];
        $res = file_get_contents(__DIR__ . "/DataTablesTwigExtensionTest.testJQueryDataTablesStandaloneFunction.html.txt");
        $this->assertEquals($res, $obj->jQueryDataTablesStandaloneFunction($arg) . "\n");
    }

    /**
     * Test jQueryDataTablesStandaloneFunction()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testJQueryDataTablesStandaloneFunctionWithoutArguments(): void {

        $obj = new DataTablesTwigExtension($this->twigEnvironment, $this->assetsTwigExtension, "test");

        $res = file_get_contents(__DIR__ . "/DataTablesTwigExtensionTest.testJQueryDataTablesStandaloneFunctionWithoutArguments.html.txt");
        $this->assertEquals($res, $obj->jQueryDataTablesStandaloneFunction() . "\n");
    }

    /**
     * Test renderDataTablesFunction()
     *
     * @return void
     */
    public function testRenderDataTablesFunction(): void {

        $obj = new DataTablesTwigExtension($this->twigEnvironment, $this->assetsTwigExtension, "test");

        $i = 0;
        foreach ($this->dtWrapper->getColumns() as $dtColumn) {
            $dtColumn->setClassname($dtColumn->getData());
            $dtColumn->setWidth(++$i);
        }

        $arg = ["class" => "class", "thead" => true, "tfoot" => true];
        $res = file_get_contents(__DIR__ . "/DataTablesTwigExtensionTest.testRenderDataTablesFunction.html.txt");
        $this->assertEquals($res, $obj->renderDataTablesFunction($this->dtWrapper, $arg) . "\n");
    }

    /**
     * Test renderDataTablesFunction()
     *
     * @return void
     */
    public function testRenderDataTablesFunctionWithClass(): void {

        $obj = new DataTablesTwigExtension($this->twigEnvironment, $this->assetsTwigExtension, "test");

        $arg = ["class" => "class"];
        $res = file_get_contents(__DIR__ . "/DataTablesTwigExtensionTest.testRenderDataTablesFunctionWithClass.html.txt");
        $this->assertEquals($res, $obj->renderDataTablesFunction($this->dtWrapper, $arg) . "\n");
    }

    /**
     * Test renderDataTablesFunction()
     *
     * @return void
     */
    public function testRenderDataTablesFunctionWithTFoot(): void {

        $obj = new DataTablesTwigExtension($this->twigEnvironment, $this->assetsTwigExtension, "test");

        $arg = ["tfoot" => false];
        $res = file_get_contents(__DIR__ . "/DataTablesTwigExtensionTest.testRenderDataTablesFunctionWithTFoot.html.txt");
        $this->assertEquals($res, $obj->renderDataTablesFunction($this->dtWrapper, $arg) . "\n");
    }

    /**
     * Test renderDataTablesFunction()
     *
     * @return void
     */
    public function testRenderDataTablesFunctionWithTHead(): void {

        $obj = new DataTablesTwigExtension($this->twigEnvironment, $this->assetsTwigExtension, "test");

        $arg = ["thead" => false];
        $res = file_get_contents(__DIR__ . "/DataTablesTwigExtensionTest.testRenderDataTablesFunctionWithTHead.html.txt");
        $this->assertEquals($res, $obj->renderDataTablesFunction($this->dtWrapper, $arg) . "\n");
    }

    /**
     * Test renderDataTablesFunction()
     *
     * @return void
     */
    public function testRenderDataTablesFunctionWithoutArguments(): void {

        $obj = new DataTablesTwigExtension($this->twigEnvironment, $this->assetsTwigExtension, "test");

        $arg = [];
        $res = file_get_contents(__DIR__ . "/DataTablesTwigExtensionTest.testRenderDataTablesFunctionWithoutArguments.html.txt");
        $this->assertEquals($res, $obj->renderDataTablesFunction($this->dtWrapper, $arg) . "\n");
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.jquery.datatables.twig.extension", DataTablesTwigExtension::SERVICE_NAME);

        $obj = new DataTablesTwigExtension($this->twigEnvironment, $this->assetsTwigExtension, "test");

        $this->assertInstanceOf(ExtensionInterface::class, $obj);

        $this->assertSame($this->twigEnvironment, $obj->getTwigEnvironment());
    }
}

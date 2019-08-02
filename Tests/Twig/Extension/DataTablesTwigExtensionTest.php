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

        $this->assertEquals("wbw.jquery.datatables.twig.extension", DataTablesTwigExtension::SERVICE_NAME);

        $obj = new DataTablesTwigExtension($this->twigEnvironment, $this->rendererTwigExtension);

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
        $res = file_get_contents(__DIR__ . "/testJQueryDataTablesFunction.txt");
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
        $res = file_get_contents(__DIR__ . "/testJQueryDataTablesFunctionWithoutArguments.txt");
        $this->assertEquals($res, $obj->jQueryDataTablesFunction($this->dtWrapper, $arg));
    }

    /**
     * Tests the jQueryDataTablesNameFunction() method.
     *
     * @return void
     */
    public function testJQueryDataTablesNameFunction() {

        $obj = new DataTablesTwigExtension($this->twigEnvironment, $this->rendererTwigExtension);

        $this->assertSame("dtemployee", $obj->jQueryDataTablesNameFunction($this->dtWrapper));
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
        $res = file_get_contents(__DIR__ . "/testJQueryDataTablesStandaloneFunction.txt");
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

        $res = file_get_contents(__DIR__ . "/testJQueryDataTablesStandaloneFunctionWithoutArguments.txt");
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
        $res = file_get_contents(__DIR__ . "/testRenderDataTablesFunction.txt");
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
        $res = file_get_contents(__DIR__ . "/testRenderDataTablesFunctionWithClass.txt");
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
        $res = file_get_contents(__DIR__ . "/testRenderDataTablesFunctionWithTFoot.txt");
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
        $res = file_get_contents(__DIR__ . "/testRenderDataTablesFunctionWithTHead.txt");
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
        $res = file_get_contents(__DIR__ . "/testRenderDataTablesFunctionWithoutArguments.txt");
        $this->assertEquals($res, $obj->renderDataTablesFunction($this->dtWrapper, $arg));
    }
}

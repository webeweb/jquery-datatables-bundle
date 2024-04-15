<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Twig\Extension;

use Throwable;
use Twig\Environment;
use Twig\Extension\ExtensionInterface;
use Twig\Node\Node;
use Twig\TwigFilter;
use Twig\TwigFunction;
use WBW\Bundle\DataTablesBundle\Model\DataTablesWrapperInterface;
use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\DataTablesBundle\Tests\Fixtures\TestFixtures;
use WBW\Bundle\DataTablesBundle\Twig\Extension\DataTablesTwigExtension;

/**
 * DataTables Twig extension test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Twig\Extension
 */
class DataTablesTwigExtensionTest extends AbstractTestCase {

    /**
     * DataTables wrapper.
     *
     * @var DataTablesWrapperInterface|null
     */
    private $dtWrapper;

    /**
     * Twig environment.
     *
     * @var Environment|null
     */
    private $twigEnvironment;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set a Twig environment mock.
        $this->twigEnvironment = $this->getMockBuilder(Environment::class)->disableOriginalConstructor()->getMock();

        // Set a DataTables wrapper mock.
        $this->dtWrapper = TestFixtures::getWrapper();
    }

    /**
     * Test dataTablesNameFunction()
     *
     * @return void
     */
    public function testDataTablesNameFunction(): void {

        $obj = new DataTablesTwigExtension($this->twigEnvironment, "test");

        $this->assertSame("dtemployee", $obj->dataTablesNameFunction($this->dtWrapper));
    }

    /**
     * Test dataTablesOptionsFunction()
     *
     * @return void
     */
    public function testDataTablesOptionsFunction(): void {

        $obj = new DataTablesTwigExtension($this->twigEnvironment, "test");

        $exp = [
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

        $this->assertSame($exp, $obj->dataTablesOptionsFunction($this->dtWrapper));
    }

    /**
     * Test getFilters()
     *
     * @return void
     */
    public function testGetFilters(): void {

        $obj = new DataTablesTwigExtension($this->twigEnvironment, "test");

        $res = $obj->getFilters();
        $this->assertCount(2, $res);

        $i = -1;

        $this->assertInstanceOf(TwigFilter::class, $res[++$i]);
        $this->assertEquals("dataTablesName", $res[$i]->getName());
        $this->assertEquals([$obj, "dataTablesNameFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFilter::class, $res[++$i]);
        $this->assertEquals("dtName", $res[$i]->getName());
        $this->assertEquals([$obj, "dataTablesNameFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));
    }

    /**
     * Test getFunctions()
     *
     * @return void
     */
    public function testGetFunctions(): void {

        $obj = new DataTablesTwigExtension($this->twigEnvironment, "test");

        $res = $obj->getFunctions();
        $this->assertCount(10, $res);

        $i = -1;

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("dataTablesName", $res[$i]->getName());
        $this->assertEquals([$obj, "dataTablesNameFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("dtName", $res[$i]->getName());
        $this->assertEquals([$obj, "dataTablesNameFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("dataTablesOptions", $res[$i]->getName());
        $this->assertEquals([$obj, "dataTablesOptionsFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("dtOptions", $res[$i]->getName());
        $this->assertEquals([$obj, "dataTablesOptionsFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("hDataTables", $res[$i]->getName());
        $this->assertEquals([$obj, "hDataTablesFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("hDT", $res[$i]->getName());
        $this->assertEquals([$obj, "hDataTablesFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("jDataTables", $res[$i]->getName());
        $this->assertEquals([$obj, "jDataTablesFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("jDT", $res[$i]->getName());
        $this->assertEquals([$obj, "jDataTablesFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("jDataTablesStandalone", $res[$i]->getName());
        $this->assertEquals([$obj, "jDataTablesStandaloneFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("jDTStandalone", $res[$i]->getName());
        $this->assertEquals([$obj, "jDataTablesStandaloneFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));
    }

    /**
     * Test hDataTablesFunction()
     *
     * @return void
     */
    public function testHDataTablesFunction(): void {

        $obj = new DataTablesTwigExtension($this->twigEnvironment, "test");

        $i = 0;
        foreach ($this->dtWrapper->getColumns() as $dtColumn) {
            $dtColumn->setClassname($dtColumn->getData());
            $dtColumn->setWidth((string) ++$i);
        }

        $arg = ["class" => "class", "thead" => true, "tfoot" => true];
        $exp = file_get_contents(__DIR__ . "/../../Fixtures/Twig/Extension/DataTablesTwigExtensionTest.testHDataTablesFunction.html.txt");

        $this->assertEquals($exp, $obj->hDataTablesFunction($this->dtWrapper, $arg) . "\n");
    }

    /**
     * Test hDataTablesFunction()
     *
     * @return void
     */
    public function testHDataTablesFunctionWithClass(): void {

        $obj = new DataTablesTwigExtension($this->twigEnvironment, "test");

        $arg = ["class" => "class"];
        $exp = file_get_contents(__DIR__ . "/../../Fixtures/Twig/Extension/DataTablesTwigExtensionTest.testHDataTablesFunctionWithClass.html.txt");

        $this->assertEquals($exp, $obj->hDataTablesFunction($this->dtWrapper, $arg) . "\n");
    }

    /**
     * Test hDataTablesFunction()
     *
     * @return void
     */
    public function testHDataTablesFunctionWithTFoot(): void {

        $obj = new DataTablesTwigExtension($this->twigEnvironment, "test");

        $arg = ["tfoot" => false];
        $exp = file_get_contents(__DIR__ . "/../../Fixtures/Twig/Extension/DataTablesTwigExtensionTest.testHDataTablesFunctionWithTFoot.html.txt");

        $this->assertEquals($exp, $obj->hDataTablesFunction($this->dtWrapper, $arg) . "\n");
    }

    /**
     * Test hDataTablesFunction()
     *
     * @return void
     */
    public function testHDataTablesFunctionWithTHead(): void {

        $obj = new DataTablesTwigExtension($this->twigEnvironment, "test");

        $arg = ["thead" => false];
        $exp = file_get_contents(__DIR__ . "/../../Fixtures/Twig/Extension/DataTablesTwigExtensionTest.testHDataTablesFunctionWithTHead.html.txt");

        $this->assertEquals($exp, $obj->hDataTablesFunction($this->dtWrapper, $arg) . "\n");
    }

    /**
     * Test hDataTablesFunction()
     *
     * @return void
     */
    public function testHDataTablesFunctionWithoutArguments(): void {

        $obj = new DataTablesTwigExtension($this->twigEnvironment, "test");

        $arg = [];
        $exp = file_get_contents(__DIR__ . "/../../Fixtures/Twig/Extension/DataTablesTwigExtensionTest.testHDataTablesFunctionWithoutArguments.html.txt");

        $this->assertEquals($exp, $obj->hDataTablesFunction($this->dtWrapper, $arg) . "\n");
    }

    /**
     * Test the datatables-i18n-<version> directory.
     *
     * @return void
     */
    public function testI18n(): void {

        $directory = realpath(__DIR__ . "/../../../src/Resources/public/datatables-i18n");

        $found = 0;

        $stream = opendir($directory);
        while (false !== ($file = readdir($stream))) {

            if (true === in_array($file, [".", ".."])) {
                continue;
            }

            ++$found;

            $this->assertJson(file_get_contents("$directory/$file"), $file);
        }

        closedir($stream);

        $this->assertEquals(70, $found);
    }

    /**
     * Test jDataTablesFunction()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testJDataTablesFunction(): void {

        $obj = new DataTablesTwigExtension($this->twigEnvironment, "test");

        $arg = [
            "selector" => "#selector",
            "language" => "French",
        ];
        $exp = file_get_contents(__DIR__ . "/../../Fixtures/Twig/Extension/DataTablesTwigExtensionTest.testJDataTablesFunction.html.txt");

        $this->assertEquals($exp, $obj->jDataTablesFunction($this->dtWrapper, $arg) . "\n");
    }

    /**
     * Test jDataTablesFunction()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testJDataTablesFunctionWithoutArguments(): void {

        $obj = new DataTablesTwigExtension($this->twigEnvironment, "test");

        $arg = [];
        $exp = file_get_contents(__DIR__ . "/../../Fixtures/Twig/Extension/DataTablesTwigExtensionTest.testJDataTablesFunctionWithoutArguments.html.txt");

        $this->assertEquals($exp, $obj->jDataTablesFunction($this->dtWrapper, $arg) . "\n");
    }

    /**
     * Test jDataTablesStandaloneFunction()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testJDataTablesStandaloneFunction(): void {

        $obj = new DataTablesTwigExtension($this->twigEnvironment, "test");

        $arg = ["selector" => "#selector", "language" => "French", "options" => ["columnDefs" => [["orderable" => false, "targets" => -1]]]];
        $exp = file_get_contents(__DIR__ . "/../../Fixtures/Twig/Extension/DataTablesTwigExtensionTest.testJDataTablesStandaloneFunction.html.txt");

        $this->assertEquals($exp, $obj->jDataTablesStandaloneFunction($arg) . "\n");
    }

    /**
     * Test jDataTablesStandaloneFunction()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testJDataTablesStandaloneFunctionWithoutArguments(): void {

        $obj = new DataTablesTwigExtension($this->twigEnvironment, "test");

        $exp = file_get_contents(__DIR__ . "/../../Fixtures/Twig/Extension/DataTablesTwigExtensionTest.testJDataTablesStandaloneFunctionWithoutArguments.html.txt");
        $this->assertEquals($exp, $obj->jDataTablesStandaloneFunction() . "\n");
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.datatables.twig.extension", DataTablesTwigExtension::SERVICE_NAME);

        $obj = new DataTablesTwigExtension($this->twigEnvironment, "test");

        $this->assertInstanceOf(ExtensionInterface::class, $obj);

        $this->assertSame($this->twigEnvironment, $obj->getTwigEnvironment());
    }
}

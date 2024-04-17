<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2020 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Tests\Twig\Extension;

use Symfony\Component\Routing\RouterInterface;
use Twig\Environment;
use Twig\Extension\ExtensionInterface;
use Twig\Node\Node;
use Twig\TwigFilter;
use Twig\TwigFunction;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\DefaultTestCase;
use WBW\Bundle\CommonBundle\Twig\Extension\AssetsTwigExtension;

/**
 * Assets Twig extension test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Twig\Extension
 */
class AssetsTwigExtensionTest extends AbstractTestCase {

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
    }

    /**
     * Test assetExists()
     *
     * @return void
     */
    public function testAssetExists(): void {

        $obj = new AssetsTwigExtension($this->twigEnvironment);
        $obj->setPublicDirectory(__DIR__ . "/");

        $this->assertNull($obj->assetExists(null));
        $this->assertFalse($obj->assetExists("AssetsTwigExtensionTest.css"));
        $this->assertTrue($obj->assetExists("AssetsTwigExtensionTest.php"));
    }

    /**
     * Test commonResourceScriptFunction()
     *
     * @return void
     */
    public function testCommonResourcePathFunction(): void {

        $obj = new AssetsTwigExtension($this->twigEnvironment);

        $this->assertNull($obj->commonResourcePath("type", "name"));
    }

    /**
     * Test commonResourceScriptFunction()
     *
     * @return void
     */
    public function testCommonResourceScriptFunction(): void {

        // Set the Router mock.
        $router = $this->getMockBuilder(RouterInterface::class)->getMock();
        $router->expects($this->any())->method("generate")->willReturnCallback(DefaultTestCase::getRouterGenerateFunction());

        $obj = new AssetsTwigExtension($this->twigEnvironment);
        $obj->setRouter($router);

        $this->assertEquals('<script type="text/javascript" src="wbw_common_twig_resource"></script>', $obj->commonResourceScriptFunction("test", ["v" => 1]));
    }

    /**
     * Test commonResourceStyleFunction()
     */
    public function testCommonResourceStyleFunction(): void {

        // Set the Router mock.
        $router = $this->getMockBuilder(RouterInterface::class)->getMock();
        $router->expects($this->any())->method("generate")->willReturnCallback(DefaultTestCase::getRouterGenerateFunction());

        $obj = new AssetsTwigExtension($this->twigEnvironment);
        $obj->setRouter($router);

        $this->assertEquals('<link type="text/css" rel="stylesheet" href="wbw_common_twig_resource">', $obj->commonResourceStyleFunction("test", ["v" => 1]));
    }

    /**
     * Test cssRgba()
     *
     * @return void
     */
    public function testCssRgba(): void {

        $obj = new AssetsTwigExtension($this->twigEnvironment);

        $this->assertNull($obj->cssRgba(null));
        $this->assertNull($obj->cssRgba(""));
        $this->assertEquals("rgba(255, 255, 255, 0.00)", $obj->cssRgba("#FFFFFF", 0.00));
    }

    /**
     * Test getFilters()
     *
     * @return void
     */
    public function testGetFilters(): void {

        $obj = new AssetsTwigExtension($this->twigEnvironment);

        $res = $obj->getFilters();
        $this->assertCount(6, $res);

        $i = -1;

        $this->assertInstanceOf(TwigFilter::class, $res[++$i]);
        $this->assertEquals("assetExists", $res[$i]->getName());
        $this->assertEquals([$obj, "assetExists"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFilter::class, $res[++$i]);
        $this->assertEquals("cssRgba", $res[$i]->getName());
        $this->assertEquals([$obj, "cssRgba"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFilter::class, $res[++$i]);
        $this->assertEquals("hGoogleTagManager", $res[$i]->getName());
        $this->assertEquals([$obj, "hGoogleTagManager"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFilter::class, $res[++$i]);
        $this->assertEquals("hGtag", $res[$i]->getName());
        $this->assertEquals([$obj, "hGoogleTagManager"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFilter::class, $res[++$i]);
        $this->assertEquals("hScript", $res[$i]->getName());
        $this->assertEquals([$obj, "hScriptFilter"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFilter::class, $res[++$i]);
        $this->assertEquals("hStyle", $res[$i]->getName());
        $this->assertEquals([$obj, "hStyleFilter"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));
    }

    /**
     * Test getFunctions()
     *
     * @return void
     */
    public function testGetFunctions(): void {

        $obj = new AssetsTwigExtension($this->twigEnvironment);

        $res = $obj->getFunctions();
        $this->assertCount(9, $res);

        $i = -1;

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("assetExists", $res[$i]->getName());
        $this->assertEquals([$obj, "assetExists"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("cssRgba", $res[$i]->getName());
        $this->assertEquals([$obj, "cssRgba"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("hGoogleTagManager", $res[$i]->getName());
        $this->assertEquals([$obj, "hGoogleTagManager"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("hGtag", $res[$i]->getName());
        $this->assertEquals([$obj, "hGoogleTagManager"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("hImage", $res[$i]->getName());
        $this->assertEquals([$obj, "hImageFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("hIcon", $res[$i]->getName());
        $this->assertEquals([$obj, "hIconFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("commonResourcePath", $res[$i]->getName());
        $this->assertEquals([$obj, "commonResourcePathFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("commonResourceScript", $res[$i]->getName());
        $this->assertEquals([$obj, "commonResourceScriptFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("commonResourceStyle", $res[$i]->getName());
        $this->assertEquals([$obj, "commonResourceStyleFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));
    }

    /**
     * Test hGoogleTagManager()
     *
     * @returns void
     */
    public function testHGoogleTagManager(): void {

        $obj = new AssetsTwigExtension($this->twigEnvironment);

        $exp = file_get_contents(__DIR__ . "/../../Fixtures/Twig/Extension/AssetsTwigExtensionTest.testHGoogleTagManager.js.txt");

        $this->assertEquals($exp, $obj->hGoogleTagManager("UA-123456789-0"));
        $this->assertNull($obj->hGoogleTagManager(null));
        $this->assertNull($obj->hGoogleTagManager(""));
    }

    /**
     * Test hIconFunction()
     *
     * @return void
     */
    public function testHIconFunction(): void {

        $obj = new AssetsTwigExtension($this->twigEnvironment);

        $this->assertNull($obj->hIconFunction(null));
        $this->assertNull($obj->hIconFunction("::"));
    }

    /**
     * Test hImageFunction()
     *
     * @return void
     */
    public function testHImageFunction(): void {

        $arg = [
            "src"    => "src",
            "alt"    => "alt",
            "width"  => 1024,
            "height" => 768,
            "class"  => "class",
            "usemap" => "#usemap",
        ];
        $exp = '<img src="src" alt="alt" width="1024" height="768" class="class" usemap="#usemap"/>';

        $obj = new AssetsTwigExtension($this->twigEnvironment);

        $this->assertEquals($exp, $obj->hImageFunction($arg));
    }

    /**
     * Test hImageFunction()
     *
     * @return void
     */
    public function testHImageFunctionWithoutArguments(): void {

        $arg = [];
        $exp = "<img />";

        $obj = new AssetsTwigExtension($this->twigEnvironment);

        $this->assertEquals($exp, $obj->hImageFunction($arg));
    }

    /**
     * Test hScriptFilter()
     *
     * @return void
     */
    public function testHScriptFilter(): void {

        $exp = file_get_contents(__DIR__ . "/../../Fixtures/Twig/Extension/AssetsTwigExtensionTest.testHScriptFilter.html.txt");

        $obj = new AssetsTwigExtension($this->twigEnvironment);

        $this->assertEquals($exp, $obj->hScriptFilter("content") . "\n");
    }

    /**
     * Test hStyleFilter()
     *
     * @return void
     */
    public function testHStyleFilter(): void {

        $exp = file_get_contents(__DIR__ . "/../../Fixtures/Twig/Extension/AssetsTwigExtensionTest.testHStyleFilter.html.txt");

        $obj = new AssetsTwigExtension($this->twigEnvironment);

        $this->assertEquals($exp, $obj->hStyleFilter("content") . "\n");
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.common.twig.extension.assets", AssetsTwigExtension::SERVICE_NAME);

        $obj = new AssetsTwigExtension($this->twigEnvironment);

        $this->assertInstanceOf(ExtensionInterface::class, $obj);

        $this->assertSame($this->twigEnvironment, $obj->getTwigEnvironment());
        $this->assertNull($obj->getRouter());
        $this->assertNull($obj->getPublicDirectory());
    }
}

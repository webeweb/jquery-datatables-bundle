<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\BootstrapBundle\Tests\Twig\Extension;

use Twig\Environment;
use Twig\Extension\ExtensionInterface;
use Twig\Node\Node;
use Twig\TwigFunction;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Bundle\BootstrapBundle\Twig\Extension\AssetsTwigExtension;

/**
 * Assets Twig extension test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Twig\Extension
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
     * Test bootstrapRenderIconFunction()
     *
     * @return void
     */
    public function testBootstrapRenderIconRender(): void {

        $obj = new AssetsTwigExtension($this->twigEnvironment);

        $this->assertNull($obj->bootstrapRenderIconFunction(null));
        $this->assertNull($obj->bootstrapRenderIconFunction("::"));
    }

    /**
     * Test getFilters()
     *
     * @return void
     */
    public function testGetFilters(): void {

        $obj = new AssetsTwigExtension($this->twigEnvironment);

        $this->assertCount(0, $obj->getFilters());
    }

    /**
     * Test getFunctions()
     *
     * @return void
     */
    public function testGetFunctions(): void {

        $obj = new AssetsTwigExtension($this->twigEnvironment);

        $res = $obj->getFunctions();
        $this->assertCount(2, $res);

        $i = -1;

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bootstrapRenderIcon", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapRenderIconFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bsRenderIcon", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapRenderIconFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));
    }

    /**
     * Test renderIcon()
     *
     * @return void
     */
    public function testRenderIcon(): void {

        $this->assertNull(AssetsTwigExtension::renderIcon($this->twigEnvironment, "::"));
        $this->assertNull(AssetsTwigExtension::renderIcon($this->twigEnvironment, null));
    }

    /**
     * Test renderIcon()
     *
     * @return void
     */
    public function testRenderIconWithBootstrapIcon(): void {

        $exp = '<i class="bi bi-house"></i>';

        $this->assertEquals($exp, AssetsTwigExtension::renderIcon($this->twigEnvironment, "bi:house"));
    }

    /**
     * Test renderIcon()
     *
     * @return void
     */
    public function testRenderIconWithDefault(): void {

        $exp = '<span class="glyphicon glyphicon-home" aria-hidden="true"></span>';

        $this->assertEquals($exp, AssetsTwigExtension::renderIcon($this->twigEnvironment, "home"));
    }

    /**
     * Test renderIcon()
     *
     * @return void
     */
    public function testRenderIconWithFontAwesome(): void {

        $this->assertEquals('<i class="fa fa-home"></i>', AssetsTwigExtension::renderIcon($this->twigEnvironment, "fa:home"));
        $this->assertEquals('<i class="fas fa-home"></i>', AssetsTwigExtension::renderIcon($this->twigEnvironment, "fas:home"));
        $this->assertEquals('<i class="far fa-home"></i>', AssetsTwigExtension::renderIcon($this->twigEnvironment, "far:home"));
        $this->assertEquals('<i class="fal fa-home"></i>', AssetsTwigExtension::renderIcon($this->twigEnvironment, "fal:home"));
        $this->assertEquals('<i class="fad fa-home"></i>', AssetsTwigExtension::renderIcon($this->twigEnvironment, "fad:home"));
    }

    /**
     * Test renderIcon()
     *
     * @return void
     */
    public function testRenderIconWithGlyphicon(): void {

        $exp = '<span class="glyphicon glyphicon-home" aria-hidden="true"></span>';

        $this->assertEquals($exp, AssetsTwigExtension::renderIcon($this->twigEnvironment, "b:home"));
        $this->assertEquals($exp, AssetsTwigExtension::renderIcon($this->twigEnvironment, "g:home"));
    }

    /**
     * Test renderIcon()
     *
     * @return void
     */
    public function testRenderIconWithMaterialDesignIconicFont(): void {

        $exp = '<i class="zmdi zmdi-home"></i>';

        $this->assertEquals($exp, AssetsTwigExtension::renderIcon($this->twigEnvironment, "zmdi:home"));
    }

    /**
     * Test renderIcon()
     *
     * @return void
     */
    public function testRenderIconWithMeteocons(): void {

        $exp = '<i class="meteocons" data-meteocons="A"></i>';

        $this->assertEquals($exp, AssetsTwigExtension::renderIcon($this->twigEnvironment, "mc:A"));
    }

    /**
     * Test renderIcon()
     *
     * @return void
     */
    public function testRenderIconWithOther(): void {

        $exp = '<i class="fa fa-home"></i>';

        $this->assertEquals($exp, AssetsTwigExtension::renderIcon($this->twigEnvironment, "fa:home"));
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.bootstrap.twig.extension.assets", AssetsTwigExtension::SERVICE_NAME);

        $obj = new AssetsTwigExtension($this->twigEnvironment);

        $this->assertInstanceOf(ExtensionInterface::class, $obj);

        $this->assertSame($this->twigEnvironment, $obj->getTwigEnvironment());
    }
}

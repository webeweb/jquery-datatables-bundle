<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\BootstrapBundle\Tests\Twig\Extension\Extend;

use Twig\Environment;
use Twig\Extension\ExtensionInterface;
use Twig\Node\Node;
use Twig\TwigFilter;
use Twig\TwigFunction;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Extend\MaterialDesignIconicFontTwigExtension;
use WBW\Library\Widget\Renderer\Component\IconRendererInterface;

/**
 * Material Design Iconic Font Twig extension test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Twig\Extension\Extend
 */
class MaterialDesignIconicFontTwigExtensionTest extends AbstractTestCase {

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
     * Test getFilters()
     *
     * @return void
     */
    public function testGetFilters(): void {

        $obj = new MaterialDesignIconicFontTwigExtension($this->twigEnvironment);

        $res = $obj->getFilters();
        $this->assertCount(4, $res);

        $i = -1;

        $this->assertInstanceOf(TwigFilter::class, $res[++$i]);
        $this->assertEquals("materialDesignIconicFontList", $res[$i]->getName());
        $this->assertEquals([$obj, "materialDesignIconicFontListFilter"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFilter::class, $res[++$i]);
        $this->assertEquals("mdiFontList", $res[$i]->getName());
        $this->assertEquals([$obj, "materialDesignIconicFontListFilter"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFilter::class, $res[++$i]);
        $this->assertEquals("materialDesignIconicFontListIcon", $res[$i]->getName());
        $this->assertEquals([$obj, "materialDesignIconicFontListIconFilter"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFilter::class, $res[++$i]);
        $this->assertEquals("mdiFontListIcon", $res[$i]->getName());
        $this->assertEquals([$obj, "materialDesignIconicFontListIconFilter"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));
    }

    /**
     * Test getFunctions()
     *
     * @return void
     */
    public function testGetFunctions(): void {

        $obj = new MaterialDesignIconicFontTwigExtension($this->twigEnvironment);

        $res = $obj->getFunctions();
        $this->assertCount(2, $res);

        $i = -1;

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("materialDesignIconicFontIcon", $res[$i]->getName());
        $this->assertEquals([$obj, "materialDesignIconicFontIconFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("mdiIcon", $res[$i]->getName());
        $this->assertEquals([$obj, "materialDesignIconicFontIconFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));
    }

    /**
     * Test materialDesignIconicFontIconFunction()
     *
     * @return void
     */
    public function testMaterialDesignIconicFontIconFunction(): void {

        $arg = [
            "name"       => "camera-retro",
            "size"       => "lg",
            "fixedWidth" => true,
            "border"     => "border-circle",
            "pull"       => "left",
            "spin"       => "spin",
            "rotate"     => "180",
            "flip"       => "horizontal",
            "style"      => "color: #FFFFFF;",
        ];
        $exp = '<i class="zmdi zmdi-camera-retro zmdi-hc-lg zmdi-hc-fw zmdi-hc-border-circle pull-left zmdi-hc-spin zmdi-hc-rotate-180 zmdi-hc-flip-horizontal" style="color: #FFFFFF;"></i>';

        $obj = new MaterialDesignIconicFontTwigExtension($this->twigEnvironment);

        $this->assertEquals($exp, $obj->materialDesignIconicFontIconFunction($arg));
    }

    /**
     * Test materialDesignIconicFontIconFunction()
     *
     * @return void
     */
    public function testMaterialDesignIconicFontIconFunctionWithoutArguments(): void {

        $arg = [];
        $exp = '<i class="zmdi zmdi-home"></i>';

        $obj = new MaterialDesignIconicFontTwigExtension($this->twigEnvironment);

        $this->assertEquals($exp, $obj->materialDesignIconicFontIconFunction($arg));
    }

    /**
     * Test materialDesignIconicFontListFilter()
     *
     * @return void
     */
    public function testMaterialDesignIconicFontListFilter(): void {

        $obj = new MaterialDesignIconicFontTwigExtension($this->twigEnvironment);

        $arg = $obj->materialDesignIconicFontListIconFilter($obj->materialDesignIconicFontIconFunction(), "content");
        $exp = '<ul class="zmdi-hc-ul"><li><i class="zmdi-hc-li zmdi zmdi-home"></i>content</li></ul>';

        $this->assertEquals($exp, $obj->materialDesignIconicFontListFilter($arg));
    }

    /**
     * Test materialDesignIconicFontListIconFilter()
     *
     * @return void
     */
    public function testMaterialDesignIconicFontListIconFilter(): void {

        $obj = new MaterialDesignIconicFontTwigExtension($this->twigEnvironment);

        $arg = $obj->materialDesignIconicFontIconFunction();
        $exp = '<li><i class="zmdi-hc-li zmdi zmdi-home"></i></li>';

        $this->assertEquals($exp, $obj->materialDesignIconicFontListIconFilter($arg, null));
    }

    /**
     * Test materialDesignIconicFontListIconFilter()
     *
     * @return void
     */
    public function testMaterialDesignIconicFontListIconFilterWithContent(): void {

        $obj = new MaterialDesignIconicFontTwigExtension($this->twigEnvironment);

        $arg = $obj->materialDesignIconicFontIconFunction();
        $exp = '<li><i class="zmdi-hc-li zmdi zmdi-home"></i>content</li>';

        $this->assertEquals($exp, $obj->materialDesignIconicFontListIconFilter($arg, "content"));
    }

    /**
     * Test renderIcon()
     *
     * @return void
     */
    public function testRenderIcon(): void {

        $obj = new MaterialDesignIconicFontTwigExtension($this->twigEnvironment);

        $exp = '<i class="zmdi zmdi-camera-retro" style="color: #FFFFFF;"></i>';

        $this->assertEquals($exp, $obj->renderIcon("camera-retro", "color: #FFFFFF;"));
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.bootstrap.twig.extension.extend.material_design_iconic_font", MaterialDesignIconicFontTwigExtension::SERVICE_NAME);

        $obj = new MaterialDesignIconicFontTwigExtension($this->twigEnvironment);

        $this->assertInstanceOf(ExtensionInterface::class, $obj);
        $this->assertInstanceOf(IconRendererInterface::class, $obj);

        $this->assertSame($this->twigEnvironment, $obj->getTwigEnvironment());
    }
}

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

namespace WBW\Bundle\BootstrapBundle\Tests\Twig\Extension\Extend;

use Twig\Environment;
use Twig\Extension\ExtensionInterface;
use Twig\Node\Node;
use Twig\TwigFilter;
use Twig\TwigFunction;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Extend\FontAwesomeTwigExtension;
use WBW\Library\Widget\Renderer\Component\IconRendererInterface;

/**
 * Font Awesome Twig extension test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Twig\Extension\Extend
 */
class FontAwesomeTwigExtensionTest extends AbstractTestCase {

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
     * Test fontAwesomeIconFunction()
     *
     * @return void
     */
    public function testFontAwesomeIconFunction(): void {

        $obj = new FontAwesomeTwigExtension($this->twigEnvironment);

        $arg = [
            "font"       => "s",
            "name"       => "camera-retro",
            "size"       => "lg",
            "fixedWidth" => true,
            "bordered"   => true,
            "pull"       => "left",
            "animation"  => "spin",
            "style"      => "color: #FFFFFF;",
        ];
        $exp = '<i class="fas fa-camera-retro fa-lg fa-fw fa-border fa-pull-left fa-spin" style="color: #FFFFFF;"></i>';

        $this->assertEquals($exp, $obj->fontAwesomeIconFunction($arg));
    }

    /**
     * Test fontAwesomeIconFunction()
     *
     * @return void
     */
    public function testFontAwesomeIconFunctionWithoutArguments(): void {

        $obj = new FontAwesomeTwigExtension($this->twigEnvironment);

        $arg = [];
        $exp = '<i class="fa fa-home"></i>';

        $this->assertEquals($exp, $obj->fontAwesomeIconFunction($arg));
    }

    /**
     * Test fontAwesomeListFilter()
     *
     * @return void
     */
    public function testFontAwesomeListFilter(): void {

        $obj = new FontAwesomeTwigExtension($this->twigEnvironment);

        $arg = $obj->fontAwesomeListIconFilter($obj->fontAwesomeIconFunction(), "content");
        $exp = '<ul class="fa-ul"><li><span class="fa-li"><i class="fa fa-home"></i></span>content</li></ul>';

        $this->assertEquals($exp, $obj->fontAwesomeListFilter($arg));
    }

    /**
     * Test fontAwesomeListIconFilter()
     *
     * @return void
     */
    public function testFontAwesomeListIconFilter(): void {

        $obj = new FontAwesomeTwigExtension($this->twigEnvironment);

        $arg = $obj->fontAwesomeIconFunction();
        $exp = '<li><span class="fa-li"><i class="fa fa-home"></i></span></li>';

        $this->assertEquals($exp, $obj->fontAwesomeListIconFilter($arg, null));
    }

    /**
     * Test fontAwesomeListIconFilter()
     *
     * @return void
     */
    public function testFontAwesomeListIconFilterWithContent(): void {

        $obj = new FontAwesomeTwigExtension($this->twigEnvironment);

        $arg = $obj->fontAwesomeIconFunction();
        $exp = '<li><span class="fa-li"><i class="fa fa-home"></i></span>content</li>';

        $this->assertEquals($exp, $obj->fontAwesomeListIconFilter($arg, "content"));
    }

    /**
     * Test getFilters()
     *
     * @return void
     */
    public function testGetFilters(): void {

        $obj = new FontAwesomeTwigExtension($this->twigEnvironment);

        $res = $obj->getFilters();
        $this->assertCount(4, $res);

        $i = -1;

        $this->assertInstanceOf(TwigFilter::class, $res[++$i]);
        $this->assertEquals("fontAwesomeList", $res[$i]->getName());
        $this->assertEquals([$obj, "fontAwesomeListFilter"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFilter::class, $res[++$i]);
        $this->assertEquals("faList", $res[$i]->getName());
        $this->assertEquals([$obj, "fontAwesomeListFilter"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFilter::class, $res[++$i]);
        $this->assertEquals("fontAwesomeListIcon", $res[$i]->getName());
        $this->assertEquals([$obj, "fontAwesomeListIconFilter"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFilter::class, $res[++$i]);
        $this->assertEquals("faListIcon", $res[$i]->getName());
        $this->assertEquals([$obj, "fontAwesomeListIconFilter"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));
    }

    /**
     * Test getFunctions()
     *
     * @return void
     */
    public function testGetFunctions(): void {

        $obj = new FontAwesomeTwigExtension($this->twigEnvironment);

        $res = $obj->getFunctions();
        $this->assertCount(2, $res);

        $i = -1;

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("fontAwesomeIcon", $res[$i]->getName());
        $this->assertEquals([$obj, "fontAwesomeIconFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("faIcon", $res[$i]->getName());
        $this->assertEquals([$obj, "fontAwesomeIconFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));
    }

    /**
     * Test renderIcon()
     *
     * @return void
     */
    public function testRenderIcon(): void {

        $obj = new FontAwesomeTwigExtension($this->twigEnvironment);

        $exp = '<i class="fa fa-camera-retro" style="color: #FFFFFF;"></i>';

        $this->assertEquals($exp, $obj->renderIcon("camera-retro", "color: #FFFFFF;"));
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.bootstrap.twig.extension.extend.font_awesome", FontAwesomeTwigExtension::SERVICE_NAME);

        $obj = new FontAwesomeTwigExtension($this->twigEnvironment);

        $this->assertInstanceOf(ExtensionInterface::class, $obj);
        $this->assertInstanceOf(IconRendererInterface::class, $obj);

        $this->assertSame($this->twigEnvironment, $obj->getTwigEnvironment());
    }
}

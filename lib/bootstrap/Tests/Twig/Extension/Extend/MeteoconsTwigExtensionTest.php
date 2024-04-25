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
use Twig\TwigFunction;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Extend\MeteoconsTwigExtension;
use WBW\Library\Widget\Renderer\Component\IconRendererInterface;

/**
 * Meteocons Twig extension test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Twig\Extension\Extend
 */
class MeteoconsTwigExtensionTest extends AbstractTestCase {

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

        $obj = new MeteoconsTwigExtension($this->twigEnvironment);

        $res = $obj->getFilters();
        $this->assertCount(0, $res);
    }

    /**
     * Test getFunctions()
     *
     * @return void
     */
    public function testGetFunctions(): void {

        $obj = new MeteoconsTwigExtension($this->twigEnvironment);

        $res = $obj->getFunctions();
        $this->assertCount(1, $res);

        $i = -1;

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("meteoconsIcon", $res[$i]->getName());
        $this->assertEquals([$obj, "meteoconsIconFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));
    }

    /**
     * Test meteoconsIconFunction()
     *
     * @return void
     */
    public function testMeteoconsIconFunction(): void {

        $obj = new MeteoconsTwigExtension($this->twigEnvironment);

        $arg = [
            "name"  => "B",
            "style" => "color: #FFFFFF;",
        ];
        $exp = '<i class="meteocons" data-meteocons="B" style="color: #FFFFFF;"></i>';

        $this->assertEquals($exp, $obj->meteoconsIconFunction($arg));
    }

    /**
     * Test meteoconsIconFunction()
     *
     * @return void
     */
    public function testMeteoconsIconFunctionWithName(): void {

        $obj = new MeteoconsTwigExtension($this->twigEnvironment);

        $arg = [
            "name" => "B",
        ];
        $exp = '<i class="meteocons" data-meteocons="B"></i>';

        $this->assertEquals($exp, $obj->meteoconsIconFunction($arg));
    }

    /**
     * Test meteoconsIconFunction()
     *
     * @return void
     */
    public function testMeteoconsIconFunctionWithStyle(): void {

        $obj = new MeteoconsTwigExtension($this->twigEnvironment);

        $arg = [
            "style" => "color: #FFFFFF;",
        ];
        $exp = '<i class="meteocons" data-meteocons="A" style="color: #FFFFFF;"></i>';

        $this->assertEquals($exp, $obj->meteoconsIconFunction($arg));
    }

    /**
     * Test meteoconsIconFunction()
     *
     * @return void
     */
    public function testMeteoconsIconFunctionWithoutArguments(): void {

        $obj = new MeteoconsTwigExtension($this->twigEnvironment);

        $arg = [];
        $exp = '<i class="meteocons" data-meteocons="A"></i>';

        $this->assertEquals($exp, $obj->meteoconsIconFunction($arg));
    }

    /**
     * Test renderIcon()
     *
     * @return void
     */
    public function testRenderIcon(): void {

        $obj = new MeteoconsTwigExtension($this->twigEnvironment);

        $exp = '<i class="meteocons" data-meteocons="B" style="color: #FFFFFF;"></i>';

        $this->assertEquals($exp, $obj->renderIcon("B", "color: #FFFFFF;"));
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.bootstrap.twig.extension.extend.meteocons", MeteoconsTwigExtension::SERVICE_NAME);

        $obj = new MeteoconsTwigExtension($this->twigEnvironment);

        $this->assertInstanceOf(ExtensionInterface::class, $obj);
        $this->assertInstanceOf(IconRendererInterface::class, $obj);

        $this->assertSame($this->twigEnvironment, $obj->getTwigEnvironment());
    }
}

<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
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
use WBW\Bundle\BootstrapBundle\Twig\Extension\Extend\IconTwigExtension;
use WBW\Library\Widget\Renderer\Component\IconRendererInterface;

/**
 * Bootstrap icon Twig extension test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Twig\Extension\Extend
 */
class IconTwigExtensionTest extends AbstractTestCase {

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
     * Test bootstrapIconFunction()
     *
     * @return void
     */
    public function testBootstrapIconFunction(): void {

        $obj = new IconTwigExtension($this->twigEnvironment);

        $arg = ["name" => "asterisk"];
        $exp = '<i class="bi bi-asterisk"></i>';

        $this->assertEquals($exp, $obj->bootstrapIconFunction($arg));
    }

    /**
     * Test bootstrapIconFunction()
     *
     * @return void
     */
    public function testBootstrapIconFunctionWithoutArguments(): void {

        $obj = new IconTwigExtension($this->twigEnvironment);

        $arg = [];
        $exp = '<i class="bi bi-house"></i>';

        $this->assertEquals($exp, $obj->bootstrapIconFunction($arg));
    }

    /**
     * Test getFilters()
     *
     * @return void
     */
    public function testGetFilters(): void {

        $obj = new IconTwigExtension($this->twigEnvironment);

        $res = $obj->getFilters();
        $this->assertCount(0, $res);
    }

    /**
     * Test getFunctions()
     *
     * @return void
     */
    public function testGetFunctions(): void {

        $obj = new IconTwigExtension($this->twigEnvironment);

        $res = $obj->getFunctions();
        $this->assertCount(2, $res);

        $i = -1;

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bootstrapIcon", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapIconFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bsIcon", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapIconFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));
    }

    /**
     * Test renderIcon()
     *
     * @return void
     */
    public function testRenderIcon(): void {

        $obj = new IconTwigExtension($this->twigEnvironment);

        $exp = '<i class="bi bi-asterisk" style="display: none;"></i>';

        $this->assertEquals($exp, $obj->renderIcon("asterisk", "display: none;"));
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.bootstrap.twig.extension.extend.icon", IconTwigExtension::SERVICE_NAME);

        $obj = new IconTwigExtension($this->twigEnvironment);

        $this->assertInstanceOf(ExtensionInterface::class, $obj);
        $this->assertInstanceOf(IconRendererInterface::class, $obj);

        $this->assertSame($this->twigEnvironment, $obj->getTwigEnvironment());
    }
}

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
use WBW\Bundle\BootstrapBundle\Twig\Extension\Extend\GlyphiconTwigExtension;
use WBW\Library\Widget\Renderer\Component\IconRendererInterface;

/**
 * Glyphicon Twig extension test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Twig\Extension\Extend
 */
class GlyphiconTwigExtensionTest extends AbstractTestCase {

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
     * Test bootstrapGlyphiconFunction()
     *
     * @return void
     */
    public function testBootstrapGlyphiconFunction(): void {

        $obj = new GlyphiconTwigExtension($this->twigEnvironment);

        $arg = ["name" => "asterisk"];
        $exp = '<span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>';

        $this->assertEquals($exp, $obj->bootstrapGlyphiconFunction($arg));
    }

    /**
     * Test bootstrapGlyphiconFunction()
     *
     * @return void
     */
    public function testBootstrapGlyphiconFunctionWithoutArguments(): void {

        $obj = new GlyphiconTwigExtension($this->twigEnvironment);

        $arg = [];
        $exp = '<span class="glyphicon glyphicon-home" aria-hidden="true"></span>';

        $this->assertEquals($exp, $obj->bootstrapGlyphiconFunction($arg));
    }

    /**
     * Test getFilters()
     *
     * @return void
     */
    public function testGetFilters(): void {

        $obj = new GlyphiconTwigExtension($this->twigEnvironment);

        $res = $obj->getFilters();
        $this->assertCount(0, $res);
    }

    /**
     * Test getFunctions()
     *
     * @return void
     */
    public function testGetFunctions(): void {

        $obj = new GlyphiconTwigExtension($this->twigEnvironment);
        $obj->setVersion(3);

        $res = $obj->getFunctions();
        $this->assertCount(2, $res);

        $i = -1;

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bootstrapGlyphicon", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapGlyphiconFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bsGlyphicon", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapGlyphiconFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $obj->setVersion(4);

        $res = $obj->getFunctions();
        $this->assertCount(0, $res);
    }

    /**
     * Test renderIcon()
     *
     * @return void
     */
    public function testRenderIcon(): void {

        $obj = new GlyphiconTwigExtension($this->twigEnvironment);

        $exp = '<span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="display: none;"></span>';

        $this->assertEquals($exp, $obj->renderIcon("asterisk", "display: none;"));
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.bootstrap.twig.extension.extend.glyphicon", GlyphiconTwigExtension::SERVICE_NAME);

        $obj = new GlyphiconTwigExtension($this->twigEnvironment);

        $this->assertInstanceOf(ExtensionInterface::class, $obj);
        $this->assertInstanceOf(IconRendererInterface::class, $obj);

        $this->assertSame($this->twigEnvironment, $obj->getTwigEnvironment());
    }
}

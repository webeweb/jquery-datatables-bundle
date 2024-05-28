<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\BootstrapBundle\Tests\Twig\Extension\Extend;

use Twig\Environment;
use Twig\Extension\ExtensionInterface;
use Twig\Node\Node;
use Twig\TwigFunction;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Extend\TablerIconTwigExtension;
use WBW\Library\Widget\Renderer\Component\IconRendererInterface;

/**
 * Tabler icon Twig extension test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Twig\Extension\Extend
 */
class TablerIconTwigExtensionTest extends AbstractTestCase {

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

        $obj = new TablerIconTwigExtension($this->twigEnvironment);

        $res = $obj->getFilters();
        $this->assertCount(0, $res);
    }

    /**
     * Test getFunctions()
     *
     * @return void
     */
    public function testGetFunctions(): void {

        $obj = new TablerIconTwigExtension($this->twigEnvironment);

        $res = $obj->getFunctions();
        $this->assertCount(2, $res);

        $i = -1;

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("tablerIcon", $res[$i]->getName());
        $this->assertEquals([$obj, "tablerIconFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("tiIcon", $res[$i]->getName());
        $this->assertEquals([$obj, "tablerIconFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));
    }

    /**
     * Test renderIcon()
     *
     * @return void
     */
    public function testRenderIcon(): void {

        $obj = new TablerIconTwigExtension($this->twigEnvironment);

        $exp = '';

        $this->assertEquals($exp, $obj->renderIcon("asterisk", "display: none;"));
    }

    /**
     * Test tablerIconFunction()
     *
     * @return void
     */
    public function testTablerIconFunction(): void {

        $arg = ["name" => "asterisk"];
        $exp = '';

        $obj = new TablerIconTwigExtension($this->twigEnvironment);

        $this->assertEquals($exp, $obj->tablerIconFunction($arg));
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.bootstrap.twig.extension.extend.tabler", TablerIconTwigExtension::SERVICE_NAME);

        $obj = new TablerIconTwigExtension($this->twigEnvironment);

        $this->assertInstanceOf(ExtensionInterface::class, $obj);
        $this->assertInstanceOf(IconRendererInterface::class, $obj);

        $this->assertSame($this->twigEnvironment, $obj->getTwigEnvironment());
    }
}

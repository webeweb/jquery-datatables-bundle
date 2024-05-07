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

namespace WBW\Bundle\BootstrapBundle\Tests\Twig\Extension\Component;

use Twig\Environment;
use Twig\Extension\ExtensionInterface;
use Twig\Node\Node;
use Twig\TwigFunction;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Component\AlertTwigExtension;

/**
 * Alert Twig extension test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Twig\Extension\Component
 */
class AlertTwigExtensionTest extends AbstractTestCase {

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
     * Test bootstrapAlertDangerFunction()
     *
     * @return void
     */
    public function testBootstrapAlertDangerFunction(): void {

        $arg = ["content" => "content"];
        $exp = '<div class="alert alert-danger" role="alert">content</div>';

        $obj = new AlertTwigExtension($this->twigEnvironment);

        $this->assertEquals($exp, $obj->bootstrapAlertDangerFunction($arg));
    }

    /**
     * Test bootstrapAlertDangerFunction()
     *
     * @return void
     */
    public function testBootstrapAlertDangerFunctionWithoutArguments(): void {

        $arg = [];
        $exp = '<div class="alert alert-danger" role="alert"></div>';

        $obj = new AlertTwigExtension($this->twigEnvironment);

        $this->assertEquals($exp, $obj->bootstrapAlertDangerFunction($arg));
    }

    /**
     * Test bootstrapAlertDarkFunction()
     *
     * @return void
     */
    public function testBootstrapAlertDarkFunction(): void {

        $arg = ["content" => "content"];
        $exp = '<div class="alert alert-dark" role="alert">content</div>';

        $obj = new AlertTwigExtension($this->twigEnvironment);

        $this->assertEquals($exp, $obj->bootstrapAlertDarkFunction($arg));
    }

    /**
     * Test bootstrapAlertDarkFunction()
     *
     * @return void
     */
    public function testBootstrapAlertDarkFunctionWithoutArguments(): void {

        $arg = [];
        $exp = '<div class="alert alert-dark" role="alert"></div>';

        $obj = new AlertTwigExtension($this->twigEnvironment);

        $this->assertEquals($exp, $obj->bootstrapAlertDarkFunction($arg));
    }

    /**
     * Test bootstrapAlertInfoFunction()
     *
     * @return void
     */
    public function testBootstrapAlertInfoFunction(): void {

        $arg = ["content" => "content"];
        $exp = '<div class="alert alert-info" role="alert">content</div>';

        $obj = new AlertTwigExtension($this->twigEnvironment);

        $this->assertEquals($exp, $obj->bootstrapAlertInfoFunction($arg));
    }

    /**
     * Test bootstrapAlertInfoFunction()
     *
     * @return void
     */
    public function testBootstrapAlertInfoFunctionWithoutArguments(): void {

        $arg = [];
        $exp = '<div class="alert alert-info" role="alert"></div>';

        $obj = new AlertTwigExtension($this->twigEnvironment);

        $this->assertEquals($exp, $obj->bootstrapAlertInfoFunction($arg));
    }

    /**
     * Test bootstrapAlertLightFunction()
     *
     * @return void
     */
    public function testBootstrapAlertLightFunction(): void {

        $arg = ["content" => "content"];
        $exp = '<div class="alert alert-light" role="alert">content</div>';

        $obj = new AlertTwigExtension($this->twigEnvironment);

        $this->assertEquals($exp, $obj->bootstrapAlertLightFunction($arg));
    }

    /**
     * Test bootstrapAlertLightFunction()
     *
     * @return void
     */
    public function testBootstrapAlertLightFunctionWithoutArguments(): void {

        $arg = [];
        $exp = '<div class="alert alert-light" role="alert"></div>';

        $obj = new AlertTwigExtension($this->twigEnvironment);

        $this->assertEquals($exp, $obj->bootstrapAlertLightFunction($arg));
    }

    /**
     * Test bootstrapAlertLinkFunction()
     *
     * @return void
     */
    public function testBootstrapAlertLinkFunction(): void {

        $arg = ["href" => "https://github.com/", "content" => "content"];
        $exp = '<a href="https://github.com/">content</a>';

        $obj = new AlertTwigExtension($this->twigEnvironment);

        $this->assertEquals($exp, $obj->bootstrapAlertLinkFunction($arg));
    }

    /**
     * Test bootstrapAlertLinkFunction()
     *
     * @return void
     */
    public function testBootstrapAlertLinkFunctionWithContent(): void {

        $arg = ["content" => "content"];
        $exp = '<a href="javascript: void(0);">content</a>';

        $obj = new AlertTwigExtension($this->twigEnvironment);

        $this->assertEquals($exp, $obj->bootstrapAlertLinkFunction($arg));
    }

    /**
     * Test bootstrapAlertLinkFunction()
     *
     * @return void
     */
    public function testBootstrapAlertLinkFunctionWithHref(): void {

        $arg = ["href" => "https://github.com/"];
        $exp = '<a href="https://github.com/"></a>';

        $obj = new AlertTwigExtension($this->twigEnvironment);

        $this->assertEquals($exp, $obj->bootstrapAlertLinkFunction($arg));
    }

    /**
     * Test bootstrapAlertLinkFunction()
     *
     * @return void
     */
    public function testBootstrapAlertLinkFunctionWithoutArguments(): void {

        $arg = [];
        $exp = '<a href="javascript: void(0);"></a>';

        $obj = new AlertTwigExtension($this->twigEnvironment);

        $this->assertEquals($exp, $obj->bootstrapAlertLinkFunction($arg));
    }

    /**
     * Test bootstrapAlertSecondaryFunction()
     *
     * @return void
     */
    public function testBootstrapAlertSecondaryFunction(): void {

        $arg = ["content" => "content"];
        $exp = '<div class="alert alert-secondary" role="alert">content</div>';

        $obj = new AlertTwigExtension($this->twigEnvironment);

        $this->assertEquals($exp, $obj->bootstrapAlertSecondaryFunction($arg));
    }

    /**
     * Test bootstrapAlertSecondaryFunction()
     *
     * @return void
     */
    public function testBootstrapAlertSecondaryFunctionWithoutArguments(): void {

        $arg = [];
        $exp = '<div class="alert alert-secondary" role="alert"></div>';

        $obj = new AlertTwigExtension($this->twigEnvironment);

        $this->assertEquals($exp, $obj->bootstrapAlertSecondaryFunction($arg));
    }

    /**
     * Test bootstrapAlertSuccessFunction()
     *
     * @return void
     */
    public function testBootstrapAlertSuccessFunction(): void {

        $arg = ["content" => "content"];
        $exp = '<div class="alert alert-success" role="alert">content</div>';

        $obj = new AlertTwigExtension($this->twigEnvironment);

        $this->assertEquals($exp, $obj->bootstrapAlertSuccessFunction($arg));
    }

    /**
     * Test bootstrapAlertSuccessFunction()
     *
     * @return void
     */
    public function testBootstrapAlertSuccessFunctionWithoutArguments(): void {

        $arg = [];
        $exp = '<div class="alert alert-success" role="alert"></div>';

        $obj = new AlertTwigExtension($this->twigEnvironment);

        $this->assertEquals($exp, $obj->bootstrapAlertSuccessFunction($arg));
    }

    /**
     * Test bootstrapAlertWarningFunction()
     *
     * @return void
     */
    public function testBootstrapAlertWarningFunction(): void {

        $arg = ["content" => "content"];
        $exp = '<div class="alert alert-warning" role="alert">content</div>';

        $obj = new AlertTwigExtension($this->twigEnvironment);

        $this->assertEquals($exp, $obj->bootstrapAlertWarningFunction($arg));
    }

    /**
     * Test bootstrapAlertWarningFunction()
     *
     * @return void
     */
    public function testBootstrapAlertWarningFunctionWithoutArguments(): void {

        $arg = [];
        $exp = '<div class="alert alert-warning" role="alert"></div>';

        $obj = new AlertTwigExtension($this->twigEnvironment);

        $this->assertEquals($exp, $obj->bootstrapAlertWarningFunction($arg));
    }

    /**
     * Test getFilters()
     *
     * @return void
     */
    public function testGetFilters(): void {

        $obj = new AlertTwigExtension($this->twigEnvironment);

        $res = $obj->getFilters();
        $this->assertCount(0, $res);
    }

    /**
     * Test getFunctions()
     *
     * @return void
     */
    public function testGetFunctions(): void {

        $obj = new AlertTwigExtension($this->twigEnvironment);

        $res = $obj->getFunctions();
        $this->assertCount(16, $res);

        $i = -1;

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bootstrapAlertDanger", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapAlertDangerFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bsAlertDanger", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapAlertDangerFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bootstrapAlertInfo", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapAlertInfoFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bsAlertInfo", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapAlertInfoFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bootstrapAlertSuccess", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapAlertSuccessFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bsAlertSuccess", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapAlertSuccessFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bootstrapAlertWarning", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapAlertWarningFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bsAlertWarning", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapAlertWarningFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bootstrapAlertDark", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapAlertDarkFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bsAlertDark", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapAlertDarkFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bootstrapAlertLight", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapAlertLightFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bsAlertLight", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapAlertLightFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bootstrapAlertLink", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapAlertLinkFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bsAlertLink", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapAlertLinkFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bootstrapAlertSecondary", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapAlertSecondaryFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bsAlertSecondary", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapAlertSecondaryFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));
    }

    /**
     * Test getFunctions()
     *
     * @return void
     */
    public function testGetFunctionsWithBootstrap3(): void {

        $obj = new AlertTwigExtension($this->twigEnvironment);
        $obj->setVersion(3);

        $res = $obj->getFunctions();
        $this->assertCount(8, $res);

        $i = -1;

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bootstrapAlertDanger", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapAlertDangerFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bsAlertDanger", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapAlertDangerFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bootstrapAlertInfo", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapAlertInfoFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bsAlertInfo", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapAlertInfoFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bootstrapAlertSuccess", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapAlertSuccessFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bsAlertSuccess", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapAlertSuccessFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bootstrapAlertWarning", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapAlertWarningFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bsAlertWarning", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapAlertWarningFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.bootstrap.twig.extension.component.alert", AlertTwigExtension::SERVICE_NAME);

        $obj = new AlertTwigExtension($this->twigEnvironment);

        $this->assertInstanceOf(ExtensionInterface::class, $obj);

        $this->assertSame($this->twigEnvironment, $obj->getTwigEnvironment());
    }
}

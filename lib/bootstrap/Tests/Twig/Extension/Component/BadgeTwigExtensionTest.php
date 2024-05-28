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

namespace WBW\Bundle\BootstrapBundle\Tests\Twig\Extension\Component;

use Twig\Environment;
use Twig\Extension\ExtensionInterface;
use Twig\Node\Node;
use Twig\TwigFilter;
use Twig\TwigFunction;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Component\BadgeTwigExtension;

/**
 * Badge Twig extension test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Twig\Extension\Component
 */
class BadgeTwigExtensionTest extends AbstractTestCase {

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
     * Test bootstrapBadgeDangerFunction()
     *
     * @return void
     */
    public function testBootstrapBadgeDangerFunction(): void {

        $arg = ["content" => "content", "pill" => true];
        $exp = '<span class="badge badge-danger badge-pill">content</span>';

        $obj = new BadgeTwigExtension($this->twigEnvironment);
        $obj->setVersion(4);

        $this->assertEquals($exp, $obj->bootstrapBadgeDangerFunction($arg));
    }

    /**
     * Test bootstrapBadgeDarkFunction()
     *
     * @return void
     */
    public function testBootstrapBadgeDarkFunction(): void {

        $arg = ["content" => "content", "pill" => true];
        $exp = '<span class="badge badge-dark badge-pill">content</span>';

        $obj = new BadgeTwigExtension($this->twigEnvironment);
        $obj->setVersion(4);

        $this->assertEquals($exp, $obj->bootstrapBadgeDarkFunction($arg));
    }

    /**
     * Test bootstrapBadgeFunction()
     *
     * @return void
     */
    public function testBootstrapBadgeFunction(): void {

        $arg = ["content" => "content", "pill" => true];
        $exp = '<span class="badge badge-pill">content</span>';

        $obj = new BadgeTwigExtension($this->twigEnvironment);
        $obj->setVersion(4);

        $this->assertEquals($exp, $obj->bootstrapBadgeFunction($arg));
    }

    /**
     * Test bootstrapBadgeFunction()
     *
     * @return void
     */
    public function testBootstrapBadgeFunctionWithoutArguments(): void {

        $arg = [];
        $exp = '<span class="badge"></span>';

        $obj = new BadgeTwigExtension($this->twigEnvironment);
        $obj->setVersion(4);

        $this->assertEquals($exp, $obj->bootstrapBadgeFunction($arg));
    }

    /**
     * Test bootstrapBadgeInfoFunction()
     *
     * @return void
     */
    public function testBootstrapBadgeInfoFunction(): void {

        $arg = ["content" => "content", "pill" => true];
        $exp = '<span class="badge badge-info badge-pill">content</span>';

        $obj = new BadgeTwigExtension($this->twigEnvironment);
        $obj->setVersion(4);

        $this->assertEquals($exp, $obj->bootstrapBadgeInfoFunction($arg));
    }

    /**
     * Test bootstrapBadgeLightFunction()
     *
     * @return void
     */
    public function testBootstrapBadgeLightFunction(): void {

        $arg = ["content" => "content", "pill" => true];
        $exp = '<span class="badge badge-light badge-pill">content</span>';

        $obj = new BadgeTwigExtension($this->twigEnvironment);
        $obj->setVersion(4);

        $this->assertEquals($exp, $obj->bootstrapBadgeLightFunction($arg));
    }

    /**
     * Test bootstrapBadgeLinkFilter()
     *
     * @return void
     */
    public function testBootstrapBadgeLinkFilter(): void {

        $arg = [];
        $exp = '<a href="https://github.com/" target="_blank" class="badge badge-danger"></a>';

        $obj = new BadgeTwigExtension($this->twigEnvironment);
        $obj->setVersion(4);

        $this->assertEquals($exp, $obj->bootstrapBadgeLinkFilter($obj->bootstrapBadgeDangerFunction($arg), "https://github.com/", "_blank"));
    }

    /**
     * Test bootstrapBadgePrimaryFunction()
     *
     * @return void
     */
    public function testBootstrapBadgePrimaryFunction(): void {

        $arg = ["content" => "content", "pill" => true];
        $exp = '<span class="badge badge-primary badge-pill">content</span>';

        $obj = new BadgeTwigExtension($this->twigEnvironment);
        $obj->setVersion(4);

        $this->assertEquals($exp, $obj->bootstrapBadgePrimaryFunction($arg));
    }

    /**
     * Test bootstrapBadgeSecondaryFunction()
     *
     * @return void
     */
    public function testBootstrapBadgeSecondaryFunction(): void {

        $arg = ["content" => "content", "pill" => true];
        $exp = '<span class="badge badge-secondary badge-pill">content</span>';

        $obj = new BadgeTwigExtension($this->twigEnvironment);
        $obj->setVersion(4);

        $this->assertEquals($exp, $obj->bootstrapBadgeSecondaryFunction($arg));
    }

    /**
     * Test bootstrapBadgeSuccessFunction()
     *
     * @return void
     */
    public function testBootstrapBadgeSuccessFunction(): void {

        $arg = ["content" => "content", "pill" => true];
        $exp = '<span class="badge badge-success badge-pill">content</span>';

        $obj = new BadgeTwigExtension($this->twigEnvironment);
        $obj->setVersion(4);

        $this->assertEquals($exp, $obj->bootstrapBadgeSuccessFunction($arg));
    }

    /**
     * Test bootstrapBadgeWarningFunction()
     *
     * @return void
     */
    public function testBootstrapBadgeWarningFunction(): void {

        $arg = ["content" => "content", "pill" => true];
        $exp = '<span class="badge badge-warning badge-pill">content</span>';

        $obj = new BadgeTwigExtension($this->twigEnvironment);
        $obj->setVersion(4);

        $this->assertEquals($exp, $obj->bootstrapBadgeWarningFunction($arg));
    }

    /**
     * Test getFilters()
     *
     * @return void
     */
    public function testGetFilters(): void {

        $obj = new BadgeTwigExtension($this->twigEnvironment);

        $res = $obj->getFilters();
        $this->assertCount(2, $res);

        $i = -1;

        $this->assertInstanceOf(TwigFilter::class, $res[++$i]);
        $this->assertEquals("bootstrapBadgeLink", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapBadgeLinkFilter"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFilter::class, $res[++$i]);
        $this->assertEquals("bsBadgeLink", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapBadgeLinkFilter"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));
    }

    /**
     * Test getFunctions()
     *
     * @return void
     */
    public function testGetFunctions(): void {

        $obj = new BadgeTwigExtension($this->twigEnvironment);

        $res = $obj->getFunctions();
        $this->assertCount(16, $res);

        $i = -1;

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bootstrapBadgeDanger", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapBadgeDangerFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bsBadgeDanger", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapBadgeDangerFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bootstrapBadgeDark", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapBadgeDarkFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bsBadgeDark", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapBadgeDarkFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bootstrapBadgeInfo", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapBadgeInfoFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bsBadgeInfo", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapBadgeInfoFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bootstrapBadgeLight", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapBadgeLightFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bsBadgeLight", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapBadgeLightFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bootstrapBadgePrimary", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapBadgePrimaryFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bsBadgePrimary", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapBadgePrimaryFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bootstrapBadgeSecondary", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapBadgeSecondaryFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bsBadgeSecondary", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapBadgeSecondaryFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bootstrapBadgeSuccess", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapBadgeSuccessFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bsBadgeSuccess", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapBadgeSuccessFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bootstrapBadgeWarning", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapBadgeWarningFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bsBadgeWarning", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapBadgeWarningFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));
    }

    /**
     * Test getFunctions()
     *
     * @return void
     */
    public function testGetFunctionsWithBootstrap3(): void {

        $obj = new BadgeTwigExtension($this->twigEnvironment);
        $obj->setVersion(3);

        $res = $obj->getFunctions();
        $this->assertCount(2, $res);

        $i = -1;

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bootstrapBadge", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapBadgeFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bsBadge", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapBadgeFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.bootstrap.twig.extension.component.badge", BadgeTwigExtension::SERVICE_NAME);

        $obj = new BadgeTwigExtension($this->twigEnvironment);

        $this->assertInstanceOf(ExtensionInterface::class, $obj);

        $this->assertSame($this->twigEnvironment, $obj->getTwigEnvironment());
    }
}

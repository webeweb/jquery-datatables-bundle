<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\BootstrapBundle\Tests\Twig\Extension\Component;

use Symfony\Component\Security\Core\User\UserInterface;
use Twig\Environment;
use Twig\Extension\ExtensionInterface;
use Twig\Node\Node;
use Twig\TwigFunction;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Component\LabelTwigExtension;

/**
 * Label Twig extension test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Twig\Extension\Component
 */
class LabelTwigExtensionTest extends AbstractTestCase {

    /**
     * Role choices.
     *
     * @var array<string,string>|null
     */
    private $roleChoices;

    /**
     * Role colors.
     *
     * @var array<string,string>|null
     */
    private $roleColors;

    /**
     * Twig environment.
     *
     * @var Environment|null
     */
    private $twigEnvironment;

    /**
     * User.
     *
     * @var UserInterface|null
     */
    private $user;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set a Twig environment mock.
        $this->twigEnvironment = $this->getMockBuilder(Environment::class)->disableOriginalConstructor()->getMock();

        // Set a User mock.
        $this->user = $this->getMockBuilder(UserInterface::class)->getMock();
        $this->user->expects($this->any())->method("getRoles")->willReturnCallback(function() {
            return ["ROLE_SUPER_ADMIN", "ROLE_ADMIN", "ROLE_USER"];
        });

        // Set the role mocks.
        $this->roleChoices = [
            "ROLE_SUPER_ADMIN" => "label.role.root",
            "ROLE_ADMIN"       => "label.role.admin",
            "ROLE_USER"        => "label.role.user",
        ];
        $this->roleColors  = [
            "ROLE_SUPER_ADMIN" => "#D9534F",
            "ROLE_ADMIN"       => "#337AB7",
        ];
    }

    /**
     * Test bootstrapLabelDangerFunction()
     *
     * @return void
     */
    public function testBootstrapLabelDangerFunction(): void {

        $obj = new LabelTwigExtension($this->twigEnvironment);

        $arg = ["content" => "content"];
        $res = '<span class="label label-danger">content</span>';

        $this->assertEquals($res, $obj->bootstrapLabelDangerFunction($arg));
    }

    /**
     * /**
     * Test bootstrapLabelDangerFunction()
     *
     * @return void
     */
    public function testBootstrapLabelDangerFunctionWithoutArguments(): void {

        $obj = new LabelTwigExtension($this->twigEnvironment);

        $arg = [];
        $res = '<span class="label label-danger"></span>';

        $this->assertEquals($res, $obj->bootstrapLabelDangerFunction($arg));
    }

    /**
     * Test bootstrapLabelDefaultFunction()
     *
     * @return void
     */
    public function testBootstrapLabelDefaultFunction(): void {

        $obj = new LabelTwigExtension($this->twigEnvironment);

        $arg = ["content" => "content"];
        $res = '<span class="label label-default">content</span>';

        $this->assertEquals($res, $obj->bootstrapLabelDefaultFunction($arg));
    }

    /**
     * Test bootstrapLabelDefaultFunction()
     *
     * @return void
     */
    public function testBootstrapLabelDefaultFunctionWithoutArguments(): void {

        $obj = new LabelTwigExtension($this->twigEnvironment);

        $arg = [];
        $res = '<span class="label label-default"></span>';

        $this->assertEquals($res, $obj->bootstrapLabelDefaultFunction($arg));
    }

    /**
     * Test bootstrapLabelInfoFunction()
     *
     * @return void
     */
    public function testBootstrapLabelInfoFunction(): void {

        $obj = new LabelTwigExtension($this->twigEnvironment);

        $arg = ["content" => "content"];
        $res = '<span class="label label-info">content</span>';

        $this->assertEquals($res, $obj->bootstrapLabelInfoFunction($arg));
    }

    /**
     * Test bootstrapLabelInfoFunction()
     *
     * @return void
     */
    public function testBootstrapLabelInfoFunctionWithoutArguments(): void {

        $obj = new LabelTwigExtension($this->twigEnvironment);

        $arg = [];
        $res = '<span class="label label-info"></span>';

        $this->assertEquals($res, $obj->bootstrapLabelInfoFunction($arg));
    }

    /**
     * Test bootstrapLabelPrimaryFunction()
     *
     * @return void
     */
    public function testBootstrapLabelPrimaryFunction(): void {

        $obj = new LabelTwigExtension($this->twigEnvironment);

        $arg = ["content" => "content"];
        $res = '<span class="label label-primary">content</span>';

        $this->assertEquals($res, $obj->bootstrapLabelPrimaryFunction($arg));
    }

    /**
     * Test bootstrapLabelPrimaryFunction()
     *
     * @return void
     */
    public function testBootstrapLabelPrimaryFunctionWithoutArguments(): void {

        $obj = new LabelTwigExtension($this->twigEnvironment);

        $arg = [];
        $res = '<span class="label label-primary"></span>';

        $this->assertEquals($res, $obj->bootstrapLabelPrimaryFunction($arg));
    }

    /**
     * Test bootstrapLabelRolesFunction()
     *
     * @return void
     */
    public function testBootstrapLabelRolesFunction(): void {

        $obj = new LabelTwigExtension($this->twigEnvironment);

        $res = '<span class="label label-default" style="background-color: #D9534F;">label.role.root</span> <span class="label label-default" style="background-color: #337AB7;">label.role.admin</span> <span class="label label-default">label.role.user</span>';

        $this->assertEquals($res, $obj->bootstrapLabelRolesFunction($this->user, $this->roleChoices, $this->roleColors));
    }

    /**
     * Test bootstrapLabelRolesFunction()
     *
     * @return void
     */
    public function testBootstrapLabelRolesFunctionWithNull(): void {

        $obj = new LabelTwigExtension($this->twigEnvironment);

        $this->assertNull($obj->bootstrapLabelRolesFunction(null, $this->roleColors, $this->roleChoices));
    }

    /**
     * Test bootstrapLabelSuccessFunction()
     *
     * @return void
     */
    public function testBootstrapLabelSuccessFunction(): void {

        $obj = new LabelTwigExtension($this->twigEnvironment);

        $arg = ["content" => "content"];
        $res = '<span class="label label-success">content</span>';

        $this->assertEquals($res, $obj->bootstrapLabelSuccessFunction($arg));
    }

    /**
     * Test bootstrapLabelSuccessFunction()
     *
     * @return void
     */
    public function testBootstrapLabelSuccessFunctionWithoutArguments(): void {

        $obj = new LabelTwigExtension($this->twigEnvironment);

        $arg = [];
        $res = '<span class="label label-success"></span>';

        $this->assertEquals($res, $obj->bootstrapLabelSuccessFunction($arg));
    }

    /**
     * Test bootstrapLabelWarningFunction()
     *
     * @return void
     */
    public function testBootstrapLabelWarningFunction(): void {

        $obj = new LabelTwigExtension($this->twigEnvironment);

        $arg = ["content" => "content"];
        $res = '<span class="label label-warning">content</span>';

        $this->assertEquals($res, $obj->bootstrapLabelWarningFunction($arg));
    }

    /**
     * Test bootstrapLabelWarningFunction()
     *
     * @return void
     */
    public function testBootstrapLabelWarningFunctionWithoutArguments(): void {

        $obj = new LabelTwigExtension($this->twigEnvironment);

        $arg = [];
        $res = '<span class="label label-warning"></span>';

        $this->assertEquals($res, $obj->bootstrapLabelWarningFunction($arg));
    }

    /**
     * Test getFilters()
     *
     * @return void
     */
    public function testGetFilters(): void {

        $obj = new LabelTwigExtension($this->twigEnvironment);

        $res = $obj->getFilters();
        $this->assertCount(0, $res);
    }

    /**
     * Test getFunctions()
     *
     * @return void
     */
    public function testGetFunctions(): void {

        $obj = new LabelTwigExtension($this->twigEnvironment);

        $res = $obj->getFunctions();
        $this->assertCount(0, $res);
    }

    /**
     * Test getFunctions()
     *
     * @return void
     */
    public function testGetFunctionsWithBootstrap3(): void {

        $obj = new LabelTwigExtension($this->twigEnvironment);
        $obj->setVersion(3);

        $res = $obj->getFunctions();
        $this->assertCount(14, $res);

        $i = -1;

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bootstrapLabelDanger", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapLabelDangerFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bsLabelDanger", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapLabelDangerFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bootstrapLabelDefault", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapLabelDefaultFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bsLabelDefault", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapLabelDefaultFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bootstrapLabelInfo", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapLabelInfoFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bsLabelInfo", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapLabelInfoFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bootstrapLabelPrimary", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapLabelPrimaryFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bsLabelPrimary", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapLabelPrimaryFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bootstrapLabelSuccess", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapLabelSuccessFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bsLabelSuccess", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapLabelSuccessFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bootstrapLabelWarning", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapLabelWarningFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bsLabelWarning", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapLabelWarningFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bootstrapLabelRoles", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapLabelRolesFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bsLabelRoles", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapLabelRolesFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.bootstrap.twig.extension.component.label", LabelTwigExtension::SERVICE_NAME);

        $obj = new LabelTwigExtension($this->twigEnvironment);

        $this->assertInstanceOf(ExtensionInterface::class, $obj);

        $this->assertSame($this->twigEnvironment, $obj->getTwigEnvironment());
    }
}

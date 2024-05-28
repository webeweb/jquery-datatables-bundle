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
            "ROLE_SUPER_ADMIN" => "#d9534f",
            "ROLE_ADMIN"       => "#337ab7",
        ];
    }

    /**
     * Test bootstrapLabelDangerFunction()
     *
     * @return void
     */
    public function testBootstrapLabelDangerFunction(): void {

        $arg = ["content" => "content"];
        $exp = '<span class="label label-danger">content</span>';

        $obj = new LabelTwigExtension($this->twigEnvironment);

        $this->assertEquals($exp, $obj->bootstrapLabelDangerFunction($arg));
    }

    /**
     * /**
     * Test bootstrapLabelDangerFunction()
     *
     * @return void
     */
    public function testBootstrapLabelDangerFunctionWithoutArguments(): void {

        $arg = [];
        $exp = '<span class="label label-danger"></span>';

        $obj = new LabelTwigExtension($this->twigEnvironment);

        $this->assertEquals($exp, $obj->bootstrapLabelDangerFunction($arg));
    }

    /**
     * Test bootstrapLabelDefaultFunction()
     *
     * @return void
     */
    public function testBootstrapLabelDefaultFunction(): void {

        $arg = ["content" => "content"];
        $exp = '<span class="label label-default">content</span>';

        $obj = new LabelTwigExtension($this->twigEnvironment);

        $this->assertEquals($exp, $obj->bootstrapLabelDefaultFunction($arg));
    }

    /**
     * Test bootstrapLabelDefaultFunction()
     *
     * @return void
     */
    public function testBootstrapLabelDefaultFunctionWithoutArguments(): void {

        $arg = [];
        $exp = '<span class="label label-default"></span>';

        $obj = new LabelTwigExtension($this->twigEnvironment);

        $this->assertEquals($exp, $obj->bootstrapLabelDefaultFunction($arg));
    }

    /**
     * Test bootstrapLabelInfoFunction()
     *
     * @return void
     */
    public function testBootstrapLabelInfoFunction(): void {

        $arg = ["content" => "content"];
        $exp = '<span class="label label-info">content</span>';

        $obj = new LabelTwigExtension($this->twigEnvironment);

        $this->assertEquals($exp, $obj->bootstrapLabelInfoFunction($arg));
    }

    /**
     * Test bootstrapLabelInfoFunction()
     *
     * @return void
     */
    public function testBootstrapLabelInfoFunctionWithoutArguments(): void {

        $arg = [];
        $exp = '<span class="label label-info"></span>';

        $obj = new LabelTwigExtension($this->twigEnvironment);

        $this->assertEquals($exp, $obj->bootstrapLabelInfoFunction($arg));
    }

    /**
     * Test bootstrapLabelPrimaryFunction()
     *
     * @return void
     */
    public function testBootstrapLabelPrimaryFunction(): void {

        $arg = ["content" => "content"];
        $exp = '<span class="label label-primary">content</span>';

        $obj = new LabelTwigExtension($this->twigEnvironment);

        $this->assertEquals($exp, $obj->bootstrapLabelPrimaryFunction($arg));
    }

    /**
     * Test bootstrapLabelPrimaryFunction()
     *
     * @return void
     */
    public function testBootstrapLabelPrimaryFunctionWithoutArguments(): void {

        $arg = [];
        $exp = '<span class="label label-primary"></span>';

        $obj = new LabelTwigExtension($this->twigEnvironment);

        $this->assertEquals($exp, $obj->bootstrapLabelPrimaryFunction($arg));
    }

    /**
     * Test bootstrapLabelRolesFunction()
     *
     * @return void
     */
    public function testBootstrapLabelRolesFunction(): void {

        $obj = new LabelTwigExtension($this->twigEnvironment);

        $exp = '<span class="label label-default" style="background-color: #d9534f;">label.role.root</span> <span class="label label-default" style="background-color: #337ab7;">label.role.admin</span> <span class="label label-default">label.role.user</span>';

        $this->assertEquals($exp, $obj->bootstrapLabelRolesFunction($this->user, $this->roleChoices, $this->roleColors));
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

        $arg = ["content" => "content"];
        $exp = '<span class="label label-success">content</span>';

        $obj = new LabelTwigExtension($this->twigEnvironment);

        $this->assertEquals($exp, $obj->bootstrapLabelSuccessFunction($arg));
    }

    /**
     * Test bootstrapLabelSuccessFunction()
     *
     * @return void
     */
    public function testBootstrapLabelSuccessFunctionWithoutArguments(): void {

        $arg = [];
        $exp = '<span class="label label-success"></span>';

        $obj = new LabelTwigExtension($this->twigEnvironment);

        $this->assertEquals($exp, $obj->bootstrapLabelSuccessFunction($arg));
    }

    /**
     * Test bootstrapLabelWarningFunction()
     *
     * @return void
     */
    public function testBootstrapLabelWarningFunction(): void {

        $arg = ["content" => "content"];
        $exp = '<span class="label label-warning">content</span>';

        $obj = new LabelTwigExtension($this->twigEnvironment);

        $this->assertEquals($exp, $obj->bootstrapLabelWarningFunction($arg));
    }

    /**
     * Test bootstrapLabelWarningFunction()
     *
     * @return void
     */
    public function testBootstrapLabelWarningFunctionWithoutArguments(): void {

        $arg = [];
        $exp = '<span class="label label-warning"></span>';

        $obj = new LabelTwigExtension($this->twigEnvironment);

        $this->assertEquals($exp, $obj->bootstrapLabelWarningFunction($arg));
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

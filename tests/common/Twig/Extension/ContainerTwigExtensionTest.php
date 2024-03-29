<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Tests\Twig\Extension;

use PHPUnit\Framework\MockObject\MockObject;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Twig\Environment;
use Twig\Extension\ExtensionInterface;
use Twig\TwigFunction;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Twig\Extension\ContainerTwigExtension;

/**
 * Container Twig extension test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Twig\Extension
 */
class ContainerTwigExtensionTest extends AbstractTestCase {

    /**
     * Container.
     *
     * @var ContainerInterface|null
     */
    private $container;

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

        // Set a Container mock.
        $this->container = $this->getMockBuilder(ContainerInterface::class)->getMock();
        $this->container->expects($this->any())->method("getParameter")->willReturn("");

        // Set a Twig environment mock.
        $this->twigEnvironment = $this->getMockBuilder(Environment::class)->disableOriginalConstructor()->getMock();
    }

    /**
     * Test getContainerParameterFunction()
     *
     * @return void
     */
    public function testGetContainerParameterFunction(): void {

        $obj = new ContainerTwigExtension($this->twigEnvironment, $this->container);

        $this->assertNotNull($obj->getContainerParameterFunction("kernel.project_dir"));
    }

    /**
     * Test getFunctions()
     *
     * @return void
     */
    public function testGetFunctions(): void {

        $obj = new ContainerTwigExtension($this->twigEnvironment, $this->container);

        $res = $obj->getFunctions();
        $this->assertCount(3, $res);

        $i = -1;

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("getContainerParameter", $res[$i]->getName());
        $this->assertEquals([$obj, "getContainerParameterFunction"], $res[$i]->getCallable());

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("phpNativeMethod", $res[$i]->getName());
        $this->assertEquals([$obj, "phpNativeMethodFunction"], $res[$i]->getCallable());

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("phpStaticMethod", $res[$i]->getName());
        $this->assertEquals([$obj, "phpStaticMethodFunction"], $res[$i]->getCallable());
    }

    /**
     * Test phpNativeMethodFunction()
     *
     * @return void
     */
    public function testPhpNativeMethodFunction(): void {

        $obj = new ContainerTwigExtension($this->twigEnvironment, $this->container);

        $this->assertEquals(null, $obj->phpNativeMethodFunction(null, ["exception"]));
        $this->assertEquals(null, $obj->phpNativeMethodFunction("exception", [null]));

        $this->assertEquals(false, $obj->phpNativeMethodFunction("is_array", ["isWindows"]));
        $this->assertEquals("'isWindows'", $obj->phpNativeMethodFunction("var_export", ["isWindows", true]));
    }

    /**
     * Test phpStaticMethodFunction()
     *
     * @return void
     */
    public function testPhpStaticMethodFunction(): void {

        $obj = new ContainerTwigExtension($this->twigEnvironment, $this->container);

        $this->assertEquals(null, $obj->phpStaticMethodFunction(null, "exception"));
        $this->assertEquals(null, $obj->phpStaticMethodFunction("exception", null));
        $this->assertEquals(null, $obj->phpStaticMethodFunction("WBW\\Library\\System\\Helper\\SystemHelper", "isMacOs"));

        $this->assertEquals("\\" === DIRECTORY_SEPARATOR, $obj->phpStaticMethodFunction("WBW\\Library\\System\\Helper\\SystemHelper", "isWindows"));
        $this->assertEquals('<div id="id">content</div>', $obj->phpStaticMethodFunction("WBW\\Bundle\\CommonBundle\\Twig\\Extension\\AbstractTwigExtension", "h", ["div", "content", ["id" => "id"]]));
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.common.twig.extension.container", ContainerTwigExtension::SERVICE_NAME);

        $obj = new ContainerTwigExtension($this->twigEnvironment, $this->container);

        $this->assertInstanceOf(ExtensionInterface::class, $obj);

        $this->assertSame($this->twigEnvironment, $obj->getTwigEnvironment());
        $this->assertSame($this->container, $obj->getContainer());
    }
}

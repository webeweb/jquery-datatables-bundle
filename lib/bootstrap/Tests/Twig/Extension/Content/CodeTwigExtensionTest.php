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

namespace WBW\Bundle\BootstrapBundle\Tests\Twig\Extension\Content;

use Twig\Environment;
use Twig\Extension\ExtensionInterface;
use Twig\Node\Node;
use Twig\TwigFunction;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Content\CodeTwigExtension;

/**
 * Code Twig extension test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Twig\Extension\Content
 */
class CodeTwigExtensionTest extends AbstractTestCase {

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
     * Test bootstrapBasicBlockFunction()
     *
     * @return void
     */
    public function testBootstrapBasicBlockFunction(): void {

        $arg = ["content" => "content"];
        $exp = "<pre>content</pre>";

        $obj = new CodeTwigExtension($this->twigEnvironment);

        $this->assertEquals($exp, $obj->bootstrapBasicBlockFunction($arg));
    }

    /**
     * Test bootstrapBasicBlockFunction()
     *
     * @return void
     */
    public function testBootstrapBasicBlockFunctionWithoutArguments(): void {

        $arg = [];
        $exp = "<pre></pre>";

        $obj = new CodeTwigExtension($this->twigEnvironment);

        $this->assertEquals($exp, $obj->bootstrapBasicBlockFunction($arg));
    }

    /**
     * Test bootstrapInlineFunction()
     *
     * @return void
     */
    public function testBootstrapInlineFunction(): void {

        $arg = ["content" => "content"];
        $exp = "<code>content</code>";

        $obj = new CodeTwigExtension($this->twigEnvironment);

        $this->assertEquals($exp, $obj->bootstrapInlineFunction($arg));
    }

    /**
     * Test bootstrapInlineFunction()
     *
     * @return void
     */
    public function testBootstrapInlineFunctionWithoutArguments(): void {

        $arg = [];
        $exp = "<code></code>";

        $obj = new CodeTwigExtension($this->twigEnvironment);

        $this->assertEquals($exp, $obj->bootstrapInlineFunction($arg));
    }

    /**
     * Test bootstrapSampleOutputFunction()
     *
     * @return void
     */
    public function testBootstrapSampleOutputFunction(): void {

        $arg = ["content" => "content"];
        $exp = "<samp>content</samp>";

        $obj = new CodeTwigExtension($this->twigEnvironment);

        $this->assertEquals($exp, $obj->bootstrapSampleOutputFunction($arg));
    }

    /**
     * Test bootstrapSampleOutputFunction()
     *
     * @return void
     */
    public function testBootstrapSampleOutputFunctionWithoutArguments(): void {

        $arg = [];
        $exp = "<samp></samp>";

        $obj = new CodeTwigExtension($this->twigEnvironment);

        $this->assertEquals($exp, $obj->bootstrapSampleOutputFunction($arg));
    }

    /**
     * Test bootstrapUserInputFunction()
     *
     * @return void
     */
    public function testBootstrapUserInputFunction(): void {

        $arg = ["content" => "content"];
        $exp = "<kbd>content</kbd>";

        $obj = new CodeTwigExtension($this->twigEnvironment);

        $this->assertEquals($exp, $obj->bootstrapUserInputFunction($arg));
    }

    /**
     * Test bootstrapUserInputFunction()
     *
     * @return void
     */
    public function testBootstrapUserInputFunctionWithoutArguments(): void {

        $arg = [];
        $exp = "<kbd></kbd>";

        $obj = new CodeTwigExtension($this->twigEnvironment);

        $this->assertEquals($exp, $obj->bootstrapUserInputFunction($arg));
    }

    /**
     * Test bootstrapVariableFunction()
     *
     * @return void
     */
    public function testBootstrapVariableFunction(): void {

        $arg = ["content" => "content"];
        $exp = "<var>content</var>";

        $obj = new CodeTwigExtension($this->twigEnvironment);

        $this->assertEquals($exp, $obj->bootstrapVariableFunction($arg));
    }

    /**
     * Test bootstrapVariableFunction()
     *
     * @return void
     */
    public function testBootstrapVariableFunctionWithoutArguments(): void {

        $arg = [];
        $exp = "<var></var>";

        $obj = new CodeTwigExtension($this->twigEnvironment);

        $this->assertEquals($exp, $obj->bootstrapVariableFunction($arg));
    }

    /**
     * Test getFunctions()
     *
     * @return void
     */
    public function testGetFunctions(): void {

        $obj = new CodeTwigExtension($this->twigEnvironment);

        $res = $obj->getFunctions();
        $this->assertCount(10, $res);

        $i = -1;

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bootstrapBasicBlock", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapBasicBlockFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bsBasicBlock", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapBasicBlockFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bootstrapInline", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapInlineFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bsInline", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapInlineFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bootstrapSampleOutput", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapSampleOutputFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bsSampleOutput", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapSampleOutputFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bootstrapUserInput", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapUserInputFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bsUserInput", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapUserInputFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bootstrapVariable", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapVariableFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bsVariable", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapVariableFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.bootstrap.twig.extension.content.code", CodeTwigExtension::SERVICE_NAME);

        $obj = new CodeTwigExtension($this->twigEnvironment);

        $this->assertInstanceOf(ExtensionInterface::class, $obj);

        $this->assertSame($this->twigEnvironment, $obj->getTwigEnvironment());
    }
}

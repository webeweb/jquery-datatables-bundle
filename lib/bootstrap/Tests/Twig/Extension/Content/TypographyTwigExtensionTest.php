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

namespace WBW\Bundle\BootstrapBundle\Tests\Twig\Extension\Content;

use Twig\Environment;
use Twig\Extension\ExtensionInterface;
use Twig\Node\Node;
use Twig\TwigFunction;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Content\TypographyTwigExtension;

/**
 * Typography Twig extension test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Twig\Extension\Content
 */
class TypographyTwigExtensionTest extends AbstractTestCase {

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
     * Test bootstrapBoldFunction()
     *
     * @return void
     */
    public function testBootstrapBoldFunction(): void {

        $obj = new TypographyTwigExtension($this->twigEnvironment);

        $arg = ["content" => "content"];
        $exp = "<strong>content</strong>";

        $this->assertEquals($exp, $obj->bootstrapBoldFunction($arg));
    }

    /**
     * Test bootstrapBoldFunction()
     *
     * @return void
     */
    public function testBootstrapBoldFunctionWithoutArguments(): void {

        $obj = new TypographyTwigExtension($this->twigEnvironment);

        $arg = [];
        $exp = "<strong></strong>";

        $this->assertEquals($exp, $obj->bootstrapBoldFunction($arg));
    }

    /**
     * Test bootstrapDeletedFunction()
     *
     * @return void
     */
    public function testBootstrapDeletedFunction(): void {

        $obj = new TypographyTwigExtension($this->twigEnvironment);

        $arg = ["content" => "content"];
        $exp = "<del>content</del>";

        $this->assertEquals($exp, $obj->bootstrapDeletedFunction($arg));
    }

    /**
     * Test bootstrapDeletedFunction()
     *
     * @return void
     */
    public function testBootstrapDeletedFunctionWithoutArguments(): void {

        $obj = new TypographyTwigExtension($this->twigEnvironment);

        $arg = [];
        $exp = "<del></del>";

        $this->assertEquals($exp, $obj->bootstrapDeletedFunction($arg));
    }

    /**
     * Test bootstrapItalicFunction()
     *
     * @return void
     */
    public function testBootstrapEmFunction(): void {

        $obj = new TypographyTwigExtension($this->twigEnvironment);

        $arg = ["content" => "content"];
        $exp = "<em>content</em>";

        $this->assertEquals($exp, $obj->bootstrapItalicFunction($arg));
    }

    /**
     * Test bootstrapItalicFunction()
     *
     * @return void
     */
    public function testBootstrapEmFunctionWithoutArguments(): void {

        $obj = new TypographyTwigExtension($this->twigEnvironment);

        $arg = [];
        $exp = "<em></em>";

        $this->assertEquals($exp, $obj->bootstrapItalicFunction($arg));
    }

    /**
     * Test bootstrapHeading1Function()
     *
     * @return void
     */
    public function testBootstrapHeading1Function(): void {

        $obj = new TypographyTwigExtension($this->twigEnvironment);

        $arg = ["content" => "content", "description" => "description", "class" => "class"];
        $exp = '<h1 class="class">content <small>description</small></h1>';

        $this->assertEquals($exp, $obj->bootstrapHeading1Function($arg));
    }

    /**
     * Test bootstrapHeading1Function()
     *
     * @return void
     */
    public function testBootstrapHeading1FunctionWithClass(): void {

        $obj = new TypographyTwigExtension($this->twigEnvironment);

        $arg = ["class" => "class"];
        $exp = '<h1 class="class"></h1>';

        $this->assertEquals($exp, $obj->bootstrapHeading1Function($arg));
    }

    /**
     * Test bootstrapHeading1Function()
     *
     * @return void
     */
    public function testBootstrapHeading1FunctionWithContent(): void {

        $obj = new TypographyTwigExtension($this->twigEnvironment);

        $arg = ["content" => "content"];
        $exp = "<h1>content</h1>";

        $this->assertEquals($exp, $obj->bootstrapHeading1Function($arg));
    }

    /**
     * Test bootstrapHeading1Function()
     *
     * @return void
     */
    public function testBootstrapHeading1FunctionWithDescription(): void {

        $obj = new TypographyTwigExtension($this->twigEnvironment);

        $arg = ["description" => "description"];
        $exp = "<h1><small>description</small></h1>";

        $this->assertEquals($exp, $obj->bootstrapHeading1Function($arg));
    }

    /**
     * Test bootstrapHeading1Function()
     *
     * @return void
     */
    public function testBootstrapHeading1FunctionWithoutArguments(): void {

        $obj = new TypographyTwigExtension($this->twigEnvironment);

        $arg = [];
        $exp = "<h1></h1>";

        $this->assertEquals($exp, $obj->bootstrapHeading1Function($arg));
    }

    /**
     * Test bootstrapHeading2Function()
     *
     * @return void
     */
    public function testBootstrapHeading2Function(): void {

        $obj = new TypographyTwigExtension($this->twigEnvironment);

        $arg = ["content" => "content", "description" => "description", "class" => "class"];
        $exp = '<h2 class="class">content <small>description</small></h2>';

        $this->assertEquals($exp, $obj->bootstrapHeading2Function($arg));
    }

    /**
     * Test bootstrapHeading2Function()
     *
     * @return void
     */
    public function testBootstrapHeading2FunctionWithClass(): void {

        $obj = new TypographyTwigExtension($this->twigEnvironment);

        $arg = ["class" => "class"];
        $exp = '<h2 class="class"></h2>';

        $this->assertEquals($exp, $obj->bootstrapHeading2Function($arg));
    }

    /**
     * Test bootstrapHeading2Function()
     *
     * @return void
     */
    public function testBootstrapHeading2FunctionWithContent(): void {

        $obj = new TypographyTwigExtension($this->twigEnvironment);

        $arg = ["content" => "content"];
        $exp = "<h2>content</h2>";

        $this->assertEquals($exp, $obj->bootstrapHeading2Function($arg));
    }

    /**
     * Test bootstrapHeading2Function()
     *
     * @return void
     */
    public function testBootstrapHeading2FunctionWithDescription(): void {

        $obj = new TypographyTwigExtension($this->twigEnvironment);

        $arg = ["description" => "description"];
        $exp = "<h2><small>description</small></h2>";

        $this->assertEquals($exp, $obj->bootstrapHeading2Function($arg));
    }

    /**
     * Test bootstrapHeading2Function()
     *
     * @return void
     */
    public function testBootstrapHeading2FunctionWithoutArguments(): void {

        $obj = new TypographyTwigExtension($this->twigEnvironment);

        $arg = [];
        $exp = "<h2></h2>";

        $this->assertEquals($exp, $obj->bootstrapHeading2Function($arg));
    }

    /**
     * Test bootstrapHeading3Function()
     *
     * @return void
     */
    public function testBootstrapHeading3Function(): void {

        $obj = new TypographyTwigExtension($this->twigEnvironment);

        $arg = ["content" => "content", "description" => "description", "class" => "class"];
        $exp = '<h3 class="class">content <small>description</small></h3>';

        $this->assertEquals($exp, $obj->bootstrapHeading3Function($arg));
    }

    /**
     * Test bootstrapHeading3Function()
     *
     * @return void
     */
    public function testBootstrapHeading3FunctionWithClass(): void {

        $obj = new TypographyTwigExtension($this->twigEnvironment);

        $arg = ["class" => "class"];
        $exp = '<h3 class="class"></h3>';

        $this->assertEquals($exp, $obj->bootstrapHeading3Function($arg));
    }

    /**
     * Test bootstrapHeading3Function()
     *
     * @return void
     */
    public function testBootstrapHeading3FunctionWithContent(): void {

        $obj = new TypographyTwigExtension($this->twigEnvironment);

        $arg = ["content" => "content"];
        $exp = "<h3>content</h3>";

        $this->assertEquals($exp, $obj->bootstrapHeading3Function($arg));
    }

    /**
     * Test bootstrapHeading3Function()
     *
     * @return void
     */
    public function testBootstrapHeading3FunctionWithDescription(): void {

        $obj = new TypographyTwigExtension($this->twigEnvironment);

        $arg = ["description" => "description"];
        $exp = "<h3><small>description</small></h3>";

        $this->assertEquals($exp, $obj->bootstrapHeading3Function($arg));
    }

    /**
     * Test bootstrapHeading3Function()
     *
     * @return void
     */
    public function testBootstrapHeading3FunctionWithoutArguments(): void {

        $obj = new TypographyTwigExtension($this->twigEnvironment);

        $arg = [];
        $exp = "<h3></h3>";

        $this->assertEquals($exp, $obj->bootstrapHeading3Function($arg));
    }

    /**
     * Test bootstrapHeading4Function()
     *
     * @return void
     */
    public function testBootstrapHeading4Function(): void {

        $obj = new TypographyTwigExtension($this->twigEnvironment);

        $arg = ["content" => "content", "description" => "description", "class" => "class"];
        $exp = '<h4 class="class">content <small>description</small></h4>';

        $this->assertEquals($exp, $obj->bootstrapHeading4Function($arg));
    }

    /**
     * Test bootstrapHeading4Function()
     *
     * @return void
     */
    public function testBootstrapHeading4FunctionWithClass(): void {

        $obj = new TypographyTwigExtension($this->twigEnvironment);

        $arg = ["class" => "class"];
        $exp = '<h4 class="class"></h4>';

        $this->assertEquals($exp, $obj->bootstrapHeading4Function($arg));
    }

    /**
     * Test bootstrapHeading4Function()
     *
     * @return void
     */
    public function testBootstrapHeading4FunctionWithContent(): void {

        $obj = new TypographyTwigExtension($this->twigEnvironment);

        $arg = ["content" => "content"];
        $exp = "<h4>content</h4>";

        $this->assertEquals($exp, $obj->bootstrapHeading4Function($arg));
    }

    /**
     * Test bootstrapHeading4Function()
     *
     * @return void
     */
    public function testBootstrapHeading4FunctionWithDescription(): void {

        $obj = new TypographyTwigExtension($this->twigEnvironment);

        $arg = ["description" => "description"];
        $exp = "<h4><small>description</small></h4>";

        $this->assertEquals($exp, $obj->bootstrapHeading4Function($arg));
    }

    /**
     * Test bootstrapHeading4Function()
     *
     * @return void
     */
    public function testBootstrapHeading4FunctionWithoutArguments(): void {

        $obj = new TypographyTwigExtension($this->twigEnvironment);

        $arg = [];
        $exp = "<h4></h4>";

        $this->assertEquals($exp, $obj->bootstrapHeading4Function($arg));
    }

    /**
     * Test bootstrapHeading5Function()
     *
     * @return void
     */
    public function testBootstrapHeading5Function(): void {

        $obj = new TypographyTwigExtension($this->twigEnvironment);

        $arg = ["content" => "content", "description" => "description", "class" => "class"];
        $exp = '<h5 class="class">content <small>description</small></h5>';

        $this->assertEquals($exp, $obj->bootstrapHeading5Function($arg));
    }

    /**
     * Test bootstrapHeading5Function()
     *
     * @return void
     */
    public function testBootstrapHeading5FunctionWithClass(): void {

        $obj = new TypographyTwigExtension($this->twigEnvironment);

        $arg = ["class" => "class"];
        $exp = '<h5 class="class"></h5>';

        $this->assertEquals($exp, $obj->bootstrapHeading5Function($arg));
    }

    /**
     * Test bootstrapHeading5Function()
     *
     * @return void
     */
    public function testBootstrapHeading5FunctionWithContent(): void {

        $obj = new TypographyTwigExtension($this->twigEnvironment);

        $arg = ["content" => "content"];
        $exp = "<h5>content</h5>";

        $this->assertEquals($exp, $obj->bootstrapHeading5Function($arg));
    }

    /**
     * Test bootstrapHeading5Function()
     *
     * @return void
     */
    public function testBootstrapHeading5FunctionWithDescription(): void {

        $obj = new TypographyTwigExtension($this->twigEnvironment);

        $arg = ["description" => "description"];
        $exp = "<h5><small>description</small></h5>";

        $this->assertEquals($exp, $obj->bootstrapHeading5Function($arg));
    }

    /**
     * Test bootstrapHeading5Function()
     *
     * @return void
     */
    public function testBootstrapHeading5FunctionWithoutArguments(): void {

        $obj = new TypographyTwigExtension($this->twigEnvironment);

        $arg = [];
        $exp = "<h5></h5>";

        $this->assertEquals($exp, $obj->bootstrapHeading5Function($arg));
    }

    /**
     * Test bootstrapHeading6Function()
     *
     * @return void
     */
    public function testBootstrapHeading6Function(): void {

        $obj = new TypographyTwigExtension($this->twigEnvironment);

        $arg = ["content" => "content", "description" => "description", "class" => "class"];
        $exp = '<h6 class="class">content <small>description</small></h6>';

        $this->assertEquals($exp, $obj->bootstrapHeading6Function($arg));
    }

    /**
     * Test bootstrapHeading6Function()
     *
     * @return void
     */
    public function testBootstrapHeading6FunctionWithClass(): void {

        $obj = new TypographyTwigExtension($this->twigEnvironment);

        $arg = ["class" => "class"];
        $exp = '<h6 class="class"></h6>';

        $this->assertEquals($exp, $obj->bootstrapHeading6Function($arg));
    }

    /**
     * Test bootstrapHeading6Function()
     *
     * @return void
     */
    public function testBootstrapHeading6FunctionWithContent(): void {

        $obj = new TypographyTwigExtension($this->twigEnvironment);

        $arg = ["content" => "content"];
        $exp = "<h6>content</h6>";

        $this->assertEquals($exp, $obj->bootstrapHeading6Function($arg));
    }

    /**
     * Test bootstrapHeading6Function()
     *
     * @return void
     */
    public function testBootstrapHeading6FunctionWithDescription(): void {

        $obj = new TypographyTwigExtension($this->twigEnvironment);

        $arg = ["description" => "description"];
        $exp = "<h6><small>description</small></h6>";

        $this->assertEquals($exp, $obj->bootstrapHeading6Function($arg));
    }

    /**
     * Test bootstrapHeading6Function()
     *
     * @return void
     */
    public function testBootstrapHeading6FunctionWithoutArguments(): void {

        $obj = new TypographyTwigExtension($this->twigEnvironment);

        $arg = [];
        $exp = "<h6></h6>";

        $this->assertEquals($exp, $obj->bootstrapHeading6Function($arg));
    }

    /**
     * Test bootstrapInsertedFunction()
     *
     * @return void
     */
    public function testBootstrapInsFunction(): void {

        $obj = new TypographyTwigExtension($this->twigEnvironment);

        $arg = ["content" => "content"];
        $exp = "<ins>content</ins>";

        $this->assertEquals($exp, $obj->bootstrapInsertedFunction($arg));
    }

    /**
     * Test bootstrapInsertedFunction()
     *
     * @return void
     */
    public function testBootstrapInsFunctionWithoutArguments(): void {

        $obj = new TypographyTwigExtension($this->twigEnvironment);

        $arg = [];
        $exp = "<ins></ins>";

        $this->assertEquals($exp, $obj->bootstrapInsertedFunction($arg));
    }

    /**
     * Test bootstrapMarkedFunction()
     *
     * @return void
     */
    public function testBootstrapMarkedFunction(): void {

        $obj = new TypographyTwigExtension($this->twigEnvironment);

        $arg = ["content" => "content"];
        $exp = "<mark>content</mark>";

        $this->assertEquals($exp, $obj->bootstrapMarkedFunction($arg));
    }

    /**
     * Test bootstrapMarkedFunction()
     *
     * @return void
     */
    public function testBootstrapMarkedFunctionWithoutArguments(): void {

        $obj = new TypographyTwigExtension($this->twigEnvironment);

        $arg = [];
        $exp = "<mark></mark>";

        $this->assertEquals($exp, $obj->bootstrapMarkedFunction($arg));
    }

    /**
     * Test bootstrapSmallFunction()
     *
     * @return void
     */
    public function testBootstrapSmallFunction(): void {

        $obj = new TypographyTwigExtension($this->twigEnvironment);

        $arg = ["content" => "content"];
        $exp = "<small>content</small>";

        $this->assertEquals($exp, $obj->bootstrapSmallFunction($arg));
    }

    /**
     * Test bootstrapSmallFunction()
     *
     * @return void
     */
    public function testBootstrapSmallFunctionWithoutArguments(): void {

        $obj = new TypographyTwigExtension($this->twigEnvironment);

        $arg = [];
        $exp = "<small></small>";

        $this->assertEquals($exp, $obj->bootstrapSmallFunction($arg));
    }

    /**
     * Test bootstrapStrikethroughFunction()
     *
     * @return void
     */
    public function testBootstrapStrikethroughFunction(): void {

        $obj = new TypographyTwigExtension($this->twigEnvironment);

        $arg = ["content" => "content"];
        $exp = "<s>content</s>";

        $this->assertEquals($exp, $obj->bootstrapStrikethroughFunction($arg));
    }

    /**
     * Test bootstrapStrikethroughFunction()
     *
     * @return void
     */
    public function testBootstrapStrikethroughFunctionWithoutArguments(): void {

        $obj = new TypographyTwigExtension($this->twigEnvironment);

        $arg = [];
        $exp = "<s></s>";

        $this->assertEquals($exp, $obj->bootstrapStrikethroughFunction($arg));
    }

    /**
     * Test bootstrapUnderlinedFunction()
     *
     * @return void
     */
    public function testBootstrapUnderlinedFunction(): void {

        $obj = new TypographyTwigExtension($this->twigEnvironment);

        $arg = ["content" => "content"];
        $exp = "<u>content</u>";

        $this->assertEquals($exp, $obj->bootstrapUnderlinedFunction($arg));
    }

    /**
     * Test bootstrapUnderlinedFunction()
     *
     * @return void
     */
    public function testBootstrapUnderlinedFunctionWithoutArguments(): void {

        $obj = new TypographyTwigExtension($this->twigEnvironment);

        $arg = [];
        $exp = "<u></u>";

        $this->assertEquals($exp, $obj->bootstrapUnderlinedFunction($arg));
    }

    /**
     * Test getFunctions()
     *
     * @return void
     */
    public function testGetFunctions(): void {

        $obj = new TypographyTwigExtension($this->twigEnvironment);

        $res = $obj->getFunctions();
        $this->assertCount(28, $res);

        $i = -1;

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bootstrapBold", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapBoldFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bsBold", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapBoldFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bootstrapDeleted", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapDeletedFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bsDeleted", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapDeletedFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bootstrapHeading1", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapHeading1Function"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bsHeading1", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapHeading1Function"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bootstrapHeading2", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapHeading2Function"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bsHeading2", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapHeading2Function"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bootstrapHeading3", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapHeading3Function"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bsHeading3", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapHeading3Function"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bootstrapHeading4", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapHeading4Function"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bsHeading4", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapHeading4Function"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bootstrapHeading5", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapHeading5Function"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bsHeading5", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapHeading5Function"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bootstrapHeading6", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapHeading6Function"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bsHeading6", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapHeading6Function"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bootstrapInserted", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapInsertedFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bsInserted", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapInsertedFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bootstrapItalic", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapItalicFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bsItalic", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapItalicFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bootstrapMarked", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapMarkedFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bsMarked", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapMarkedFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bootstrapSmall", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapSmallFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bsSmall", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapSmallFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bootstrapStrikethrough", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapStrikethroughFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bsStrikethrough", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapStrikethroughFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bootstrapUnderlined", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapUnderlinedFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));

        $this->assertInstanceOf(TwigFunction::class, $res[++$i]);
        $this->assertEquals("bsUnderlined", $res[$i]->getName());
        $this->assertEquals([$obj, "bootstrapUnderlinedFunction"], $res[$i]->getCallable());
        $this->assertEquals(["html"], $res[$i]->getSafe(new Node()));
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.bootstrap.twig.extension.content.typography", TypographyTwigExtension::SERVICE_NAME);

        $obj = new TypographyTwigExtension($this->twigEnvironment);

        $this->assertInstanceOf(ExtensionInterface::class, $obj);

        $this->assertSame($this->twigEnvironment, $obj->getTwigEnvironment());
    }
}

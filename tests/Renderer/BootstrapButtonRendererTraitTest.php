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

namespace WBW\Bundle\DataTablesBundle\Tests\Renderer;

use InvalidArgumentException;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use Throwable;
use Twig\Environment;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Component\ButtonTwigExtension;
use WBW\Bundle\CommonBundle\Tests\DefaultTestCase;
use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\DataTablesBundle\Tests\Fixtures\Entity\Employee;
use WBW\Bundle\DataTablesBundle\Tests\Fixtures\Renderer\TestBootstrapButtonRendererTrait;

/**
 * Bootstrap button renderer trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Renderer
 */
class BootstrapButtonRendererTraitTest extends AbstractTestCase {

    /**
     * Bootstrap buttons renderer.
     *
     * @var TestBootstrapButtonRendererTrait|null
     */
    private $bootstrapButtonsRenderer;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set a Twig environment mock.
        $twigEnvironment = $this->getMockBuilder(Environment::class)->disableOriginalConstructor()->getMock();

        // Set a Router mock.
        $router = $this->getMockBuilder(RouterInterface::class)->getMock();
        $router->expects($this->any())->method("generate")->willReturnCallback(DefaultTestCase::getRouterGenerateFunction());

        // Set a Translator mock.
        $translator = $this->getMockBuilder(TranslatorInterface::class)->getMock();
        $translator->expects($this->any())->method("trans")->willReturnCallback(DefaultTestCase::getTranslatorTransFunction());

        // Set a Button Twig extension.
        $buttonTwigExtension = new ButtonTwigExtension($twigEnvironment);

        // Set a Bootstrap buttons renderer.
        $this->bootstrapButtonsRenderer = new TestBootstrapButtonRendererTrait();
        $this->bootstrapButtonsRenderer->setButtonTwigExtension($buttonTwigExtension);
        $this->bootstrapButtonsRenderer->setRouter($router);
        $this->bootstrapButtonsRenderer->setTranslator($translator);
    }

    /**
     * Test renderActionButtonComment()
     *
     * @return void
     */
    public function testRenderActionButtonCommentWithComment(): void {

        $exp = file_get_contents(__DIR__ . "/../Fixtures/Renderer/BootstrapButtonRendererTraitTest.testRenderActionButtonCommentWithComment.html.txt");

        $obj = $this->bootstrapButtonsRenderer;
        $this->assertEquals($exp, $obj->renderActionButtonComment(new Employee(), "commentRoute", "comment"));
    }

    /**
     * Test renderActionButtonComment()
     *
     * @return void
     */
    public function testRenderActionButtonCommentWithoutComment(): void {

        $exp = file_get_contents(__DIR__ . "/../Fixtures/Renderer/BootstrapButtonRendererTraitTest.testRenderActionButtonCommentWithoutComment.html.txt");

        $obj = $this->bootstrapButtonsRenderer;
        $this->assertEquals($exp, $obj->renderActionButtonComment(new Employee(), "commentRoute", null));
    }

    /**
     * Test renderActionButtonDelete()
     *
     * @return void
     */
    public function testRenderActionButtonDelete(): void {

        $exp = file_get_contents(__DIR__ . "/../Fixtures/Renderer/BootstrapButtonRendererTraitTest.testRenderActionButtonDelete.html.txt");

        $obj = $this->bootstrapButtonsRenderer;
        $this->assertEquals($exp, $obj->renderActionButtonDelete(new Employee(), "deleteRoute"));
    }

    /**
     * Test renderActionButtonDuplicate()
     *
     * @return void
     */
    public function testRenderActionButtonDuplicate(): void {

        $exp = file_get_contents(__DIR__ . "/../Fixtures/Renderer/BootstrapButtonRendererTraitTest.testRenderActionButtonDuplicate.html.txt");

        $obj = $this->bootstrapButtonsRenderer;
        $this->assertEquals($exp, $obj->renderActionButtonDuplicate(new Employee(), "duplicateRoute"));
    }

    /**
     * Test renderActionButtonEdit()
     *
     * @return void
     */
    public function testRenderActionButtonEdit(): void {

        $exp = file_get_contents(__DIR__ . "/../Fixtures/Renderer/BootstrapButtonRendererTraitTest.testRenderActionButtonEdit.html.txt");

        $obj = $this->bootstrapButtonsRenderer;
        $this->assertEquals($exp, $obj->renderActionButtonEdit(new Employee(), "editRoute"));
    }

    /**
     * Test renderActionButtonNew()
     *
     * @return void
     */
    public function testRenderActionButtonNew(): void {

        $exp = file_get_contents(__DIR__ . "/../Fixtures/Renderer/BootstrapButtonRendererTraitTest.testRenderActionButtonNew.html.txt");

        $obj = $this->bootstrapButtonsRenderer;
        $this->assertEquals($exp, $obj->renderActionButtonNew(new Employee(), "newRoute"));
    }

    /**
     * Test renderActionButtonNew()
     *
     * @return void
     */
    public function testRenderActionButtonNewWithNullEntity(): void {

        $exp = file_get_contents(__DIR__ . "/../Fixtures/Renderer/BootstrapButtonRendererTraitTest.testRenderActionButtonNew.html.txt");

        $obj = $this->bootstrapButtonsRenderer;
        $this->assertEquals($exp, $obj->renderActionButtonNew(null, "newRoute"));
    }

    /**
     * Test renderActionButtonPdf()
     *
     * @return void
     */
    public function testRenderActionButtonPdf(): void {

        $exp = file_get_contents(__DIR__ . "/../Fixtures/Renderer/BootstrapButtonRendererTraitTest.testRenderActionButtonPdf.html.txt");

        $obj = $this->bootstrapButtonsRenderer;
        $this->assertEquals($exp, $obj->renderActionButtonPdf(new Employee(), "pdfRoute"));
    }

    /**
     * Test renderActionButtonShow()
     *
     * @return void
     */
    public function testRenderActionButtonShow(): void {

        $exp = file_get_contents(__DIR__ . "/../Fixtures/Renderer/BootstrapButtonRendererTraitTest.testRenderActionButtonShow.html.txt");

        $obj = $this->bootstrapButtonsRenderer;
        $this->assertEquals($exp, $obj->renderActionButtonShow(new Employee(), "showRoute"));
    }

    /**
     * Test renderActionButtonSwitch()
     *
     * @return void
     */
    public function testRenderActionButtonSwitchWithFalse(): void {

        $exp = file_get_contents(__DIR__ . "/../Fixtures/Renderer/BootstrapButtonRendererTraitTest.testRenderActionButtonSwitchWithFalse.html.txt");

        $obj = $this->bootstrapButtonsRenderer;
        $this->assertEquals($exp, $obj->renderActionButtonSwitch(new Employee(), "switchRoute", false));
    }

    /**
     * Test renderActionButtonSwitch()
     *
     * @return void
     */
    public function testRenderActionButtonSwitchWithTrue(): void {

        $exp = file_get_contents(__DIR__ . "/../Fixtures/Renderer/BootstrapButtonRendererTraitTest.testRenderActionButtonSwitchWithTrue.html.txt");

        $obj = $this->bootstrapButtonsRenderer;
        $this->assertEquals($exp, $obj->renderActionButtonSwitch(new Employee(), "switchRoute", true));
    }

    /**
     * Test renderActionButton()
     *
     * @return void
     */
    public function testRenderActionButtonWithInvalidArgumentException(): void {

        $obj = $this->bootstrapButtonsRenderer;

        try {
            $obj->renderActionButtonDelete($this, "route");
        } catch (Throwable $ex) {

            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
            $this->assertEquals("The entity must implements DataTablesEntityInterface or declare a getId() method", $ex->getMessage());
        }
    }
}

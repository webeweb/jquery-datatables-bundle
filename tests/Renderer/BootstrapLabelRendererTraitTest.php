<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Renderer;

use Symfony\Contracts\Translation\TranslatorInterface;
use Twig\Environment;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Component\LabelTwigExtension;
use WBW\Bundle\CommonBundle\Tests\DefaultTestCase;
use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\DataTablesBundle\Tests\Fixtures\Renderer\Assets\TestEnabledLabelRendererTrait;
use WBW\Bundle\DataTablesBundle\Tests\Fixtures\Renderer\TestBootstrapLabelRendererTrait;

/**
 * Bootstrap label renderer trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Renderer
 */
class BootstrapLabelRendererTraitTest extends AbstractTestCase {

    /**
     * Bootstrap label renderer.
     *
     * @var TestBootstrapLabelRendererTrait|null
     */
    private $bootstrapLabelRenderer;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set a Twig environment mock.
        $twigEnvironment = $this->getMockBuilder(Environment::class)->disableOriginalConstructor()->getMock();

        // Set a Translator mock.
        $translator = $this->getMockBuilder(TranslatorInterface::class)->getMock();
        $translator->expects($this->any())->method("trans")->willReturnCallback(DefaultTestCase::getTranslatorTransFunction());

        // Set a Label Twig extension.
        $labelTwigExtension = new LabelTwigExtension($twigEnvironment);

        // Set a Bootstrap label renderer.
        $this->bootstrapLabelRenderer = new TestBootstrapLabelRendererTrait();
        $this->bootstrapLabelRenderer->setLabelTwigExtension($labelTwigExtension);
        $this->bootstrapLabelRenderer->setTranslator($translator);
    }

    /**
     * Test renderLabelEnabled()
     *
     * @return void
     */
    public function testRenderLabelEnabled(): void {

        $bak = null;

        $obj = $this->bootstrapLabelRenderer;

        $bak = $obj->getLabelTwigExtension();
        $obj->setLabelTwigExtension(null);
        $this->assertNull($obj->renderLabelEnabled(true));

        $obj->setLabelTwigExtension($bak);
        $obj->setTranslator(null);
        $this->assertNull($obj->renderLabelEnabled(true));
    }

    /**
     * Test renderLabelEnabled()
     *
     * @return void
     */
    public function testRenderLabelEnabledWithFalse(): void {

        $exp = file_get_contents(__DIR__ . "/../Fixtures/Renderer/BootstrapLabelRendererTraitTest.testRenderLabelEnabledWithFalse.html.txt");

        $obj = $this->bootstrapLabelRenderer;

        $this->assertEquals($exp, $obj->renderLabelEnabled(false));
    }

    /**
     * Test renderLabelEnabled()
     *
     * @return void
     */
    public function testRenderLabelEnabledWithTrue(): void {

        $exp = file_get_contents(__DIR__ . "/../Fixtures/Renderer/BootstrapLabelRendererTraitTest.testRenderLabelEnabledWithTrue.html.txt");

        $obj = $this->bootstrapLabelRenderer;

        $this->assertEquals($exp, $obj->renderLabelEnabled(true));
    }
}

<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Renderer\Assets;

use WBW\Bundle\BootstrapBundle\Twig\Extension\Component\LabelTwigExtension;
use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\DataTablesBundle\Tests\Fixtures\Renderer\Assets\TestEnabledLabelRendererTrait;

/**
 * Enabled label renderer trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Renderer\Assets
 */
class EnabledLabelRendererTraitTest extends AbstractTestCase {

    /**
     * Label Twig extension.
     *
     * @var LabelTwigExtension
     */
    private $labelTwigExtension;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set a Label Twig extension mock.
        $this->labelTwigExtension = new LabelTwigExtension($this->twigEnvironment);
    }

    /**
     * Test renderEnabledLabel()
     *
     * @return void
     */
    public function testRenderEnabledLabel(): void {

        $obj = new TestEnabledLabelRendererTrait();

        $this->assertNull($obj->renderEnabledLabel(true));

        $obj->setLabelTwigExtension($this->labelTwigExtension);
        $this->assertNull($obj->renderEnabledLabel(true));

        $obj->setTranslator($this->translator);
        $this->assertNotNull($obj->renderEnabledLabel(true));
    }

    /**
     * Test renderEnabledLabel()
     *
     * @return void
     */
    public function testRenderEnabledLabelWithFalse(): void {

        $obj = new TestEnabledLabelRendererTrait();
        $obj->setLabelTwigExtension($this->labelTwigExtension);
        $obj->setTranslator($this->translator);

        $res = file_get_contents(__DIR__ . "/EnabledLabelRendererTraitTest.testRenderEnabledLabelWithFalse.html.txt");
        $this->assertEquals($res, $obj->renderEnabledLabel(false));
    }

    /**
     * Test renderEnabledLabel()
     *
     * @return void
     */
    public function testRenderEnabledLabelWithTrue(): void {

        $obj = new TestEnabledLabelRendererTrait();
        $obj->setLabelTwigExtension($this->labelTwigExtension);
        $obj->setTranslator($this->translator);

        $res = file_get_contents(__DIR__ . "/EnabledLabelRendererTraitTest.testRenderEnabledLabelWithTrue.html.txt");
        $this->assertEquals($res, $obj->renderEnabledLabel(true));
    }
}

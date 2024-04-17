<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\BootstrapBundle\Tests\Renderer\Extend;

use WBW\Bundle\BootstrapBundle\Extend\MaterialDesignIconicFontIconInterface;
use WBW\Bundle\BootstrapBundle\Factory\Extend\IconFactory;
use WBW\Bundle\BootstrapBundle\Renderer\Extend\MaterialDesignIconicFontIconRenderer;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;

/**
 * Material Design Iconic Font icon renderer test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Renderer\Extend
 */
class MaterialDesignIconicFontIconRendererTest extends AbstractTestCase {

    /**
     * Icon.
     *
     * @var MaterialDesignIconicFontIconInterface|null
     */
    private $icon;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set a Material Design iconic font icon mock.
        $this->icon = IconFactory::parseMaterialDesignIconicFontIcon([
            "name"       => "home",
            "style"      => "color: #000000;",
            "border"     => "border",
            "fixedWidth" => true,
            "flip"       => "horizontal",
            "pull"       => "left",
            "rotate"     => "90",
            "size"       => "lg",
            "spin"       => "spin",
        ]);
    }

    /**
     * Test renderBorder()
     *
     * @return void
     */
    public function testRenderBorder(): void {

        $res = MaterialDesignIconicFontIconRenderer::renderBorder($this->icon);
        $this->assertEquals("zmdi-hc-border", $res);
    }

    /**
     * Test renderFixedWidth()
     *
     * @return void
     */
    public function testRenderFixedWidth(): void {

        $res = MaterialDesignIconicFontIconRenderer::renderFixedWidth($this->icon);
        $this->assertEquals("zmdi-hc-fw", $res);
    }

    /**
     * Test renderFlip()
     *
     * @return void
     */
    public function testRenderFlip(): void {

        $res = MaterialDesignIconicFontIconRenderer::renderFlip($this->icon);
        $this->assertEquals("zmdi-hc-flip-horizontal", $res);
    }

    /**
     * Test renderName()
     *
     * @return void
     */
    public function testRenderName(): void {

        $res = MaterialDesignIconicFontIconRenderer::renderName($this->icon);
        $this->assertEquals("zmdi-home", $res);
    }

    /**
     * Test renderPull()
     *
     * @return void
     */
    public function testRenderPull(): void {

        $res = MaterialDesignIconicFontIconRenderer::renderPull($this->icon);
        $this->assertEquals("pull-left", $res);
    }

    /**
     * Test renderRotate()
     *
     * @return void
     */
    public function testRenderRotate(): void {

        $res = MaterialDesignIconicFontIconRenderer::renderRotate($this->icon);
        $this->assertEquals("zmdi-hc-rotate-90", $res);
    }

    /**
     * Test renderSize()
     *
     * @return void
     */
    public function testRenderSize(): void {

        $res = MaterialDesignIconicFontIconRenderer::renderSize($this->icon);
        $this->assertEquals("zmdi-hc-lg", $res);
    }

    /**
     * Test renderSpin()
     *
     * @return void
     */
    public function testRenderSpin(): void {

        $res = MaterialDesignIconicFontIconRenderer::renderSpin($this->icon);
        $this->assertEquals("zmdi-hc-spin", $res);
    }
}

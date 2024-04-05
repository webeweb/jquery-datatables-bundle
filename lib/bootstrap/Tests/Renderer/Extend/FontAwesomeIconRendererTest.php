<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\BootstrapBundle\Tests\Renderer\Extend;

use WBW\Bundle\BootstrapBundle\Extend\FontAwesomeIconInterface;
use WBW\Bundle\BootstrapBundle\Factory\Extend\IconFactory;
use WBW\Bundle\BootstrapBundle\Renderer\Extend\FontAwesomeIconRenderer;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;

/**
 * Font Awesome icon renderer test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Renderer\Extend
 */
class FontAwesomeIconRendererTest extends AbstractTestCase {

    /**
     * Icon.
     *
     * @var FontAwesomeIconInterface|null
     */
    private $icon;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set a Font Awesome icon mock.
        $this->icon = IconFactory::parseFontAwesomeIcon([
            "name"       => "home",
            "style"      => "color: #000000;",
            "animation"  => "spin",
            "bordered"   => true,
            "fixedWidth" => true,
            "font"       => "s",
            "pull"       => "left",
            "size"       => "lg",
        ]);
    }

    /**
     * Test renderAnimation()
     *
     * @return void
     */
    public function testRenderAnimation(): void {

        $res = FontAwesomeIconRenderer::renderAnimation($this->icon);
        $this->assertEquals("fa-spin", $res);
    }

    /**
     * Test renderBordered()
     *
     * @return void
     */
    public function testRenderBordered(): void {

        $res = FontAwesomeIconRenderer::renderBordered($this->icon);
        $this->assertEquals("fa-border", $res);
    }

    /**
     * Test renderFixedWidth()
     *
     * @return void
     */
    public function testRenderFixedWidth(): void {

        $res = FontAwesomeIconRenderer::renderFixedWidth($this->icon);
        $this->assertEquals("fa-fw", $res);
    }

    /**
     * Test renderFont()
     *
     * @return void
     */
    public function testRenderFont(): void {

        $res = FontAwesomeIconRenderer::renderFont($this->icon);
        $this->assertEquals("fas", $res);
    }

    /**
     * Test renderName()
     *
     * @return void
     */
    public function testRenderName(): void {

        $res = FontAwesomeIconRenderer::renderName($this->icon);
        $this->assertEquals("fa-home", $res);
    }

    /**
     * Test renderPull()
     *
     * @return void
     */
    public function testRenderPull(): void {

        $res = FontAwesomeIconRenderer::renderPull($this->icon);
        $this->assertEquals("fa-pull-left", $res);
    }

    /**
     * Test renderSize()
     *
     * @return void
     */
    public function testRenderSize(): void {

        $res = FontAwesomeIconRenderer::renderSize($this->icon);
        $this->assertEquals("fa-lg", $res);
    }
}

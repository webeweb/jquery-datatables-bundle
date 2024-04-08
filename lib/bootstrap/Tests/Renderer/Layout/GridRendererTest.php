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

namespace WBW\Bundle\BootstrapBundle\Tests\Renderer\Layout;

use WBW\Bundle\BootstrapBundle\Renderer\Layout\GridRenderer;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;

/**
 * Grid renderer test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Renderer\Layout
 */
class GridRendererTest extends AbstractTestCase {

    /**
     * Test renderClassname()
     *
     * @return void
     */
    public function testRenderClassnameWithBadSize(): void {

        $this->assertNull(GridRenderer::renderClassname("", 6, ""));
    }

    /**
     * Test renderClassname()
     *
     * @return void
     */
    public function testRenderClassnameWithBadSuffix(): void {

        $this->assertNull(GridRenderer::renderClassname("lg", 6, "suffix"));
    }

    /**
     * Test renderClassname()
     *
     * @return void
     */
    public function testRenderClassnameWithBadValue(): void {

        $this->assertNull(GridRenderer::renderClassname("lg", 0, ""));
        $this->assertNull(GridRenderer::renderClassname("lg", 13, ""));
    }

    /**
     * Test renderClassname()
     *
     * @return void
     */
    public function testRenderClassnameWithSizeLg(): void {

        $exp = "col-lg-6";

        $this->assertEquals($exp, GridRenderer::renderClassname("lg", 6, ""));
    }

    /**
     * Test renderClassname()
     *
     * @return void
     */
    public function testRenderClassnameWithSizeMd(): void {

        $exp = "col-md-6";

        $this->assertEquals($exp, GridRenderer::renderClassname("md", 6, ""));
    }

    /**
     * Test renderClassname()
     *
     * @return void
     */
    public function testRenderClassnameWithSizeSm(): void {

        $exp = "col-sm-6";

        $this->assertEquals($exp, GridRenderer::renderClassname("sm", 6, ""));
    }

    /**
     * Test renderClassname()
     *
     * @return void
     */
    public function testRenderClassnameWithSizeXs(): void {

        $exp = "col-xs-6";

        $this->assertEquals($exp, GridRenderer::renderClassname("xs", 6, ""));
    }

    /**
     * Test renderClassname()
     *
     * @return void
     */
    public function testRenderClassnameWithSuffixOffset(): void {

        $exp = "col-lg-offset-6";

        $this->assertEquals($exp, GridRenderer::renderClassname("lg", 6, "offset"));
    }

    /**
     * Test renderClassname()
     *
     * @return void
     */
    public function testRenderClassnameWithSuffixPull(): void {

        $epx = "col-lg-pull-6";

        $this->assertEquals($epx, GridRenderer::renderClassname("lg", 6, "pull"));
    }

    /**
     * Test renderClassname()
     *
     * @return void
     */
    public function testRenderClassnameWithSuffixPush(): void {

        $exp = "col-lg-push-6";

        $this->assertEquals($exp, GridRenderer::renderClassname("lg", 6, "push"));
    }
}

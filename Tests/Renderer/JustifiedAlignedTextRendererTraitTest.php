<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Renderer;

use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Renderer\TestJustifiedAlignedTextRendererTrait;

/**
 * Justified-aligned text renderer trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Renderer
 */
class JustifiedAlignedTextRendererTraitTest extends AbstractTestCase {

    /**
     * Tests the renderJustifiedAlignedText() method.
     *
     * @return void
     */
    public function testRenderJustifiedAlignedText(): void {

        $obj = new TestJustifiedAlignedTextRendererTrait();

        $this->assertNull($obj->renderJustifiedAlignedText(null));
        $this->assertNull($obj->renderJustifiedAlignedText(""));
        $this->assertEquals('<span class="text-justified">content</span>', $obj->renderJustifiedAlignedText("content"));
    }
}

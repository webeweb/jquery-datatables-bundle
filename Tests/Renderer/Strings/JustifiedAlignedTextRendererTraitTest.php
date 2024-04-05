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

namespace WBW\Bundle\DataTablesBundle\Tests\Renderer\Strings;

use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\DataTablesBundle\Tests\Fixtures\Renderer\Strings\TestJustifiedAlignedTextRendererTrait;

/**
 * Justified-aligned text renderer trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Renderer\Strings
 */
class JustifiedAlignedTextRendererTraitTest extends AbstractTestCase {

    /**
     * Test renderJustifiedAlignedText()
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

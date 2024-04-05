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

namespace WBW\Bundle\BootstrapBundle\Tests\Renderer\Utility;

use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Bundle\BootstrapBundle\Tests\Fixtures\Renderer\Utility\TestLeftAlignedTextRendererTrait;

/**
 * Left-aligned text renderer trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Renderer\Utility
 */
class LeftAlignedTextRendererTraitTest extends AbstractTestCase {

    /**
     * Test renderLeftAlignedText()
     *
     * @return void
     */
    public function testRenderLeftAlignedText(): void {

        $obj = new TestLeftAlignedTextRendererTrait();

        $this->assertNull($obj->renderLeftAlignedText(null));
        $this->assertNull($obj->renderLeftAlignedText(""));
        $this->assertEquals('<span class="text-left">content</span>', $obj->renderLeftAlignedText("content"));
    }
}

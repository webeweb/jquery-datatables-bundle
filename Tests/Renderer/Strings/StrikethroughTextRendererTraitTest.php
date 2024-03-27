<?php

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
use WBW\Bundle\DataTablesBundle\Tests\Fixtures\Renderer\Strings\TestStrikethroughTextRendererTrait;

/**
 * Strikethrough text renderer trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Renderer\Strings
 */
class StrikethroughTextRendererTraitTest extends AbstractTestCase {

    /**
     * Test renderStrikethroughText()
     *
     * @return void
     */
    public function testRenderStrikethroughText(): void {

        $obj = new TestStrikethroughTextRendererTrait();

        $this->assertNull($obj->renderStrikethroughText(null));
        $this->assertNull($obj->renderStrikethroughText(""));
        $this->assertEquals('<s>content</s>', $obj->renderStrikethroughText("content"));
    }
}

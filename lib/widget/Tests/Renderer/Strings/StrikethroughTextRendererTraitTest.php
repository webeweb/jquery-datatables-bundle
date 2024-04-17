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

namespace WBW\Bundle\WidgetBundle\Tests\Renderer\Strings;

use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;
use WBW\Bundle\WidgetBundle\Tests\Fixtures\Renderer\Strings\TestStrikethroughTextRendererTrait;

/**
 * Strikethrough text renderer trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Renderer\Strings
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

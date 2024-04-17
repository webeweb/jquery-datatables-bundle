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
use WBW\Bundle\WidgetBundle\Tests\Fixtures\Renderer\Strings\TestUnderlinedTextRendererTrait;

/**
 * Underlined text renderer trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Renderer\Strings
 */
class UnderlinedTextRendererTraitTest extends AbstractTestCase {

    /**
     * Test renderUnderlinedText()
     *
     * @return void
     */
    public function testRenderUnderlinedText(): void {

        $obj = new TestUnderlinedTextRendererTrait();

        $this->assertNull($obj->renderUnderlinedText(null));
        $this->assertNull($obj->renderUnderlinedText(""));
        $this->assertEquals('<u>content</u>', $obj->renderUnderlinedText("content"));
    }
}
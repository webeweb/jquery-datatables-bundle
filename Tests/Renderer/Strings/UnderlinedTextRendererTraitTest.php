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
use WBW\Bundle\DataTablesBundle\Tests\Fixtures\Renderer\Strings\TestUnderlinedTextRendererTrait;

/**
 * Underlined text renderer trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Renderer\Strings
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

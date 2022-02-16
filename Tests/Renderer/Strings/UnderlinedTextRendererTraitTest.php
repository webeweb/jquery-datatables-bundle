<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Renderer\Strings;

use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Renderer\Strings\TestUnderlinedTextRendererTrait;

/**
 * Underlined text renderer trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Renderer\Strings
 */
class UnderlinedTextRendererTraitTest extends AbstractTestCase {

    /**
     * Tests renderUnderlinedText()
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

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
use WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Renderer\TestItalicTextRendererTrait;

/**
 * Italic text renderer trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Renderer
 */
class ItalicTextRendererTraitTest extends AbstractTestCase {

    /**
     * Tests the renderItalicText() method.
     *
     * @return void
     */
    public function testRenderItalicText(): void {

        $obj = new TestItalicTextRendererTrait();

        $this->assertNull($obj->renderItalicText(null));
        $this->assertNull($obj->renderItalicText(""));
        $this->assertEquals('<em>content</em>', $obj->renderItalicText("content"));
    }
}

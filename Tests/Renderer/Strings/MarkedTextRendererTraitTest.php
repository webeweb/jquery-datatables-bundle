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
use WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Renderer\Strings\TestMarkedTextRendererTrait;

/**
 * Marked text renderer trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Renderer\Strings
 */
class MarkedTextRendererTraitTest extends AbstractTestCase {

    /**
     * Tests renderMarkedText()
     *
     * @return void
     */
    public function testRenderMarkedText(): void {

        $obj = new TestMarkedTextRendererTrait();

        $this->assertNull($obj->renderMarkedText(null));
        $this->assertNull($obj->renderMarkedText(""));
        $this->assertEquals('<mark>content</mark>', $obj->renderMarkedText("content"));
    }
}

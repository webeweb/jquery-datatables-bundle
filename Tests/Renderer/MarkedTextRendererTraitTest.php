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
use WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Renderer\TestMarkedTextRendererTrait;

/**
 * Marked text renderer trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Renderer
 */
class MarkedTextRendererTraitTest extends AbstractTestCase {

    /**
     * Tests the renderMarkedText() method.
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

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
use WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Renderer\TestRightAlignedRendererTrait;

/**
 * Right-aligned renderer trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Renderer
 */
class RightAlignedRendererTraitTest extends AbstractTestCase {

    /**
     * Tests renderRightAligned()
     *
     * @return void
     */
    public function testRenderRightAligned(): void {

        $obj = new TestRightAlignedRendererTrait();

        $this->assertNull($obj->renderRightAligned(null));
        $this->assertNull($obj->renderRightAligned(""));
        $this->assertEquals('<span class="pull-right">content</span>', $obj->renderRightAligned("content"));
    }
}

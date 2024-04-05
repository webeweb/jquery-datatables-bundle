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

namespace WBW\Bundle\DataTablesBundle\Tests\Renderer;

use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\DataTablesBundle\Tests\Fixtures\Renderer\TestRightAlignedRendererTrait;

/**
 * Right-aligned renderer trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Renderer
 */
class RightAlignedRendererTraitTest extends AbstractTestCase {

    /**
     * Test renderRightAligned()
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

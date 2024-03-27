<?php

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
use WBW\Bundle\DataTablesBundle\Tests\Fixtures\Renderer\TestCenterAlignedRendererTrait;

/**
 * Center-aligned renderer trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Renderer
 */
class CenterAlignedRendererTraitTest extends AbstractTestCase {

    /**
     * Test renderCenterAligned()
     *
     * @return void
     */
    public function testRenderCenterAligned(): void {

        $obj = new TestCenterAlignedRendererTrait();

        $this->assertNull($obj->renderCenterAligned(null));
        $this->assertNull($obj->renderCenterAligned(""));
        $this->assertEquals('<div class="align-center">content</div>', $obj->renderCenterAligned("content"));
    }
}

<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2021 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Renderer;

use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Renderer\TestCenterAlignedRendererTrait;

/**
 * Center-aligned renderer trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Renderer
 */
class CenterAlignedRendererTraitTest extends AbstractTestCase {

    /**
     * Tests the renderCenterAligned() method.
     *
     * @return void
     */
    public function testRenderCenter(): void {

        $obj = new TestCenterAlignedRendererTrait();

        $this->assertNull( $obj->renderCenterAligned(null));
        $this->assertNull( $obj->renderCenterAligned(""));
        $this->assertEquals('<em>content</em>', $obj->renderCenterAligned("content"));
    }
}

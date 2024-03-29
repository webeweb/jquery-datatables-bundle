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
use WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Renderer\Strings\TestCenterAlignedTextRendererTrait;

/**
 * Center-aligned text renderer trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Renderer\Strings
 */
class CenterAlignedTextRendererTraitTest extends AbstractTestCase {

    /**
     * Test renderCenterAlignedText()
     *
     * @return void
     */
    public function testRenderCenterAlignedText(): void {

        $obj = new TestCenterAlignedTextRendererTrait();

        $this->assertNull($obj->renderCenterAlignedText(null));
        $this->assertNull($obj->renderCenterAlignedText(""));
        $this->assertEquals('<span class="text-center">content</span>', $obj->renderCenterAlignedText("content"));
    }
}

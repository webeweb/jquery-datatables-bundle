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
use WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Renderer\Strings\TestNoWrapTextRendererTrait;

/**
 * No wrap text renderer trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Renderer\Strings
 */
class NoWrapTextRendererTraitTest extends AbstractTestCase {

    /**
     * Test renderNoWrapText()
     *
     * @return void
     */
    public function testRenderNoWrapText(): void {

        $obj = new TestNoWrapTextRendererTrait();

        $this->assertNull($obj->renderNoWrapText(null));
        $this->assertNull($obj->renderNoWrapText(""));
        $this->assertEquals('<span class="text-nowrap">content</span>', $obj->renderNoWrapText("content"));
    }
}

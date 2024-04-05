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

namespace WBW\Bundle\DataTablesBundle\Tests\Renderer\Strings;

use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\DataTablesBundle\Tests\Fixtures\Renderer\Strings\TestCenterAlignedTextRendererTrait;

/**
 * Center-aligned text renderer trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Renderer\Strings
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

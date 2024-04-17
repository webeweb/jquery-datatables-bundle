<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\BootstrapBundle\Tests\Renderer\Utility;

use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Bundle\BootstrapBundle\Tests\Fixtures\Renderer\Utility\TestCenterAlignedTextRendererTrait;

/**
 * Center-aligned text renderer trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Renderer\Utility
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

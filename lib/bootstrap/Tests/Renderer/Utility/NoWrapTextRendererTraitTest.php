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
use WBW\Bundle\BootstrapBundle\Tests\Fixtures\Renderer\Utility\TestNoWrapTextRendererTrait;

/**
 * No wrap text renderer trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Renderer\Utility
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

<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\WidgetBundle\Tests\Renderer\Component;

use WBW\Bundle\WidgetBundle\Component\IconInterface;
use WBW\Bundle\WidgetBundle\Renderer\Component\IconRenderer;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;

/**
 * Icon renderer test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Renderer\Component
 */
class IconRendererTest extends AbstractTestCase {

    /**
     * Test renderStyle()
     *
     * @return void
     */
    public function testRenderStyle(): void {

        // Set an Icon mock.
        $icon = $this->getMockBuilder(IconInterface::class)->getMock();
        $icon->expects($this->any())->method("getStyle")->willReturn("color: #000000;");

        $this->assertEquals("color: #000000;", IconRenderer::renderStyle($icon));
    }
}

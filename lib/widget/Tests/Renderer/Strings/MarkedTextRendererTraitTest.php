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

namespace WBW\Bundle\WidgetBundle\Tests\Renderer\Strings;

use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;
use WBW\Bundle\WidgetBundle\Tests\Fixtures\Renderer\Strings\TestMarkedTextRendererTrait;

/**
 * Marked text renderer trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Renderer\Strings
 */
class MarkedTextRendererTraitTest extends AbstractTestCase {

    /**
     * Test renderMarkedText()
     *
     * @return void
     */
    public function testRenderMarkedText(): void {

        $obj = new TestMarkedTextRendererTrait();

        $this->assertNull($obj->renderMarkedText(null));
        $this->assertNull($obj->renderMarkedText(""));
        $this->assertEquals('<mark>content</mark>', $obj->renderMarkedText("content"));
    }
}

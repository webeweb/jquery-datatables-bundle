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
use WBW\Bundle\WidgetBundle\Tests\Fixtures\Renderer\Strings\TestSmallTextRendererTrait;

/**
 * Small text renderer trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Renderer\Strings
 */
class SmallTextRendererTraitTest extends AbstractTestCase {

    /**
     * Test renderSmallText()
     *
     * @return void
     */
    public function testRenderSmallText(): void {

        $obj = new TestSmallTextRendererTrait();

        $this->assertNull($obj->renderSmallText(null));
        $this->assertNull($obj->renderSmallText(""));
        $this->assertEquals('<small>content</small>', $obj->renderSmallText("content"));
    }
}

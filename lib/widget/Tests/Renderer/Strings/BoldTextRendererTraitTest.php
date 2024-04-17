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
use WBW\Bundle\WidgetBundle\Tests\Fixtures\Renderer\Strings\TestBoldTextRendererTrait;

/**
 * Bold text renderer trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Renderer\Strings
 */
class BoldTextRendererTraitTest extends AbstractTestCase {

    /**
     * Test renderBoldText()
     *
     * @return void
     */
    public function testRenderBoldText(): void {

        $obj = new TestBoldTextRendererTrait();

        $this->assertNull($obj->renderBoldText(null));
        $this->assertNull($obj->renderBoldText(""));
        $this->assertEquals('<strong>content</strong>', $obj->renderBoldText("content"));
    }
}

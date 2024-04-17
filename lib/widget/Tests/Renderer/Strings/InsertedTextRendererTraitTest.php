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
use WBW\Bundle\WidgetBundle\Tests\Fixtures\Renderer\Strings\TestInsertedTextRendererTrait;

/**
 * Inserted text renderer trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Renderer\Strings
 */
class InsertedTextRendererTraitTest extends AbstractTestCase {

    /**
     * Test renderInsertedText()
     *
     * @return void
     */
    public function testRenderInsertedText(): void {

        $obj = new TestInsertedTextRendererTrait();

        $this->assertNull($obj->renderInsertedText(null));
        $this->assertNull($obj->renderInsertedText(""));
        $this->assertEquals('<ins>content</ins>', $obj->renderInsertedText("content"));
    }
}

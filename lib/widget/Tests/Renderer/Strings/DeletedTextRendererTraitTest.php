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
use WBW\Bundle\WidgetBundle\Tests\Fixtures\Renderer\Strings\TestDeletedTextRendererTrait;

/**
 * Deleted text renderer trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Renderer\Strings
 */
class DeletedTextRendererTraitTest extends AbstractTestCase {

    /**
     * Test renderDeletedText()
     *
     * @return void
     */
    public function testRenderDeletedText(): void {

        $obj = new TestDeletedTextRendererTrait();

        $this->assertNull($obj->renderDeletedText(null));
        $this->assertNull($obj->renderDeletedText(""));
        $this->assertEquals('<del>content</del>', $obj->renderDeletedText("content"));
    }
}

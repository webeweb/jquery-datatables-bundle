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
use WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Renderer\Strings\TestDeletedTextRendererTrait;

/**
 * Deleted text renderer trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Renderer\Strings
 */
class DeletedTextRendererTraitTest extends AbstractTestCase {

    /**
     * Tests renderDeletedText()
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

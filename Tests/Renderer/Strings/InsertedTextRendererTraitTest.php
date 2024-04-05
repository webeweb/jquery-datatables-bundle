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
use WBW\Bundle\DataTablesBundle\Tests\Fixtures\Renderer\Strings\TestInsertedTextRendererTrait;

/**
 * Inserted text renderer trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Renderer\Strings
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

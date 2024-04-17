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

namespace WBW\Bundle\WidgetBundle\Tests\Renderer;

use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;
use WBW\Bundle\WidgetBundle\Tests\Fixtures\Renderer\TestStringsRendererTrait;

/**
 * Strings renderer trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Renderer
 */
class StringsRendererTraitTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new TestStringsRendererTrait();

        $this->assertNull($obj->renderBoldText(null));
        $this->assertNull($obj->renderDeletedText(null));
        $this->assertNull($obj->renderInsertedText(null));
        $this->assertNull($obj->renderItalicText(null));
        $this->assertNull($obj->renderMarkedText(null));
        $this->assertNull($obj->renderSmallText(null));
        $this->assertNull($obj->renderStrikethroughText(null));
        $this->assertNull($obj->renderUnderlinedText(null));
    }
}

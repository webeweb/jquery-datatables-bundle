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

namespace WBW\Bundle\WidgetBundle\Tests\Fixtures\Renderer;

use WBW\Bundle\WidgetBundle\Renderer\StringsRendererTrait;

/**
 * Test strings renderer trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Fixtures\Renderer
 */
class TestStringsRendererTrait {

    use StringsRendererTrait {
        renderBoldText as public;
        renderDeletedText as public;
        renderItalicText as public;
        renderInsertedText as public;
        renderMarkedText as public;
        renderSmallText as public;
        renderStrikethroughText as public;
        renderUnderlinedText as public;
    }
}

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

namespace WBW\Bundle\DataTablesBundle\Tests\Fixtures\Renderer\Strings;

use WBW\Bundle\DataTablesBundle\Renderer\Strings\UnderlinedTextRendererTrait;

/**
 * Test underlined text renderer trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Fixtures\Renderer\Strings
 */
class TestUnderlinedTextRendererTrait {

    use UnderlinedTextRendererTrait {
        renderUnderlinedText as public;
    }
}

<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Renderer\Strings;

use WBW\Bundle\JQuery\DataTablesBundle\Renderer\Strings\CenterAlignedTextRendererTrait;

/**
 * Test center-aligned text renderer trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Renderer\Strings
 */
class TestCenterAlignedTextRendererTrait {

    use CenterAlignedTextRendererTrait {
        renderCenterAlignedText as public;
    }
}

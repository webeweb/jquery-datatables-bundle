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

namespace WBW\Bundle\BootstrapBundle\Tests\Fixtures\Renderer\Utility;

use WBW\Bundle\BootstrapBundle\Renderer\Utility\LeftAlignedTextRendererTrait;

/**
 * Test left-aligned text renderer trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Fixtures\Renderer\Utility
 */
class TestLeftAlignedTextRendererTrait {

    use LeftAlignedTextRendererTrait {
        renderLeftAlignedText as public;
    }
}

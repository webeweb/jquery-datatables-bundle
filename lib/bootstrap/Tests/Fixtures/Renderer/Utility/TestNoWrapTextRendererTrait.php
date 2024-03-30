<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\BootstrapBundle\Tests\Fixtures\Renderer\Utility;

use WBW\Bundle\BootstrapBundle\Renderer\Utility\NoWrapTextRendererTrait;

/**
 * Test no wrap text renderer trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Fixtures\Renderer\Utility
 */
class TestNoWrapTextRendererTrait {

    use NoWrapTextRendererTrait {
        renderNoWrapText as public;
    }
}
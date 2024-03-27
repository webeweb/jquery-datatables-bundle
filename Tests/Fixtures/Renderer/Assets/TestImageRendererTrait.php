<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2021 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Fixtures\Renderer\Assets;

use WBW\Bundle\DataTablesBundle\Renderer\Assets\ImageRendererTrait;

/**
 * Test image renderer trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Fixtures\Renderer\Assets
 */
class TestImageRendererTrait {

    use ImageRendererTrait {
        renderImage as public;
    }
}

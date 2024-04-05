<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2021 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Fixtures\Renderer\Floats;

use WBW\Bundle\DataTablesBundle\Renderer\Floats\FloatRendererTrait;

/**
 * Test float renderer trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Fixtures\Renderer\Floats
 */
class TestFloatRendererTrait {

    use FloatRendererTrait {
        renderFloat as public;
        renderPercent as public;
        renderPrice as public;
    }
}

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

namespace WBW\Bundle\WidgetBundle\Tests\Fixtures\Renderer\DateTimes;

use WBW\Bundle\WidgetBundle\Renderer\DateTimes\TimeRendererTrait;

/**
 * Test time renderer trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Fixtures\Renderer\DateTimes
 */
class TestTimeRendererTrait {

    use TimeRendererTrait {
        renderTime as public;
    }
}

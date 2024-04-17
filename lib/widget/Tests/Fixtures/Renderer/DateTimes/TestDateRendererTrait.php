<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2021 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\WidgetBundle\Tests\Fixtures\Renderer\DateTimes;

use WBW\Bundle\WidgetBundle\Renderer\DateTimes\DateRendererTrait;

/**
 * Test date renderer trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Fixtures\Renderer\DateTimes
 */
class TestDateRendererTrait {

    use DateRendererTrait {
        renderDate as public;
    }
}

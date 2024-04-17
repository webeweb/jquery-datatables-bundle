<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\WidgetBundle\Tests\Fixtures\Component\Color;

use WBW\Bundle\WidgetBundle\Component\Color\RedColorTrait;

/**
 * Test red color trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Fixtures\Component\Color
 */
class TestRedColorTrait {

    use RedColorTrait {
        setRedColor as public;
    }
}

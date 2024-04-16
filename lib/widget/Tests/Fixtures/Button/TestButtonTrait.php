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

namespace WBW\Bundle\WidgetBundle\Tests\Fixtures\Button;

use WBW\Bundle\WidgetBundle\Button\ButtonTrait;

/**
 * Test button trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Fixtures\Button
 */
class TestButtonTrait {

    use ButtonTrait {
        setButton as public;
    }
}

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

namespace WBW\Bundle\WidgetBundle\Tests\Fixtures\ProgressBar;

use WBW\Bundle\WidgetBundle\ProgressBar\ProgressBarTrait;

/**
 * Test progress bar trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Fixtures\ProgressBar
 */
class TestProgressBarTrait {

    use ProgressBarTrait {
        setProgressBar as public;
    }
}

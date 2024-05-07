<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Tests\Fixtures\EventDispatcher;

use WBW\Bundle\CommonBundle\EventDispatcher\EventDispatcherTrait;

/**
 * Test event dispatcher trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Fixtures\EventDispatcher
 */
class TestEventDispatcherTrait {

    use EventDispatcherTrait {
        dispatch as public;
        setEventDispatcher as public;
    }
}

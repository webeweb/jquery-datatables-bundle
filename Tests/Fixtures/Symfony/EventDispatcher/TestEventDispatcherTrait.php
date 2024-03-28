<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Fixtures\Symfony\EventDispatcher;

use WBW\Bundle\DataTablesBundle\Symfony\EventDispatcher\EventDispatcherTrait;

/**
 * Test event dispatcher trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Fixtures\Symfony\EventDispatcher
 */
class TestEventDispatcherTrait {

    use EventDispatcherTrait {
        setEventDispatcher as public;
    }
}

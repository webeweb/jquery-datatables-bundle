<?php

/*
 * This file is part of the core-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Tests\Fixtures\Event;

use WBW\Bundle\CommonBundle\Event\AbstractEvent;

/**
 * Test event.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Fixtures\Event
 */
class TestEvent extends AbstractEvent {

    /**
     * Constructor.
     *
     * @param string $eventName The event name.
     */
    public function __construct(string $eventName) {
        parent::__construct($eventName);
    }
}

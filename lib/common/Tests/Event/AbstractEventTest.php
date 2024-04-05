<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Tests\Event;

use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\Event\TestAbstractEvent;

/**
 * Abstract event test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Event
 */
class AbstractEventTest extends AbstractTestCase {

    /**
     * Test __construct() method.
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new TestAbstractEvent("eventName");

        $this->assertEquals("eventName", $obj->getEventName());
    }
}

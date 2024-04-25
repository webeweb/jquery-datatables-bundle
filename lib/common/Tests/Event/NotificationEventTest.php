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

namespace WBW\Bundle\CommonBundle\Tests\Event;

use WBW\Bundle\CommonBundle\Event\NotificationEvent;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Library\Widget\Component\NotificationInterface;

/**
 * Notification event test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Event
 */
class NotificationEventTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__constructor(): void {

        $this->assertEquals("wbw.common.event.notification.danger", NotificationEvent::DANGER);
        $this->assertEquals("wbw.common.event.notification.info", NotificationEvent::INFO);
        $this->assertEquals("wbw.common.event.notification.success", NotificationEvent::SUCCESS);
        $this->assertEquals("wbw.common.event.notification.warning", NotificationEvent::WARNING);

        // Set a Notification mock.
        $notification = $this->getMockBuilder(NotificationInterface::class)->getMock();

        $obj = new NotificationEvent($notification, "test");

        $this->assertEquals("test", $obj->getEventName());
        $this->assertSame($notification, $obj->getNotification());
    }
}

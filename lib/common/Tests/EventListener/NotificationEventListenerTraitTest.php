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

namespace WBW\Bundle\CommonBundle\Tests\EventListener;

use WBW\Bundle\CommonBundle\EventListener\NotificationEventListener;
use WBW\Bundle\CommonBundle\Service\SessionServiceInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\EventListener\TestNotificationEventListenerTrait;

/**
 * Notification event listener trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\EventListener
 */
class NotificationEventListenerTraitTest extends AbstractTestCase {

    /**
     * Test setNotificationEventListener()
     *
     * @return void
     */
    public function testSetNotificationEventListener(): void {

        // Set a Session service mock.
        $sessionService = $this->getMockBuilder(SessionServiceInterface::class)->getMock();

        // Set a Notification event listener mock.
        $notificationEventListener = new NotificationEventListener($sessionService);

        $obj = new TestNotificationEventListenerTrait();

        $obj->setNotificationEventListener($notificationEventListener);
        $this->assertSame($notificationEventListener, $obj->getNotificationEventListener());
    }
}

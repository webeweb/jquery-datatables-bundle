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

namespace WBW\Bundle\WidgetBundle\Tests\Notification;

use WBW\Bundle\WidgetBundle\Notification\NotificationInterface;
use WBW\Bundle\WidgetBundle\Notification\WarningNotification;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;

/**
 * Warning notification test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Notification
 */
class WarningNotificationTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new WarningNotification("warning");

        $this->assertEquals(NotificationInterface::NOTIFICATION_TYPE_WARNING, $obj->getType());
        $this->assertEquals("warning", $obj->getContent());
    }
}

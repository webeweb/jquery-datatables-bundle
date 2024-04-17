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

namespace WBW\Bundle\WidgetBundle\Tests\Component\Notification;

use WBW\Bundle\WidgetBundle\Component\Notification\InfoNotification;
use WBW\Bundle\WidgetBundle\Component\NotificationInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;

/**
 * Info notification test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Component\Notification
 */
class InfoNotificationTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new InfoNotification("info");

        $this->assertEquals(NotificationInterface::NOTIFICATION_TYPE_INFO, $obj->getType());
        $this->assertEquals("info", $obj->getContent());
    }
}

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

use WBW\Bundle\WidgetBundle\Notification\DangerNotification;
use WBW\Bundle\WidgetBundle\Notification\NotificationInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;

/**
 * Danger notification test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Notification
 */
class DangerNotificationTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new DangerNotification("danger");

        $this->assertEquals(NotificationInterface::NOTIFICATION_TYPE_DANGER, $obj->getType());
        $this->assertEquals("danger", $obj->getContent());
    }
}

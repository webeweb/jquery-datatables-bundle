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
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;

/**
 * Notification interface test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Notification
 */
class NotificationInterfaceTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("danger", NotificationInterface::NOTIFICATION_TYPE_DANGER);
        $this->assertEquals("info", NotificationInterface::NOTIFICATION_TYPE_INFO);
        $this->assertEquals("success", NotificationInterface::NOTIFICATION_TYPE_SUCCESS);
        $this->assertEquals("warning", NotificationInterface::NOTIFICATION_TYPE_WARNING);
    }
}

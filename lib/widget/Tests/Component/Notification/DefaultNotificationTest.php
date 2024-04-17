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

use WBW\Bundle\WidgetBundle\Component\Notification\DefaultNotification;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;

/**
 * Default notification test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Component\Notification
 */
class DefaultNotificationTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new DefaultNotification("type", "default");

        $this->assertEquals("type", $obj->getType());
        $this->assertEquals("default", $obj->getContent());
    }
}

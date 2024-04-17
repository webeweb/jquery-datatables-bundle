<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\WidgetBundle\Factory;

use WBW\Bundle\WidgetBundle\Component\Notification\DangerNotification;
use WBW\Bundle\WidgetBundle\Component\Notification\DefaultNotification;
use WBW\Bundle\WidgetBundle\Component\Notification\InfoNotification;
use WBW\Bundle\WidgetBundle\Component\Notification\SuccessNotification;
use WBW\Bundle\WidgetBundle\Component\Notification\WarningNotification;
use WBW\Bundle\WidgetBundle\Component\NotificationInterface;

/**
 * Notification factory.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Factory
 */
class NotificationFactory {

    /**
     * Create a danger notification.
     *
     * @param string $content The content.
     * @return NotificationInterface Returns the danger notification.
     */
    public static function newDangerNotification(string $content): NotificationInterface {
        return new DangerNotification($content);
    }

    /**
     * Create a default notification.
     *
     * @param string $content The content.
     * @param string $type The type.
     * @return NotificationInterface Returns the default notification.
     */
    public static function newDefaultNotification(string $content, string $type): NotificationInterface {
        return new DefaultNotification($type, $content);
    }

    /**
     * Create an info notification.
     *
     * @param string $content The content.
     * @return NotificationInterface Returns the info notification.
     */
    public static function newInfoNotification(string $content): NotificationInterface {
        return new InfoNotification($content);
    }

    /**
     * Create a success notification.
     *
     * @param string $content The content.
     * @return NotificationInterface Returns the success notification.
     */
    public static function newSuccessNotification(string $content): NotificationInterface {
        return new SuccessNotification($content);
    }

    /**
     * Create a warning notification.
     *
     * @param string $content The content.
     * @return NotificationInterface Returns the warning notification.
     */
    public static function newWarningNotification(string $content): NotificationInterface {
        return new WarningNotification($content);
    }
}

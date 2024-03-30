<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Event;

use WBW\Library\Symfony\Assets\NotificationInterface;
use WBW\Library\Symfony\Assets\NotificationTrait;

/**
 * Notification event.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Event
 */
class NotificationEvent extends AbstractEvent {

    use NotificationTrait;

    /**
     * Event "danger".
     *
     * @var string
     */
    public const DANGER = "wbw.common.event.notification.danger";

    /**
     * Event "info".
     *
     * @var string
     */
    public const INFO = "wbw.common.event.notification.info";

    /**
     * Event "success".
     *
     * @var string
     */
    public const SUCCESS = "wbw.common.event.notification.success";

    /**
     * Event "warning".
     *
     * @var string
     */
    public const WARNING = "wbw.common.event.notification.warning";

    /**
     * Constructor.
     *
     * @param string $eventName The event name.
     * @param NotificationInterface $notification The notification.
     */
    public function __construct(string $eventName, NotificationInterface $notification) {
        parent::__construct($eventName);

        $this->setNotification($notification);
    }
}

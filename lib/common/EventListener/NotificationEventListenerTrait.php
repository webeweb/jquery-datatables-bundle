<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\EventListener;

/**
 * Notification event listener trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\EventListener
 */
trait NotificationEventListenerTrait {

    /**
     * Notification event listener.
     *
     * @var NotificationEventListener|null
     */
    private $notificationEventListener;

    /**
     * Get the Notification event listener.
     *
     * @return NotificationEventListener|null Returns the notification event listener.
     */
    public function getNotificationEventListener(): ?NotificationEventListener {
        return $this->notificationEventListener;
    }

    /**
     * Set the notification event listener.
     *
     * @param NotificationEventListener|null $notificationEventListener The notification event listener.
     * @return self Returns this instance.
     */
    protected function setNotificationEventListener(?NotificationEventListener $notificationEventListener): self {
        $this->notificationEventListener = $notificationEventListener;
        return $this;
    }
}

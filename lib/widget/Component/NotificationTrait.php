<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\WidgetBundle\Component;

/**
 * Notification trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Component
 */
trait NotificationTrait {

    /**
     * Notification.
     *
     * @var NotificationInterface|null
     */
    protected $notification;

    /**
     * Get the notification.
     *
     * @return NotificationInterface|null Returns the notification.
     */
    public function getNotification(): ?NotificationInterface {
        return $this->notification;
    }

    /**
     * Set the notification.
     *
     * @param NotificationInterface|null $notification The notification.
     * @return self Returns this instance.
     */
    protected function setNotification(?NotificationInterface $notification): self {
        $this->notification = $notification;
        return $this;
    }
}

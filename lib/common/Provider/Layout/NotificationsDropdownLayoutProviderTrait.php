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

namespace WBW\Bundle\CommonBundle\Provider\Layout;

/**
 * Notifications dropdown layout provider trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Provider\Layout
 */
trait NotificationsDropdownLayoutProviderTrait {

    /**
     * Notifications dropdown layout provider.
     *
     * @var NotificationsDropdownLayoutProviderInterface|null
     */
    private $notificationsDropdownLayoutProvider;

    /**
     * Get the notifications dropdown layout provider.
     *
     * @return NotificationsDropdownLayoutProviderInterface|null Returns the notifications dropdown layout provider.
     */
    public function getNotificationsDropdownLayoutProvider(): ?NotificationsDropdownLayoutProviderInterface {
        return $this->notificationsDropdownLayoutProvider;
    }

    /**
     * Set the notifications dropdown layout provider.
     *
     * @param NotificationsDropdownLayoutProviderInterface|null $notificationsDropdownLayoutProvider The notifications dropdown layout provider.
     * @return self Returns this instance.
     */
    protected function setNotificationsDropdownLayoutProvider(?NotificationsDropdownLayoutProviderInterface $notificationsDropdownLayoutProvider): self {
        $this->notificationsDropdownLayoutProvider = $notificationsDropdownLayoutProvider;
        return $this;
    }
}

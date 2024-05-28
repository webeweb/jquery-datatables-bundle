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

namespace WBW\Bundle\CommonBundle\EventDispatcher;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Contracts\EventDispatcher\Event;

/**
 * Event dispatcher trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\EventDispatcher
 */
trait EventDispatcherTrait {

    /**
     * Event dispatcher.
     *
     * @var EventDispatcherInterface|null
     */
    private $eventDispatcher;

    /**
     * Dispatch an event.
     *
     * @param Event $event The event.
     * @param string|null $eventName The event name.
     * @return Event Returns the event.
     */
    protected function dispatch(Event $event, string $eventName = null): Event {
        return null !== $this->getEventDispatcher() ? $this->eventDispatcher->dispatch($event, $eventName) : $event;
    }

    /**
     * Get the event dispatcher.
     *
     * @return EventDispatcherInterface|null Returns the event dispatcher.
     */
    public function getEventDispatcher(): ?EventDispatcherInterface {
        return $this->eventDispatcher;
    }

    /**
     * Set the event dispatcher.
     *
     * @param EventDispatcherInterface|null $eventDispatcher The event dispatcher.
     * @return self Returns this instance.
     */
    protected function setEventDispatcher(?EventDispatcherInterface $eventDispatcher): self {
        $this->eventDispatcher = $eventDispatcher;
        return $this;
    }
}

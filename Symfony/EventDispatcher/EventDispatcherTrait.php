<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Symfony\EventDispatcher;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Event dispatcher trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Symfony\EventDispatcher
 */
trait EventDispatcherTrait {

    /**
     * Event dispatcher.
     *
     * @var EventDispatcherInterface|null
     */
    private $eventDispatcher;

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

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

use Symfony\Component\HttpFoundation\Session\Session;
use Throwable;
use WBW\Bundle\CommonBundle\Event\NotificationEvent;
use WBW\Bundle\CommonBundle\Service\SessionServiceInterface;
use WBW\Bundle\CommonBundle\Service\SessionServiceTrait;

/**
 * Notification event listener.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\EventListener
 */
class NotificationEventListener {

    use SessionServiceTrait;

    /**
     * Service name.
     *
     * @var string
     */
    public const SERVICE_NAME = "wbw.common.event_listener.notification";

    /**
     * Constructor.
     *
     * @param SessionServiceInterface $sessionService The session service.
     */
    public function __construct(SessionServiceInterface $sessionService) {
        $this->setSessionService($sessionService);
    }

    /**
     * On notify.
     *
     * @param NotificationEvent $event The event.
     * @return NotificationEvent Returns the event.
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function onNotify(NotificationEvent $event): NotificationEvent {

        /** @var Session $session */
        $session = $this->getSessionService()->getSession();
        $session->getFlashBag()->add($event->getNotification()->getType(), $event->getNotification()->getContent());

        return $event;
    }
}

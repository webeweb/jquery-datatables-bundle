<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\EventListener;

use Symfony\Component\HttpFoundation\Session\Session;
use WBW\Bundle\CommonBundle\Event\ToastEvent;
use WBW\Bundle\CommonBundle\Service\SessionServiceInterface;
use WBW\Bundle\CommonBundle\Service\SessionServiceTrait;

/**
 * Toast event listener.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\EventListener
 */
class ToastEventListener implements ToastEventListenerInterface {

    use SessionServiceTrait;

    /**
     * Service name.
     *
     * @var string
     */
    public const SERVICE_NAME = "wbw.common.event_listener.toast";

    /**
     * Constructor.
     *
     * @param SessionServiceInterface $sessionService The session service.
     */
    public function __construct(SessionServiceInterface $sessionService) {
        $this->setSessionService($sessionService);
    }

    /**
     * {@inheritDoc}
     */
    public function onToast(ToastEvent $event): ToastEvent {

        /** @var Session $session */
        $session = $this->getSessionService()->getSession();
        $session->getFlashBag()->add($event->getToast()->getType(), $event->getToast()->getContent());

        return $event;
    }
}

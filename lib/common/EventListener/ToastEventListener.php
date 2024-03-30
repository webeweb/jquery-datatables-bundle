<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\EventListener;

use Throwable;
use WBW\Bundle\CommonBundle\Event\ToastEvent;
use WBW\Bundle\CommonBundle\Service\SessionServiceInterface;
use WBW\Bundle\CommonBundle\Service\SessionServiceTrait;

/**
 * Toast event listener.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CoreBundle\EventListener
 */
class ToastEventListener {

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
     * On toast.
     *
     * @param ToastEvent $event The event.
     * @return ToastEvent Returns the event.
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function onToast(ToastEvent $event): ToastEvent {
        $this->getSessionService()->getSession()->getFlashBag()->add($event->getToast()->getType(), $event->getToast()->getContent());
        return $event;
    }
}

<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\EventListener;

use Throwable;
use WBW\Bundle\CommonBundle\Event\ToastEvent;
use WBW\Bundle\CommonBundle\Service\SessionServiceInterface;

/**
 * Toast event listener interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\EventListener
 */
interface ToastEventListenerInterface {

    /**
     * Get the session service.
     *
     * @return SessionServiceInterface|null Returns the session service.
     */
    public function getSessionService(): ?SessionServiceInterface;

    /**
     * On toast.
     *
     * @param ToastEvent $event The event.
     * @return ToastEvent Returns the event.
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function onToast(ToastEvent $event): ToastEvent;
}

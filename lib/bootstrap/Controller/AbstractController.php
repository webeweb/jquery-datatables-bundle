<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\BootstrapBundle\Controller;

use Throwable;
use WBW\Bundle\CommonBundle\Controller\AbstractController as BaseController;
use WBW\Bundle\CommonBundle\Event\NotificationEvent;
use WBW\Bundle\CommonBundle\Event\ToastEvent;
use WBW\Library\Widget\Factory\NotificationFactory;
use WBW\Library\Widget\Factory\ToastFactory;

/**
 * Abstract controller.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Controller
 * @abstract
 */
abstract class AbstractController extends BaseController {

    /**
     * Notify "danger".
     *
     * @param string $content The content.
     * @return NotificationEvent Returns the event.
     * @throws Throwable Throws an exception if an error occurs.
     */
    protected function notifyDanger(string $content): NotificationEvent {

        $notification = NotificationFactory::newDangerNotification($content);

        return $this->notify($notification, NotificationEvent::DANGER);
    }

    /**
     * Notify "info".
     *
     * @param string $content The content.
     * @return NotificationEvent Returns the event.
     * @throws Throwable Throws an exception if an error occurs.
     */
    protected function notifyInfo(string $content): NotificationEvent {

        $notification = NotificationFactory::newInfoNotification($content);

        return $this->notify($notification, NotificationEvent::INFO);
    }

    /**
     * Notify "success".
     *
     * @param string $content The content.
     * @return NotificationEvent Returns the event.
     * @throws Throwable Throws an exception if an error occurs.
     */
    protected function notifySuccess(string $content): NotificationEvent {

        $notification = NotificationFactory::newSuccessNotification($content);

        return $this->notify($notification, NotificationEvent::SUCCESS);
    }

    /**
     * Notify "warning".
     *
     * @param string $content The content.
     * @return NotificationEvent Returns the event.
     * @throws Throwable Throws an exception if an error occurs.
     */
    protected function notifyWarning(string $content): NotificationEvent {

        $notification = NotificationFactory::newWarningNotification($content);

        return $this->notify($notification, NotificationEvent::WARNING);
    }

    /**
     * Toast "danger".
     *
     * @param string $content The content.
     * @return ToastEvent Returns the event.
     * @throws Throwable Throws an exception if an error occurs.
     */
    protected function toastDanger(string $content): ToastEvent {

        $toast = ToastFactory::newDangerToast($content);

        return $this->toast($toast, ToastEvent::DANGER);
    }

    /**
     * Toast "info".
     *
     * @param string $content The content.
     * @return ToastEvent Returns the event.
     * @throws Throwable Throws an exception if an error occurs.
     */
    protected function toastInfo(string $content): ToastEvent {

        $toast = ToastFactory::newInfoToast($content);

        return $this->toast($toast, ToastEvent::INFO);
    }

    /**
     * Toast "success".
     *
     * @param string $content The content.
     * @return ToastEvent Returns the event.
     * @throws Throwable Throws an exception if an error occurs.
     */
    protected function toastSuccess(string $content): ToastEvent {

        $toast = ToastFactory::newSuccessToast($content);

        return $this->toast($toast, ToastEvent::SUCCESS);
    }

    /**
     * Toast "warning".
     *
     * @param string $content The content.
     * @return ToastEvent Returns the event.
     * @throws Throwable Throws an exception if an error occurs.
     */
    protected function toastWarning(string $content): ToastEvent {

        $toast = ToastFactory::newWarningToast($content);

        return $this->toast($toast, ToastEvent::WARNING);
    }
}

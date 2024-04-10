<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as BaseController;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Contracts\EventDispatcher\Event;
use Symfony\Contracts\Translation\TranslatorInterface;
use Throwable;
use Twig\Environment;
use WBW\Bundle\CommonBundle\Event\NotificationEvent;
use WBW\Bundle\CommonBundle\Event\ToastEvent;
use WBW\Bundle\CommonBundle\Service\SessionService;
use WBW\Library\Symfony\Assets\NotificationInterface;
use WBW\Library\Symfony\Assets\ToastInterface;

/**
 * Abstract controller.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Controller
 * @abstract
 */
abstract class AbstractController extends BaseController {

    /**
     * Dispatch an event.
     *
     * @param string $eventName The event name.
     * @param Event $event The event.
     * @return Event Returns the event.
     * @throws Throwable Throws an exception if an error occurs.
     */
    protected function dispatchEvent(string $eventName, Event $event): Event {

        $this->getLogger()->debug(sprintf('A controller dispatch an event with name "%s"', $eventName), [
            "_controller" => get_class($this),
            "_event"      => get_class($event),
        ]);

        return $this->getEventDispatcher()->dispatch($event, $eventName);
    }

    /**
     * Get the container.
     *
     * @return ContainerInterface|null Returns the container.
     */
    protected function getContainer(): ?ContainerInterface {
        return $this->container;
    }

    /**
     * Get the entity manager.
     *
     * @return EntityManagerInterface|null Returns the entity manager.
     * @throws Throwable Throws an exception if an error occurs.
     */
    protected function getEntityManager(): ?EntityManagerInterface {
        return $this->container->get("doctrine.orm.entity_manager");
    }

    /**
     * Get the event dispatcher.
     *
     * @return EventDispatcherInterface|null Returns the event dispatcher.
     * @throws Throwable Throws an exception if an error occurs.
     */
    protected function getEventDispatcher(): ?EventDispatcherInterface {
        return $this->container->get("event_dispatcher");
    }

    /**
     * Get the logger.
     *
     * @return LoggerInterface|null Returns the logger.
     * @throws Throwable Throws an exception if an error occurs.
     */
    protected function getLogger(): ?LoggerInterface {
        return $this->container->get("logger");
    }

    /**
     * Get the mailer.
     *
     * @return MailerInterface|null Returns the mailer.
     * @throws Throwable Throws an exception if an error occurs.
     */
    protected function getMailer(): ?MailerInterface {
        return $this->container->get("mailer");
    }

    /**
     * Get the router.
     *
     * @return RouterInterface|null Returns the router.
     * @throws Throwable Throws an exception if an error occurs.
     */
    protected function getRouter(): ?RouterInterface {
        return $this->container->get("router");
    }

    /**
     * Get the session.
     *
     * @return SessionInterface|null Returns the session.
     * @throws Throwable Throws an exception if an error occurs.
     */
    protected function getSession(): ?SessionInterface {

        /** @var SessionService $service */
        $service = $this->container->get(SessionService::SERVICE_NAME);

        return null === $service ? null : $service->getSession();
    }

    /**
     * {@inheritDoc}
     */
    public static function getSubscribedServices(): array {

        return array_merge([
            "doctrine.orm.entity_manager" => "?" . EntityManagerInterface::class,
            "event_dispatcher"            => "?" . EventDispatcherInterface::class,
            "logger"                      => "?" . LoggerInterface::class,
            "mailer"                      => "?" . MailerInterface::class,
            "translator"                  => "?" . TranslatorInterface::class,
            SessionService::SERVICE_NAME  => "?" . SessionService::class,
        ], parent::getSubscribedServices());
    }

    /**
     * Get the translator.
     *
     * @return TranslatorInterface|null Returns the translator.
     * @throws Throwable Throws an exception if an error occurs.
     */
    protected function getTranslator(): ?TranslatorInterface {
        return $this->container->get("translator");
    }

    /**
     * Get Twig.
     *
     * @return Environment|null Returns Twig.
     * @throws Throwable Throws an exception if an error occurs.
     */
    protected function getTwig(): ?Environment {
        return $this->container->get("twig");
    }

    /**
     * Notify.
     *
     * @param string $eventName The event name.
     * @param NotificationInterface $notification The notification.
     * @return NotificationEvent|null Returns the event.
     * @throws Throwable Throws an exception if an error occurs.
     */
    protected function notify(string $eventName, NotificationInterface $notification): ?NotificationEvent {

        $event = new NotificationEvent($eventName, $notification);
        $this->dispatchEvent($eventName, $event);

        return $event;
    }

    /**
     * Toast.
     *
     * @param string $eventName The event name.
     * @param ToastInterface $toast The toast.
     * @return ToastEvent|null Returns the event.
     * @throws Throwable Throws an exception if an error occurs.
     */
    protected function toast(string $eventName, ToastInterface $toast): ?ToastEvent {

        $event = new ToastEvent($eventName, $toast);
        $this->dispatchEvent($eventName, $event);

        return $event;
    }

    /**
     * Translate.
     *
     * @param string $id The id.
     * @param array<string,mixed> $parameters The parameters.
     * @param string|null $domain The domain.
     * @param string|null $locale The locale.
     * @return string Returns the translation in case of success, $id otherwise.
     * @throws Throwable Throws an exception if an error occurs.
     */
    protected function translate(string $id, array $parameters = [], string $domain = null, string $locale = null): string {
        return $this->getTranslator()->trans($id, $parameters, $domain, $locale);
    }
}

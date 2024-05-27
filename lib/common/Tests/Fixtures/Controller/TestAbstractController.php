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

namespace WBW\Bundle\CommonBundle\Tests\Fixtures\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use Twig\Environment;
use WBW\Bundle\CommonBundle\Controller\AbstractController;
use WBW\Bundle\CommonBundle\Event\NotificationEvent;
use WBW\Bundle\CommonBundle\Event\ToastEvent;
use WBW\Bundle\CommonBundle\EventListener\KernelEventListenerInterface;
use WBW\Library\Common\Model\Response\DefaultJsonResponseDataInterface;
use WBW\Library\Widget\Component\NotificationInterface;
use WBW\Library\Widget\Component\ToastInterface;

/**
 * Test abstract controller.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Fixtures\Controller
 */
class TestAbstractController extends AbstractController {

    /**
     * {@inheritDoc}
     */
    public function defaultJsonResponseData(bool $success, array $data, string $message = null): DefaultJsonResponseDataInterface {
        return parent::defaultJsonResponseData($success, $data, $message);
    }

    /**
     * {@inheritDoc}
     */
    public function getContainer(): ?ContainerInterface {
        return parent::getContainer();
    }

    /**
     * {@inheritDoc}
     */
    public function getEntityManager(): ?EntityManagerInterface {
        return parent::getEntityManager();
    }

    /**
     * {@inheritDoc}
     */
    public function getEventDispatcher(): ?EventDispatcherInterface {
        return parent::getEventDispatcher();
    }

    /**
     * {@inheritDoc}
     */
    public function getKernelEventListener(): ?KernelEventListenerInterface {
        return parent::getKernelEventListener();
    }

    /**
     * {@inheritDoc}
     */
    public function getLogger(): ?LoggerInterface {
        return parent::getLogger();
    }

    /**
     * {@inheritDoc}
     */
    public function getMailer(): ?MailerInterface {
        return parent::getMailer();
    }

    /**
     * {@inheritDoc}
     */
    public function getRouter(): ?RouterInterface {
        return parent::getRouter();
    }

    /**
     * {@inheritDoc}
     */
    public function getSession(): ?SessionInterface {
        return parent::getSession();
    }

    /**
     * {@inheritDoc}
     */
    public function getTranslator(): TranslatorInterface {
        return parent::getTranslator();
    }

    /**
     * {@inheritDoc}
     */
    public function getTwig(): ?Environment {
        return parent::getTwig();
    }

    /**
     * {@inheritDoc}
     */
    public function notify(NotificationInterface $notification, string $eventName): NotificationEvent {
        return parent::notify($notification, $eventName);
    }

    /**
     * {@inheritDoc}
     */
    public function toast(ToastInterface $toast, string $eventName): ToastEvent {
        return parent::toast($toast, $eventName);
    }

    /**
     * {@inheritDoc}
     */
    public function translate(string $id, array $parameters = [], string $domain = null, string $locale = null): string {
        return parent::translate($id, $parameters, $domain, $locale);
    }
}

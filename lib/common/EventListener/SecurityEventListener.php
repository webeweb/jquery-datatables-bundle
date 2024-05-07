<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\EventListener;

use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Contracts\Translation\TranslatorInterface;
use WBW\Bundle\CommonBundle\Security\Core\User\UserHelper;
use WBW\Bundle\CommonBundle\Security\Core\User\UserTrait;
use WBW\Bundle\CommonBundle\Translation\TranslatorTrait;
use WBW\Bundle\CommonBundle\WBWCommonBundle;

/**
 * Security event listener.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\EventListener
 */
class SecurityEventListener {

    use TranslatorTrait;
    use UserTrait;

    /**
     * Service name.
     *
     * @var string
     */
    const SERVICE_NAME = "wbw.common.event_listener.security";

    /**
     * Constructor.
     *
     * @param TranslatorInterface $translator The translator.
     * @param UserInterface|null $user The user.
     */
    public function __construct(TranslatorInterface $translator, UserInterface $user = null) {
        $this->setTranslator($translator);
        $this->setUser($user);
    }

    /**
     * On interactive login.
     *
     * @param InteractiveLoginEvent $event The event.
     * @return InteractiveLoginEvent Returns the event.
     */
    public function onInteractiveLogin(InteractiveLoginEvent $event): InteractiveLoginEvent {

        $message = $this->translate("message.welcome", [
            "{{ identifier }}" => UserHelper::getIdentifier($this->getUser()),
        ], WBWCommonBundle::getTranslationDomain());

        /** @var Session $session */
        $session = $event->getRequest()->getSession();
        $session->getBag("flashes")->add("welcome", $message);

        return $event;
    }
}

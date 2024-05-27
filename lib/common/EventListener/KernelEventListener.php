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

namespace WBW\Bundle\CommonBundle\EventListener;

use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use WBW\Bundle\CommonBundle\Security\Core\Authentication\Token\Storage\TokenStorageTrait;
use WBW\Bundle\CommonBundle\Security\Core\User\UserTrait;

/**
 * Kernel event listener.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\EventListener
 */
class KernelEventListener implements KernelEventListenerInterface {

    use TokenStorageTrait;
    use UserTrait;

    /**
     * Service name.
     *
     * @var string
     */
    const SERVICE_NAME = "wbw.common.event_listener.kernel";

    /**
     * Constructor.
     *
     * @param TokenStorageInterface $tokenStorage The token storage.
     */
    public function __construct(TokenStorageInterface $tokenStorage) {
        $this->setTokenStorage($tokenStorage);
    }

    /**
     * {@inheritDoc}
     */
    public function getUser(): ?UserInterface {

        $token = null;
        if (null === $this->user) {
            $token = $this->getTokenStorage()->getToken();
        }

        if (null !== $token) {
            $this->user = $token->getUser();
        }

        if (false === ($this->user instanceof UserInterface)) {
            return null;
        }

        return $this->user;
    }
}

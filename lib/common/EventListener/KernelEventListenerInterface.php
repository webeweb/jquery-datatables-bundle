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

use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Kernel event listener interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\EventListener
 */
interface KernelEventListenerInterface {

    /**
     * Get the token storage.
     *
     * @return TokenStorageInterface|null Returns the token storage.
     */
    public function getTokenStorage(): ?TokenStorageInterface;

    /**
     * Get the current user.
     *
     * @return UserInterface|null Returns the current user in case of success, null otherwise.
     */
    public function getUser(): ?UserInterface;
}

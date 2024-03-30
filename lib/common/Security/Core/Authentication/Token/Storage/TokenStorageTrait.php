<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Security\Core\Authentication\Token\Storage;

use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

/**
 * Token storage trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Security\Core\Authentication\Token\Storage
 */
trait TokenStorageTrait {

    /**
     * Token storage.
     *
     * @var TokenStorageInterface|null
     */
    private $tokenStorage;

    /**
     * Get the token storage.
     *
     * @return TokenStorageInterface|null Returns the token storage.
     */
    public function getTokenStorage(): ?TokenStorageInterface {
        return $this->tokenStorage;
    }

    /**
     * Set the token storage.
     *
     * @param TokenStorageInterface|null $tokenStorage The token storage.
     * @return self Returns this instance.
     */
    protected function setTokenStorage(?TokenStorageInterface $tokenStorage): self {
        $this->tokenStorage = $tokenStorage;
        return $this;
    }
}

<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Service;

/**
 * Token service trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Service
 */
trait TokenServiceTrait {

    /**
     * Token service.
     *
     * @var TokenServiceInterface|null
     */
    private $tokenService;

    /**
     * Get the token service.
     *
     * @return TokenServiceInterface|null Returns the token service.
     */
    public function getTokenService(): ?TokenServiceInterface {
        return $this->tokenService;
    }

    /**
     * Set the token service.
     *
     * @param TokenServiceInterface|null $tokenService The token service.
     * @return self Returns this instance.
     */
    protected function setTokenService(?TokenServiceInterface $tokenService): self {
        $this->tokenService = $tokenService;
        return $this;
    }
}

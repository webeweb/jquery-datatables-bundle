<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2023 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Service;

/**
 * Session service trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Service
 */
trait SessionServiceTrait {

    /**
     * Session service.
     *
     * @var SessionServiceInterface|null
     */
    protected $sessionService;

    /**
     * Get the session service.
     *
     * @return SessionServiceInterface|null Returns the session service.
     */
    public function getSessionService(): ?SessionServiceInterface {
        return $this->sessionService;
    }

    /**
     * Set the session service.
     *
     * @param SessionServiceInterface|null $sessionService The session service.
     * @return self Returns this instance.
     */
    protected function setSessionService(?SessionServiceInterface $sessionService): self {
        $this->sessionService = $sessionService;
        return $this;
    }
}

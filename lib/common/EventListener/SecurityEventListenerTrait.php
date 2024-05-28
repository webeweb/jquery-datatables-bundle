<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\EventListener;

/**
 * Security event listener trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\EventListener
 */
trait SecurityEventListenerTrait {

    /**
     * Security event listener.
     *
     * @var SecurityEventListenerInterface|null
     */
    private $securityEventListener;

    /**
     * Get the security event listener.
     *
     * @return SecurityEventListenerInterface|null Returns the security event listener.
     */
    public function getSecurityEventListener(): ?SecurityEventListenerInterface {
        return $this->securityEventListener;
    }

    /**
     * Set the security event listener.
     *
     * @param SecurityEventListenerInterface|null $securityEventListener The security event listener.
     * @return self Returns this instance.
     */
    protected function setSecurityEventListener(?SecurityEventListenerInterface $securityEventListener): self {
        $this->securityEventListener = $securityEventListener;
        return $this;
    }
}

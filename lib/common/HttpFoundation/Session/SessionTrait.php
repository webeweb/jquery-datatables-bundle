<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\HttpFoundation\Session;

use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Session trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\HttpFoundation\Session
 */
trait SessionTrait {

    /**
     * Session.
     *
     * @var SessionInterface|null
     */
    private $session;

    /**
     * Get the session.
     *
     * @return SessionInterface|null Returns the session.
     */
    public function getSession(): ?SessionInterface {
        return $this->session;
    }

    /**
     * Set the session.
     *
     * @param SessionInterface|null $session The session.
     * @return self Returns this instance.
     */
    protected function setSession(?SessionInterface $session): self {
        $this->session = $session;
        return $this;
    }
}

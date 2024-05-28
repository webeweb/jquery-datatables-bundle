<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2023 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\Service;

use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Throwable;

/**
 * Session service interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Service
 */
interface SessionServiceInterface {

    /**
     * Get the session.
     *
     * @return SessionInterface|null Returns the session.
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function getSession(): ?SessionInterface;
}

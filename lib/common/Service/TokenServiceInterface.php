<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\Service;

use Throwable;

/**
 * Token service interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Service
 */
interface TokenServiceInterface {

    /**
     * Generate a token.
     *
     * @return string Returns the generated token.
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function generateToken(): string;
}

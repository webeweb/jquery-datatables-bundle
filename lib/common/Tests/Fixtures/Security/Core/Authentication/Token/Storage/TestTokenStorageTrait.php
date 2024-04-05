<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Tests\Fixtures\Security\Core\Authentication\Token\Storage;

use WBW\Bundle\CommonBundle\Security\Core\Authentication\Token\Storage\TokenStorageTrait;

/**
 * Test token storage trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Fixtures\Security\Core\Authentication\Token\Storage
 */
class TestTokenStorageTrait {

    use TokenStorageTrait {
        setTokenStorage as public;
    }
}

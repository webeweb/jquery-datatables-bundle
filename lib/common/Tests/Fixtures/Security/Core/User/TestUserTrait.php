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

namespace WBW\Bundle\CommonBundle\Tests\Fixtures\Security\Core\User;

use WBW\Bundle\CommonBundle\Security\Core\User\UserTrait;

/**
 * Test user trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Fixtures\Security\Core\User
 */
class TestUserTrait {

    use UserTrait {
        setUser as public;
    }
}

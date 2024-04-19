<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Tests\Security\Core\User;

use WBW\Bundle\CommonBundle\Model\User;
use WBW\Bundle\CommonBundle\Security\Core\User\UserHelper;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;

/**
 * User helper test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Security\Core\User
 */
class UserHelperTest extends AbstractTestCase {

    /**
     * Test getIdentifier()
     *
     * @return void
     */
    public function testGetIdentifier(): void {

        // Set a User mock.
        $user = new User("username");

        $this->assertEquals("username", UserHelper::getIdentifier($user));
    }

    /**
     * Test hasRoles()
     *
     * @return void
     */
    public function testHasRoles(): void {

        // Set a User mock.
        $user = new User("github", "github", ["ROLE_USER"]);

        $this->assertFalse(UserHelper::hasRoles(null, null));
        $this->assertFalse(UserHelper::hasRoles(null, ""));

        $this->assertFalse(UserHelper::hasRoles($user, "ROLE_SUPER_ADMIN"));
        $this->assertFalse(UserHelper::hasRoles($user, "ROLE_SUPER_ADMIN", false));

        $this->assertTrue(UserHelper::hasRoles($user, "ROLE_USER"));
        $this->assertTrue(UserHelper::hasRoles($user, "ROLE_USER", false));

        $this->assertFalse(UserHelper::hasRoles($user, "ROLE_GITHUB"));
        $this->assertFalse(UserHelper::hasRoles($user, "ROLE_GITHUB", false));

        $this->assertTrue(UserHelper::hasRoles($user, ["ROLE_SUPER_ADMIN", "ROLE_USER"]));
        $this->assertFalse(UserHelper::hasRoles($user, ["ROLE_SUPER_ADMIN", "ROLE_USER"], false));

        $this->assertFalse(UserHelper::hasRoles($user, ["ROLE_SUPER_ADMIN", "ROLE_GITHUB"]));
        $this->assertFalse(UserHelper::hasRoles($user, ["ROLE_SUPER_ADMIN", "ROLE_GITHUB"], false));
    }
}

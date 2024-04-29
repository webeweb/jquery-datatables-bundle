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

namespace WBW\Bundle\CommonBundle\Tests\Exception;

use WBW\Bundle\CommonBundle\Exception\BadUserRoleException;
use WBW\Bundle\CommonBundle\Model\User;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;

/**
 * Bad user role exception test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Exception
 */
class BadUserRoleExceptionTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $user        = new User("anonymous");
        $roles       = ["ROLE_ADMIN", "ROLE_USER"];
        $originUrl   = "https://github.com/webeweb";
        $redirectUrl = "https://github.com";

        $obj = new BadUserRoleException($user, $roles, $redirectUrl, $originUrl);

        $this->assertEquals('User "anonymous" is not allowed to access to "https://github.com/webeweb" with roles [ROLE_ADMIN,ROLE_USER]', $obj->getMessage());

        $this->assertEquals($originUrl, $obj->getOriginUrl());
        $this->assertEquals($redirectUrl, $obj->getRedirectUrl());
        $this->assertEquals($roles, $obj->getRoles());
        $this->assertSame($user, $obj->getUser());
    }
}

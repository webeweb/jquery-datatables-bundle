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

namespace WBW\Bundle\CommonBundle\Tests\Model;

use WBW\Bundle\CommonBundle\Model\User;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;

/**
 * User test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Model
 */
class UserTest extends AbstractTestCase {

    /**
     * Test eraseCredentials()
     *
     * @return void
     */
    public function testEraseCredentials(): void {

        $obj = new User();

        $obj->eraseCredentials();
        $this->assertNull(null);
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new User("username", "password", ["ROLE_USER"]);

        $this->assertEquals("password", $obj->getPassword());
        $this->assertEquals(["ROLE_USER"], $obj->getRoles());
        $this->assertNull($obj->getSalt());
        $this->assertEquals("username", $obj->getUsername());

        $this->assertEquals("username", $obj->getUserIdentifier());
    }
}

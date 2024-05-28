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

namespace WBW\Bundle\CommonBundle\Tests\Security\Core\User;

use Symfony\Component\Security\Core\User\UserInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\Security\Core\User\TestUserTrait;

/**
 * User trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Security\Core\User
 */
class UserTraitTest extends AbstractTestCase {

    /**
     * Test setUser()
     *
     * @return void
     */
    public function testSetUser(): void {

        // Set a User mock.
        $user = $this->getMockBuilder(UserInterface::class)->getMock();

        $obj = new TestUserTrait();

        $obj->setUser($user);
        $this->assertSame($user, $obj->getUser());
    }
}

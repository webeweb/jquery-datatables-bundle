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

namespace WBW\Bundle\CommonBundle\Tests\Provider\Layout;

use WBW\Bundle\CommonBundle\Provider\Layout\UserInfoLayoutProviderInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\Provider\Layout\TestUserInfoLayoutProviderTrait;

/**
 * User info layout provider trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Provider\Layout
 */
class UserInfoLayoutProviderTraitTest extends AbstractTestCase {

    /**
     * Test setUserInfoLayoutProvider()
     *
     * @return void
     */
    public function testSetUserInfoLayoutProvider(): void {

        // Set a User info layout provider mock.
        $userInfoLayoutProvider = $this->getMockBuilder(UserInfoLayoutProviderInterface::class)->getMock();

        $obj = new TestUserInfoLayoutProviderTrait();

        $obj->setUserInfoLayoutProvider($userInfoLayoutProvider);
        $this->assertSame($userInfoLayoutProvider, $obj->getUserInfoLayoutProvider());
    }
}

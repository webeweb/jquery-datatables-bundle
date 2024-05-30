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

use WBW\Bundle\CommonBundle\Provider\Layout\DefaultUserInfoLayoutProvider;
use WBW\Bundle\CommonBundle\Provider\Layout\UserInfoLayoutProviderInterface;
use WBW\Bundle\CommonBundle\Provider\LayoutProviderInterface;
use WBW\Bundle\CommonBundle\Provider\ProviderInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;

/**
 * Default user info layout provider test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Layout
 */
class DefaultUserInfoLayoutProviderTest extends AbstractTestCase {

    /**
     * Test provideRegisterLink()
     *
     * @return void
     */
    public function testProvideRegisterLink(): void {

        $obj = new DefaultUserInfoLayoutProvider();

        $this->assertFalse($obj->provideRegisterLink());
    }

    /**
     * Test provideResettingLink()
     *
     * @return void
     */
    public function testProvideResettingLink(): void {

        $obj = new DefaultUserInfoLayoutProvider();

        $this->assertFalse($obj->provideResettingLink());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new DefaultUserInfoLayoutProvider();

        $this->assertInstanceOf(ProviderInterface::class, $obj);
        $this->assertInstanceOf(LayoutProviderInterface::class, $obj);
        $this->assertInstanceOf(UserInfoLayoutProviderInterface::class, $obj);
    }
}

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

namespace WBW\Bundle\CommonBundle\Tests\Provider\Layout;

use WBW\Bundle\CommonBundle\Provider\Layout\NotificationsDropdownLayoutProviderInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\Provider\Layout\TestNotificationsDropdownLayoutProviderTrait;

/**
 * Notifications dropdown layout provider trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Provider\Layout
 */
class NotificationsDropdownLayoutProviderTraitTest extends AbstractTestCase {

    /**
     * Test setNotificationsDropdownLayoutProvider()
     *
     * @return void
     */
    public function testSetNotificationsDropdownLayoutProvider(): void {

        // Set a Notifications dropdown layout provider mock.
        $notificationsDropdownLayoutProvider = $this->getMockBuilder(NotificationsDropdownLayoutProviderInterface::class)->getMock();

        $obj = new TestNotificationsDropdownLayoutProviderTrait();

        $obj->setNotificationsDropdownLayoutProvider($notificationsDropdownLayoutProvider);
        $this->assertSame($notificationsDropdownLayoutProvider, $obj->getNotificationsDropdownLayoutProvider());
    }
}

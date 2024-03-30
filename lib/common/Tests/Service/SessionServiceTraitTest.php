<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Tests\Service;

use WBW\Bundle\CommonBundle\Service\SessionServiceInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\Service\TestSessionServiceTrait;

/**
 * Session service trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Service
 */
class SessionServiceTraitTest extends AbstractTestCase {

    /**
     * Test setSessionService()
     *
     * @return void
     */
    public function testSetSessionService(): void {

        // Set a Session service mock.
        $sessionService = $this->getMockBuilder(SessionServiceInterface::class)->getMock();

        $obj = new TestSessionServiceTrait();

        $obj->setSessionService($sessionService);
        $this->assertSame($sessionService, $obj->getSessionService());
    }
}

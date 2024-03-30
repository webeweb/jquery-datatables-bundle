<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Tests\HttpFoundation\Session;

use Symfony\Component\HttpFoundation\Session\SessionInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\HttpFoundation\Session\TestSessionTrait;

/**
 * Session trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\HttpFoundation\Session
 */
class SessionTraitTest extends AbstractTestCase {

    /**
     * Test setSession()
     *
     * @return void
     */
    public function testSetSession(): void {

        // Set a Session mock.
        $session = $this->getMockBuilder(SessionInterface::class)->getMock();

        $obj = new TestSessionTrait();

        $obj->setSession($session);
        $this->assertSame($session, $obj->getSession());
    }
}

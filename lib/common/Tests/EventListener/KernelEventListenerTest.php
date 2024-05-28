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

namespace WBW\Bundle\CommonBundle\Tests\EventListener;

use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use WBW\Bundle\CommonBundle\EventListener\KernelEventListener;
use WBW\Bundle\CommonBundle\EventListener\KernelEventListenerInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;

/**
 * Kernel event listener test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\EventListener
 */
class KernelEventListenerTest extends AbstractTestCase {

    /**
     * Token storage.
     *
     * @var TokenStorageInterface|null
     */
    private $tokenStorage;

    /**
     * User.
     *
     * @var UserInterface|null
     */
    private $user;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set getUser() callback.
        $getUser = function(): ?UserInterface {
            return $this->user;
        };

        // Set a Token mock.
        $token = $this->getMockBuilder(TokenInterface::class)->getMock();
        $token->expects($this->any())->method("getUser")->willReturnCallback($getUser);

        // Set a Token storage mock.
        $this->tokenStorage = $this->getMockBuilder(TokenStorageInterface::class)->getMock();
        $this->tokenStorage->expects($this->any())->method("getToken")->willReturn($token);
    }

    /**
     * Test getUser()
     *
     * @return void
     */
    public function testGetUser(): void {

        $obj = new KernelEventListener($this->tokenStorage);

        $this->user = null;
        $this->assertNull($obj->getUser());

        $this->user = $this->getMockBuilder(UserInterface::class)->getMock();
        $this->assertSame($this->user, $obj->getUser());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.common.event_listener.kernel", KernelEventListener::SERVICE_NAME);

        $obj = new KernelEventListener($this->tokenStorage);

        $this->assertInstanceOf(KernelEventListenerInterface::class, $obj);

        $this->assertSame($this->tokenStorage, $obj->getTokenStorage());
        $this->assertNull($obj->getUser());
    }
}

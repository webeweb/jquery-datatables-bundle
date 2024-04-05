<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2023 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Tests\Service;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpKernel\Kernel;
use Throwable;
use WBW\Bundle\CommonBundle\Service\SessionService;
use WBW\Bundle\CommonBundle\Service\SessionServiceInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;

/**
 * Symfony backward compatibility service test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Service
 */
class SessionServiceTest extends AbstractTestCase {

    /**
     * Test getSession()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testGetSession(): void {

        // Set a Session mock.
        $session = $this->getMockBuilder(SessionInterface::class)->getMock();

        // Set a Request stack mock.
        $requestStack = $this->getMockBuilder(RequestStack::class)->getMock();

        // Set a Container mock.
        $container = $this->getMockBuilder(ContainerInterface::class)->getMock();

        // TODO: Remove when dropping support for Symfony 5.3
        if (Kernel::VERSION_ID < 50300) {
            $container->expects($this->any())->method("get")->willReturn($session);
        } else {
            $requestStack->expects($this->any())->method("getSession")->willReturn($session);
            $container->expects($this->any())->method("get")->willReturn($requestStack);
        }

        $obj = new SessionService($container);

        $this->assertSame($session, $obj->getSession());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        // Set a Container mock.
        $container = $this->getMockBuilder(ContainerInterface::class)->getMock();

        $this->assertEquals("wbw.common.service.session", SessionService::SERVICE_NAME);

        $obj = new SessionService($container);

        $this->assertInstanceOf(SessionServiceInterface::class, $obj);

        $this->assertSame($container, $obj->getContainer());
    }
}

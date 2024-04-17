<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Tests\EventListener;

use PHPUnit\Framework\MockObject\MockObject;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;
use Symfony\Component\HttpFoundation\Session\Session;
use Throwable;
use WBW\Bundle\CommonBundle\Event\ToastEvent;
use WBW\Bundle\CommonBundle\EventListener\ToastEventListener;
use WBW\Bundle\CommonBundle\Service\SessionServiceInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\WidgetBundle\Component\ToastInterface;

/**
 * Toast event listener.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\EventListener
 */
class ToastEventListenerTest extends AbstractTestCase {

    /**
     * Session service.
     *
     * @var MockObject|SessionServiceInterface|null
     */
    private $sessionService;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set a Session service mock.
        $this->sessionService = $this->getMockBuilder(SessionServiceInterface::class)->getMock();
    }

    /**
     * Test onToast()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testOnToast(): void {

        // Set a Session mock.
        $session = $this->getMockBuilder(Session::class)->getMock();
        $session->expects($this->any())->method("getFlashBag")->willReturn(new FlashBag());

        // Set the Session service mock.
        $this->sessionService->expects($this->any())->method("getSession")->willReturn($session);

        // Set a Toast mock.
        $toast = $this->getMockBuilder(ToastInterface::class)->getMock();
        $toast->expects($this->any())->method("getType")->willReturn("type");

        $evt = new ToastEvent($toast, "test");

        $obj = new ToastEventListener($this->sessionService);

        $this->assertSame($evt, $obj->onToast($evt));
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.common.event_listener.toast", ToastEventListener::SERVICE_NAME);

        $obj = new ToastEventListener($this->sessionService);

        $this->assertSame($this->sessionService, $obj->getSessionService());
    }
}

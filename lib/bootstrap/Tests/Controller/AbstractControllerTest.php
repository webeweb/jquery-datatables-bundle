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

namespace WBW\Bundle\BootstrapBundle\Tests\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Throwable;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Bundle\BootstrapBundle\Tests\Fixtures\Controller\TestAbstractController;
use WBW\Bundle\CommonBundle\Event\NotificationEvent;
use WBW\Bundle\CommonBundle\Event\ToastEvent;
use WBW\Bundle\WidgetBundle\Component\NotificationInterface;
use WBW\Bundle\WidgetBundle\Component\ToastInterface;

/**
 * Abstract controller test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Controller
 */
class AbstractControllerTest extends AbstractTestCase {

    /**
     * Container.
     *
     * @var ContainerInterface|null
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set an Event dispatcher mock.
        $eventDispatcher = $this->getMockBuilder(EventDispatcherInterface::class)->getMock();
        $eventDispatcher->expects($this->any())->method("dispatch")->willReturnArgument(0);

        // Set a Logger mock.
        $logger = $this->getMockBuilder(LoggerInterface::class)->getMock();

        // Set a Container mock.
        $this->container = new ContainerBuilder();
        $this->container->set("event_dispatcher", $eventDispatcher);
        $this->container->set("logger", $logger);
    }

    /**
     * Test notifyDanger()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testNotifyDanger(): void {

        $obj = new TestAbstractController();
        $obj->setContainer($this->container);

        $res = $obj->notifyDanger("danger");
        $this->assertInstanceOf(NotificationEvent::class, $res);

        $this->assertEquals(NotificationEvent::DANGER, $res->getEventName());
        $this->assertInstanceOf(NotificationInterface::class, $res->getNotification());

        $this->assertEquals("danger", $res->getNotification()->getContent());
        $this->assertEquals(NotificationInterface::NOTIFICATION_TYPE_DANGER, $res->getNotification()->getType());
    }

    /**
     * Test notifyInfo()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testNotifyInfo(): void {

        $obj = new TestAbstractController();
        $obj->setContainer($this->container);

        $res = $obj->notifyInfo("info");
        $this->assertInstanceOf(NotificationEvent::class, $res);

        $this->assertEquals(NotificationEvent::INFO, $res->getEventName());
        $this->assertInstanceOf(NotificationInterface::class, $res->getNotification());

        $this->assertEquals("info", $res->getNotification()->getContent());
        $this->assertEquals(NotificationInterface::NOTIFICATION_TYPE_INFO, $res->getNotification()->getType());
    }

    /**
     * Test notifySuccess()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testNotifySuccess(): void {

        $obj = new TestAbstractController();
        $obj->setContainer($this->container);

        $res = $obj->notifySuccess("success");
        $this->assertInstanceOf(NotificationEvent::class, $res);

        $this->assertEquals(NotificationEvent::SUCCESS, $res->getEventName());
        $this->assertInstanceOf(NotificationInterface::class, $res->getNotification());

        $this->assertEquals("success", $res->getNotification()->getContent());
        $this->assertEquals(NotificationInterface::NOTIFICATION_TYPE_SUCCESS, $res->getNotification()->getType());
    }

    /**
     * Test notifyWarning()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testNotifyWarning(): void {

        $obj = new TestAbstractController();
        $obj->setContainer($this->container);

        $res = $obj->notifyWarning("warning");
        $this->assertInstanceOf(NotificationEvent::class, $res);

        $this->assertEquals(NotificationEvent::WARNING, $res->getEventName());
        $this->assertInstanceOf(NotificationInterface::class, $res->getNotification());

        $this->assertEquals("warning", $res->getNotification()->getContent());
        $this->assertEquals(NotificationInterface::NOTIFICATION_TYPE_WARNING, $res->getNotification()->getType());
    }

    /**
     * Test toastDanger()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testToastDanger(): void {

        $obj = new TestAbstractController();
        $obj->setContainer($this->container);

        $res = $obj->toastDanger("danger");
        $this->assertInstanceOf(ToastEvent::class, $res);

        $this->assertEquals(ToastEvent::DANGER, $res->getEventName());
        $this->assertInstanceOf(ToastInterface::class, $res->getToast());

        $this->assertEquals("danger", $res->getToast()->getContent());
        $this->assertEquals(ToastInterface::TOAST_TYPE_DANGER, $res->getToast()->getType());
    }

    /**
     * Test toastInfo()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testToastInfo(): void {

        $obj = new TestAbstractController();
        $obj->setContainer($this->container);

        $res = $obj->toastInfo("info");
        $this->assertInstanceOf(ToastEvent::class, $res);

        $this->assertEquals(ToastEvent::INFO, $res->getEventName());
        $this->assertInstanceOf(ToastInterface::class, $res->getToast());

        $this->assertEquals("info", $res->getToast()->getContent());
        $this->assertEquals(ToastInterface::TOAST_TYPE_INFO, $res->getToast()->getType());
    }

    /**
     * Test toastSuccess()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testToastSuccess(): void {

        $obj = new TestAbstractController();
        $obj->setContainer($this->container);

        $res = $obj->toastSuccess("success");
        $this->assertInstanceOf(ToastEvent::class, $res);

        $this->assertEquals(ToastEvent::SUCCESS, $res->getEventName());
        $this->assertInstanceOf(ToastInterface::class, $res->getToast());

        $this->assertEquals("success", $res->getToast()->getContent());
        $this->assertEquals(ToastInterface::TOAST_TYPE_SUCCESS, $res->getToast()->getType());
    }

    /**
     * Test toastWarning()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testToastWarning(): void {

        $obj = new TestAbstractController();
        $obj->setContainer($this->container);

        $res = $obj->toastWarning("warning");
        $this->assertInstanceOf(ToastEvent::class, $res);

        $this->assertEquals(ToastEvent::WARNING, $res->getEventName());
        $this->assertInstanceOf(ToastInterface::class, $res->getToast());

        $this->assertEquals("warning", $res->getToast()->getContent());
        $this->assertEquals(ToastInterface::TOAST_TYPE_WARNING, $res->getToast()->getType());
    }
}

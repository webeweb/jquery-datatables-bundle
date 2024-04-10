<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\BootstrapBundle\Tests\Controller;

use Throwable;
use WBW\Bundle\BootstrapBundle\Tests\AbstractWebTestCase;
use WBW\Bundle\BootstrapBundle\Tests\Fixtures\Controller\TestAbstractController;
use WBW\Bundle\CommonBundle\Event\NotificationEvent;
use WBW\Bundle\CommonBundle\Event\ToastEvent;
use WBW\Library\Symfony\Assets\NotificationInterface;
use WBW\Library\Symfony\Assets\ToastInterface;

/**
 * Abstract controller test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Controller
 */
class AbstractControllerTest extends AbstractWebTestCase {

    /**
     * Test notifyDanger()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testNotifyDanger(): void {

        $obj = new TestAbstractController();
        $obj->setContainer(static::$kernel->getContainer());

        $res = $obj->notifyDanger("danger");
        $this->assertNotNull($res);

        $this->assertInstanceOf(NotificationEvent::class, $res);
        $this->assertEquals(NotificationEvent::DANGER, $res->getEventName());

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
        $obj->setContainer(static::$kernel->getContainer());

        $res = $obj->notifyInfo("info");
        $this->assertNotNull($res);

        $this->assertInstanceOf(NotificationEvent::class, $res);
        $this->assertEquals(NotificationEvent::INFO, $res->getEventName());

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
        $obj->setContainer(static::$kernel->getContainer());

        $res = $obj->notifySuccess("success");
        $this->assertNotNull($res);

        $this->assertInstanceOf(NotificationEvent::class, $res);
        $this->assertEquals(NotificationEvent::SUCCESS, $res->getEventName());

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
        $obj->setContainer(static::$kernel->getContainer());

        $res = $obj->notifyWarning("warning");
        $this->assertNotNull($res);

        $this->assertInstanceOf(NotificationEvent::class, $res);
        $this->assertEquals(NotificationEvent::WARNING, $res->getEventName());

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
        $obj->setContainer(static::$kernel->getContainer());

        $res = $obj->toastDanger("danger");
        $this->assertNotNull($res);

        $this->assertInstanceOf(ToastEvent::class, $res);
        $this->assertEquals(ToastEvent::DANGER, $res->getEventName());

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
        $obj->setContainer(static::$kernel->getContainer());

        $res = $obj->toastInfo("info");
        $this->assertNotNull($res);

        $this->assertInstanceOf(ToastEvent::class, $res);
        $this->assertEquals(ToastEvent::INFO, $res->getEventName());

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
        $obj->setContainer(static::$kernel->getContainer());

        $res = $obj->toastSuccess("success");
        $this->assertNotNull($res);

        $this->assertInstanceOf(ToastEvent::class, $res);
        $this->assertEquals(ToastEvent::SUCCESS, $res->getEventName());

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
        $obj->setContainer(static::$kernel->getContainer());

        $res = $obj->toastWarning("warning");
        $this->assertNotNull($res);

        $this->assertInstanceOf(ToastEvent::class, $res);
        $this->assertEquals(ToastEvent::WARNING, $res->getEventName());

        $this->assertEquals("warning", $res->getToast()->getContent());
        $this->assertEquals(ToastInterface::TOAST_TYPE_WARNING, $res->getToast()->getType());
    }
}

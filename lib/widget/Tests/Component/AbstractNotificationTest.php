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

namespace WBW\Bundle\WidgetBundle\Tests\Component;

use JsonSerializable;
use WBW\Bundle\WidgetBundle\Component\NotificationInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;
use WBW\Bundle\WidgetBundle\Tests\Fixtures\Component\TestNotification;

/**
 * Abstract notification test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Component
 */
class AbstractNotificationTest extends AbstractTestCase {

    /**
     * Test jsonSerialize()
     *
     * @return void
     */
    public function testJsonSerialize(): void {

        $obj = new TestNotification();

        $this->assertIsArray($obj->jsonSerialize());
    }

    /**
     * Test setContent()
     *
     * @return void
     */
    public function testSetContent(): void {

        $obj = new TestNotification();

        $obj->setContent("content");
        $this->assertEquals("content", $obj->getContent());
    }

    /**
     * Test setType()
     *
     * @return void
     */
    public function testSetType(): void {

        $obj = new TestNotification();

        $obj->setType("type");
        $this->assertEquals("type", $obj->getType());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new TestNotification();

        $this->assertInstanceOf(JsonSerializable::class, $obj);
        $this->assertInstanceOf(NotificationInterface::class, $obj);

        $this->assertEquals("type", $obj->getType());
        $this->assertEquals("content", $obj->getContent());
    }
}

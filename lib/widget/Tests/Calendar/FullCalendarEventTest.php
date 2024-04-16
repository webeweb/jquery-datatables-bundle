<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-library package.
 *
 * (c) 2021 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\WidgetBundle\Tests\Calendar;

use DateTime;
use JsonSerializable;
use WBW\Bundle\WidgetBundle\Calendar\FullCalendarEvent;
use WBW\Bundle\WidgetBundle\Calendar\FullCalendarEventInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;

/**
 * Full Calendar event test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Calendar
 */
class FullCalendarEventTest extends AbstractTestCase {

    /**
     * Test jsonSerialize()
     *
     * @return void
     */
    public function testJsonSerialize(): void {

        $obj = new FullCalendarEvent();

        $this->assertIsArray($obj->jsonSerialize());
    }

    /**
     * Test setAllDay()
     *
     * @return void
     */
    public function testSetAllDay(): void {

        $obj = new FullCalendarEvent();

        $obj->setAllDay(true);
        $this->assertTrue($obj->getAllDay());
    }

    /**
     * Test setBackgroundColor()
     *
     * @return void
     */
    public function testSetBackgroundColor(): void {

        $obj = new FullCalendarEvent();

        $obj->setBackgroundColor("backgroundColor");
        $this->assertEquals("backgroundColor", $obj->getBackgroundColor());
    }

    /**
     * Test setBorderColor()
     *
     * @return void
     */
    public function testSetBorderColor(): void {

        $obj = new FullCalendarEvent();

        $obj->setBorderColor("borderColor");
        $this->assertEquals("borderColor", $obj->getBorderColor());
    }

    /**
     * Test setClassNames()
     *
     * @return void
     */
    public function testSetClassNames(): void {

        // Set a class names mock.
        $classNames = ["className"];

        $obj = new FullCalendarEvent();

        $obj->setClassNames($classNames);
        $this->assertEquals($classNames, $obj->getClassNames());
    }

    /**
     * Test setDisplay()
     *
     * @return void
     */
    public function testSetDisplay(): void {

        $obj = new FullCalendarEvent();

        $obj->setDisplay("display");
        $this->assertEquals("display", $obj->getDisplay());
    }

    /**
     * Test setDurationEditable()
     *
     * @return void
     */
    public function testSetDurationEditable(): void {

        $obj = new FullCalendarEvent();

        $obj->setDurationEditable(true);
        $this->assertTrue($obj->getDurationEditable());
    }

    /**
     * Test setEditable()
     *
     * @return void
     */
    public function testSetEditable(): void {

        $obj = new FullCalendarEvent();

        $obj->setEditable(true);
        $this->assertTrue($obj->getEditable());
    }

    /**
     * Test setEnd()
     *
     * @return void
     */
    public function testSetEnd(): void {

        // Set a end mock.
        $end = new DateTime();

        $obj = new FullCalendarEvent();

        $obj->setEnd($end);
        $this->assertSame($end, $obj->getEnd());
    }

    /**
     * Test setEndStr()
     *
     * @return void
     */
    public function testSetEndStr(): void {

        $obj = new FullCalendarEvent();

        $obj->setEndStr("endStr");
        $this->assertEquals("endStr", $obj->getEndStr());
    }

    /**
     * Test setExtraParams()
     *
     * @return void
     */
    public function testSetExtraParams(): void {

        // Set an extra params mock.
        $extraParams = ["extra" => "param"];

        $obj = new FullCalendarEvent();

        $obj->setExtraParams($extraParams);
        $this->assertEquals($extraParams, $obj->getExtraParams());
    }

    /**
     * Test setGroupId()
     *
     * @return void
     */
    public function testSetGroupId(): void {

        $obj = new FullCalendarEvent();

        $obj->setGroupId("groupId");
        $this->assertEquals("groupId", $obj->getGroupId());
    }

    /**
     * Test setResourceEditable()
     *
     * @return void
     */
    public function testSetResourceEditable(): void {

        $obj = new FullCalendarEvent();

        $obj->setResourceEditable(true);
        $this->assertTrue($obj->getResourceEditable());
    }

    /**
     * Test setStart()
     *
     * @return void
     */
    public function testSetStart(): void {

        // Set a start mock.
        $start = new DateTime();

        $obj = new FullCalendarEvent();

        $obj->setStart($start);
        $this->assertSame($start, $obj->getStart());
    }

    /**
     * Test setStartEditable()
     *
     * @return void
     */
    public function testSetStartEditable(): void {

        $obj = new FullCalendarEvent();

        $obj->setStartEditable(true);
        $this->assertTrue($obj->getStartEditable());
    }

    /**
     * Test setStartStr()
     *
     * @return void
     */
    public function testSetStartStr(): void {

        $obj = new FullCalendarEvent();

        $obj->setStartStr("startStr");
        $this->assertEquals("startStr", $obj->getStartStr());
    }

    /**
     * Test setTextColor()
     *
     * @return void
     */
    public function testSetTextColor(): void {

        $obj = new FullCalendarEvent();

        $obj->setTextColor("textColor");
        $this->assertEquals("textColor", $obj->getTextColor());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new FullCalendarEvent();

        $this->assertInstanceOf(JsonSerializable::class, $obj);
        $this->assertInstanceOf(FullCalendarEventInterface::class, $obj);

        $this->assertNull($obj->getId());
        $this->assertNull($obj->getTitle());
        $this->assertNull($obj->getUrl());

        $this->assertNull($obj->getAllDay());
        $this->assertNull($obj->getBackgroundColor());
        $this->assertNull($obj->getBorderColor());
        $this->assertEquals([], $obj->getClassNames());
        $this->assertNull($obj->getDisplay());
        $this->assertNull($obj->getDurationEditable());
        $this->assertNull($obj->getEditable());
        $this->assertNull($obj->getEnd());
        $this->assertNull($obj->getEndStr());
        $this->assertEquals([], $obj->getExtraParams());
        $this->assertNull($obj->getGroupId());
        $this->assertNull($obj->getResourceEditable());
        $this->assertNull($obj->getStart());
        $this->assertNull($obj->getStartEditable());
        $this->assertNull($obj->getStartStr());
        $this->assertNull($obj->getTextColor());
    }
}

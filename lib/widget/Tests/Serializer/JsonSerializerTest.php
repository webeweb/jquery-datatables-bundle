<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2021 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\WidgetBundle\Tests\Serializer;

use DateTime;
use WBW\Bundle\WidgetBundle\Calendar\FullCalendarEventInterface;
use WBW\Bundle\WidgetBundle\Component\AlertInterface;
use WBW\Bundle\WidgetBundle\Component\BadgeInterface;
use WBW\Bundle\WidgetBundle\Component\ButtonInterface;
use WBW\Bundle\WidgetBundle\Component\IconInterface;
use WBW\Bundle\WidgetBundle\Component\LabelInterface;
use WBW\Bundle\WidgetBundle\Component\NotificationInterface;
use WBW\Bundle\WidgetBundle\Component\ProgressBarInterface;
use WBW\Bundle\WidgetBundle\Component\ToastInterface;
use WBW\Bundle\WidgetBundle\Serializer\JsonSerializer;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;
use WBW\Library\Serializer\SerializerKeys as BaseSerializerKeys;

/**
 * JSON serializer test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Serializer
 */
class JsonSerializerTest extends AbstractTestCase {

    /**
     * Test serializeAlert()
     *
     * @return void
     */
    public function testSerializeAlert(): void {

        // Set an Alert mock.
        $model = $this->getMockBuilder(AlertInterface::class)->getMock();
        $model->expects($this->any())->method("getContent")->willReturn(BaseSerializerKeys::CONTENT);
        $model->expects($this->any())->method("getType")->willReturn(BaseSerializerKeys::TYPE);

        $res = JsonSerializer::serializeAlert($model);
        $this->assertCount(2, $res);

        $this->assertEquals($model->getContent(), $res[BaseSerializerKeys::CONTENT]);
        $this->assertEquals($model->getType(), $res[BaseSerializerKeys::TYPE]);
    }

    /**
     * Test serializeBadge()
     *
     * @return void
     */
    public function testSerializeBadge(): void {

        // Set a Badge mock.
        $model = $this->getMockBuilder(BadgeInterface::class)->getMock();
        $model->expects($this->any())->method("getContent")->willReturn(BaseSerializerKeys::CONTENT);
        $model->expects($this->any())->method("getType")->willReturn(BaseSerializerKeys::TYPE);

        $res = JsonSerializer::serializeBadge($model);
        $this->assertCount(2, $res);

        $this->assertEquals($model->getContent(), $res[BaseSerializerKeys::CONTENT]);
        $this->assertEquals($model->getType(), $res[BaseSerializerKeys::TYPE]);
    }

    /**
     * Test serializeButton()
     *
     * @return void
     */
    public function testSerializeButton(): void {

        // Set a Button mock.
        $model = $this->getMockBuilder(ButtonInterface::class)->getMock();
        $model->expects($this->any())->method("getContent")->willReturn(BaseSerializerKeys::CONTENT);
        $model->expects($this->any())->method("getType")->willReturn(BaseSerializerKeys::TYPE);

        $res = JsonSerializer::serializeButton($model);
        $this->assertCount(2, $res);

        $this->assertEquals($model->getContent(), $res[BaseSerializerKeys::CONTENT]);
        $this->assertEquals($model->getType(), $res[BaseSerializerKeys::TYPE]);
    }

    /**
     * Test serializeFullCalendarEvent()
     *
     * @return void
     */
    public function testSerializeFullCalendarEvent(): void {

        // Set the date/time mocks.
        $start = new DateTime("2021-11-29 10:50:00.000000");
        $end   = new DateTime("2021-11-29 11:00:00.000000");

        // Set a FullCalendarEvent mock.
        $model = $this->getMockBuilder(FullCalendarEventInterface::class)->getMock();
        $model->expects($this->any())->method("getId")->willReturn("id");
        $model->expects($this->any())->method("getGroupId")->willReturn("groupId");
        $model->expects($this->any())->method("getAllDay")->willReturn(true);
        $model->expects($this->any())->method("getStart")->willReturn($start);
        $model->expects($this->any())->method("getEnd")->willReturn($end);
        $model->expects($this->any())->method("getStartStr")->willReturn("startStr");
        $model->expects($this->any())->method("getEndStr")->willReturn("endStr");
        $model->expects($this->any())->method("getTitle")->willReturn("title");
        $model->expects($this->any())->method("getUrl")->willReturn("url");
        $model->expects($this->any())->method("getClassNames")->willReturn(["className"]);
        $model->expects($this->any())->method("getEditable")->willReturn(false);
        $model->expects($this->any())->method("getStartEditable")->willReturn(true);
        $model->expects($this->any())->method("getDurationEditable")->willReturn(false);
        $model->expects($this->any())->method("getResourceEditable")->willReturn(true);
        $model->expects($this->any())->method("getDisplay")->willReturn("none");
        $model->expects($this->any())->method("getBackgroundColor")->willReturn("backgroundColor");
        $model->expects($this->any())->method("getBorderColor")->willReturn("borderColor");
        $model->expects($this->any())->method("getTextColor")->willReturn("textColor");

        $res = JsonSerializer::serializeFullCalendarEvent($model);
        $this->assertCount(19, $res);

        $this->assertEquals($model->getId(), $res["id"]);
        $this->assertEquals($model->getGroupId(), $res["groupId"]);
        $this->assertEquals($model->getAllDay(), $res["allDay"]);
        $this->assertEquals($model->getStart()->format("Y-m-d\TH:i:s"), $res["start"]);
        $this->assertEquals($model->getEnd()->format("Y-m-d\TH:i:s"), $res["end"]);
        $this->assertEquals($model->getStartStr(), $res["startStr"]);
        $this->assertEquals($model->getEndStr(), $res["endStr"]);
        $this->assertEquals($model->getTitle(), $res["title"]);
        $this->assertEquals($model->getUrl(), $res["url"]);
        $this->assertEquals($model->getClassNames(), $res["classNames"]);
        $this->assertEquals($model->getEditable(), $res["editable"]);
        $this->assertEquals($model->getStartEditable(), $res["startEditable"]);
        $this->assertEquals($model->getDurationEditable(), $res["durationEditable"]);
        $this->assertEquals($model->getResourceEditable(), $res["resourceEditable"]);
        $this->assertEquals($model->getDisplay(), $res["display"]);
        $this->assertEquals($model->getBackgroundColor(), $res["backgroundColor"]);
        $this->assertEquals($model->getBorderColor(), $res["borderColor"]);
        $this->assertEquals($model->getTextColor(), $res["textColor"]);
    }

    /**
     * Test serializeIcon()
     *
     * @return void
     */
    public function testSerializeIcon(): void {

        // Set a Icon mock.
        $model = $this->getMockBuilder(IconInterface::class)->getMock();
        $model->expects($this->any())->method("getName")->willReturn(BaseSerializerKeys::NAME);
        $model->expects($this->any())->method("getStyle")->willReturn(BaseSerializerKeys::STYLE);

        $res = JsonSerializer::serializeIcon($model);
        $this->assertCount(2, $res);

        $this->assertEquals($model->getName(), $res[BaseSerializerKeys::NAME]);
        $this->assertEquals($model->getStyle(), $res[BaseSerializerKeys::STYLE]);
    }

    /**
     * Test serializeLabel()
     *
     * @return void
     */
    public function testSerializeLabel(): void {

        // Set a Label mock.
        $model = $this->getMockBuilder(LabelInterface::class)->getMock();
        $model->expects($this->any())->method("getContent")->willReturn(BaseSerializerKeys::CONTENT);
        $model->expects($this->any())->method("getType")->willReturn(BaseSerializerKeys::TYPE);

        $res = JsonSerializer::serializeLabel($model);
        $this->assertCount(2, $res);

        $this->assertEquals($model->getContent(), $res[BaseSerializerKeys::CONTENT]);
        $this->assertEquals($model->getType(), $res[BaseSerializerKeys::TYPE]);
    }

    /**
     * Test serializeNotification()
     *
     * @return void
     */
    public function testSerializeNotification(): void {

        // Set a Notification mock.
        $model = $this->getMockBuilder(NotificationInterface::class)->getMock();
        $model->expects($this->any())->method("getContent")->willReturn(BaseSerializerKeys::CONTENT);
        $model->expects($this->any())->method("getType")->willReturn(BaseSerializerKeys::TYPE);

        $res = JsonSerializer::serializeNotification($model);
        $this->assertCount(2, $res);

        $this->assertEquals($model->getContent(), $res[BaseSerializerKeys::CONTENT]);
        $this->assertEquals($model->getType(), $res[BaseSerializerKeys::TYPE]);
    }

    /**
     * Test serializeProgressBar()
     *
     * @return void
     */
    public function testSerializeProgressBar(): void {

        // Set a Progress bar mock.
        $model = $this->getMockBuilder(ProgressBarInterface::class)->getMock();
        $model->expects($this->any())->method("getContent")->willReturn(BaseSerializerKeys::CONTENT);
        $model->expects($this->any())->method("getType")->willReturn(BaseSerializerKeys::TYPE);

        $res = JsonSerializer::serializeProgressBar($model);
        $this->assertCount(2, $res);

        $this->assertEquals($model->getContent(), $res[BaseSerializerKeys::CONTENT]);
        $this->assertEquals($model->getType(), $res[BaseSerializerKeys::TYPE]);
    }

    /**
     * Test serializeToast()
     *
     * @return void
     */
    public function testSerializeToast(): void {

        // Set a Toast mock.
        $model = $this->getMockBuilder(ToastInterface::class)->getMock();
        $model->expects($this->any())->method("getContent")->willReturn(BaseSerializerKeys::CONTENT);
        $model->expects($this->any())->method("getType")->willReturn(BaseSerializerKeys::TYPE);

        $res = JsonSerializer::serializeToast($model);
        $this->assertCount(2, $res);

        $this->assertEquals($model->getContent(), $res[BaseSerializerKeys::CONTENT]);
        $this->assertEquals($model->getType(), $res[BaseSerializerKeys::TYPE]);
    }
}

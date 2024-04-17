<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\WidgetBundle\Tests\Serializer;

use DateTime;
use WBW\Bundle\WidgetBundle\Assets\FullCalendar\FullCalendarEventInterface;
use WBW\Bundle\WidgetBundle\Serializer\AssetsSerializer;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;

/**
 * Assets serializer test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Serializer
 */
class AssetsSerializerTest extends AbstractTestCase {

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

        $res = AssetsSerializer::serializeFullCalendarEvent($model);
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

}

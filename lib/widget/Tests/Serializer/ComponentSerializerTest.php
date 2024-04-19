<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2021 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\WidgetBundle\Tests\Serializer;

use WBW\Bundle\WidgetBundle\Component\AlertInterface;
use WBW\Bundle\WidgetBundle\Component\BadgeInterface;
use WBW\Bundle\WidgetBundle\Component\ButtonInterface;
use WBW\Bundle\WidgetBundle\Component\ColorInterface;
use WBW\Bundle\WidgetBundle\Component\IconInterface;
use WBW\Bundle\WidgetBundle\Component\LabelInterface;
use WBW\Bundle\WidgetBundle\Component\NavigationNodeInterface;
use WBW\Bundle\WidgetBundle\Component\NotificationInterface;
use WBW\Bundle\WidgetBundle\Component\ProgressBarInterface;
use WBW\Bundle\WidgetBundle\Component\ToastInterface;
use WBW\Bundle\WidgetBundle\Serializer\ComponentSerializer;
use WBW\Bundle\WidgetBundle\Serializer\SerializerKeys;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;
use WBW\Library\Serializer\SerializerKeys as BaseSerializerKeys;

/**
 * Component serializer test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Serializer
 */
class ComponentSerializerTest extends AbstractTestCase {

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

        $res = ComponentSerializer::serializeAlert($model);
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

        $res = ComponentSerializer::serializeBadge($model);
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

        $res = ComponentSerializer::serializeButton($model);
        $this->assertCount(2, $res);

        $this->assertEquals($model->getContent(), $res[BaseSerializerKeys::CONTENT]);
        $this->assertEquals($model->getType(), $res[BaseSerializerKeys::TYPE]);
    }

    /**
     * Test serializeColor()
     *
     * @return void
     */
    public function testSerializeColor(): void {

        // Set a Color mock.
        $model = $this->getMockBuilder(ColorInterface::class)->getMock();
        $model->expects($this->any())->method("getName")->willReturn(BaseSerializerKeys::NAME);
        $model->expects($this->any())->method("getValues")->willReturn([]);

        $res = ComponentSerializer::serializeColor($model);
        $this->assertCount(2, $res);

        $this->assertEquals($model->getName(), $res[BaseSerializerKeys::NAME]);
        $this->assertEquals($model->getValues(), $res[BaseSerializerKeys::VALUE . "s"]);
    }

    /**
     * Test serializeIcon()
     *
     * @return void
     */
    public function testSerializeIcon(): void {

        // Set an Icon mock.
        $model = $this->getMockBuilder(IconInterface::class)->getMock();
        $model->expects($this->any())->method("getName")->willReturn(BaseSerializerKeys::NAME);
        $model->expects($this->any())->method("getStyle")->willReturn(BaseSerializerKeys::STYLE);

        $res = ComponentSerializer::serializeIcon($model);
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

        $res = ComponentSerializer::serializeLabel($model);
        $this->assertCount(2, $res);

        $this->assertEquals($model->getContent(), $res[BaseSerializerKeys::CONTENT]);
        $this->assertEquals($model->getType(), $res[BaseSerializerKeys::TYPE]);
    }

    /**
     * Test serializeNavigationNode()
     *
     * @return void
     */
    public function testSerializeNavigationNode(): void {

        // Set a parent mock.
        $parent = $this->getMockBuilder(NavigationNodeInterface::class)->getMock();
        $parent->expects($this->any())->method("jsonSerialize")->willReturn(ComponentSerializer::serializeNavigationNode($parent));

        // Set a NavigationNode mock.
        $model = $this->getMockBuilder(NavigationNodeInterface::class)->getMock();
        $model->expects($this->any())->method("getId")->willReturn(BaseSerializerKeys::ID);
        $model->expects($this->any())->method("getActive")->willReturn(true);
        $model->expects($this->any())->method("getEnable")->willReturn(false);
        $model->expects($this->any())->method("getIcon")->willReturn(BaseSerializerKeys::ICON);
        $model->expects($this->any())->method("getLabel")->willReturn(BaseSerializerKeys::LABEL);
        $model->expects($this->any())->method("getMatcher")->willReturn(SerializerKeys::MATCHER);
        $model->expects($this->any())->method("getParent")->willReturn($parent);
        $model->expects($this->any())->method("getTarget")->willReturn(BaseSerializerKeys::TARGET);
        $model->expects($this->any())->method("getUri")->willReturn(BaseSerializerKeys::URI);
        $model->expects($this->any())->method("getVisible")->willReturn(null);

        $res = ComponentSerializer::serializeNavigationNode($model);
        $this->assertCount(10, $res);

        $this->assertEquals($model->getId(), $res[BaseSerializerKeys::ID]);
        $this->assertEquals($model->getActive(), $res[BaseSerializerKeys::ACTIVE]);
        $this->assertEquals($model->getEnable(), $res[BaseSerializerKeys::ENABLE]);
        $this->assertEquals($model->getIcon(), $res[BaseSerializerKeys::ICON]);
        $this->assertEquals($model->getLabel(), $res[BaseSerializerKeys::LABEL]);
        $this->assertEquals($model->getMatcher(), $res[SerializerKeys::MATCHER]);
        $this->assertIsArray($res[BaseSerializerKeys::PARENT]);
        $this->assertEquals($model->getTarget(), $res[BaseSerializerKeys::TARGET]);
        $this->assertEquals($model->getUri(), $res[BaseSerializerKeys::URI]);
        $this->assertEquals($model->getVisible(), $res[BaseSerializerKeys::VISIBLE]);
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

        $res = ComponentSerializer::serializeNotification($model);
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

        $res = ComponentSerializer::serializeProgressBar($model);
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

        $res = ComponentSerializer::serializeToast($model);
        $this->assertCount(2, $res);

        $this->assertEquals($model->getContent(), $res[BaseSerializerKeys::CONTENT]);
        $this->assertEquals($model->getType(), $res[BaseSerializerKeys::TYPE]);
    }
}

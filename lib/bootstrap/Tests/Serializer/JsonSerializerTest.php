<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\BootstrapBundle\Tests\Serializer;

use WBW\Bundle\BootstrapBundle\Component\AlertInterface;
use WBW\Bundle\BootstrapBundle\Component\BadgeInterface;
use WBW\Bundle\BootstrapBundle\Component\ButtonInterface;
use WBW\Bundle\BootstrapBundle\Component\ProgressBarInterface;
use WBW\Bundle\BootstrapBundle\Serializer\JsonSerializer;
use WBW\Bundle\BootstrapBundle\Serializer\SerializerKeys;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Library\Serializer\SerializerKeys as BaseSerializerKeys;

/**
 * JSON serializer test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Serializer
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
        $model->expects($this->any())->method("getDismissible")->willReturn(true);
        $model->expects($this->any())->method("getPrefix")->willReturn(SerializerKeys::PREFIX);
        $model->expects($this->any())->method("getType")->willReturn(BaseSerializerKeys::TYPE);

        $res = JsonSerializer::serializeAlert($model);
        $this->assertCount(4, $res);

        $this->assertEquals($model->getContent(), $res[BaseSerializerKeys::CONTENT]);
        $this->assertEquals($model->getDismissible(), $res[SerializerKeys::DISMISSIBLE]);
        $this->assertEquals($model->getPrefix(), $res[SerializerKeys::PREFIX]);
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
        $model->expects($this->any())->method("getPill")->willReturn(true);
        $model->expects($this->any())->method("getPrefix")->willReturn(SerializerKeys::PREFIX);
        $model->expects($this->any())->method("getType")->willReturn(BaseSerializerKeys::TYPE);

        $res = JsonSerializer::serializeBadge($model);
        $this->assertCount(4, $res);

        $this->assertEquals($model->getContent(), $res[BaseSerializerKeys::CONTENT]);
        $this->assertEquals($model->getPill(), $res[SerializerKeys::PILL]);
        $this->assertEquals($model->getPrefix(), $res[SerializerKeys::PREFIX]);
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
        $model->expects($this->any())->method("getActive")->willReturn(true);
        $model->expects($this->any())->method("getBlock")->willReturn(false);
        $model->expects($this->any())->method("getData")->willReturn([]);
        $model->expects($this->any())->method("getDisabled")->willReturn(null);
        $model->expects($this->any())->method("getContent")->willReturn(BaseSerializerKeys::CONTENT);
        $model->expects($this->any())->method("getOutline")->willReturn(true);
        $model->expects($this->any())->method("getPrefix")->willReturn(SerializerKeys::PREFIX);
        $model->expects($this->any())->method("getSize")->willReturn(BaseSerializerKeys::SIZE);
        $model->expects($this->any())->method("getTitle")->willReturn(BaseSerializerKeys::TITLE);
        $model->expects($this->any())->method("getType")->willReturn(BaseSerializerKeys::TYPE);

        $res = JsonSerializer::serializeButton($model);
        $this->assertCount(10, $res);

        $this->assertEquals($model->getActive(), $res[BaseSerializerKeys::ACTIVE]);
        $this->assertEquals($model->getBlock(), $res[SerializerKeys::BLOCK]);
        $this->assertEquals($model->getData(), $res[BaseSerializerKeys::DATA]);
        $this->assertEquals($model->getDisabled(), $res[BaseSerializerKeys::DISABLED]);
        $this->assertEquals($model->getContent(), $res[BaseSerializerKeys::CONTENT]);
        $this->assertEquals($model->getOutline(), $res[SerializerKeys::OUTLINE]);
        $this->assertEquals($model->getPrefix(), $res[SerializerKeys::PREFIX]);
        $this->assertEquals($model->getSize(), $res[BaseSerializerKeys::SIZE]);
        $this->assertEquals($model->getTitle(), $res[BaseSerializerKeys::TITLE]);
        $this->assertEquals($model->getType(), $res[BaseSerializerKeys::TYPE]);
    }

    /**
     * Test serializeProgressBar()
     *
     * @return void
     */
    public function testSerializeProgressBar(): void {

        // Set a ProgressBar mock.
        $model = $this->getMockBuilder(ProgressBarInterface::class)->getMock();
        $model->expects($this->any())->method("getAnimated")->willReturn(true);
        $model->expects($this->any())->method("getContent")->willReturn(BaseSerializerKeys::CONTENT);
        $model->expects($this->any())->method("getHeight")->willReturn(1);
        $model->expects($this->any())->method("getMax")->willReturn(2);
        $model->expects($this->any())->method("getMin")->willReturn(3);
        $model->expects($this->any())->method("getPrefix")->willReturn(SerializerKeys::PREFIX);
        $model->expects($this->any())->method("getStriped")->willReturn(false);
        $model->expects($this->any())->method("getType")->willReturn(BaseSerializerKeys::TYPE);
        $model->expects($this->any())->method("getValue")->willReturn(4);

        $res = JsonSerializer::serializeProgressBar($model);
        $this->assertCount(9, $res);

        $this->assertEquals($model->getAnimated(), $res[SerializerKeys::ANIMATED]);
        $this->assertEquals($model->getContent(), $res[BaseSerializerKeys::CONTENT]);
        $this->assertEquals($model->getHeight(), $res[BaseSerializerKeys::HEIGHT]);
        $this->assertEquals($model->getMax(), $res[BaseSerializerKeys::MAX]);
        $this->assertEquals($model->getMin(), $res[BaseSerializerKeys::MIN]);
        $this->assertEquals($model->getPrefix(), $res[SerializerKeys::PREFIX]);
        $this->assertEquals($model->getStriped(), $res[SerializerKeys::STRIPED]);
        $this->assertEquals($model->getType(), $res[BaseSerializerKeys::TYPE]);
        $this->assertEquals($model->getValue(), $res[BaseSerializerKeys::VALUE]);
    }
}

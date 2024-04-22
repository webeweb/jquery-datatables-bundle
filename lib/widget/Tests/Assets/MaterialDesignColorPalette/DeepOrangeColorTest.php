<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\WidgetBundle\Tests\Assets\MaterialDesignColorPalette;

use JsonSerializable;
use WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette\DeepOrangeColor;
use WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette\DeepOrangeColorInterface;
use WBW\Bundle\WidgetBundle\Component\Color\DeepOrangeColorInterface as BaseDeepOrangeColorInterface;
use WBW\Bundle\WidgetBundle\Component\ColorInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;

/**
 * Deep orange color test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Assets\MaterialDesignColorPalette
 */
class DeepOrangeColorTest extends AbstractTestCase {

    /**
     * Test getValues()
     *
     * @return void
     */
    public function testGetValues(): void {

        $obj = new DeepOrangeColor();

        $res = $obj->getValues();
        $this->assertCount(12, $res);

        $this->assertEquals(DeepOrangeColorInterface::DEEP_ORANGE_COLOR_VALUE_50, $res[ColorInterface::COLOR_VALUE_50]);
        $this->assertEquals(DeepOrangeColorInterface::DEEP_ORANGE_COLOR_VALUE_100, $res[ColorInterface::COLOR_VALUE_100]);
        $this->assertEquals(DeepOrangeColorInterface::DEEP_ORANGE_COLOR_VALUE_200, $res[ColorInterface::COLOR_VALUE_200]);
        $this->assertEquals(DeepOrangeColorInterface::DEEP_ORANGE_COLOR_VALUE_300, $res[ColorInterface::COLOR_VALUE_300]);
        $this->assertEquals(DeepOrangeColorInterface::DEEP_ORANGE_COLOR_VALUE_400, $res[ColorInterface::COLOR_VALUE_400]);
        $this->assertEquals(DeepOrangeColorInterface::DEEP_ORANGE_COLOR_VALUE_500, $res[ColorInterface::COLOR_VALUE_500]);
        $this->assertEquals(DeepOrangeColorInterface::DEEP_ORANGE_COLOR_VALUE_500, $res[ColorInterface::COLOR_VALUE_500]);
        $this->assertEquals(DeepOrangeColorInterface::DEEP_ORANGE_COLOR_VALUE_600, $res[ColorInterface::COLOR_VALUE_600]);
        $this->assertEquals(DeepOrangeColorInterface::DEEP_ORANGE_COLOR_VALUE_700, $res[ColorInterface::COLOR_VALUE_700]);
        $this->assertEquals(DeepOrangeColorInterface::DEEP_ORANGE_COLOR_VALUE_A100, $res[ColorInterface::COLOR_VALUE_A100]);
        $this->assertEquals(DeepOrangeColorInterface::DEEP_ORANGE_COLOR_VALUE_A200, $res[ColorInterface::COLOR_VALUE_A200]);
        $this->assertEquals(DeepOrangeColorInterface::DEEP_ORANGE_COLOR_VALUE_A400, $res[ColorInterface::COLOR_VALUE_A400]);
        $this->assertEquals(DeepOrangeColorInterface::DEEP_ORANGE_COLOR_VALUE_A700, $res[ColorInterface::COLOR_VALUE_A700]);
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new DeepOrangeColor();

        $this->assertInstanceOf(JsonSerializable::class, $obj);
        $this->assertInstanceOf(ColorInterface::class, $obj);
        $this->assertInstanceOf(DeepOrangeColorInterface::class, $obj);

        $this->assertEquals(BaseDeepOrangeColorInterface::DEEP_ORANGE_COLOR_NAME, $obj->getName());
    }
}

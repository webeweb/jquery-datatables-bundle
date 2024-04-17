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
use WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette\YellowColor;
use WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette\YellowColorInterface;
use WBW\Bundle\WidgetBundle\Component\Color\YellowColorInterface as BaseYellowColorInterface;
use WBW\Bundle\WidgetBundle\Component\ColorInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;

/**
 * Yellow color test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package  WBW\Bundle\WidgetBundle\Tests\Assets\MaterialDesignColorPalette
 */
class YellowColorTest extends AbstractTestCase {

    /**
     * Test getValues()
     *
     * @return void
     */
    public function testGetValues(): void {

        $obj = new YellowColor();

        $res = $obj->getValues();
        $this->assertCount(12, $res);

        $this->assertEquals(YellowColorInterface::YELLOW_COLOR_VALUE_50, $res[ColorInterface::COLOR_VALUE_50]);
        $this->assertEquals(YellowColorInterface::YELLOW_COLOR_VALUE_100, $res[ColorInterface::COLOR_VALUE_100]);
        $this->assertEquals(YellowColorInterface::YELLOW_COLOR_VALUE_200, $res[ColorInterface::COLOR_VALUE_200]);
        $this->assertEquals(YellowColorInterface::YELLOW_COLOR_VALUE_300, $res[ColorInterface::COLOR_VALUE_300]);
        $this->assertEquals(YellowColorInterface::YELLOW_COLOR_VALUE_400, $res[ColorInterface::COLOR_VALUE_400]);
        $this->assertEquals(YellowColorInterface::YELLOW_COLOR_VALUE_500, $res[ColorInterface::COLOR_VALUE_500]);
        $this->assertEquals(YellowColorInterface::YELLOW_COLOR_VALUE_500, $res[ColorInterface::COLOR_VALUE_500]);
        $this->assertEquals(YellowColorInterface::YELLOW_COLOR_VALUE_600, $res[ColorInterface::COLOR_VALUE_600]);
        $this->assertEquals(YellowColorInterface::YELLOW_COLOR_VALUE_700, $res[ColorInterface::COLOR_VALUE_700]);
        $this->assertEquals(YellowColorInterface::YELLOW_COLOR_VALUE_A100, $res[ColorInterface::COLOR_VALUE_A100]);
        $this->assertEquals(YellowColorInterface::YELLOW_COLOR_VALUE_A200, $res[ColorInterface::COLOR_VALUE_A200]);
        $this->assertEquals(YellowColorInterface::YELLOW_COLOR_VALUE_A400, $res[ColorInterface::COLOR_VALUE_A400]);
        $this->assertEquals(YellowColorInterface::YELLOW_COLOR_VALUE_A700, $res[ColorInterface::COLOR_VALUE_A700]);
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new YellowColor();

        $this->assertInstanceOf(JsonSerializable::class, $obj);
        $this->assertInstanceOf(ColorInterface::class, $obj);
        $this->assertInstanceOf(YellowColorInterface::class, $obj);

        $this->assertEquals(BaseYellowColorInterface::YELLOW_COLOR_NAME, $obj->getName());
    }
}
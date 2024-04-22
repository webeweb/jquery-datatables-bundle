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
use WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette\BlueGreyColor;
use WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette\BlueGreyColorInterface;
use WBW\Bundle\WidgetBundle\Component\Color\BlueGreyColorInterface as BaseBlueGreyColorInterface;
use WBW\Bundle\WidgetBundle\Component\ColorInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;

/**
 * Blue grey color test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Assets\MaterialDesignColorPalette
 */
class BlueGreyColorTest extends AbstractTestCase {

    /**
     * Test getValues()
     *
     * @return void
     */
    public function testGetValues(): void {

        $obj = new BlueGreyColor();

        $res = $obj->getValues();
        $this->assertCount(8, $res);

        $this->assertEquals(BlueGreyColorInterface::BLUE_GREY_COLOR_VALUE_50, $res[ColorInterface::COLOR_VALUE_50]);
        $this->assertEquals(BlueGreyColorInterface::BLUE_GREY_COLOR_VALUE_100, $res[ColorInterface::COLOR_VALUE_100]);
        $this->assertEquals(BlueGreyColorInterface::BLUE_GREY_COLOR_VALUE_200, $res[ColorInterface::COLOR_VALUE_200]);
        $this->assertEquals(BlueGreyColorInterface::BLUE_GREY_COLOR_VALUE_300, $res[ColorInterface::COLOR_VALUE_300]);
        $this->assertEquals(BlueGreyColorInterface::BLUE_GREY_COLOR_VALUE_400, $res[ColorInterface::COLOR_VALUE_400]);
        $this->assertEquals(BlueGreyColorInterface::BLUE_GREY_COLOR_VALUE_500, $res[ColorInterface::COLOR_VALUE_500]);
        $this->assertEquals(BlueGreyColorInterface::BLUE_GREY_COLOR_VALUE_500, $res[ColorInterface::COLOR_VALUE_500]);
        $this->assertEquals(BlueGreyColorInterface::BLUE_GREY_COLOR_VALUE_600, $res[ColorInterface::COLOR_VALUE_600]);
        $this->assertEquals(BlueGreyColorInterface::BLUE_GREY_COLOR_VALUE_700, $res[ColorInterface::COLOR_VALUE_700]);
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new BlueGreyColor();

        $this->assertInstanceOf(JsonSerializable::class, $obj);
        $this->assertInstanceOf(ColorInterface::class, $obj);
        $this->assertInstanceOf(BlueGreyColorInterface::class, $obj);

        $this->assertEquals(BaseBlueGreyColorInterface::BLUE_GREY_COLOR_NAME, $obj->getName());
    }
}

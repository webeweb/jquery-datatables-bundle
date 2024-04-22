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
use WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette\BrownColor;
use WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette\BrownColorInterface;
use WBW\Bundle\WidgetBundle\Component\Color\BrownColorInterface as BaseBrownColorInterface;
use WBW\Bundle\WidgetBundle\Component\ColorInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;

/**
 * Brown color test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Assets\MaterialDesignColorPalette
 */
class BrownColorTest extends AbstractTestCase {

    /**
     * Test getValues()
     *
     * @return void
     */
    public function testGetValues(): void {

        $obj = new BrownColor();

        $res = $obj->getValues();
        $this->assertCount(8, $res);

        $this->assertEquals(BrownColorInterface::BROWN_COLOR_VALUE_50, $res[ColorInterface::COLOR_VALUE_50]);
        $this->assertEquals(BrownColorInterface::BROWN_COLOR_VALUE_100, $res[ColorInterface::COLOR_VALUE_100]);
        $this->assertEquals(BrownColorInterface::BROWN_COLOR_VALUE_200, $res[ColorInterface::COLOR_VALUE_200]);
        $this->assertEquals(BrownColorInterface::BROWN_COLOR_VALUE_300, $res[ColorInterface::COLOR_VALUE_300]);
        $this->assertEquals(BrownColorInterface::BROWN_COLOR_VALUE_400, $res[ColorInterface::COLOR_VALUE_400]);
        $this->assertEquals(BrownColorInterface::BROWN_COLOR_VALUE_500, $res[ColorInterface::COLOR_VALUE_500]);
        $this->assertEquals(BrownColorInterface::BROWN_COLOR_VALUE_500, $res[ColorInterface::COLOR_VALUE_500]);
        $this->assertEquals(BrownColorInterface::BROWN_COLOR_VALUE_600, $res[ColorInterface::COLOR_VALUE_600]);
        $this->assertEquals(BrownColorInterface::BROWN_COLOR_VALUE_700, $res[ColorInterface::COLOR_VALUE_700]);
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new BrownColor();

        $this->assertInstanceOf(JsonSerializable::class, $obj);
        $this->assertInstanceOf(ColorInterface::class, $obj);
        $this->assertInstanceOf(BrownColorInterface::class, $obj);

        $this->assertEquals(BaseBrownColorInterface::BROWN_COLOR_NAME, $obj->getName());
    }
}

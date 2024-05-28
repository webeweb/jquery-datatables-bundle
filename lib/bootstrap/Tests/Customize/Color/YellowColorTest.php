<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\BootstrapBundle\Tests\Customize\Color;

use JsonSerializable;
use WBW\Bundle\BootstrapBundle\Customize\Color\YellowColor;
use WBW\Bundle\BootstrapBundle\Customize\Color\YellowColorInterface;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Library\Widget\Component\Color\YellowColorInterface as BaseYellowColorInterface;
use WBW\Library\Widget\Component\ColorInterface;

/**
 * Yellow color test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Customize\Color
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
        $this->assertCount(9, $res);

        $this->assertEquals(YellowColorInterface::YELLOW_COLOR_VALUE_100, $res[ColorInterface::COLOR_VALUE_100]);
        $this->assertEquals(YellowColorInterface::YELLOW_COLOR_VALUE_200, $res[ColorInterface::COLOR_VALUE_200]);
        $this->assertEquals(YellowColorInterface::YELLOW_COLOR_VALUE_300, $res[ColorInterface::COLOR_VALUE_300]);
        $this->assertEquals(YellowColorInterface::YELLOW_COLOR_VALUE_400, $res[ColorInterface::COLOR_VALUE_400]);
        $this->assertEquals(YellowColorInterface::YELLOW_COLOR_VALUE_500, $res[ColorInterface::COLOR_VALUE_500]);
        $this->assertEquals(YellowColorInterface::YELLOW_COLOR_VALUE_500, $res[ColorInterface::COLOR_VALUE_500]);
        $this->assertEquals(YellowColorInterface::YELLOW_COLOR_VALUE_600, $res[ColorInterface::COLOR_VALUE_600]);
        $this->assertEquals(YellowColorInterface::YELLOW_COLOR_VALUE_700, $res[ColorInterface::COLOR_VALUE_700]);
        $this->assertEquals(YellowColorInterface::YELLOW_COLOR_VALUE_800, $res[ColorInterface::COLOR_VALUE_800]);
        $this->assertEquals(YellowColorInterface::YELLOW_COLOR_VALUE_900, $res[ColorInterface::COLOR_VALUE_900]);
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

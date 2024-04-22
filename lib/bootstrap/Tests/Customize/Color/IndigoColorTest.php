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

namespace WBW\Bundle\BootstrapBundle\Tests\Customize\Color;

use JsonSerializable;
use WBW\Bundle\BootstrapBundle\Customize\Color\IndigoColor;
use WBW\Bundle\BootstrapBundle\Customize\Color\IndigoColorInterface;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Bundle\WidgetBundle\Component\Color\IndigoColorInterface as BaseIndigoColorInterface;
use WBW\Bundle\WidgetBundle\Component\ColorInterface;

/**
 * Indigo color test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package  WBW\Bundle\BootstrapBundle\Tests\Customize\Color
 */
class IndigoColorTest extends AbstractTestCase {

    /**
     * Test getValues()
     *
     * @return void
     */
    public function testGetValues(): void {

        $obj = new IndigoColor();

        $res = $obj->getValues();
        $this->assertCount(9, $res);

        $this->assertEquals(IndigoColorInterface::INDIGO_COLOR_VALUE_100, $res[ColorInterface::COLOR_VALUE_100]);
        $this->assertEquals(IndigoColorInterface::INDIGO_COLOR_VALUE_200, $res[ColorInterface::COLOR_VALUE_200]);
        $this->assertEquals(IndigoColorInterface::INDIGO_COLOR_VALUE_300, $res[ColorInterface::COLOR_VALUE_300]);
        $this->assertEquals(IndigoColorInterface::INDIGO_COLOR_VALUE_400, $res[ColorInterface::COLOR_VALUE_400]);
        $this->assertEquals(IndigoColorInterface::INDIGO_COLOR_VALUE_500, $res[ColorInterface::COLOR_VALUE_500]);
        $this->assertEquals(IndigoColorInterface::INDIGO_COLOR_VALUE_500, $res[ColorInterface::COLOR_VALUE_500]);
        $this->assertEquals(IndigoColorInterface::INDIGO_COLOR_VALUE_600, $res[ColorInterface::COLOR_VALUE_600]);
        $this->assertEquals(IndigoColorInterface::INDIGO_COLOR_VALUE_700, $res[ColorInterface::COLOR_VALUE_700]);
        $this->assertEquals(IndigoColorInterface::INDIGO_COLOR_VALUE_800, $res[ColorInterface::COLOR_VALUE_800]);
        $this->assertEquals(IndigoColorInterface::INDIGO_COLOR_VALUE_900, $res[ColorInterface::COLOR_VALUE_900]);
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new IndigoColor();

        $this->assertInstanceOf(JsonSerializable::class, $obj);
        $this->assertInstanceOf(ColorInterface::class, $obj);
        $this->assertInstanceOf(IndigoColorInterface::class, $obj);

        $this->assertEquals(BaseIndigoColorInterface::INDIGO_COLOR_NAME, $obj->getName());
    }
}

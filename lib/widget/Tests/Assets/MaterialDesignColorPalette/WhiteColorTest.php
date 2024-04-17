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
use WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette\WhiteColor;
use WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette\WhiteColorInterface;
use WBW\Bundle\WidgetBundle\Component\Color\WhiteColorInterface as BaseWhiteColorInterface;
use WBW\Bundle\WidgetBundle\Component\ColorInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;

/**
 * White color test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package  WBW\Bundle\WidgetBundle\Tests\Assets\MaterialDesignColorPalette
 */
class WhiteColorTest extends AbstractTestCase {

    /**
     * Test getValues()
     *
     * @return void
     */
    public function testGetValues(): void {

        $obj = new WhiteColor();

        $res = $obj->getValues();
        $this->assertCount(1, $res);

        $this->assertEquals(WhiteColorInterface::WHITE_COLOR_VALUE_500, $res[ColorInterface::COLOR_VALUE_500]);
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new WhiteColor();

        $this->assertInstanceOf(JsonSerializable::class, $obj);
        $this->assertInstanceOf(ColorInterface::class, $obj);
        $this->assertInstanceOf(WhiteColorInterface::class, $obj);

        $this->assertEquals(BaseWhiteColorInterface::WHITE_COLOR_NAME, $obj->getName());
    }
}

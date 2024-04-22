<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\WidgetBundle\Tests\Assets\MaterialDesignColorPalette;

use WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette\LightBlueColorInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;

/**
 * Light blue color interface test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Assets\MaterialDesignColorPalette
 */
class LightBlueColorInterfaceTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("#e1f5fe", LightBlueColorInterface::LIGHT_BLUE_COLOR_VALUE_50);
        $this->assertEquals("#b3e5fc", LightBlueColorInterface::LIGHT_BLUE_COLOR_VALUE_100);
        $this->assertEquals("#81d4fa", LightBlueColorInterface::LIGHT_BLUE_COLOR_VALUE_200);
        $this->assertEquals("#4fc3f7", LightBlueColorInterface::LIGHT_BLUE_COLOR_VALUE_300);
        $this->assertEquals("#29b6f6", LightBlueColorInterface::LIGHT_BLUE_COLOR_VALUE_400);
        $this->assertEquals("#03a9f4", LightBlueColorInterface::LIGHT_BLUE_COLOR_VALUE_500);
        $this->assertEquals("#039be5", LightBlueColorInterface::LIGHT_BLUE_COLOR_VALUE_600);
        $this->assertEquals("#0288d1", LightBlueColorInterface::LIGHT_BLUE_COLOR_VALUE_700);
        $this->assertEquals("#0277bd", LightBlueColorInterface::LIGHT_BLUE_COLOR_VALUE_800);
        $this->assertEquals("#01579b", LightBlueColorInterface::LIGHT_BLUE_COLOR_VALUE_900);
        $this->assertEquals("#80d8ff", LightBlueColorInterface::LIGHT_BLUE_COLOR_VALUE_A100);
        $this->assertEquals("#40c4ff", LightBlueColorInterface::LIGHT_BLUE_COLOR_VALUE_A200);
        $this->assertEquals("#00b0ff", LightBlueColorInterface::LIGHT_BLUE_COLOR_VALUE_A400);
        $this->assertEquals("#0091ea", LightBlueColorInterface::LIGHT_BLUE_COLOR_VALUE_A700);
    }
}

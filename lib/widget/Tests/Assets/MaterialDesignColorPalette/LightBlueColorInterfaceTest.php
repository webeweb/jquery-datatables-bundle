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

        $this->assertEquals("#E1F5FE", LightBlueColorInterface::LIGHT_BLUE_COLOR_VALUE_50);
        $this->assertEquals("#B3E5FC", LightBlueColorInterface::LIGHT_BLUE_COLOR_VALUE_100);
        $this->assertEquals("#81D4FA", LightBlueColorInterface::LIGHT_BLUE_COLOR_VALUE_200);
        $this->assertEquals("#4FC3F7", LightBlueColorInterface::LIGHT_BLUE_COLOR_VALUE_300);
        $this->assertEquals("#29B6F6", LightBlueColorInterface::LIGHT_BLUE_COLOR_VALUE_400);
        $this->assertEquals("#03A9F4", LightBlueColorInterface::LIGHT_BLUE_COLOR_VALUE_500);
        $this->assertEquals("#039BE5", LightBlueColorInterface::LIGHT_BLUE_COLOR_VALUE_600);
        $this->assertEquals("#0288D1", LightBlueColorInterface::LIGHT_BLUE_COLOR_VALUE_700);
        $this->assertEquals("#0277BD", LightBlueColorInterface::LIGHT_BLUE_COLOR_VALUE_800);
        $this->assertEquals("#01579B", LightBlueColorInterface::LIGHT_BLUE_COLOR_VALUE_900);
        $this->assertEquals("#80D8FF", LightBlueColorInterface::LIGHT_BLUE_COLOR_VALUE_A100);
        $this->assertEquals("#40C4FF", LightBlueColorInterface::LIGHT_BLUE_COLOR_VALUE_A200);
        $this->assertEquals("#00B0FF", LightBlueColorInterface::LIGHT_BLUE_COLOR_VALUE_A400);
        $this->assertEquals("#0091EA", LightBlueColorInterface::LIGHT_BLUE_COLOR_VALUE_A700);
    }
}

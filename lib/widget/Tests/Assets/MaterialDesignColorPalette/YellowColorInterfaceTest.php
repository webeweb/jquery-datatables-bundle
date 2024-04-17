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

use WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette\YellowColorInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;

/**
 * Yellow color interface test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Assets\MaterialDesignColorPalette
 */
class YellowColorInterfaceTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("#FFFDE7", YellowColorInterface::YELLOW_COLOR_VALUE_50);
        $this->assertEquals("#FFF9C4", YellowColorInterface::YELLOW_COLOR_VALUE_100);
        $this->assertEquals("#FFF59D", YellowColorInterface::YELLOW_COLOR_VALUE_200);
        $this->assertEquals("#FFF176", YellowColorInterface::YELLOW_COLOR_VALUE_300);
        $this->assertEquals("#FFEE58", YellowColorInterface::YELLOW_COLOR_VALUE_400);
        $this->assertEquals("#FFEB3B", YellowColorInterface::YELLOW_COLOR_VALUE_500);
        $this->assertEquals("#FDD835", YellowColorInterface::YELLOW_COLOR_VALUE_600);
        $this->assertEquals("#FBC02D", YellowColorInterface::YELLOW_COLOR_VALUE_700);
        $this->assertEquals("#F9A825", YellowColorInterface::YELLOW_COLOR_VALUE_800);
        $this->assertEquals("#F57F17", YellowColorInterface::YELLOW_COLOR_VALUE_900);
        $this->assertEquals("#FFFF8D", YellowColorInterface::YELLOW_COLOR_VALUE_A100);
        $this->assertEquals("#FFFF00", YellowColorInterface::YELLOW_COLOR_VALUE_A200);
        $this->assertEquals("#FFEA00", YellowColorInterface::YELLOW_COLOR_VALUE_A400);
        $this->assertEquals("#FFD600", YellowColorInterface::YELLOW_COLOR_VALUE_A700);
    }
}

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

        $this->assertEquals("#fffde7", YellowColorInterface::YELLOW_COLOR_VALUE_50);
        $this->assertEquals("#fff9c4", YellowColorInterface::YELLOW_COLOR_VALUE_100);
        $this->assertEquals("#fff59d", YellowColorInterface::YELLOW_COLOR_VALUE_200);
        $this->assertEquals("#fff176", YellowColorInterface::YELLOW_COLOR_VALUE_300);
        $this->assertEquals("#ffee58", YellowColorInterface::YELLOW_COLOR_VALUE_400);
        $this->assertEquals("#ffeb3b", YellowColorInterface::YELLOW_COLOR_VALUE_500);
        $this->assertEquals("#fdd835", YellowColorInterface::YELLOW_COLOR_VALUE_600);
        $this->assertEquals("#fbc02d", YellowColorInterface::YELLOW_COLOR_VALUE_700);
        $this->assertEquals("#f9a825", YellowColorInterface::YELLOW_COLOR_VALUE_800);
        $this->assertEquals("#f57f17", YellowColorInterface::YELLOW_COLOR_VALUE_900);
        $this->assertEquals("#ffff8d", YellowColorInterface::YELLOW_COLOR_VALUE_A100);
        $this->assertEquals("#ffff00", YellowColorInterface::YELLOW_COLOR_VALUE_A200);
        $this->assertEquals("#ffea00", YellowColorInterface::YELLOW_COLOR_VALUE_A400);
        $this->assertEquals("#ffd600", YellowColorInterface::YELLOW_COLOR_VALUE_A700);
    }
}

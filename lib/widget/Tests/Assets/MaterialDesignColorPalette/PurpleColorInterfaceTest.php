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

use WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette\PurpleColorInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;

/**
 * Purple color interface test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Assets\MaterialDesignColorPalette
 */
class PurpleColorInterfaceTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("#f3e5f5", PurpleColorInterface::PURPLE_COLOR_VALUE_50);
        $this->assertEquals("#e1bee7", PurpleColorInterface::PURPLE_COLOR_VALUE_100);
        $this->assertEquals("#ce93d8", PurpleColorInterface::PURPLE_COLOR_VALUE_200);
        $this->assertEquals("#ba68c8", PurpleColorInterface::PURPLE_COLOR_VALUE_300);
        $this->assertEquals("#ab47bc", PurpleColorInterface::PURPLE_COLOR_VALUE_400);
        $this->assertEquals("#9c27b0", PurpleColorInterface::PURPLE_COLOR_VALUE_500);
        $this->assertEquals("#8e24aa", PurpleColorInterface::PURPLE_COLOR_VALUE_600);
        $this->assertEquals("#7b1fa2", PurpleColorInterface::PURPLE_COLOR_VALUE_700);
        $this->assertEquals("#6a1b9a", PurpleColorInterface::PURPLE_COLOR_VALUE_800);
        $this->assertEquals("#4a148c", PurpleColorInterface::PURPLE_COLOR_VALUE_900);
        $this->assertEquals("#ea80fc", PurpleColorInterface::PURPLE_COLOR_VALUE_A100);
        $this->assertEquals("#e040fb", PurpleColorInterface::PURPLE_COLOR_VALUE_A200);
        $this->assertEquals("#d500f9", PurpleColorInterface::PURPLE_COLOR_VALUE_A400);
        $this->assertEquals("#aa00ff", PurpleColorInterface::PURPLE_COLOR_VALUE_A700);
    }
}

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

        $this->assertEquals("#F3E5F5", PurpleColorInterface::PURPLE_COLOR_50);
        $this->assertEquals("#E1BEE7", PurpleColorInterface::PURPLE_COLOR_100);
        $this->assertEquals("#CE93D8", PurpleColorInterface::PURPLE_COLOR_200);
        $this->assertEquals("#BA68C8", PurpleColorInterface::PURPLE_COLOR_300);
        $this->assertEquals("#AB47BC", PurpleColorInterface::PURPLE_COLOR_400);
        $this->assertEquals("#9C27B0", PurpleColorInterface::PURPLE_COLOR_500);
        $this->assertEquals("#8E24AA", PurpleColorInterface::PURPLE_COLOR_600);
        $this->assertEquals("#7B1FA2", PurpleColorInterface::PURPLE_COLOR_700);
        $this->assertEquals("#6A1B9A", PurpleColorInterface::PURPLE_COLOR_800);
        $this->assertEquals("#4A148C", PurpleColorInterface::PURPLE_COLOR_900);
        $this->assertEquals("#EA80FC", PurpleColorInterface::PURPLE_COLOR_A100);
        $this->assertEquals("#E040FB", PurpleColorInterface::PURPLE_COLOR_A200);
        $this->assertEquals("#D500F9", PurpleColorInterface::PURPLE_COLOR_A400);
        $this->assertEquals("#AA00FF", PurpleColorInterface::PURPLE_COLOR_A700);
    }
}

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

use WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette\PinkColorInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;

/**
 * Pink color interface test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Assets\MaterialDesignColorPalette
 */
class PinkColorInterfaceTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("#fce4ec", PinkColorInterface::PINK_COLOR_VALUE_50);
        $this->assertEquals("#f8bbd0", PinkColorInterface::PINK_COLOR_VALUE_100);
        $this->assertEquals("#f48fb1", PinkColorInterface::PINK_COLOR_VALUE_200);
        $this->assertEquals("#f06292", PinkColorInterface::PINK_COLOR_VALUE_300);
        $this->assertEquals("#ec407a", PinkColorInterface::PINK_COLOR_VALUE_400);
        $this->assertEquals("#e91e63", PinkColorInterface::PINK_COLOR_VALUE_500);
        $this->assertEquals("#d81b60", PinkColorInterface::PINK_COLOR_VALUE_600);
        $this->assertEquals("#c2185b", PinkColorInterface::PINK_COLOR_VALUE_700);
        $this->assertEquals("#ad1457", PinkColorInterface::PINK_COLOR_VALUE_800);
        $this->assertEquals("#880e4f", PinkColorInterface::PINK_COLOR_VALUE_900);
        $this->assertEquals("#ff80ab", PinkColorInterface::PINK_COLOR_VALUE_A100);
        $this->assertEquals("#ff4081", PinkColorInterface::PINK_COLOR_VALUE_A200);
        $this->assertEquals("#f50057", PinkColorInterface::PINK_COLOR_VALUE_A400);
        $this->assertEquals("#c51162", PinkColorInterface::PINK_COLOR_VALUE_A700);
    }
}

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

        $this->assertEquals("#FCE4EC", PinkColorInterface::PINK_COLOR_VALUE_50);
        $this->assertEquals("#F8BBD0", PinkColorInterface::PINK_COLOR_VALUE_100);
        $this->assertEquals("#F48FB1", PinkColorInterface::PINK_COLOR_VALUE_200);
        $this->assertEquals("#F06292", PinkColorInterface::PINK_COLOR_VALUE_300);
        $this->assertEquals("#EC407A", PinkColorInterface::PINK_COLOR_VALUE_400);
        $this->assertEquals("#E91E63", PinkColorInterface::PINK_COLOR_VALUE_500);
        $this->assertEquals("#D81B60", PinkColorInterface::PINK_COLOR_VALUE_600);
        $this->assertEquals("#C2185B", PinkColorInterface::PINK_COLOR_VALUE_700);
        $this->assertEquals("#AD1457", PinkColorInterface::PINK_COLOR_VALUE_800);
        $this->assertEquals("#880E4F", PinkColorInterface::PINK_COLOR_VALUE_900);
        $this->assertEquals("#FF80AB", PinkColorInterface::PINK_COLOR_VALUE_A100);
        $this->assertEquals("#FF4081", PinkColorInterface::PINK_COLOR_VALUE_A200);
        $this->assertEquals("#F50057", PinkColorInterface::PINK_COLOR_VALUE_A400);
        $this->assertEquals("#C51162", PinkColorInterface::PINK_COLOR_VALUE_A700);
    }
}

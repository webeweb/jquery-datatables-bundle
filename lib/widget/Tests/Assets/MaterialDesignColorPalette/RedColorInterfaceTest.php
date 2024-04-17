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

use WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette\RedColorInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;

/**
 * Red color interface test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Assets\MaterialDesignColorPalette
 */
class RedColorInterfaceTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("#FFEBEE", RedColorInterface::RED_COLOR_VALUE_50);
        $this->assertEquals("#FFCDD2", RedColorInterface::RED_COLOR_VALUE_100);
        $this->assertEquals("#EF9A9A", RedColorInterface::RED_COLOR_VALUE_200);
        $this->assertEquals("#E57373", RedColorInterface::RED_COLOR_VALUE_300);
        $this->assertEquals("#EF5350", RedColorInterface::RED_COLOR_VALUE_400);
        $this->assertEquals("#F44336", RedColorInterface::RED_COLOR_VALUE_500);
        $this->assertEquals("#E53935", RedColorInterface::RED_COLOR_VALUE_600);
        $this->assertEquals("#D32F2F", RedColorInterface::RED_COLOR_VALUE_700);
        $this->assertEquals("#C62828", RedColorInterface::RED_COLOR_VALUE_800);
        $this->assertEquals("#B71C1C", RedColorInterface::RED_COLOR_VALUE_900);
        $this->assertEquals("#FF8A80", RedColorInterface::RED_COLOR_VALUE_A100);
        $this->assertEquals("#FF5252", RedColorInterface::RED_COLOR_VALUE_A200);
        $this->assertEquals("#FF1744", RedColorInterface::RED_COLOR_VALUE_A400);
        $this->assertEquals("#D50000", RedColorInterface::RED_COLOR_VALUE_A700);
    }
}

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

        $this->assertEquals("#ffebee", RedColorInterface::RED_COLOR_VALUE_50);
        $this->assertEquals("#ffcdd2", RedColorInterface::RED_COLOR_VALUE_100);
        $this->assertEquals("#ef9a9a", RedColorInterface::RED_COLOR_VALUE_200);
        $this->assertEquals("#e57373", RedColorInterface::RED_COLOR_VALUE_300);
        $this->assertEquals("#ef5350", RedColorInterface::RED_COLOR_VALUE_400);
        $this->assertEquals("#f44336", RedColorInterface::RED_COLOR_VALUE_500);
        $this->assertEquals("#e53935", RedColorInterface::RED_COLOR_VALUE_600);
        $this->assertEquals("#d32f2f", RedColorInterface::RED_COLOR_VALUE_700);
        $this->assertEquals("#c62828", RedColorInterface::RED_COLOR_VALUE_800);
        $this->assertEquals("#b71c1c", RedColorInterface::RED_COLOR_VALUE_900);
        $this->assertEquals("#ff8a80", RedColorInterface::RED_COLOR_VALUE_A100);
        $this->assertEquals("#ff5252", RedColorInterface::RED_COLOR_VALUE_A200);
        $this->assertEquals("#ff1744", RedColorInterface::RED_COLOR_VALUE_A400);
        $this->assertEquals("#d50000", RedColorInterface::RED_COLOR_VALUE_A700);
    }
}

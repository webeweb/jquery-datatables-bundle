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

use WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette\DeepOrangeColorInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;

/**
 * Deep orange color interface test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Assets\MaterialDesignColorPalette
 */
class DeepOrangeColorInterfaceTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("#fbe9e7", DeepOrangeColorInterface::DEEP_ORANGE_COLOR_VALUE_50);
        $this->assertEquals("#ffccbc", DeepOrangeColorInterface::DEEP_ORANGE_COLOR_VALUE_100);
        $this->assertEquals("#ffab91", DeepOrangeColorInterface::DEEP_ORANGE_COLOR_VALUE_200);
        $this->assertEquals("#ff8a65", DeepOrangeColorInterface::DEEP_ORANGE_COLOR_VALUE_300);
        $this->assertEquals("#ff7043", DeepOrangeColorInterface::DEEP_ORANGE_COLOR_VALUE_400);
        $this->assertEquals("#ff5722", DeepOrangeColorInterface::DEEP_ORANGE_COLOR_VALUE_500);
        $this->assertEquals("#f4511e", DeepOrangeColorInterface::DEEP_ORANGE_COLOR_VALUE_600);
        $this->assertEquals("#e64a19", DeepOrangeColorInterface::DEEP_ORANGE_COLOR_VALUE_700);
        $this->assertEquals("#d84315", DeepOrangeColorInterface::DEEP_ORANGE_COLOR_VALUE_800);
        $this->assertEquals("#bf360c", DeepOrangeColorInterface::DEEP_ORANGE_COLOR_VALUE_900);
        $this->assertEquals("#ff9e80", DeepOrangeColorInterface::DEEP_ORANGE_COLOR_VALUE_A100);
        $this->assertEquals("#ff6e40", DeepOrangeColorInterface::DEEP_ORANGE_COLOR_VALUE_A200);
        $this->assertEquals("#ff3d00", DeepOrangeColorInterface::DEEP_ORANGE_COLOR_VALUE_A400);
        $this->assertEquals("#dd2c00", DeepOrangeColorInterface::DEEP_ORANGE_COLOR_VALUE_A700);
    }
}

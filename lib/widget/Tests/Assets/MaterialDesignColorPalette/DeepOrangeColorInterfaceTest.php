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

        $this->assertEquals("#FBE9E7", DeepOrangeColorInterface::DEEP_ORANGE_COLOR_VALUE_50);
        $this->assertEquals("#FFCCBC", DeepOrangeColorInterface::DEEP_ORANGE_COLOR_VALUE_100);
        $this->assertEquals("#FFAB91", DeepOrangeColorInterface::DEEP_ORANGE_COLOR_VALUE_200);
        $this->assertEquals("#FF8A65", DeepOrangeColorInterface::DEEP_ORANGE_COLOR_VALUE_300);
        $this->assertEquals("#FF7043", DeepOrangeColorInterface::DEEP_ORANGE_COLOR_VALUE_400);
        $this->assertEquals("#FF5722", DeepOrangeColorInterface::DEEP_ORANGE_COLOR_VALUE_500);
        $this->assertEquals("#F4511E", DeepOrangeColorInterface::DEEP_ORANGE_COLOR_VALUE_600);
        $this->assertEquals("#E64A19", DeepOrangeColorInterface::DEEP_ORANGE_COLOR_VALUE_700);
        $this->assertEquals("#D84315", DeepOrangeColorInterface::DEEP_ORANGE_COLOR_VALUE_800);
        $this->assertEquals("#BF360C", DeepOrangeColorInterface::DEEP_ORANGE_COLOR_VALUE_900);
        $this->assertEquals("#FF9E80", DeepOrangeColorInterface::DEEP_ORANGE_COLOR_VALUE_A100);
        $this->assertEquals("#FF6E40", DeepOrangeColorInterface::DEEP_ORANGE_COLOR_VALUE_A200);
        $this->assertEquals("#FF3D00", DeepOrangeColorInterface::DEEP_ORANGE_COLOR_VALUE_A400);
        $this->assertEquals("#DD2C00", DeepOrangeColorInterface::DEEP_ORANGE_COLOR_VALUE_A700);
    }
}

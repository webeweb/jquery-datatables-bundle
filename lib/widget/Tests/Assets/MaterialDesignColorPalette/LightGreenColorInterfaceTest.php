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

use WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette\LightGreenColorInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;

/**
 * Light green color interface test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Assets\MaterialDesignColorPalette
 */
class LightGreenColorInterfaceTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("#F1F8E9", LightGreenColorInterface::LIGHT_GREEN_COLOR_VALUE_50);
        $this->assertEquals("#DCEDC8", LightGreenColorInterface::LIGHT_GREEN_COLOR_VALUE_100);
        $this->assertEquals("#C5E1A5", LightGreenColorInterface::LIGHT_GREEN_COLOR_VALUE_200);
        $this->assertEquals("#AED581", LightGreenColorInterface::LIGHT_GREEN_COLOR_VALUE_300);
        $this->assertEquals("#9CCC65", LightGreenColorInterface::LIGHT_GREEN_COLOR_VALUE_400);
        $this->assertEquals("#8BC34A", LightGreenColorInterface::LIGHT_GREEN_COLOR_VALUE_500);
        $this->assertEquals("#7CB342", LightGreenColorInterface::LIGHT_GREEN_COLOR_VALUE_600);
        $this->assertEquals("#689F38", LightGreenColorInterface::LIGHT_GREEN_COLOR_VALUE_700);
        $this->assertEquals("#558B2F", LightGreenColorInterface::LIGHT_GREEN_COLOR_VALUE_800);
        $this->assertEquals("#33691E", LightGreenColorInterface::LIGHT_GREEN_COLOR_VALUE_900);
        $this->assertEquals("#CCFF90", LightGreenColorInterface::LIGHT_GREEN_COLOR_VALUE_A100);
        $this->assertEquals("#B2FF59", LightGreenColorInterface::LIGHT_GREEN_COLOR_VALUE_A200);
        $this->assertEquals("#76FF03", LightGreenColorInterface::LIGHT_GREEN_COLOR_VALUE_A400);
        $this->assertEquals("#64DD17", LightGreenColorInterface::LIGHT_GREEN_COLOR_VALUE_A700);
    }
}

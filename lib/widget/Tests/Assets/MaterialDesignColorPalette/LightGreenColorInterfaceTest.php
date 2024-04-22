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

        $this->assertEquals("#f1f8e9", LightGreenColorInterface::LIGHT_GREEN_COLOR_VALUE_50);
        $this->assertEquals("#dcedc8", LightGreenColorInterface::LIGHT_GREEN_COLOR_VALUE_100);
        $this->assertEquals("#c5e1a5", LightGreenColorInterface::LIGHT_GREEN_COLOR_VALUE_200);
        $this->assertEquals("#aed581", LightGreenColorInterface::LIGHT_GREEN_COLOR_VALUE_300);
        $this->assertEquals("#9ccc65", LightGreenColorInterface::LIGHT_GREEN_COLOR_VALUE_400);
        $this->assertEquals("#8bc34a", LightGreenColorInterface::LIGHT_GREEN_COLOR_VALUE_500);
        $this->assertEquals("#7cb342", LightGreenColorInterface::LIGHT_GREEN_COLOR_VALUE_600);
        $this->assertEquals("#689f38", LightGreenColorInterface::LIGHT_GREEN_COLOR_VALUE_700);
        $this->assertEquals("#558b2f", LightGreenColorInterface::LIGHT_GREEN_COLOR_VALUE_800);
        $this->assertEquals("#33691e", LightGreenColorInterface::LIGHT_GREEN_COLOR_VALUE_900);
        $this->assertEquals("#ccff90", LightGreenColorInterface::LIGHT_GREEN_COLOR_VALUE_A100);
        $this->assertEquals("#b2ff59", LightGreenColorInterface::LIGHT_GREEN_COLOR_VALUE_A200);
        $this->assertEquals("#76ff03", LightGreenColorInterface::LIGHT_GREEN_COLOR_VALUE_A400);
        $this->assertEquals("#64dd17", LightGreenColorInterface::LIGHT_GREEN_COLOR_VALUE_A700);
    }
}

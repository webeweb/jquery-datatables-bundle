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

use WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette\LimeColorInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;

/**
 * Lime color interface test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Assets\MaterialDesignColorPalette
 */
class LimeColorInterfaceTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("#f9fbe7", LimeColorInterface::LIME_COLOR_VALUE_50);
        $this->assertEquals("#f0f4c3", LimeColorInterface::LIME_COLOR_VALUE_100);
        $this->assertEquals("#e6ee9c", LimeColorInterface::LIME_COLOR_VALUE_200);
        $this->assertEquals("#dce775", LimeColorInterface::LIME_COLOR_VALUE_300);
        $this->assertEquals("#d4e157", LimeColorInterface::LIME_COLOR_VALUE_400);
        $this->assertEquals("#cddc39", LimeColorInterface::LIME_COLOR_VALUE_500);
        $this->assertEquals("#c0ca33", LimeColorInterface::LIME_COLOR_VALUE_600);
        $this->assertEquals("#afb42b", LimeColorInterface::LIME_COLOR_VALUE_700);
        $this->assertEquals("#9e9d24", LimeColorInterface::LIME_COLOR_VALUE_800);
        $this->assertEquals("#827717", LimeColorInterface::LIME_COLOR_VALUE_900);
        $this->assertEquals("#f4ff81", LimeColorInterface::LIME_COLOR_VALUE_A100);
        $this->assertEquals("#eeff41", LimeColorInterface::LIME_COLOR_VALUE_A200);
        $this->assertEquals("#c6ff00", LimeColorInterface::LIME_COLOR_VALUE_A400);
        $this->assertEquals("#aeea00", LimeColorInterface::LIME_COLOR_VALUE_A700);
    }
}

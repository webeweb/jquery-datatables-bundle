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

        $this->assertEquals("#F9FBE7", LimeColorInterface::LIME_COLOR_50);
        $this->assertEquals("#F0F4C3", LimeColorInterface::LIME_COLOR_100);
        $this->assertEquals("#E6EE9C", LimeColorInterface::LIME_COLOR_200);
        $this->assertEquals("#DCE775", LimeColorInterface::LIME_COLOR_300);
        $this->assertEquals("#D4E157", LimeColorInterface::LIME_COLOR_400);
        $this->assertEquals("#CDDC39", LimeColorInterface::LIME_COLOR_500);
        $this->assertEquals("#C0CA33", LimeColorInterface::LIME_COLOR_600);
        $this->assertEquals("#AFB42B", LimeColorInterface::LIME_COLOR_700);
        $this->assertEquals("#9E9D24", LimeColorInterface::LIME_COLOR_800);
        $this->assertEquals("#827717", LimeColorInterface::LIME_COLOR_900);
        $this->assertEquals("#F4FF81", LimeColorInterface::LIME_COLOR_A100);
        $this->assertEquals("#EEFF41", LimeColorInterface::LIME_COLOR_A200);
        $this->assertEquals("#C6FF00", LimeColorInterface::LIME_COLOR_A400);
        $this->assertEquals("#AEEA00", LimeColorInterface::LIME_COLOR_A700);
    }
}

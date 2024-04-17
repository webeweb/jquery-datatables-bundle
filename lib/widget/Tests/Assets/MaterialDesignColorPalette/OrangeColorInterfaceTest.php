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

use WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette\OrangeColorInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;

/**
 * Orange color interface test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Assets\MaterialDesignColorPalette
 */
class OrangeColorInterfaceTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("#FFF3E0", OrangeColorInterface::ORANGE_COLOR_VALUE_50);
        $this->assertEquals("#FFE0B2", OrangeColorInterface::ORANGE_COLOR_VALUE_100);
        $this->assertEquals("#FFCC80", OrangeColorInterface::ORANGE_COLOR_VALUE_200);
        $this->assertEquals("#FFB74D", OrangeColorInterface::ORANGE_COLOR_VALUE_300);
        $this->assertEquals("#FFA726", OrangeColorInterface::ORANGE_COLOR_VALUE_400);
        $this->assertEquals("#FF9800", OrangeColorInterface::ORANGE_COLOR_VALUE_500);
        $this->assertEquals("#FB8C00", OrangeColorInterface::ORANGE_COLOR_VALUE_600);
        $this->assertEquals("#F57C00", OrangeColorInterface::ORANGE_COLOR_VALUE_700);
        $this->assertEquals("#EF6C00", OrangeColorInterface::ORANGE_COLOR_VALUE_800);
        $this->assertEquals("#E65100", OrangeColorInterface::ORANGE_COLOR_VALUE_900);
        $this->assertEquals("#FFD180", OrangeColorInterface::ORANGE_COLOR_VALUE_A100);
        $this->assertEquals("#FFAB40", OrangeColorInterface::ORANGE_COLOR_VALUE_A200);
        $this->assertEquals("#FF9100", OrangeColorInterface::ORANGE_COLOR_VALUE_A400);
        $this->assertEquals("#FF6D00", OrangeColorInterface::ORANGE_COLOR_VALUE_A700);
    }
}

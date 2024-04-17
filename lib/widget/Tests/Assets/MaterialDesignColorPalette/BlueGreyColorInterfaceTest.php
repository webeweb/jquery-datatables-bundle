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

use WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette\BlueGreyColorInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;

/**
 * Blue grey color interface test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Assets\MaterialDesignColorPalette
 */
class BlueGreyColorInterfaceTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("#ECEFF1", BlueGreyColorInterface::BLUE_GREY_COLOR_50);
        $this->assertEquals("#CFD8DC", BlueGreyColorInterface::BLUE_GREY_COLOR_100);
        $this->assertEquals("#B0BEC5", BlueGreyColorInterface::BLUE_GREY_COLOR_200);
        $this->assertEquals("#90A4AE", BlueGreyColorInterface::BLUE_GREY_COLOR_300);
        $this->assertEquals("#78909C", BlueGreyColorInterface::BLUE_GREY_COLOR_400);
        $this->assertEquals("#607D8B", BlueGreyColorInterface::BLUE_GREY_COLOR_500);
        $this->assertEquals("#546E7A", BlueGreyColorInterface::BLUE_GREY_COLOR_600);
        $this->assertEquals("#455A64", BlueGreyColorInterface::BLUE_GREY_COLOR_700);
        $this->assertEquals("#37474F", BlueGreyColorInterface::BLUE_GREY_COLOR_800);
        $this->assertEquals("#263238", BlueGreyColorInterface::BLUE_GREY_COLOR_900);
    }
}

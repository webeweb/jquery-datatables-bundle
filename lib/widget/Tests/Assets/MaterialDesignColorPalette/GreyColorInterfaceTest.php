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

use WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette\GreyColorInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;

/**
 * Grey color interface test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Assets\MaterialDesignColorPalette
 */
class GreyColorInterfaceTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("#FAFAFA", GreyColorInterface::GREY_COLOR_50);
        $this->assertEquals("#F5F5F5", GreyColorInterface::GREY_COLOR_100);
        $this->assertEquals("#EEEEEE", GreyColorInterface::GREY_COLOR_200);
        $this->assertEquals("#E0E0E0", GreyColorInterface::GREY_COLOR_300);
        $this->assertEquals("#BDBDBD", GreyColorInterface::GREY_COLOR_400);
        $this->assertEquals("#9E9E9E", GreyColorInterface::GREY_COLOR_500);
        $this->assertEquals("#757575", GreyColorInterface::GREY_COLOR_600);
        $this->assertEquals("#616161", GreyColorInterface::GREY_COLOR_700);
        $this->assertEquals("#424242", GreyColorInterface::GREY_COLOR_800);
        $this->assertEquals("#212121", GreyColorInterface::GREY_COLOR_900);
    }
}

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

use WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette\BlueColorInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;

/**
 * Blue color interface test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Assets\MaterialDesignColorPalette
 */
class BlueColorInterfaceTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("#E3F2FD", BlueColorInterface::BLUE_COLOR_VALUE_50);
        $this->assertEquals("#BBDEFB", BlueColorInterface::BLUE_COLOR_VALUE_100);
        $this->assertEquals("#90CAF9", BlueColorInterface::BLUE_COLOR_VALUE_200);
        $this->assertEquals("#64B5F6", BlueColorInterface::BLUE_COLOR_VALUE_300);
        $this->assertEquals("#42A5F5", BlueColorInterface::BLUE_COLOR_VALUE_400);
        $this->assertEquals("#2196F3", BlueColorInterface::BLUE_COLOR_VALUE_500);
        $this->assertEquals("#1E88E5", BlueColorInterface::BLUE_COLOR_VALUE_600);
        $this->assertEquals("#1976D2", BlueColorInterface::BLUE_COLOR_VALUE_700);
        $this->assertEquals("#1565C0", BlueColorInterface::BLUE_COLOR_VALUE_800);
        $this->assertEquals("#0D47A1", BlueColorInterface::BLUE_COLOR_VALUE_900);
        $this->assertEquals("#82B1FF", BlueColorInterface::BLUE_COLOR_VALUE_A100);
        $this->assertEquals("#448AFF", BlueColorInterface::BLUE_COLOR_VALUE_A200);
        $this->assertEquals("#2979FF", BlueColorInterface::BLUE_COLOR_VALUE_A400);
        $this->assertEquals("#2962FF", BlueColorInterface::BLUE_COLOR_VALUE_A700);
    }
}

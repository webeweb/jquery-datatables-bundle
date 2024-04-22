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

        $this->assertEquals("#e3f2fd", BlueColorInterface::BLUE_COLOR_VALUE_50);
        $this->assertEquals("#bbdefb", BlueColorInterface::BLUE_COLOR_VALUE_100);
        $this->assertEquals("#90caf9", BlueColorInterface::BLUE_COLOR_VALUE_200);
        $this->assertEquals("#64b5f6", BlueColorInterface::BLUE_COLOR_VALUE_300);
        $this->assertEquals("#42a5f5", BlueColorInterface::BLUE_COLOR_VALUE_400);
        $this->assertEquals("#2196f3", BlueColorInterface::BLUE_COLOR_VALUE_500);
        $this->assertEquals("#1e88e5", BlueColorInterface::BLUE_COLOR_VALUE_600);
        $this->assertEquals("#1976d2", BlueColorInterface::BLUE_COLOR_VALUE_700);
        $this->assertEquals("#1565c0", BlueColorInterface::BLUE_COLOR_VALUE_800);
        $this->assertEquals("#0d47a1", BlueColorInterface::BLUE_COLOR_VALUE_900);
        $this->assertEquals("#82b1ff", BlueColorInterface::BLUE_COLOR_VALUE_A100);
        $this->assertEquals("#448aff", BlueColorInterface::BLUE_COLOR_VALUE_A200);
        $this->assertEquals("#2979ff", BlueColorInterface::BLUE_COLOR_VALUE_A400);
        $this->assertEquals("#2962ff", BlueColorInterface::BLUE_COLOR_VALUE_A700);
    }
}

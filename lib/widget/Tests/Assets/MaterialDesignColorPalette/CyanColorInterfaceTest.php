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

use WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette\CyanColorInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;

/**
 * Cyan color interface test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Assets\MaterialDesignColorPalette
 */
class CyanColorInterfaceTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("#e0f7fa", CyanColorInterface::CYAN_COLOR_VALUE_50);
        $this->assertEquals("#b2ebf2", CyanColorInterface::CYAN_COLOR_VALUE_100);
        $this->assertEquals("#80deea", CyanColorInterface::CYAN_COLOR_VALUE_200);
        $this->assertEquals("#4dd0e1", CyanColorInterface::CYAN_COLOR_VALUE_300);
        $this->assertEquals("#26c6da", CyanColorInterface::CYAN_COLOR_VALUE_400);
        $this->assertEquals("#00bcd4", CyanColorInterface::CYAN_COLOR_VALUE_500);
        $this->assertEquals("#00acc1", CyanColorInterface::CYAN_COLOR_VALUE_600);
        $this->assertEquals("#0097a7", CyanColorInterface::CYAN_COLOR_VALUE_700);
        $this->assertEquals("#00838f", CyanColorInterface::CYAN_COLOR_VALUE_800);
        $this->assertEquals("#006064", CyanColorInterface::CYAN_COLOR_VALUE_900);
        $this->assertEquals("#84ffff", CyanColorInterface::CYAN_COLOR_VALUE_A100);
        $this->assertEquals("#18ffff", CyanColorInterface::CYAN_COLOR_VALUE_A200);
        $this->assertEquals("#00e5ff", CyanColorInterface::CYAN_COLOR_VALUE_A400);
        $this->assertEquals("#00b8d4", CyanColorInterface::CYAN_COLOR_VALUE_A700);
    }
}

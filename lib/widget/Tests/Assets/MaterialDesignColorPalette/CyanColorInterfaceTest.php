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

        $this->assertEquals("#E0F7FA", CyanColorInterface::CYAN_COLOR_VALUE_50);
        $this->assertEquals("#B2EBF2", CyanColorInterface::CYAN_COLOR_VALUE_100);
        $this->assertEquals("#80DEEA", CyanColorInterface::CYAN_COLOR_VALUE_200);
        $this->assertEquals("#4DD0E1", CyanColorInterface::CYAN_COLOR_VALUE_300);
        $this->assertEquals("#26C6DA", CyanColorInterface::CYAN_COLOR_VALUE_400);
        $this->assertEquals("#00BCD4", CyanColorInterface::CYAN_COLOR_VALUE_500);
        $this->assertEquals("#00ACC1", CyanColorInterface::CYAN_COLOR_VALUE_600);
        $this->assertEquals("#0097A7", CyanColorInterface::CYAN_COLOR_VALUE_700);
        $this->assertEquals("#00838F", CyanColorInterface::CYAN_COLOR_VALUE_800);
        $this->assertEquals("#006064", CyanColorInterface::CYAN_COLOR_VALUE_900);
        $this->assertEquals("#84FFFF", CyanColorInterface::CYAN_COLOR_VALUE_A100);
        $this->assertEquals("#18FFFF", CyanColorInterface::CYAN_COLOR_VALUE_A200);
        $this->assertEquals("#00E5FF", CyanColorInterface::CYAN_COLOR_VALUE_A400);
        $this->assertEquals("#00B8D4", CyanColorInterface::CYAN_COLOR_VALUE_A700);
    }
}

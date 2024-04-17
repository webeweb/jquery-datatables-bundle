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

use WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette\AmberColorInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;

/**
 * Amber color interface test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Assets\MaterialDesignColorPalette
 */
class AmberColorInterfaceTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("#FFF8E1", AmberColorInterface::AMBER_COLOR_50);
        $this->assertEquals("#FFECB3", AmberColorInterface::AMBER_COLOR_100);
        $this->assertEquals("#FFE082", AmberColorInterface::AMBER_COLOR_200);
        $this->assertEquals("#FFD54F", AmberColorInterface::AMBER_COLOR_300);
        $this->assertEquals("#FFCA28", AmberColorInterface::AMBER_COLOR_400);
        $this->assertEquals("#FFC107", AmberColorInterface::AMBER_COLOR_500);
        $this->assertEquals("#FFB300", AmberColorInterface::AMBER_COLOR_600);
        $this->assertEquals("#FFA000", AmberColorInterface::AMBER_COLOR_700);
        $this->assertEquals("#FF8F00", AmberColorInterface::AMBER_COLOR_800);
        $this->assertEquals("#FF6F00", AmberColorInterface::AMBER_COLOR_900);
        $this->assertEquals("#FFE57F", AmberColorInterface::AMBER_COLOR_A100);
        $this->assertEquals("#FFD740", AmberColorInterface::AMBER_COLOR_A200);
        $this->assertEquals("#FFC400", AmberColorInterface::AMBER_COLOR_A400);
        $this->assertEquals("#FFAB00", AmberColorInterface::AMBER_COLOR_A700);
    }
}

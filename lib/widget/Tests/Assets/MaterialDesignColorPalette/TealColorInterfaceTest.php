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

use WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette\TealColorInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;

/**
 * Teal color interface test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Assets\MaterialDesignColorPalette
 */
class TealColorInterfaceTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("#e0f2f1", TealColorInterface::TEAL_COLOR_VALUE_50);
        $this->assertEquals("#b2dfdb", TealColorInterface::TEAL_COLOR_VALUE_100);
        $this->assertEquals("#80cbc4", TealColorInterface::TEAL_COLOR_VALUE_200);
        $this->assertEquals("#4db6ac", TealColorInterface::TEAL_COLOR_VALUE_300);
        $this->assertEquals("#26a69a", TealColorInterface::TEAL_COLOR_VALUE_400);
        $this->assertEquals("#009688", TealColorInterface::TEAL_COLOR_VALUE_500);
        $this->assertEquals("#00897b", TealColorInterface::TEAL_COLOR_VALUE_600);
        $this->assertEquals("#00796b", TealColorInterface::TEAL_COLOR_VALUE_700);
        $this->assertEquals("#00695c", TealColorInterface::TEAL_COLOR_VALUE_800);
        $this->assertEquals("#004d40", TealColorInterface::TEAL_COLOR_VALUE_900);
        $this->assertEquals("#a7ffeb", TealColorInterface::TEAL_COLOR_VALUE_A100);
        $this->assertEquals("#64ffda", TealColorInterface::TEAL_COLOR_VALUE_A200);
        $this->assertEquals("#1de9b6", TealColorInterface::TEAL_COLOR_VALUE_A400);
        $this->assertEquals("#00bfa5", TealColorInterface::TEAL_COLOR_VALUE_A700);
    }
}

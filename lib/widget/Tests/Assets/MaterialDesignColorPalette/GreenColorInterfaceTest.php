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

use WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette\GreenColorInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;

/**
 * Green color interface test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Assets\MaterialDesignColorPalette
 */
class GreenColorInterfaceTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("#e8f5e9", GreenColorInterface::GREEN_COLOR_VALUE_50);
        $this->assertEquals("#c8e6c9", GreenColorInterface::GREEN_COLOR_VALUE_100);
        $this->assertEquals("#a5d6a7", GreenColorInterface::GREEN_COLOR_VALUE_200);
        $this->assertEquals("#81c784", GreenColorInterface::GREEN_COLOR_VALUE_300);
        $this->assertEquals("#66bb6a", GreenColorInterface::GREEN_COLOR_VALUE_400);
        $this->assertEquals("#4caf50", GreenColorInterface::GREEN_COLOR_VALUE_500);
        $this->assertEquals("#43a047", GreenColorInterface::GREEN_COLOR_VALUE_600);
        $this->assertEquals("#388e3c", GreenColorInterface::GREEN_COLOR_VALUE_700);
        $this->assertEquals("#2e7d32", GreenColorInterface::GREEN_COLOR_VALUE_800);
        $this->assertEquals("#1b5e20", GreenColorInterface::GREEN_COLOR_VALUE_900);
        $this->assertEquals("#b9f6ca", GreenColorInterface::GREEN_COLOR_VALUE_A100);
        $this->assertEquals("#69f0ae", GreenColorInterface::GREEN_COLOR_VALUE_A200);
        $this->assertEquals("#00e676", GreenColorInterface::GREEN_COLOR_VALUE_A400);
        $this->assertEquals("#00c853", GreenColorInterface::GREEN_COLOR_VALUE_A700);
    }
}

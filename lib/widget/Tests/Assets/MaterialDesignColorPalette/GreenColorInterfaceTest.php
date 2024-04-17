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

        $this->assertEquals("#E8F5E9", GreenColorInterface::GREEN_COLOR_VALUE_50);
        $this->assertEquals("#C8E6C9", GreenColorInterface::GREEN_COLOR_VALUE_100);
        $this->assertEquals("#A5D6A7", GreenColorInterface::GREEN_COLOR_VALUE_200);
        $this->assertEquals("#81C784", GreenColorInterface::GREEN_COLOR_VALUE_300);
        $this->assertEquals("#66BB6A", GreenColorInterface::GREEN_COLOR_VALUE_400);
        $this->assertEquals("#4CAF50", GreenColorInterface::GREEN_COLOR_VALUE_500);
        $this->assertEquals("#43A047", GreenColorInterface::GREEN_COLOR_VALUE_600);
        $this->assertEquals("#388E3C", GreenColorInterface::GREEN_COLOR_VALUE_700);
        $this->assertEquals("#2E7D32", GreenColorInterface::GREEN_COLOR_VALUE_800);
        $this->assertEquals("#1B5E20", GreenColorInterface::GREEN_COLOR_VALUE_900);
        $this->assertEquals("#B9F6CA", GreenColorInterface::GREEN_COLOR_VALUE_A100);
        $this->assertEquals("#69F0AE", GreenColorInterface::GREEN_COLOR_VALUE_A200);
        $this->assertEquals("#00E676", GreenColorInterface::GREEN_COLOR_VALUE_A400);
        $this->assertEquals("#00C853", GreenColorInterface::GREEN_COLOR_VALUE_A700);
    }
}

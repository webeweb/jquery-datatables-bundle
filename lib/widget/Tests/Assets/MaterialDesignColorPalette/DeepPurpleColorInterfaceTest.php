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

use WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette\DeepPurpleColorInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;

/**
 * Deep purple color interface test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Assets\MaterialDesignColorPalette
 */
class DeepPurpleColorInterfaceTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("#ede7f6", DeepPurpleColorInterface::DEEP_PURPLE_COLOR_VALUE_50);
        $this->assertEquals("#d1c4e9", DeepPurpleColorInterface::DEEP_PURPLE_COLOR_VALUE_100);
        $this->assertEquals("#b39ddb", DeepPurpleColorInterface::DEEP_PURPLE_COLOR_VALUE_200);
        $this->assertEquals("#9575cd", DeepPurpleColorInterface::DEEP_PURPLE_COLOR_VALUE_300);
        $this->assertEquals("#7e57c2", DeepPurpleColorInterface::DEEP_PURPLE_COLOR_VALUE_400);
        $this->assertEquals("#673ab7", DeepPurpleColorInterface::DEEP_PURPLE_COLOR_VALUE_500);
        $this->assertEquals("#5e35b1", DeepPurpleColorInterface::DEEP_PURPLE_COLOR_VALUE_600);
        $this->assertEquals("#512da8", DeepPurpleColorInterface::DEEP_PURPLE_COLOR_VALUE_700);
        $this->assertEquals("#4527a0", DeepPurpleColorInterface::DEEP_PURPLE_COLOR_VALUE_800);
        $this->assertEquals("#311b92", DeepPurpleColorInterface::DEEP_PURPLE_COLOR_VALUE_900);
        $this->assertEquals("#b388ff", DeepPurpleColorInterface::DEEP_PURPLE_COLOR_VALUE_A100);
        $this->assertEquals("#7c4dff", DeepPurpleColorInterface::DEEP_PURPLE_COLOR_VALUE_A200);
        $this->assertEquals("#651fff", DeepPurpleColorInterface::DEEP_PURPLE_COLOR_VALUE_A400);
        $this->assertEquals("#6200ea", DeepPurpleColorInterface::DEEP_PURPLE_COLOR_VALUE_A700);
    }
}

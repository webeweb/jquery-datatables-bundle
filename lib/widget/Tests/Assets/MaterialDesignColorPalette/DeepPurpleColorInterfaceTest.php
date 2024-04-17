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

        $this->assertEquals("#EDE7F6", DeepPurpleColorInterface::DEEP_PURPLE_COLOR_VALUE_50);
        $this->assertEquals("#D1C4E9", DeepPurpleColorInterface::DEEP_PURPLE_COLOR_VALUE_100);
        $this->assertEquals("#B39DDB", DeepPurpleColorInterface::DEEP_PURPLE_COLOR_VALUE_200);
        $this->assertEquals("#9575CD", DeepPurpleColorInterface::DEEP_PURPLE_COLOR_VALUE_300);
        $this->assertEquals("#7E57C2", DeepPurpleColorInterface::DEEP_PURPLE_COLOR_VALUE_400);
        $this->assertEquals("#673AB7", DeepPurpleColorInterface::DEEP_PURPLE_COLOR_VALUE_500);
        $this->assertEquals("#5E35B1", DeepPurpleColorInterface::DEEP_PURPLE_COLOR_VALUE_600);
        $this->assertEquals("#512DA8", DeepPurpleColorInterface::DEEP_PURPLE_COLOR_VALUE_700);
        $this->assertEquals("#4527A0", DeepPurpleColorInterface::DEEP_PURPLE_COLOR_VALUE_800);
        $this->assertEquals("#311B92", DeepPurpleColorInterface::DEEP_PURPLE_COLOR_VALUE_900);
        $this->assertEquals("#B388FF", DeepPurpleColorInterface::DEEP_PURPLE_COLOR_VALUE_A100);
        $this->assertEquals("#7C4DFF", DeepPurpleColorInterface::DEEP_PURPLE_COLOR_VALUE_A200);
        $this->assertEquals("#651FFF", DeepPurpleColorInterface::DEEP_PURPLE_COLOR_VALUE_A400);
        $this->assertEquals("#6200EA", DeepPurpleColorInterface::DEEP_PURPLE_COLOR_VALUE_A700);
    }
}

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

use WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette\BrownColorInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;

/**
 * Brown color interface test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Assets\MaterialDesignColorPalette
 */
class BrownColorInterfaceTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("#EFEBE9", BrownColorInterface::BROWN_COLOR_VALUE_50);
        $this->assertEquals("#D7CCC8", BrownColorInterface::BROWN_COLOR_VALUE_100);
        $this->assertEquals("#BCAAA4", BrownColorInterface::BROWN_COLOR_VALUE_200);
        $this->assertEquals("#A1887F", BrownColorInterface::BROWN_COLOR_VALUE_300);
        $this->assertEquals("#8D6E63", BrownColorInterface::BROWN_COLOR_VALUE_400);
        $this->assertEquals("#795548", BrownColorInterface::BROWN_COLOR_VALUE_500);
        $this->assertEquals("#6D4C41", BrownColorInterface::BROWN_COLOR_VALUE_600);
        $this->assertEquals("#5D4037", BrownColorInterface::BROWN_COLOR_VALUE_700);
        $this->assertEquals("#4E342E", BrownColorInterface::BROWN_COLOR_VALUE_800);
        $this->assertEquals("#3E2723", BrownColorInterface::BROWN_COLOR_VALUE_900);
    }
}

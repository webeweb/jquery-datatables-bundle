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

use WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette\IndigoColorInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;

/**
 * Indigo color interface test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Assets\MaterialDesignColorPalette
 */
class IndigoColorInterfaceTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("#e8eaf6", IndigoColorInterface::INDIGO_COLOR_VALUE_50);
        $this->assertEquals("#c5cae9", IndigoColorInterface::INDIGO_COLOR_VALUE_100);
        $this->assertEquals("#9fa8da", IndigoColorInterface::INDIGO_COLOR_VALUE_200);
        $this->assertEquals("#7986cb", IndigoColorInterface::INDIGO_COLOR_VALUE_300);
        $this->assertEquals("#5c6bc0", IndigoColorInterface::INDIGO_COLOR_VALUE_400);
        $this->assertEquals("#3f51b5", IndigoColorInterface::INDIGO_COLOR_VALUE_500);
        $this->assertEquals("#3949ab", IndigoColorInterface::INDIGO_COLOR_VALUE_600);
        $this->assertEquals("#303f9f", IndigoColorInterface::INDIGO_COLOR_VALUE_700);
        $this->assertEquals("#283593", IndigoColorInterface::INDIGO_COLOR_VALUE_800);
        $this->assertEquals("#1a237e", IndigoColorInterface::INDIGO_COLOR_VALUE_900);
        $this->assertEquals("#8c9eff", IndigoColorInterface::INDIGO_COLOR_VALUE_A100);
        $this->assertEquals("#536dfe", IndigoColorInterface::INDIGO_COLOR_VALUE_A200);
        $this->assertEquals("#3d5afe", IndigoColorInterface::INDIGO_COLOR_VALUE_A400);
        $this->assertEquals("#304ffe", IndigoColorInterface::INDIGO_COLOR_VALUE_A700);
    }
}

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

        $this->assertEquals("#E8EAF6", IndigoColorInterface::INDIGO_COLOR_VALUE_50);
        $this->assertEquals("#C5CAE9", IndigoColorInterface::INDIGO_COLOR_VALUE_100);
        $this->assertEquals("#9FA8DA", IndigoColorInterface::INDIGO_COLOR_VALUE_200);
        $this->assertEquals("#7986CB", IndigoColorInterface::INDIGO_COLOR_VALUE_300);
        $this->assertEquals("#5C6BC0", IndigoColorInterface::INDIGO_COLOR_VALUE_400);
        $this->assertEquals("#3F51B5", IndigoColorInterface::INDIGO_COLOR_VALUE_500);
        $this->assertEquals("#3949AB", IndigoColorInterface::INDIGO_COLOR_VALUE_600);
        $this->assertEquals("#303F9F", IndigoColorInterface::INDIGO_COLOR_VALUE_700);
        $this->assertEquals("#283593", IndigoColorInterface::INDIGO_COLOR_VALUE_800);
        $this->assertEquals("#1A237E", IndigoColorInterface::INDIGO_COLOR_VALUE_900);
        $this->assertEquals("#8C9EFF", IndigoColorInterface::INDIGO_COLOR_VALUE_A100);
        $this->assertEquals("#536DFE", IndigoColorInterface::INDIGO_COLOR_VALUE_A200);
        $this->assertEquals("#3D5AFE", IndigoColorInterface::INDIGO_COLOR_VALUE_A400);
        $this->assertEquals("#304FFE", IndigoColorInterface::INDIGO_COLOR_VALUE_A700);
    }
}

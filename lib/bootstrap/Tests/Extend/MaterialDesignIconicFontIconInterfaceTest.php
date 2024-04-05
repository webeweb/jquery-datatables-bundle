<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\BootstrapBundle\Tests\Extend;

use WBW\Bundle\BootstrapBundle\Extend\MaterialDesignIconicFontIconInterface;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;

/**
 * Material design iconic font icon interface test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Extend
 */
class MaterialDesignIconicFontIconInterfaceTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("border", MaterialDesignIconicFontIconInterface::MATERIAL_DESIGN_ICONIC_FONT_BORDER);
        $this->assertEquals("border-circle", MaterialDesignIconicFontIconInterface::MATERIAL_DESIGN_ICONIC_FONT_BORDER_CIRCLE);

        $this->assertEquals("horizontal", MaterialDesignIconicFontIconInterface::MATERIAL_DESIGN_ICONIC_FONT_FLIP_HORIZONTAL);
        $this->assertEquals("vertical", MaterialDesignIconicFontIconInterface::MATERIAL_DESIGN_ICONIC_FONT_FLIP_VERTICAL);

        $this->assertEquals("left", MaterialDesignIconicFontIconInterface::MATERIAL_DESIGN_ICONIC_FONT_PULL_LEFT);
        $this->assertEquals("right", MaterialDesignIconicFontIconInterface::MATERIAL_DESIGN_ICONIC_FONT_PULL_RIGHT);

        $this->assertEquals("90", MaterialDesignIconicFontIconInterface::MATERIAL_DESIGN_ICONIC_FONT_ROTATE_90);
        $this->assertEquals("180", MaterialDesignIconicFontIconInterface::MATERIAL_DESIGN_ICONIC_FONT_ROTATE_180);
        $this->assertEquals("270", MaterialDesignIconicFontIconInterface::MATERIAL_DESIGN_ICONIC_FONT_ROTATE_270);

        $this->assertEquals("2x", MaterialDesignIconicFontIconInterface::MATERIAL_DESIGN_ICONIC_FONT_SIZE_2X);
        $this->assertEquals("3x", MaterialDesignIconicFontIconInterface::MATERIAL_DESIGN_ICONIC_FONT_SIZE_3X);
        $this->assertEquals("4x", MaterialDesignIconicFontIconInterface::MATERIAL_DESIGN_ICONIC_FONT_SIZE_4X);
        $this->assertEquals("5x", MaterialDesignIconicFontIconInterface::MATERIAL_DESIGN_ICONIC_FONT_SIZE_5X);
        $this->assertEquals("lg", MaterialDesignIconicFontIconInterface::MATERIAL_DESIGN_ICONIC_FONT_SIZE_LG);

        $this->assertEquals("spin", MaterialDesignIconicFontIconInterface::MATERIAL_DESIGN_ICONIC_FONT_SPIN);
        $this->assertEquals("spin-reverse", MaterialDesignIconicFontIconInterface::MATERIAL_DESIGN_ICONIC_FONT_SPIN_REVERSE);
    }
}

<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette;

use WBW\Bundle\WidgetBundle\Component\AbstractColor;

/**
 * Cyan color.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette
 */
class CyanColor extends AbstractColor implements CyanColorInterface {

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct(self::CYAN_COLOR_NAME);
    }

    /**
     * {@inheritDoc}
     */
    public function getValues(): array {

        return [
            self::COLOR_VALUE_50   => self::CYAN_COLOR_VALUE_50,
            self::COLOR_VALUE_100  => self::CYAN_COLOR_VALUE_100,
            self::COLOR_VALUE_200  => self::CYAN_COLOR_VALUE_200,
            self::COLOR_VALUE_300  => self::CYAN_COLOR_VALUE_300,
            self::COLOR_VALUE_400  => self::CYAN_COLOR_VALUE_400,
            self::COLOR_VALUE_500  => self::CYAN_COLOR_VALUE_500,
            self::COLOR_VALUE_600  => self::CYAN_COLOR_VALUE_600,
            self::COLOR_VALUE_700  => self::CYAN_COLOR_VALUE_700,
            self::COLOR_VALUE_A100 => self::CYAN_COLOR_VALUE_A100,
            self::COLOR_VALUE_A200 => self::CYAN_COLOR_VALUE_A200,
            self::COLOR_VALUE_A400 => self::CYAN_COLOR_VALUE_A400,
            self::COLOR_VALUE_A700 => self::CYAN_COLOR_VALUE_A700,
        ];
    }
}

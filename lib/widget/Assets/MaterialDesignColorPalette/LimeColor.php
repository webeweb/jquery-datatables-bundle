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
 * Lime color.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette
 */
class LimeColor extends AbstractColor implements LimeColorInterface {

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct(self::LIME_COLOR_NAME);
    }

    /**
     * {@inheritDoc}
     */
    public function getValues(): array {

        return [
            self::COLOR_VALUE_50   => self::LIME_COLOR_VALUE_50,
            self::COLOR_VALUE_100  => self::LIME_COLOR_VALUE_100,
            self::COLOR_VALUE_200  => self::LIME_COLOR_VALUE_200,
            self::COLOR_VALUE_300  => self::LIME_COLOR_VALUE_300,
            self::COLOR_VALUE_400  => self::LIME_COLOR_VALUE_400,
            self::COLOR_VALUE_500  => self::LIME_COLOR_VALUE_500,
            self::COLOR_VALUE_600  => self::LIME_COLOR_VALUE_600,
            self::COLOR_VALUE_700  => self::LIME_COLOR_VALUE_700,
            self::COLOR_VALUE_A100 => self::LIME_COLOR_VALUE_A100,
            self::COLOR_VALUE_A200 => self::LIME_COLOR_VALUE_A200,
            self::COLOR_VALUE_A400 => self::LIME_COLOR_VALUE_A400,
            self::COLOR_VALUE_A700 => self::LIME_COLOR_VALUE_A700,
        ];
    }
}

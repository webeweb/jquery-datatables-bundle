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
 * Blue  grey color.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette
 */
class BlueGreyColor extends AbstractColor implements BlueGreyColorInterface {

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct(self::BLUE_GREY_COLOR_NAME);
    }

    /**
     * {@inheritDoc}
     */
    public function getValues(): array {

        return [
            self::COLOR_VALUE_50  => self::BLUE_GREY_COLOR_VALUE_50,
            self::COLOR_VALUE_100 => self::BLUE_GREY_COLOR_VALUE_100,
            self::COLOR_VALUE_200 => self::BLUE_GREY_COLOR_VALUE_200,
            self::COLOR_VALUE_300 => self::BLUE_GREY_COLOR_VALUE_300,
            self::COLOR_VALUE_400 => self::BLUE_GREY_COLOR_VALUE_400,
            self::COLOR_VALUE_500 => self::BLUE_GREY_COLOR_VALUE_500,
            self::COLOR_VALUE_600 => self::BLUE_GREY_COLOR_VALUE_600,
            self::COLOR_VALUE_700 => self::BLUE_GREY_COLOR_VALUE_700,
        ];
    }
}
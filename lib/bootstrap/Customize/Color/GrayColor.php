<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\BootstrapBundle\Customize\Color;

use WBW\Bundle\WidgetBundle\Component\AbstractColor;

/**
 * Gray color.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Customize\Color
 */
class GrayColor extends AbstractColor implements GrayColorInterface {

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct(self::GREY_COLOR_NAME);
    }

    /**
     * {@inheritDoc}
     */
    public function getValues(): array {

        return [
            self::COLOR_VALUE_100 => self::GRAY_COLOR_VALUE_100,
            self::COLOR_VALUE_200 => self::GRAY_COLOR_VALUE_200,
            self::COLOR_VALUE_300 => self::GRAY_COLOR_VALUE_300,
            self::COLOR_VALUE_400 => self::GRAY_COLOR_VALUE_400,
            self::COLOR_VALUE_500 => self::GRAY_COLOR_VALUE_500,
            self::COLOR_VALUE_600 => self::GRAY_COLOR_VALUE_600,
            self::COLOR_VALUE_700 => self::GRAY_COLOR_VALUE_700,
            self::COLOR_VALUE_800 => self::GRAY_COLOR_VALUE_800,
            self::COLOR_VALUE_900 => self::GRAY_COLOR_VALUE_900,
        ];
    }
}

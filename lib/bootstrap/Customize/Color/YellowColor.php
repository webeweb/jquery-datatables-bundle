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

use WBW\Library\Widget\Component\AbstractColor;

/**
 * Yellow color.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Customize\Color
 */
class YellowColor extends AbstractColor implements YellowColorInterface {

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct(self::YELLOW_COLOR_NAME);
    }

    /**
     * {@inheritDoc}
     */
    public function getValues(): array {

        return [
            self::COLOR_VALUE_100 => self::YELLOW_COLOR_VALUE_100,
            self::COLOR_VALUE_200 => self::YELLOW_COLOR_VALUE_200,
            self::COLOR_VALUE_300 => self::YELLOW_COLOR_VALUE_300,
            self::COLOR_VALUE_400 => self::YELLOW_COLOR_VALUE_400,
            self::COLOR_VALUE_500 => self::YELLOW_COLOR_VALUE_500,
            self::COLOR_VALUE_600 => self::YELLOW_COLOR_VALUE_600,
            self::COLOR_VALUE_700 => self::YELLOW_COLOR_VALUE_700,
            self::COLOR_VALUE_800 => self::YELLOW_COLOR_VALUE_800,
            self::COLOR_VALUE_900 => self::YELLOW_COLOR_VALUE_900,
        ];
    }
}

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
 * White color.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette
 */
class WhiteColor extends AbstractColor implements WhiteColorInterface {

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct(self::WHITE_COLOR_NAME);
    }

    /**
     * {@inheritDoc}
     */
    public function getValues(): array {

        return [
            self::COLOR_VALUE_500 => self::WHITE_COLOR_VALUE_500,
        ];
    }
}

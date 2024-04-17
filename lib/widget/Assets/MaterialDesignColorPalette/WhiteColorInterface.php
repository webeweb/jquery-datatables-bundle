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

use WBW\Bundle\WidgetBundle\Component\Color\WhiteColorInterface as BaseWhiteColorInterface;

/**
 * White color interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette
 */
interface WhiteColorInterface extends BaseWhiteColorInterface {

    /**
     * White color value "500"
     *
     * @var string
     */
    public const WHITE_COLOR_VALUE_500 = "#FFFFFF";
}

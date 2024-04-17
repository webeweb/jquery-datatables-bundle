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

namespace WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette;

use WBW\Bundle\WidgetBundle\Component\Color\GreyColorInterface as BaseGreyColorInterface;

/**
 * Grey color interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette
 */
interface GreyColorInterface extends BaseGreyColorInterface {

    /**
     * Grey color value "100"
     *
     * @var string
     */
    public const GREY_COLOR_VALUE_100 = "#F5F5F5";

    /**
     * Grey color value "200"
     *
     * @var string
     */
    public const GREY_COLOR_VALUE_200 = "#EEEEEE";

    /**
     * Grey color value "300"
     *
     * @var string
     */
    public const GREY_COLOR_VALUE_300 = "#E0E0E0";

    /**
     * Grey color value "400"
     *
     * @var string
     */
    public const GREY_COLOR_VALUE_400 = "#BDBDBD";

    /**
     * Grey color value "50"
     *
     * @var string
     */
    public const GREY_COLOR_VALUE_50 = "#FAFAFA";

    /**
     * Grey color value "500"
     *
     * @var string
     */
    public const GREY_COLOR_VALUE_500 = "#9E9E9E";

    /**
     * Grey color value "600"
     *
     * @var string
     */
    public const GREY_COLOR_VALUE_600 = "#757575";

    /**
     * Grey color value "700"
     *
     * @var string
     */
    public const GREY_COLOR_VALUE_700 = "#616161";

    /**
     * Grey color value "800"
     *
     * @var string
     */
    public const GREY_COLOR_VALUE_800 = "#424242";

    /**
     * Grey color value "900"
     *
     * @var string
     */
    public const GREY_COLOR_VALUE_900 = "#212121";
}
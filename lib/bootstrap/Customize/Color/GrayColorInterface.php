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

use WBW\Library\Widget\Component\Color\GreyColorInterface as BaseGrayColorInterface;

/**
 * Gray color interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Customize\Color
 */
interface GrayColorInterface extends BaseGrayColorInterface {

    /**
     * Gray color value "100".
     *
     * @var string
     */
    public const GRAY_COLOR_VALUE_100 = "#f8f9fa";

    /**
     * Gray color value "200".
     *
     * @var string
     */
    public const GRAY_COLOR_VALUE_200 = "#e9ecef";

    /**
     * Gray color value "300".
     *
     * @var string
     */
    public const GRAY_COLOR_VALUE_300 = "#dee2e6";

    /**
     * Gray color value "400".
     *
     * @var string
     */
    public const GRAY_COLOR_VALUE_400 = "#ced4da";

    /**
     * Gray color value "500".
     *
     * @var string
     */
    public const GRAY_COLOR_VALUE_500 = "#adb5bd";

    /**
     * Gray color value "600".
     *
     * @var string
     */
    public const GRAY_COLOR_VALUE_600 = "#6c757d";

    /**
     * Gray color value "700".
     *
     * @var string
     */
    public const GRAY_COLOR_VALUE_700 = "#495057";

    /**
     * Gray color value "800".
     *
     * @var string
     */
    public const GRAY_COLOR_VALUE_800 = "#343a40";

    /**
     * Gray color value "900".
     *
     * @var string
     */
    public const GRAY_COLOR_VALUE_900 = "#212529";
}

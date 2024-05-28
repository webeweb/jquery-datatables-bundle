<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\BootstrapBundle\Customize\Color;

use WBW\Library\Widget\Component\Color\RedColorInterface as BaseRedColorInterface;

/**
 * Red color interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Customize\Color
 */
interface RedColorInterface extends BaseRedColorInterface {

    /**
     * Red color value "100".
     *
     * @var string
     */
    public const RED_COLOR_VALUE_100 = "#f8d7da";

    /**
     * Red color value "200".
     *
     * @var string
     */
    public const RED_COLOR_VALUE_200 = "#f1aeb5";

    /**
     * Red color value "300".
     *
     * @var string
     */
    public const RED_COLOR_VALUE_300 = "#ea868f";

    /**
     * Red color value "400".
     *
     * @var string
     */
    public const RED_COLOR_VALUE_400 = "#e35d6a";

    /**
     * Red color value "500".
     *
     * @var string
     */
    public const RED_COLOR_VALUE_500 = "#dc3545";

    /**
     * Red color value "600".
     *
     * @var string
     */
    public const RED_COLOR_VALUE_600 = "#b02a37";

    /**
     * Red color value "700".
     *
     * @var string
     */
    public const RED_COLOR_VALUE_700 = "#842029";

    /**
     * Red color value "800".
     *
     * @var string
     */
    public const RED_COLOR_VALUE_800 = "#58151c";

    /**
     * Red color value "900".
     *
     * @var string
     */
    public const RED_COLOR_VALUE_900 = "#2c0b0e";
}

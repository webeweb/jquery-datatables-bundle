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

use WBW\Library\Widget\Component\Color\IndigoColorInterface as BaseIndigoColorInterface;

/**
 * Indigo color interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Customize\Color
 */
interface IndigoColorInterface extends BaseIndigoColorInterface {

    /**
     * Indigo color value "100".
     *
     * @var string
     */
    public const INDIGO_COLOR_VALUE_100 = "#e0cffc";

    /**
     * Indigo color value "200".
     *
     * @var string
     */
    public const INDIGO_COLOR_VALUE_200 = "#c29ffa";

    /**
     * Indigo color value "300".
     *
     * @var string
     */
    public const INDIGO_COLOR_VALUE_300 = "#a370f7";

    /**
     * Indigo color value "400".
     *
     * @var string
     */
    public const INDIGO_COLOR_VALUE_400 = "#8540f5";

    /**
     * Indigo color value "500".
     *
     * @var string
     */
    public const INDIGO_COLOR_VALUE_500 = "#6610f2";

    /**
     * Indigo color value "600".
     *
     * @var string
     */
    public const INDIGO_COLOR_VALUE_600 = "#520dc2";

    /**
     * Indigo color value "700".
     *
     * @var string
     */
    public const INDIGO_COLOR_VALUE_700 = "#3d0a91";

    /**
     * Indigo color value "800".
     *
     * @var string
     */
    public const INDIGO_COLOR_VALUE_800 = "#290661";

    /**
     * Indigo color value "900".
     *
     * @var string
     */
    public const INDIGO_COLOR_VALUE_900 = "#140330";
}

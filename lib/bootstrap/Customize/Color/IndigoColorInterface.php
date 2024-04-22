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

use WBW\Bundle\WidgetBundle\Component\Color\IndigoColorInterface as BaseIndigoColorInterface;

/**
 * Indigo color interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Customize\Color
 */
interface IndigoColorInterface extends BaseIndigoColorInterface {

    /**
     * Indigo color "100".
     *
     * @var string
     */
    public const INDIGO_COLOR_VALUE_100 = "#e0cffc";

    /**
     * Indigo color "200".
     *
     * @var string
     */
    public const INDIGO_COLOR_VALUE_200 = "#c29ffa";

    /**
     * Indigo color "300".
     *
     * @var string
     */
    public const INDIGO_COLOR_VALUE_300 = "#a370f7";

    /**
     * Indigo color "400".
     *
     * @var string
     */
    public const INDIGO_COLOR_VALUE_400 = "#8540f5";

    /**
     * Indigo color "500".
     *
     * @var string
     */
    public const INDIGO_COLOR_VALUE_500 = "#6610f2";

    /**
     * Indigo color "600".
     *
     * @var string
     */
    public const INDIGO_COLOR_VALUE_600 = "#520dc2";

    /**
     * Indigo color "700".
     *
     * @var string
     */
    public const INDIGO_COLOR_VALUE_700 = "#3d0a91";

    /**
     * Indigo color "800".
     *
     * @var string
     */
    public const INDIGO_COLOR_VALUE_800 = "#290661";

    /**
     * Indigo color "900".
     *
     * @var string
     */
    public const INDIGO_COLOR_VALUE_900 = "#140330";
}

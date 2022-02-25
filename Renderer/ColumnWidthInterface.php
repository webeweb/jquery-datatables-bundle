<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Renderer;

/**
 * Column width interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Renderer
 */
interface ColumnWidthInterface {

    /**
     * Column width "actions".
     *
     * @var string
     */
    const COLUMN_WIDTH_ACTIONS = self::COLUMN_WIDTH_L;

    /**
     * Column width "date".
     *
     * @var string
     */
    const COLUMN_WIDTH_DATE = self::COLUMN_WIDTH_M;

    /**
     * Column width "icon".
     *
     * @var string
     */
    const COLUMN_WIDTH_ICON = self::COLUMN_WIDTH_XXS;

    /**
     * Column width "L".
     *
     * @var string
     */
    const COLUMN_WIDTH_L = "160px";

    /**
     * Column width "label".
     *
     * @var string
     */
    const COLUMN_WIDTH_LABEL = self::COLUMN_WIDTH_L;

    /**
     * Column width "M".
     *
     * @var string
     */
    const COLUMN_WIDTH_M = "120px";

    /**
     * Column width "S".
     *
     * @var string
     */
    const COLUMN_WIDTH_S = "80px";

    /**
     * Column width "thumbnail".
     *
     * @var string
     */
    const COLUMN_WIDTH_THUMBNAIL = self::COLUMN_WIDTH_S;

    /**
     * Column width "unit".
     *
     * @var string
     */
    const COLUMN_WIDTH_UNIT = self::COLUMN_WIDTH_XS;

    /**
     * Column width "XL".
     *
     * @var string
     */
    const COLUMN_WIDTH_XL = "200px";

    /**
     * Column width "XS".
     *
     * @var string
     */
    const COLUMN_WIDTH_XS = "40px";

    /**
     * Column width "XXL".
     *
     * @var string
     */
    const COLUMN_WIDTH_XXL = "240px";

    /**
     * Column width "XXS".
     *
     * @var string
     */
    const COLUMN_WIDTH_XXS = "20px";

    /**
     * Column width "XXXL".
     *
     * @var string
     */
    const COLUMN_WIDTH_XXXL = "280px";
}

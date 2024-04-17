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

namespace WBW\Bundle\WidgetBundle\Component\Color;

use WBW\Bundle\WidgetBundle\Component\ColorInterface;

/**
 * Grey color interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Component\Color
 */
interface GreyColorInterface extends ColorInterface {

    /**
     * Grey color name.
     *
     * @var string
     */
    public const GREY_COLOR_NAME = "grey";
}
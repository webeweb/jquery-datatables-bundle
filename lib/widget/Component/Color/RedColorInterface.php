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
 * Red color interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Component\Color
 */
interface RedColorInterface extends ColorInterface {

    /**
     * Red color name.
     *
     * @var string
     */
    public const RED_COLOR_NAME = "red";
}
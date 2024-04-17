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

namespace WBW\Bundle\WidgetBundle\Component\Color;

use WBW\Bundle\WidgetBundle\Component\ColorInterface;

/**
 * White color interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Component\Color
 */
interface WhiteColorInterface extends ColorInterface {

    /**
     * White color name.
     *
     * @var string
     */
    public const WHITE_COLOR_NAME = "white";
}

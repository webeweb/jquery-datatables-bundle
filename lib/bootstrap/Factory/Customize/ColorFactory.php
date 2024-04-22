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

namespace WBW\Bundle\BootstrapBundle\Factory\Customize;

use WBW\Bundle\BootstrapBundle\Customize\Color\BlueColor;
use WBW\Bundle\BootstrapBundle\Customize\Color\CyanColor;
use WBW\Bundle\BootstrapBundle\Customize\Color\GrayColor;
use WBW\Bundle\BootstrapBundle\Customize\Color\GreenColor;
use WBW\Bundle\BootstrapBundle\Customize\Color\IndigoColor;
use WBW\Bundle\BootstrapBundle\Customize\Color\OrangeColor;
use WBW\Bundle\BootstrapBundle\Customize\Color\PinkColor;
use WBW\Bundle\BootstrapBundle\Customize\Color\PurpleColor;
use WBW\Bundle\BootstrapBundle\Customize\Color\RedColor;
use WBW\Bundle\BootstrapBundle\Customize\Color\TealColor;
use WBW\Bundle\BootstrapBundle\Customize\Color\YellowColor;
use WBW\Bundle\WidgetBundle\Component\Color\BlackColor;
use WBW\Bundle\WidgetBundle\Component\Color\WhiteColor;
use WBW\Bundle\WidgetBundle\Component\ColorInterface;

/**
 * Color factory.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Factory\Customize
 */
class ColorFactory {

    /**
     * Create a Material Design color palette.
     * *
     * * @return ColorInterface[] Returns the colors.
     */
    public static function newBootstrapPalette(): array {

        return [
            new BlueColor(),
            new IndigoColor(),
            new PurpleColor(),
            new PinkColor(),
            new RedColor(),
            new OrangeColor(),
            new YellowColor(),
            new GreenColor(),
            new TealColor(),
            new CyanColor(),
            new GrayColor(),
            new BlackColor(),
            new WhiteColor(),
        ];
    }
}

<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\WidgetBundle\Factory;

use WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette\AmberColor;
use WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette\BlackColor;
use WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette\BlueColor;
use WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette\BlueGreyColor;
use WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette\BrownColor;
use WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette\CyanColor;
use WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette\DeepOrangeColor;
use WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette\DeepPurpleColor;
use WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette\GreenColor;
use WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette\GreyColor;
use WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette\IndigoColor;
use WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette\LightBlueColor;
use WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette\LightGreenColor;
use WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette\LimeColor;
use WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette\OrangeColor;
use WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette\PinkColor;
use WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette\PurpleColor;
use WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette\RedColor;
use WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette\TealColor;
use WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette\WhiteColor;
use WBW\Bundle\WidgetBundle\Assets\MaterialDesignColorPalette\YellowColor;
use WBW\Bundle\WidgetBundle\Component\ColorInterface;

/**
 * Color factory.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Factory
 */
class ColorFactory {

    /**
     * Create a Material Design color palette.
     *
     * @return ColorInterface[] Returns the colors.
     */
    public static function newMaterialDesignColorPalette(): array {

        return [
            new RedColor(),
            new PinkColor(),
            new PurpleColor(),
            new DeepPurpleColor(),
            new IndigoColor(),
            new BlueColor(),
            new LightBlueColor(),
            new CyanColor(),
            new TealColor(),
            new GreenColor(),
            new LightGreenColor(),
            new LimeColor(),
            new YellowColor(),
            new AmberColor(),
            new OrangeColor(),
            new DeepOrangeColor(),
            new BrownColor(),
            new GreyColor(),
            new BlueGreyColor(),
            new BlackColor(),
            new WhiteColor(),
        ];
    }
}

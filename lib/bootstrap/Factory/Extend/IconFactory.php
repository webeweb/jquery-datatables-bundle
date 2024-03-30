<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\BootstrapBundle\Factory\Extend;

use WBW\Bundle\BootstrapBundle\Extend\FontAwesomeIcon;
use WBW\Bundle\BootstrapBundle\Extend\FontAwesomeIconInterface;
use WBW\Bundle\BootstrapBundle\Extend\MaterialDesignIconicFontIcon;
use WBW\Bundle\BootstrapBundle\Extend\MaterialDesignIconicFontIconInterface;
use WBW\Library\Types\Helper\ArrayHelper;

/**
 * Icon factory.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Factory
 */
class IconFactory {

    /**
     * Create a Font Awesome icon.
     *
     * @return FontAwesomeIconInterface Returns the Font Awesome icon.
     */
    public static function newFontAwesomeIcon(): FontAwesomeIconInterface {
        return new FontAwesomeIcon();
    }

    /**
     * Create a Material Design Iconic Font icon.
     *
     * @return MaterialDesignIconicFontIconInterface Returns the Material Design Iconic Font icon.
     */
    public static function newMaterialDesignIconicFontIcon(): MaterialDesignIconicFontIconInterface {
        return new MaterialDesignIconicFontIcon();
    }

    /**
     * Parse a Font Awesome icon.
     *
     * @param array<string,mixed> $args The arguments.
     * @return FontAwesomeIconInterface Returns the parsed Font Awesome icon.
     */
    public static function parseFontAwesomeIcon(array $args): FontAwesomeIconInterface {

        $icon = static::newFontAwesomeIcon();

        $icon->setName(ArrayHelper::get($args, "name", "home"));
        $icon->setStyle(ArrayHelper::get($args, "style"));

        $icon->setAnimation(ArrayHelper::get($args, "animation"));
        $icon->setBordered(ArrayHelper::get($args, "bordered", false));
        $icon->setFixedWidth(ArrayHelper::get($args, "fixedWidth", false));
        $icon->setFont(ArrayHelper::get($args, "font"));
        $icon->setPull(ArrayHelper::get($args, "pull"));
        $icon->setSize(ArrayHelper::get($args, "size"));

        return $icon;
    }

    /**
     * Parse a Material Design Iconic Font icon.
     *
     * @param array<string,mixed> $args The arguments.
     * @return MaterialDesignIconicFontIconInterface Returns the parsed Material Design Iconic Font icon.
     */
    public static function parseMaterialDesignIconicFontIcon(array $args): MaterialDesignIconicFontIconInterface {

        $icon = static::newMaterialDesignIconicFontIcon();

        $icon->setName(ArrayHelper::get($args, "name", "home"));
        $icon->setStyle(ArrayHelper::get($args, "style"));

        $icon->setBorder(ArrayHelper::get($args, "border"));
        $icon->setFixedWidth(ArrayHelper::get($args, "fixedWidth", false));
        $icon->setFlip(ArrayHelper::get($args, "flip"));
        $icon->setPull(ArrayHelper::get($args, "pull"));
        $icon->setRotate(ArrayHelper::get($args, "rotate"));
        $icon->setSize(ArrayHelper::get($args, "size"));
        $icon->setSpin(ArrayHelper::get($args, "spin"));

        return $icon;
    }
}

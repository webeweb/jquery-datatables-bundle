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

namespace WBW\Bundle\CommonBundle\Assets\Icon;

use WBW\Library\Symfony\Assets\IconInterface;

/**
 * Font Awesome icon interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Assets\Icon
 */
interface FontAwesomeIconInterface extends IconInterface {

    /**
     * Font Awesome animation "pulse".
     *
     * @var string
     */
    public const FONT_AWESOME_ANIMATION_PULSE = "pulse";

    /**
     * Font Awesome animation "spin".
     *
     * @var string
     */
    public const FONT_AWESOME_ANIMATION_SPIN = "spin";

    /**
     * Font Awesome font "default".
     *
     * @var string
     */
    public const FONT_AWESOME_FONT = "";

    /**
     * Font Awesome font "bold".
     *
     * @var string
     */
    public const FONT_AWESOME_FONT_BOLD = "b";

    /**
     * Font Awesome font "duotone".
     *
     * @var string
     */
    public const FONT_AWESOME_FONT_DUOTONE = "d";

    /**
     * Font Awesome font "light".
     *
     * @var string
     */
    public const FONT_AWESOME_FONT_LIGHT = "l";

    /**
     * Font Awesome font "regular".
     *
     * @var string
     */
    public const FONT_AWESOME_FONT_REGULAR = "r";

    /**
     * Font Awesome font "solid".
     *
     * @var string
     */
    public const FONT_AWESOME_FONT_SOLID = "s";

    /**
     * Font Awesome pull "left".
     *
     * @var string
     */
    public const FONT_AWESOME_PULL_LEFT = "left";

    /**
     * Font Awesome pull "right".
     *
     * @var string
     */
    public const FONT_AWESOME_PULL_RIGHT = "right";

    /**
     * Font Awesome size "10x".
     *
     * @var string
     */
    public const FONT_AWESOME_SIZE_10X = "10x";

    /**
     * Font Awesome size "2x".
     *
     * @var string
     */
    public const FONT_AWESOME_SIZE_2X = "2x";

    /**
     * Font Awesome size "3x".
     *
     * @var string
     */
    public const FONT_AWESOME_SIZE_3X = "3x";

    /**
     * Font Awesome size "4x".
     *
     * @var string
     */
    public const FONT_AWESOME_SIZE_4X = "4x";

    /**
     * Font Awesome size "5x".
     *
     * @var string
     */
    public const FONT_AWESOME_SIZE_5X = "5x";

    /**
     * Font Awesome size "6x".
     *
     * @var string
     */
    public const FONT_AWESOME_SIZE_6X = "6x";

    /**
     * Font Awesome size "7x".
     *
     * @var string
     */
    public const FONT_AWESOME_SIZE_7X = "7x";

    /**
     * Font Awesome size "8x".
     *
     * @var string
     */
    public const FONT_AWESOME_SIZE_8X = "8x";

    /**
     * Font Awesome size "9x".
     *
     * @var string
     */
    public const FONT_AWESOME_SIZE_9X = "9x";

    /**
     * Font Awesome size "lg".
     *
     * @var string
     */
    public const FONT_AWESOME_SIZE_LG = "lg";

    /**
     * Font Awesome size "sm".
     *
     * @var string
     */
    public const FONT_AWESOME_SIZE_SM = "sm";

    /**
     * Font Awesome size "xs".
     *
     * @var string
     */
    public const FONT_AWESOME_SIZE_XS = "xs";

    /**
     * Get the animation.
     *
     * @return string|null Returns the animation.
     */
    public function getAnimation(): ?string;

    /**
     * Get the bordered.
     *
     * @return bool|null Returns the bordered.
     */
    public function getBordered(): ?bool;

    /**
     * Get the fixed width.
     *
     * @return bool|null Returns the fixed width.
     */
    public function getFixedWidth(): ?bool;

    /**
     * Get the font.
     *
     * @return string|null Returns the font.
     */
    public function getFont(): ?string;

    /**
     * Get the pull.
     *
     * @return string|null Returns the pull.
     */
    public function getPull(): ?string;

    /**
     * Get the size.
     *
     * @return string|null Returns the size.
     */
    public function getSize(): ?string;

    /**
     * Set the animation.
     *
     * @param string|null $animation The animation.
     * @return FontAwesomeIconInterface Returns this icon.
     */
    public function setAnimation(?string $animation): FontAwesomeIconInterface;

    /**
     * Set the bordered.
     *
     * @param bool|null $bordered Bordered ?
     * @return FontAwesomeIconInterface Returns this icon.
     */
    public function setBordered(?bool $bordered): FontAwesomeIconInterface;

    /**
     * Set the fixed width.
     *
     * @param bool|null $fixedWidth Fixed width ?
     * @return FontAwesomeIconInterface Returns this icon.
     */
    public function setFixedWidth(?bool $fixedWidth): FontAwesomeIconInterface;

    /**
     * Set the font.
     *
     * @param string|null $font The font.
     * @return FontAwesomeIconInterface Returns this icon.
     */
    public function setFont(?string $font): FontAwesomeIconInterface;

    /**
     * Set the pull.
     *
     * @param string|null $pull The pull.
     * @return FontAwesomeIconInterface Returns this icon.
     */
    public function setPull(?string $pull): FontAwesomeIconInterface;

    /**
     * Set the size.
     *
     * @param string|null $size The size.
     * @return FontAwesomeIconInterface Returns this icon.
     */
    public function setSize(?string $size): FontAwesomeIconInterface;
}

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

namespace WBW\Bundle\BootstrapBundle\Extend;

use WBW\Bundle\WidgetBundle\Component\IconInterface;

/**
 * Material Design Iconic Font icon interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Extend
 */
interface MaterialDesignIconicFontIconInterface extends IconInterface {

    /**
     * Material Design Iconic Font border "border".
     *
     * @var string
     */
    public const MATERIAL_DESIGN_ICONIC_FONT_BORDER = "border";

    /**
     * Material Design Iconic Font border "border circle".
     *
     * @var string
     */
    public const MATERIAL_DESIGN_ICONIC_FONT_BORDER_CIRCLE = "border-circle";

    /**
     * Material Design Iconic Font flip "horizontal".
     *
     * @var string
     */
    public const MATERIAL_DESIGN_ICONIC_FONT_FLIP_HORIZONTAL = "horizontal";

    /**
     * Material Design Iconic Font flip "vertical".
     *
     * @var string
     */
    public const MATERIAL_DESIGN_ICONIC_FONT_FLIP_VERTICAL = "vertical";

    /**
     * Material Design Iconic Font pull "left".
     *
     * @var string
     */
    public const MATERIAL_DESIGN_ICONIC_FONT_PULL_LEFT = "left";

    /**
     * Material Design Iconic Font pull "right".
     *
     * @var string
     */
    public const MATERIAL_DESIGN_ICONIC_FONT_PULL_RIGHT = "right";

    /**
     * Material Design Iconic Font rotate "180".
     *
     * @var string
     */
    public const MATERIAL_DESIGN_ICONIC_FONT_ROTATE_180 = "180";

    /**
     * Material Design Iconic Font rotate "270".
     *
     * @var string
     */
    public const MATERIAL_DESIGN_ICONIC_FONT_ROTATE_270 = "270";

    /**
     * Material Design Iconic Font rotate "90".
     *
     * @var string
     */
    public const MATERIAL_DESIGN_ICONIC_FONT_ROTATE_90 = "90";

    /**
     * Material Design Iconic Font size "2x".
     *
     * @var string
     */
    public const MATERIAL_DESIGN_ICONIC_FONT_SIZE_2X = "2x";

    /**
     * Material Design Iconic Font size "3x".
     *
     * @var string
     */
    public const MATERIAL_DESIGN_ICONIC_FONT_SIZE_3X = "3x";

    /**
     * Material Design Iconic Font size "4x".
     *
     * @var string
     */
    public const MATERIAL_DESIGN_ICONIC_FONT_SIZE_4X = "4x";

    /**
     * Material Design Iconic Font size "5x".
     *
     * @var string
     */
    public const MATERIAL_DESIGN_ICONIC_FONT_SIZE_5X = "5x";

    /**
     * Material Design Iconic Font size "lg".
     *
     * @var string
     */
    public const MATERIAL_DESIGN_ICONIC_FONT_SIZE_LG = "lg";

    /**
     * Material Design Iconic Font spin "spin".
     *
     * @var string
     */
    public const MATERIAL_DESIGN_ICONIC_FONT_SPIN = "spin";

    /**
     * Material Design Iconic Font spin "spin reverse".
     *
     * @var string
     */
    public const MATERIAL_DESIGN_ICONIC_FONT_SPIN_REVERSE = "spin-reverse";

    /**
     * Get the border.
     *
     * @return string|null Returns the border.
     */
    public function getBorder(): ?string;

    /**
     * Get the fixed width.
     *
     * @return bool|null Returns the fixed width.
     */
    public function getFixedWidth(): ?bool;

    /**
     * Get the flip.
     *
     * @return string|null Returns the flip.
     */
    public function getFlip(): ?string;

    /**
     * Get the pull.
     *
     * @return string|null Returns the pull.
     */
    public function getPull(): ?string;

    /**
     * Get the rotate.
     *
     * @return string|null Returns the rotate.
     */
    public function getRotate(): ?string;

    /**
     * Get the size.
     *
     * @return string|null Returns the size.
     */
    public function getSize(): ?string;

    /**
     * Get the spin.
     *
     * @return string|null Returns the spin.
     */
    public function getSpin(): ?string;

    /**
     * Set the border.
     *
     * @param string|null $border The border.
     * @return MaterialDesignIconicFontIconInterface Returns this icon.
     */
    public function setBorder(?string $border): MaterialDesignIconicFontIconInterface;

    /**
     * Set the fixed width.
     *
     * @param bool|null $fixedWidth Fixed width ?
     * @return MaterialDesignIconicFontIconInterface Returns this icon.
     */
    public function setFixedWidth(?bool $fixedWidth): MaterialDesignIconicFontIconInterface;

    /**
     * Set the flip.
     *
     * @param string|null $flip The flip.
     * @return MaterialDesignIconicFontIconInterface Returns this icon.
     */
    public function setFlip(?string $flip): MaterialDesignIconicFontIconInterface;

    /**
     * Set the pull.
     *
     * @param string|null $pull The pull.
     * @return MaterialDesignIconicFontIconInterface Returns this icon.
     */
    public function setPull(?string $pull): MaterialDesignIconicFontIconInterface;

    /**
     * Set the rotate.
     *
     * @param string|null $rotate The rotate.
     * @return MaterialDesignIconicFontIconInterface Returns this icon.
     */
    public function setRotate(?string $rotate): MaterialDesignIconicFontIconInterface;

    /**
     * Set the size.
     *
     * @param string|null $size The size.
     * @return MaterialDesignIconicFontIconInterface Returns this icon.
     */
    public function setSize(?string $size): MaterialDesignIconicFontIconInterface;

    /**
     * Set the spin.
     *
     * @param string|null $spin The spin.
     * @return MaterialDesignIconicFontIconInterface Returns this icon.
     */
    public function setSpin(?string $spin): MaterialDesignIconicFontIconInterface;
}

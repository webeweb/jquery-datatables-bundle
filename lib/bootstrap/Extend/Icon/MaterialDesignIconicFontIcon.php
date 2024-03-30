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

namespace WBW\Bundle\BootstrapBundle\Extend\Icon;

use WBW\Library\Symfony\Assets\AbstractIcon;

/**
 * Material Design Iconic Font icon.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Assets\Icon
 */
class MaterialDesignIconicFontIcon extends AbstractIcon implements MaterialDesignIconicFontIconInterface {

    /**
     * Border.
     *
     * @var string|null
     */
    private $border;

    /**
     * Fixed width.
     *
     * @var bool|null
     */
    private $fixedWidth;

    /**
     * Flip.
     *
     * @var string|null
     */
    private $flip;

    /**
     * Pull.
     *
     * @var string|null
     */
    private $pull;

    /**
     * Rotate.
     *
     * @var string|null
     */
    private $rotate;

    /**
     * Size.
     *
     * @var string|null
     */
    private $size;

    /**
     * Spin.
     *
     * @var string|null
     */
    private $spin;

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct();

        $this->setFixedWidth(false);
    }

    /**
     * Enumerate the borders.
     *
     * @return string[] Returns the borders enumeration.
     */
    public static function enumBorders(): array {

        return [
            self::MATERIAL_DESIGN_ICONIC_FONT_BORDER,
            self::MATERIAL_DESIGN_ICONIC_FONT_BORDER_CIRCLE,
        ];
    }

    /**
     * Enumerate the flips.
     *
     * @return string[] Returns the flips enumeration.
     */
    public static function enumFlips(): array {

        return [
            self::MATERIAL_DESIGN_ICONIC_FONT_FLIP_HORIZONTAL,
            self::MATERIAL_DESIGN_ICONIC_FONT_FLIP_VERTICAL,
        ];
    }

    /**
     * Enumerate the pulls.
     *
     * @return string[] Returns the pulls enumeration.
     */
    public static function enumPulls(): array {

        return [
            self::MATERIAL_DESIGN_ICONIC_FONT_PULL_LEFT,
            self::MATERIAL_DESIGN_ICONIC_FONT_PULL_RIGHT,
        ];
    }

    /**
     * Enumerate the rotates.
     *
     * @return string[] Returns the rotates enumeration.
     */
    public static function enumRotates(): array {

        return [
            self::MATERIAL_DESIGN_ICONIC_FONT_ROTATE_90,
            self::MATERIAL_DESIGN_ICONIC_FONT_ROTATE_180,
            self::MATERIAL_DESIGN_ICONIC_FONT_ROTATE_270,
        ];
    }

    /**
     * Enumerate the sizes.
     *
     * @return string[] Returns the sizes enumeration.
     */
    public static function enumSizes(): array {

        return [
            self::MATERIAL_DESIGN_ICONIC_FONT_SIZE_LG,
            self::MATERIAL_DESIGN_ICONIC_FONT_SIZE_2X,
            self::MATERIAL_DESIGN_ICONIC_FONT_SIZE_3X,
            self::MATERIAL_DESIGN_ICONIC_FONT_SIZE_4X,
            self::MATERIAL_DESIGN_ICONIC_FONT_SIZE_5X,
        ];
    }

    /**
     * Enumerate the spins.
     *
     * @return string[] Returns the spins enumeration.
     */
    public static function enumSpins(): array {

        return [
            self::MATERIAL_DESIGN_ICONIC_FONT_SPIN,
            self::MATERIAL_DESIGN_ICONIC_FONT_SPIN_REVERSE,
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function getBorder(): ?string {
        return $this->border;
    }

    /**
     * {@inheritDoc}
     */
    public function getFixedWidth(): ?bool {
        return $this->fixedWidth;
    }

    /**
     * {@inheritDoc}
     */
    public function getFlip(): ?string {
        return $this->flip;
    }

    /**
     * {@inheritDoc}
     */
    public function getPull(): ?string {
        return $this->pull;
    }

    /**
     * {@inheritDoc}
     */
    public function getRotate(): ?string {
        return $this->rotate;
    }

    /**
     * {@inheritDoc}
     */
    public function getSize(): ?string {
        return $this->size;
    }

    /**
     * {@inheritDoc}
     */
    public function getSpin(): ?string {
        return $this->spin;
    }

    /**
     * {@inheritDoc}
     */
    public function setBorder(?string $border): MaterialDesignIconicFontIconInterface {

        if (false === in_array($border, static::enumBorders())) {
            $border = null;
        }

        $this->border = $border;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setFixedWidth(?bool $fixedWidth): MaterialDesignIconicFontIconInterface {
        $this->fixedWidth = $fixedWidth;
        return $this;
    }

    /**
     *{@inheritDoc}
     */
    public function setFlip(?string $flip): MaterialDesignIconicFontIconInterface {

        if (false === in_array($flip, static::enumFlips())) {
            $flip = null;
        }

        $this->flip = $flip;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setPull(?string $pull): MaterialDesignIconicFontIconInterface {

        if (false === in_array($pull, static::enumPulls())) {
            $pull = null;
        }

        $this->pull = $pull;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setRotate(?string $rotate): MaterialDesignIconicFontIconInterface {

        if (false === in_array($rotate, static::enumRotates())) {
            $rotate = null;
        }

        $this->rotate = $rotate;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setSize(?string $size): MaterialDesignIconicFontIconInterface {

        if (false === in_array($size, static::enumSizes())) {
            $size = null;
        }

        $this->size = $size;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setSpin(?string $spin): MaterialDesignIconicFontIconInterface {

        if (false === in_array($spin, static::enumSpins())) {
            $spin = null;
        }

        $this->spin = $spin;
        return $this;
    }
}

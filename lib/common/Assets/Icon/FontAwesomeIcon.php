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

use WBW\Library\Symfony\Assets\AbstractIcon;

/**
 * Font Awesome icon.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Assets\Icon
 */
class FontAwesomeIcon extends AbstractIcon implements FontAwesomeIconInterface {

    /**
     * Animation.
     *
     * @var string|null
     */
    private $animation;

    /**
     * Bordered.
     *
     * @var bool|null
     */
    private $bordered;

    /**
     * Fixed width;
     *
     * @var bool|null
     */
    private $fixedWidth;

    /**
     * Font.
     *
     * @var string|null
     */
    private $font;

    /**
     * Pull.
     *
     * @var string|null
     */
    private $pull;

    /**
     * Size.
     *
     * @var string|null
     */
    private $size;

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct();

        $this->setBordered(false);
        $this->setFixedWidth(false);
        $this->setFont(self::FONT_AWESOME_FONT);
    }

    /**
     * Enumerate the animations.
     *
     * @return string[] Returns the animations enumeration.
     */
    public static function enumAnimations(): array {

        return [
            self::FONT_AWESOME_ANIMATION_PULSE,
            self::FONT_AWESOME_ANIMATION_SPIN,
        ];
    }

    /**
     * Enumerate the fonts.
     *
     * @return string[] Returns the fonts enumeration.
     */
    public static function enumFonts(): array {

        return [
            self::FONT_AWESOME_FONT,
            self::FONT_AWESOME_FONT_BOLD,
            self::FONT_AWESOME_FONT_DUOTONE,
            self::FONT_AWESOME_FONT_LIGHT,
            self::FONT_AWESOME_FONT_REGULAR,
            self::FONT_AWESOME_FONT_SOLID,
        ];
    }

    /**
     * Enumerate the pulls.
     *
     * @return string[] Returns the pulls enumeration.
     */
    public static function enumPulls(): array {

        return [
            self::FONT_AWESOME_PULL_LEFT,
            self::FONT_AWESOME_PULL_RIGHT,
        ];
    }

    /**
     * Enumerate the sizes.
     *
     * @return string[] Returns the sizes enumeration.
     */
    public static function enumSizes(): array {

        return [
            self::FONT_AWESOME_SIZE_LG,
            self::FONT_AWESOME_SIZE_SM,
            self::FONT_AWESOME_SIZE_XS,
            self::FONT_AWESOME_SIZE_2X,
            self::FONT_AWESOME_SIZE_3X,
            self::FONT_AWESOME_SIZE_4X,
            self::FONT_AWESOME_SIZE_5X,
            self::FONT_AWESOME_SIZE_6X,
            self::FONT_AWESOME_SIZE_7X,
            self::FONT_AWESOME_SIZE_8X,
            self::FONT_AWESOME_SIZE_9X,
            self::FONT_AWESOME_SIZE_10X,
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function getAnimation(): ?string {
        return $this->animation;
    }

    /**
     * {@inheritDoc}
     */
    public function getBordered(): ?bool {
        return $this->bordered;
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
    public function getFont(): ?string {
        return $this->font;
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
    public function getSize(): ?string {
        return $this->size;
    }

    /**
     * {@inheritDoc}
     */
    public function setAnimation(?string $animation): FontAwesomeIconInterface {

        if (false === in_array($animation, static::enumAnimations())) {
            $animation = null;
        }

        $this->animation = $animation;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setBordered(?bool $bordered): FontAwesomeIconInterface {
        $this->bordered = $bordered;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setFixedWidth(?bool $fixedWidth): FontAwesomeIconInterface {
        $this->fixedWidth = $fixedWidth;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setFont(?string $font): FontAwesomeIconInterface {

        if (false === in_array($font, static::enumFonts())) {
            $font = null;
        }

        $this->font = $font;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setPull(?string $pull): FontAwesomeIconInterface {

        if (false === in_array($pull, static::enumPulls())) {
            $pull = null;
        }

        $this->pull = $pull;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setSize(?string $size): FontAwesomeIconInterface {

        if (false === in_array($size, static::enumSizes())) {
            $size = null;
        }

        $this->size = $size;
        return $this;
    }
}

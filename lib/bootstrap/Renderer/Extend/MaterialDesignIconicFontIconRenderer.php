<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\BootstrapBundle\Renderer\Extend;

use WBW\Bundle\BootstrapBundle\Extend\MaterialDesignIconicFontIconInterface;
use WBW\Library\Widget\Renderer\Component\IconRenderer;

/**
 * Material Design Iconic Font icon renderer.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Renderer\Extend
 */
class MaterialDesignIconicFontIconRenderer extends IconRenderer {

    /**
     * Render a border.
     *
     * @param MaterialDesignIconicFontIconInterface $icon The icon.
     * @return string|null Returns the rendered border in case of success, null otherwise.
     */
    public static function renderBorder(MaterialDesignIconicFontIconInterface $icon): ?string {
        return null !== $icon->getBorder() ? "zmdi-hc-" . $icon->getBorder() : null;
    }

    /**
     * Render a fixed width.
     *
     * @param MaterialDesignIconicFontIconInterface $icon The icon.
     * @return string|null Returns the rendered fixed width in case of success, null otherwise.
     */
    public static function renderFixedWidth(MaterialDesignIconicFontIconInterface $icon): ?string {
        return true === $icon->getFixedWidth() ? "zmdi-hc-fw" : null;
    }

    /**
     * Render a flip.
     *
     * @param MaterialDesignIconicFontIconInterface $icon The icon.
     * @return string|null Returns the rendered flip.
     */
    public static function renderFlip(MaterialDesignIconicFontIconInterface $icon): ?string {
        return null !== $icon->getFlip() ? "zmdi-hc-flip-" . $icon->getFlip() : null;
    }

    /**
     * Render a name.
     *
     * @param MaterialDesignIconicFontIconInterface $icon The icon.
     * @return string|null Returns the rendered name in case of success, false otherwise.
     */
    public static function renderName(MaterialDesignIconicFontIconInterface $icon): ?string {
        return null !== $icon->getName() ? "zmdi-" . $icon->getName() : null;
    }

    /**
     * Render a pull.
     *
     * @param MaterialDesignIconicFontIconInterface $icon The icon.
     * @return string|null Returns the rendered pull in case of success, null otherwise.
     */
    public static function renderPull(MaterialDesignIconicFontIconInterface $icon): ?string {
        return null !== $icon->getPull() ? "pull-" . $icon->getPull() : null;
    }

    /**
     * Render a rotate.
     *
     * @param MaterialDesignIconicFontIconInterface $icon The icon.
     * @return string|null Returns the rendered rotate in case of success, null otherwise.
     */
    public static function renderRotate(MaterialDesignIconicFontIconInterface $icon): ?string {
        return null !== $icon->getRotate() ? "zmdi-hc-rotate-" . $icon->getRotate() : null;
    }

    /**
     * Render a size.
     *
     * @param MaterialDesignIconicFontIconInterface $icon The icon.
     * @return string|null Returns the rendered size in case of success, null otherwise.
     */
    public static function renderSize(MaterialDesignIconicFontIconInterface $icon): ?string {
        return null !== $icon->getSize() ? "zmdi-hc-" . $icon->getSize() : null;
    }

    /**
     * Render a spin.
     *
     * @param MaterialDesignIconicFontIconInterface $icon The icon.
     * @return string|null Returns the rendered spin in case of success, null otherwise.
     */
    public static function renderSpin(MaterialDesignIconicFontIconInterface $icon): ?string {
        return null !== $icon->getSpin() ? "zmdi-hc-" . $icon->getSpin() : null;
    }
}

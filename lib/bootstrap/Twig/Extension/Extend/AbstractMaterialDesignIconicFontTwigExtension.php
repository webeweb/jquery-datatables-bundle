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

namespace WBW\Bundle\BootstrapBundle\Twig\Extension\Extend;

use WBW\Bundle\BootstrapBundle\Extend\MaterialDesignIconicFontIconInterface;
use WBW\Bundle\BootstrapBundle\Renderer\Extend\MaterialDesignIconicFontIconRenderer;
use WBW\Bundle\BootstrapBundle\Twig\Extension\AbstractTwigExtension;

/**
 * Abstract Material Design Iconic Font Twig extension.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Twig\Extension\Extend
 * @abstract
 */
abstract class AbstractMaterialDesignIconicFontTwigExtension extends AbstractTwigExtension {

    /**
     * Render a Material Design Iconic Font icon.
     *
     * @param MaterialDesignIconicFontIconInterface $icon The icon.
     * @return string Returns the Material Design Iconic Font icon.
     */
    protected function materialDesignIconicFontIcon(MaterialDesignIconicFontIconInterface $icon): string {

        $attributes = [
            "class" => [
                "zmdi",
                MaterialDesignIconicFontIconRenderer::renderName($icon),
                MaterialDesignIconicFontIconRenderer::renderSize($icon),
                MaterialDesignIconicFontIconRenderer::renderFixedWidth($icon),
                MaterialDesignIconicFontIconRenderer::renderBorder($icon),
                MaterialDesignIconicFontIconRenderer::renderPull($icon),
                MaterialDesignIconicFontIconRenderer::renderSpin($icon),
                MaterialDesignIconicFontIconRenderer::renderRotate($icon),
                MaterialDesignIconicFontIconRenderer::renderFlip($icon),
            ],
            "style" => MaterialDesignIconicFontIconRenderer::renderStyle($icon),
        ];

        return static::h("i", null, $attributes);
    }

    /**
     * Render a Material Design Iconic Font list.
     *
     * @param string[]|string $items The items.
     * @return string Returns the Material Design Iconic Font list.
     */
    protected function materialDesignIconicFontList($items): string {

        $innerHTML = true === is_array($items) ? implode("\n", $items) : $items;

        return static::h("ul", $innerHTML, ["class" => "zmdi-hc-ul"]);
    }

    /**
     * Render a Material Design Iconic Font list icon.
     *
     * @param string|null $icon The icon.
     * @param string|null $content The content.
     * @return string Returns the Material Design Iconic Font list icon.
     */
    protected function materialDesignIconicFontListIcon(?string $icon, ?string $content): string {

        $glyphicon = null !== $icon ? str_replace(['class="zmdi'], ['class="zmdi-hc-li zmdi'], $icon) : "";
        $innerHTML = null !== $content ? $content : "";

        return static::h("li", $glyphicon . $innerHTML);
    }
}

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

use WBW\Bundle\BootstrapBundle\Extend\FontAwesomeIconInterface;
use WBW\Bundle\BootstrapBundle\Renderer\Extend\FontAwesomeIconRenderer;
use WBW\Bundle\BootstrapBundle\Twig\Extension\AbstractTwigExtension;

/**
 * Abstract Font Awesome Twig extension.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Twig\Extension\Extend
 * @abstract
 */
abstract class AbstractFontAwesomeTwigExtension extends AbstractTwigExtension {

    /**
     * Render a Font Awesome icon.
     *
     * @param FontAwesomeIconInterface $icon The icon.
     * @return string Returns the Font Awesome icon.
     */
    protected function fontAwesomeIcon(FontAwesomeIconInterface $icon): string {

        $attributes = [
            "class" => [
                FontAwesomeIconRenderer::renderFont($icon),
                FontAwesomeIconRenderer::renderName($icon),
                FontAwesomeIconRenderer::renderSize($icon),
                FontAwesomeIconRenderer::renderFixedWidth($icon),
                FontAwesomeIconRenderer::renderBordered($icon),
                FontAwesomeIconRenderer::renderPull($icon),
                FontAwesomeIconRenderer::renderAnimation($icon),
            ],
            "style" => FontAwesomeIconRenderer::renderStyle($icon),
        ];

        return static::h("i", null, $attributes);
    }

    /**
     * Render a Font Awesome list.
     *
     * @param string[]|string $items The items.
     * @return string Returns the Font Awesome list.
     */
    protected function fontAwesomeList($items): string {

        $innerHTML = true === is_array($items) ? implode("\n", $items) : $items;

        return static::h("ul", $innerHTML, ["class" => "fa-ul"]);
    }

    /**
     * Render a Font Awesome list icon.
     *
     * @param string $icon The icon.
     * @param string|null $content The content.
     * @return string Returns the Font Awesome list icon.
     */
    protected function fontAwesomeListIcon(string $icon, ?string $content): string {

        $glyphicon = static::h("span", $icon, ["class" => "fa-li"]);
        $innerHTML = null !== $content ? $content : "";

        return static::h("li", $glyphicon . $innerHTML);
    }
}

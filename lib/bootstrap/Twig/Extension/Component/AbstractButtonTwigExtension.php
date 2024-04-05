<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\BootstrapBundle\Twig\Extension\Component;

use WBW\Bundle\BootstrapBundle\Component\ButtonInterface;
use WBW\Bundle\BootstrapBundle\Renderer\Component\ButtonRenderer;
use WBW\Bundle\BootstrapBundle\Twig\Extension\AbstractTwigExtension;
use WBW\Bundle\BootstrapBundle\Twig\Extension\AssetsTwigExtension;

/**
 * Abstract button Twig extension.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Twig\Extension\Component
 * @abstract
 */
abstract class AbstractButtonTwigExtension extends AbstractTwigExtension {

    /**
     * Display a Bootstrap button.
     *
     * @param ButtonInterface $button The button.
     * @param string|null $icon The icon.
     * @return string Returns the Bootstrap button.
     */
    protected function bootstrapButton(ButtonInterface $button, ?string $icon): string {

        $attributes = [
            "class"          => [
                "btn",
                ButtonRenderer::renderType($button),
                ButtonRenderer::renderBlock($button),
                ButtonRenderer::renderSize($button),
                ButtonRenderer::renderActive($button),
            ],
            "title"          => ButtonRenderer::renderTitle($button),
            "type"           => "button",
            "data-toggle"    => ButtonRenderer::renderDataToggle($button),
            "data-placement" => ButtonRenderer::renderDataPlacement($button),
            "disabled"       => ButtonRenderer::renderDisabled($button),
        ];

        foreach ($button->getData() as $k => $v) {
            $attributes["data-$k"] = (string) $v;
        }

        $glyphicon = null !== $icon ? AssetsTwigExtension::renderIcon($this->getTwigEnvironment(), $icon) : "";
        $innerHTML = ButtonRenderer::renderContent($button);

        return static::h("button", implode(" ", [$glyphicon, $innerHTML]), $attributes);
    }
}

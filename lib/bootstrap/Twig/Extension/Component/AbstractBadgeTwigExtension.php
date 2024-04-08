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

use WBW\Bundle\BootstrapBundle\Component\BadgeInterface;
use WBW\Bundle\BootstrapBundle\Renderer\Component\BadgeRenderer;
use WBW\Bundle\BootstrapBundle\Twig\Extension\AbstractTwigExtension;

/**
 * Badge Twig extension.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Twig\Extension\Component
 * @abstract
 */
abstract class AbstractBadgeTwigExtension extends AbstractTwigExtension {

    /**
     * Render a Bootstrap badge.
     *
     * @param BadgeInterface $badge The badge.
     * @return string Returns the Bootstrap badge.
     */
    protected function bootstrapBadge(BadgeInterface $badge): string {

        $attributes = [
            "class" => [
                "badge",
                BadgeRenderer::renderType($badge),
                4 === $this->getVersion() ? BadgeRenderer::renderPill($badge) : null,
            ],
        ];

        $innerHTML = BadgeRenderer::renderContent($badge);

        return static::h("span", $innerHTML, $attributes);
    }
}

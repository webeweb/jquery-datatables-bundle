<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\BootstrapBundle\Twig\Extension\Extend;

use WBW\Bundle\BootstrapBundle\Twig\Extension\AbstractTwigExtension;

/**
 * Abstract Glyphicon Twig extension.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Twig\Extension\Extend
 * @abstract
 */
abstract class AbstractGlyphiconTwigExtension extends AbstractTwigExtension {

    /**
     * Render a Bootstrap glyphicon.
     *
     * @param string|null $name The name.
     * @param string|null $style The style.
     * @return string Returns the Bootstrap glyphicon.
     */
    protected function bootstrapGlyphicon(?string $name, ?string $style): string {

        $attributes = [
            "class"       => [
                "glyphicon",
                null !== $name ? "glyphicon-" . $name : null,
            ],
            "aria-hidden" => "true",
            "style"       => $style,
        ];

        return static::h("span", null, $attributes);
    }
}

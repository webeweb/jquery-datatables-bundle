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
 * Abstract Meteocons Twig extension.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Twig\Extension\Extend
 * @abstract
 */
abstract class AbstractMeteoconsTwigExtension extends AbstractTwigExtension {

    /**
     * Render a Meteocons icon.
     *
     * @param string $name The name.
     * @param string|null $style The style.
     * @return string Returns the Meteocons icon.
     */
    protected function meteoconsIcon(string $name, ?string $style): string {

        $attributes = [
            "class"          => "meteocons",
            "data-meteocons" => $name,
            "style"          => $style,
        ];

        return static::h("i", null, $attributes);
    }
}

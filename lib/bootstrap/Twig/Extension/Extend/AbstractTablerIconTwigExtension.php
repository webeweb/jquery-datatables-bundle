<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\BootstrapBundle\Twig\Extension\Extend;

use WBW\Bundle\BootstrapBundle\Twig\Extension\AbstractTwigExtension;

/**
 * Abstract Tabler icon Twig Extension.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Twig\Extension\Extend
 * @abstract
 */
abstract class AbstractTablerIconTwigExtension extends AbstractTwigExtension {

    /**
     * Render a Tabler icon.
     *
     * @param string|null $name The name.
     * @param string|null $style The style.
     * @return string Returns the Tabler icon.
     */
    protected function tablerIcon(?string $name, ?string $style): string {
        return "";
    }
}

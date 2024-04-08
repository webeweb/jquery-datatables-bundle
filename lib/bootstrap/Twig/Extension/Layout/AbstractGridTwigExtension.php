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

namespace WBW\Bundle\BootstrapBundle\Twig\Extension\Layout;

use WBW\Bundle\BootstrapBundle\Renderer\Layout\GridRenderer;
use WBW\Bundle\BootstrapBundle\Twig\Extension\AbstractTwigExtension;

/**
 * Abstract grid Twig extension.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Twig\Extension\Layout
 * @abstract
 */
abstract class AbstractGridTwigExtension extends AbstractTwigExtension {

    /**
     * Render a Bootstrap grid.
     *
     * @param int|null $lg The large column size.
     * @param int|null $md The medium column size.
     * @param int|null $sm The small column size.
     * @param int|null $xs The extra-small column size.
     * @param bool|null $recopy Recopy ?
     * @param string|null $prefix The column prefix.
     * @return string Returns the Bootstrap grid.
     */
    protected function bootstrapGrid(?int $lg, ?int $md, ?int $sm, ?int $xs, ?bool $recopy, ?string $prefix): string {

        $found  = null;
        $values = [&$lg, &$md, &$sm, &$xs];

        foreach ($values as &$current) {
            if (1 <= $current && $current <= 12) {
                $found = $current;
            }
            if (null === $current && true === $recopy && null !== $found) {
                $current = $found;
            }
        }

        $columns = [
            GridRenderer::renderClassname("lg", $lg, $prefix),
            GridRenderer::renderClassname("md", $md, $prefix),
            GridRenderer::renderClassname("sm", $sm, $prefix),
            GridRenderer::renderClassname("xs", $xs, $prefix),
        ];

        return trim(implode(" ", $columns));
    }
}

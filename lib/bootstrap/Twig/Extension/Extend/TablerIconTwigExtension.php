<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\BootstrapBundle\Twig\Extension\Extend;

use Twig\TwigFunction;
use WBW\Bundle\WidgetBundle\Renderer\Component\IconRendererInterface;
use WBW\Library\Types\Helper\ArrayHelper;

/**
 * Tabler icon Twig extension.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Twig\Extension\Extend
 */
class TablerIconTwigExtension extends AbstractTablerIconTwigExtension implements IconRendererInterface {

    /**
     * Service name.
     *
     * @var string
     */
    public const SERVICE_NAME = "wbw.bootstrap.twig.extension.extend.tabler";

    /**
     * Get the Twig functions.
     *
     * @return TwigFunction[] Returns the Twig functions.
     */
    public function getFunctions(): array {

        return [
            new TwigFunction("tablerIcon", [$this, "tablerIconFunction"], ["is_safe" => ["html"]]),
            new TwigFunction("tiIcon", [$this, "tablerIconFunction"], ["is_safe" => ["html"]]),
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function renderIcon(?string $name, ?string $style): string {
        return $this->tablerIconFunction(["name" => $name, "style" => $style]);
    }

    /**
     * Render a Tabler icon.
     *
     * @param array<string,mixed> $args The arguments.
     * @return string Returns the Tabler icon.
     */
    public function tablerIconFunction(array $args = []): string {
        return $this->tablerIcon(ArrayHelper::get($args, "name", "house"), ArrayHelper::get($args, "style"));
    }
}

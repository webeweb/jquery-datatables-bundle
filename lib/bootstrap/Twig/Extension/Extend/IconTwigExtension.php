<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\BootstrapBundle\Twig\Extension\Extend;

use Twig\TwigFunction;
use WBW\Bundle\WidgetBundle\Renderer\Component\IconRendererInterface;
use WBW\Library\Types\Helper\ArrayHelper;

/**
 * Icon Twig extension.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Twig\Extension\Extend
 */
class IconTwigExtension extends AbstractIconTwigExtension implements IconRendererInterface {

    /**
     * Service name.
     *
     * @var string
     */
    public const SERVICE_NAME = "wbw.bootstrap.twig.extension.extend.icon";

    /**
     * Render a Bootstrap icon.
     *
     * @param array<string,mixed> $args The arguments.
     * @return string Returns the Bootstrap icon.
     */
    public function bootstrapIconFunction(array $args = []): string {
        return $this->bootstrapIcon(ArrayHelper::get($args, "name", "house"), ArrayHelper::get($args, "style"));
    }

    /**
     * Get the Twig functions.
     *
     * @return TwigFunction[] Returns the Twig functions.
     */
    public function getFunctions(): array {

        return [
            new TwigFunction("bootstrapIcon", [$this, "bootstrapIconFunction"], ["is_safe" => ["html"]]),
            new TwigFunction("bsIcon", [$this, "bootstrapIconFunction"], ["is_safe" => ["html"]]),
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function renderIcon(?string $name, ?string $style): string {
        return $this->bootstrapIconFunction(["name" => $name, "style" => $style]);
    }
}

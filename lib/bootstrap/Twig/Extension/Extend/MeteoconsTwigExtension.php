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

namespace WBW\Bundle\BootstrapBundle\Twig\Extension\Extend;

use Twig\TwigFunction;
use WBW\Bundle\WidgetBundle\Renderer\Component\IconRendererInterface;
use WBW\Library\Types\Helper\ArrayHelper;

/**
 * Meteocons Twig extension.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Twig\Extension\Extend
 */
class MeteoconsTwigExtension extends AbstractMeteoconsTwigExtension implements IconRendererInterface {

    /**
     * Service name.
     *
     * @var string
     */
    public const SERVICE_NAME = "wbw.bootstrap.twig.extension.extend.meteocons";

    /**
     * Get the Twig functions.
     *
     * @return TwigFunction[] Returns the Twig functions.
     */
    public function getFunctions(): array {

        return [
            new TwigFunction("meteoconsIcon", [$this, "meteoconsIconFunction"], ["is_safe" => ["html"]]),
        ];
    }

    /**
     * Render a Meteocons icon.
     *
     * @param array<string,mixed> $args The arguments.
     * @return string Returns a Meteocons icon.
     */
    public function meteoconsIconFunction(array $args = []): string {
        return $this->meteoconsIcon(ArrayHelper::get($args, "name", "A"), ArrayHelper::get($args, "style"));
    }

    /**
     * {@inheritDoc}
     */
    public function renderIcon(?string $name, ?string $style): string {
        return $this->meteoconsIconFunction(["name" => $name, "style" => $style]);
    }
}

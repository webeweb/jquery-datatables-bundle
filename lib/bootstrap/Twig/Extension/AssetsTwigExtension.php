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

namespace WBW\Bundle\BootstrapBundle\Twig\Extension;

use Twig\Environment;
use Twig\TwigFilter;
use Twig\TwigFunction;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Extend\FontAwesomeTwigExtension;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Extend\GlyphiconTwigExtension;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Extend\IconTwigExtension;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Extend\MaterialDesignIconicFontTwigExtension;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Extend\MeteoconsTwigExtension;

/**
 * Assets Twig extension.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Twig\Extension
 */
class AssetsTwigExtension extends AbstractTwigExtension {

    /**
     * Service name.
     *
     * @var string
     */
    public const SERVICE_NAME = "wbw.bootstrap.twig.extension.assets";

    /**
     * Render an icon.
     *
     * @param string|null $name The name.
     * @param string|null $style The style.
     * @return string|null Returns the icon.
     */
    public function bootstrapRenderIconFunction(?string $name, string $style = null): ?string {
        return static::renderIcon($this->getTwigEnvironment(), $name, $style);
    }

    /**
     * Get the Twig filters.
     *
     * @return TwigFilter[] Returns the Twig filters.
     */
    public function getFilters(): array {
        return [];
    }

    /**
     * Get the Twig functions.
     *
     * @return TwigFunction[] Returns the Twig functions.
     */
    public function getFunctions(): array {

        return [
            new TwigFunction("bootstrapRenderIcon", [$this, "bootstrapRenderIconFunction"], ["is_safe" => ["html"]]),
            new TwigFunction("bsRenderIcon", [$this, "bootstrapRenderIconFunction"], ["is_safe" => ["html"]]),
        ];
    }

    /**
     * Render an icon.
     *
     * @param Environment $twigEnvironment The Twig environment.
     * @param string|null $name The name.
     * @param string|null $style The style.
     * @return string|null Returns the rendered icon.
     */
    public static function renderIcon(Environment $twigEnvironment, ?string $name, string $style = null): ?string {

        if (null === $name || "" === $name) {
            return null;
        }

        $handler = explode(":", $name);
        if (1 === count($handler)) {
            array_unshift($handler, "g");
        }
        if (2 !== count($handler)) {
            return null;
        }

        switch ($handler[0]) {

            default:
            case "b": // Bootstrap
            case "g": // Glyphicon
                $output = (new GlyphiconTwigExtension($twigEnvironment))->renderIcon($handler[1], $style);
                break;

            case "bi": // Bootstrap icons
                $output = (new IconTwigExtension($twigEnvironment))->renderIcon($handler[1], $style);
                break;

            case "fa": // Font Awesome
            case "fas":
            case "far":
            case "fal":
            case "fab":
            case "fad":
                $output = (new FontAwesomeTwigExtension($twigEnvironment))->renderIcon($handler[1], $style);
                $output = str_replace('class="fa', 'class="' . $handler[0], $output);
                break;

            case "mc": // Meteocons
                $output = (new MeteoconsTwigExtension($twigEnvironment))->renderIcon($handler[1], $style);
                break;

            case "zmdi": // Material Design Iconic Font
                $output = (new MaterialDesignIconicFontTwigExtension($twigEnvironment))->renderIcon($handler[1], $style);
                break;
        }

        return $output;
    }
}

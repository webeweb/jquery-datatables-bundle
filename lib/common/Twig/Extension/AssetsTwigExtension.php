<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Twig\Extension;

use Twig\TwigFilter;
use Twig\TwigFunction;
use WBW\Bundle\BootstrapBundle\Twig\Extension\AssetsTwigExtension as BootstrapAssetsTwigExtension;
use WBW\Bundle\CommonBundle\Routing\RouterTrait;
use WBW\Library\Symfony\Helper\ColorHelper;
use WBW\Library\Symfony\Provider\JavascriptProviderInterface;
use WBW\Library\Symfony\Provider\StylesheetProviderInterface;
use WBW\Library\Types\Helper\ArrayHelper;
use WBW\Library\Types\Helper\StringHelper;

/**
 * Assets Twig extension.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Twig\Extension
 */
class AssetsTwigExtension extends AbstractTwigExtension {

    use RouterTrait {
        setRouter as public;
    }

    /**
     * Service name.
     *
     * @var string
     */
    const SERVICE_NAME = "wbw.common.twig.extension.assets";

    /**
     * Public directory.
     *
     * @var string|null
     */
    protected $publicDirectory;

    /**
     * Determine if an asset exists.
     *
     * @param string|null $filename The filename.
     * @return bool|null Returns true in case of success, false otherwise.
     */
    public function assetExists(?string $filename): ?bool {

        if (null === $filename) {
            return null;
        }

        return file_exists($this->getPublicDirectory() . $filename);
    }

    /**
     * Render a common resource path.
     *
     * @param string $type The type.
     * @param string $name The name.
     * @param array $query The query.
     * @return string|null Returns the common resource path.
     */
    public function commonResourcePath(string $type, string $name, array $query = []): ?string {

        if (null === $this->getRouter()) {
            return null;
        }

        return $this->getRouter()->generate("wbw_common_twig_resource", array_merge([
            "type" => $type,
            "name" => $name,
        ], $query));
    }

    /**
     * Render a common resource "javascript".
     *
     * @param string $name The name.
     * @param array $query The query.
     * @return string Returns the common resource "javascript".
     */
    public function commonResourceScriptFunction(string $name, array $query = []): string {

        $attributes = [
            "type" => "text/javascript",
            "src"  => $this->commonResourcePath(JavascriptProviderInterface::JAVASCRIPT_PROVIDER_EXTENSION, $name, $query),
        ];

        return static::h("script", null, $attributes);
    }

    /**
     * Render a common resource "stylesheet".
     *
     * @param string $name The name.
     * @param array $query The query.
     * @return string Returns the common resource "stylesheet".
     */
    public function commonResourceStyleFunction(string $name, array $query = []): string {

        $template   = "<link {{ attributes }}>";
        $attributes = [
            "type" => "text/css",
            "rel"  => "stylesheet",
            "href" => $this->commonResourcePath(StylesheetProviderInterface::STYLESHEET_PROVIDER_EXTENSION, $name, $query),
        ];

        return str_replace("{{ attributes }}", StringHelper::parseArray($attributes), $template);
    }

    /**
     * Render a CSS rgba().
     *
     * @param string|null $color The hexadecimal color.
     * @param float $alpha The alpha channel.
     * @return string|null Returns the rgba().
     */
    public function cssRgba(?string $color, float $alpha = 1.00): ?string {
        return ColorHelper::hexToRgba($color, $alpha);
    }

    /**
     * Get the Twig filters.
     *
     * @return TwigFilter[] Returns the Twig filters.
     */
    public function getFilters(): array {

        return [
            new TwigFilter("assetExists", [$this, "assetExists"], ["is_safe" => ["html"]]),

            new TwigFilter("cssRgba", [$this, "cssRgba"], ["is_safe" => ["html"]]),

            new TwigFilter("hGoogleTagManager", [$this, "hGoogleTagManager"], ["is_safe" => ["html"]]),
            new TwigFilter("hGtag", [$this, "hGoogleTagManager"], ["is_safe" => ["html"]]),
            new TwigFilter("hScript", [$this, "hScriptFilter"], ["is_safe" => ["html"]]),
            new TwigFilter("hStyle", [$this, "hStyleFilter"], ["is_safe" => ["html"]]),
        ];
    }

    /**
     * Get the Twig functions.
     *
     * @return TwigFunction[] Returns the Twig functions.
     */
    public function getFunctions(): array {

        return [
            new TwigFunction("assetExists", [$this, "assetExists"], ["is_safe" => ["html"]]),

            new TwigFunction("cssRgba", [$this, "cssRgba"], ["is_safe" => ["html"]]),

            new TwigFunction("hGoogleTagManager", [$this, "hGoogleTagManager"], ["is_safe" => ["html"]]),
            new TwigFunction("hGtag", [$this, "hGoogleTagManager"], ["is_safe" => ["html"]]),
            new TwigFunction("hImage", [$this, "hImageFunction"], ["is_safe" => ["html"]]),
            new TwigFunction("hIcon", [$this, "hIconFunction"], ["is_safe" => ["html"]]),

            new TwigFunction("commonResourcePath", [$this, "commonResourcePathFunction"], ["is_safe" => ["html"]]),
            new TwigFunction("commonResourceScript", [$this, "commonResourceScriptFunction"], ["is_safe" => ["html"]]),
            new TwigFunction("commonResourceStyle", [$this, "commonResourceStyleFunction"], ["is_safe" => ["html"]]),
        ];
    }

    /**
     * Get the public directory.
     *
     * @return string|null Returns the public directory.
     */
    public function getPublicDirectory(): ?string {
        return $this->publicDirectory;
    }

    /**
     * Render a javascript Google tag manager.
     *
     * @param string|null $id The id.
     * @return string|null Returns the Google tag manager.
     */
    public function hGoogleTagManager(?string $id): ?string {

        if (null === $id || "" === $id) {
            return null;
        }

        $template = file_get_contents(__DIR__ . "/AssetsTwigExtension/hGoogleTagManager.html");

        return str_replace("{{ id }}", $id, $template);
    }

    /**
     * Display an icon.
     *
     * @param string|null $name The name.
     * @param string|null $style The style.
     * @return string|null Returns the icon.
     */
    public function hIconFunction(?string $name, string $style = null): ?string {
        return BootstrapAssetsTwigExtension::renderIcon($this->getTwigEnvironment(), $name, $style);
    }

    /**
     * Render an image.
     *
     * @param array $args The arguments.
     * @return string Returns the image.
     */
    public function hImageFunction(array $args = []): string {

        $template = "<img {{ attributes }}/>";

        $attributes = [
            "src"    => ArrayHelper::get($args, "src"),
            "alt"    => ArrayHelper::get($args, "alt"),
            "width"  => (string) ArrayHelper::get($args, "width"),
            "height" => (string) ArrayHelper::get($args, "height"),
            "class"  => ArrayHelper::get($args, "class"),
            "usemap" => ArrayHelper::get($args, "usemap"),
        ];

        return str_replace("{{ attributes }}", StringHelper::parseArray($attributes), $template);
    }

    /**
     * Wrap a javascript.
     *
     * @param string $content The content.
     * @return string Returns a script.
     */
    public function hScriptFilter(string $content): string {

        $attributes = [
            "type" => "text/javascript",
        ];

        $innerHTML = implode("", ["\n", $content, "\n"]);

        return static::h("script", $innerHTML, $attributes);
    }

    /**
     * Wrap a stylesheet.
     *
     * @param string $content The content.
     * @return string Returns a style.
     */
    public function hStyleFilter(string $content): string {

        $attributes = [
            "type" => "text/css",
        ];

        $innerHTML = implode("", ["\n", $content, "\n"]);

        return static::h("style", $innerHTML, $attributes);
    }

    /**
     * Set the public directory.
     *
     * @param string|null $publicDirectory The public directory.
     * @return AssetsTwigExtension Returns this assets Twig extension.
     */
    public function setPublicDirectory(?string $publicDirectory): AssetsTwigExtension {
        $this->publicDirectory = $publicDirectory;
        return $this;
    }
}

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

namespace WBW\Bundle\BootstrapBundle\Twig\Extension\Extend;

use Twig\TwigFilter;
use Twig\TwigFunction;
use WBW\Bundle\BootstrapBundle\Factory\Extend\IconFactory;
use WBW\Library\Widget\Renderer\Component\IconRendererInterface;

/**
 * Material Design Iconic Font Twig extension.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Twig\Extension\Extend
 */
class MaterialDesignIconicFontTwigExtension extends AbstractMaterialDesignIconicFontTwigExtension implements IconRendererInterface {

    /**
     * Service name.
     *
     * @var string
     */
    public const SERVICE_NAME = "wbw.bootstrap.twig.extension.extend.material_design_iconic_font";

    /**
     * Get the Twig filters.
     *
     * @return TwigFilter[] Returns the Twig filters.
     */
    public function getFilters(): array {

        return [
            new TwigFilter("materialDesignIconicFontList", [$this, "materialDesignIconicFontListFilter"], ["is_safe" => ["html"]]),
            new TwigFilter("mdiFontList", [$this, "materialDesignIconicFontListFilter"], ["is_safe" => ["html"]]),

            new TwigFilter("materialDesignIconicFontListIcon", [$this, "materialDesignIconicFontListIconFilter"], ["is_safe" => ["html"]]),
            new TwigFilter("mdiFontListIcon", [$this, "materialDesignIconicFontListIconFilter"], ["is_safe" => ["html"]]),
        ];
    }

    /**
     * Get the Twig functions.
     *
     * @return TwigFunction[] Returns the Twig functions.
     */
    public function getFunctions(): array {

        return [
            new TwigFunction("materialDesignIconicFontIcon", [$this, "materialDesignIconicFontIconFunction"], ["is_safe" => ["html"]]),
            new TwigFunction("mdiIcon", [$this, "materialDesignIconicFontIconFunction"], ["is_safe" => ["html"]]),
        ];
    }

    /**
     * Render a Material Design Iconic Font icon.
     *
     * @param array<string,mixed> $args The arguments.
     * @return string Returns the Material Design Iconic Font icon.
     */
    public function materialDesignIconicFontIconFunction(array $args = []): string {
        return $this->materialDesignIconicFontIcon(IconFactory::parseMaterialDesignIconicFontIcon($args));
    }

    /**
     * Render a Material Design Iconic Font list.
     *
     * @param string[]|string $items The items.
     * @return string Returns the Material Design Iconic Font list.
     */
    public function materialDesignIconicFontListFilter($items): string {
        return $this->materialDesignIconicFontList($items);
    }

    /**
     * Render a Material Design Iconic Font list icon.
     *
     * @param string $icon The icon.
     * @param string|null $content The content.
     * @return string Returns the Material Design Iconic Font list icon.
     */
    public function materialDesignIconicFontListIconFilter(string $icon, ?string $content): string {
        return $this->materialDesignIconicFontListIcon($icon, $content);
    }

    /**
     * {@inheritDoc}
     */
    public function renderIcon(?string $name, ?string $style): string {
        return $this->materialDesignIconicFontIconFunction(["name" => $name, "style" => $style]);
    }
}

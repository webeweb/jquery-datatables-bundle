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

namespace WBW\Bundle\BootstrapBundle\Twig\Extension\Content;

use WBW\Bundle\BootstrapBundle\Twig\Extension\AbstractTwigExtension;

/**
 * Abstract typography Twig extension.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Twig\Extension\Content
 * @abstract
 */
abstract class AbstractTypographyTwigExtension extends AbstractTwigExtension {

    /**
     * Display a Bootstrap bold text.
     *
     * @param string|null $content The content.
     * @return string  Returns the Bootstrap bold text.
     */
    protected function bootstrapBold(?string $content): string {
        return static::h("strong", $content);
    }

    /**
     * Display a Bootstrap deleted text.
     *
     * @param string|null $content The content.
     * @return string  Returns the Bootstrap deleted text.
     */
    protected function bootstrapDeleted(?string $content): string {
        return static::h("del", $content);
    }

    /**
     * Display a Bootstrap heading.
     *
     * @param int|null $size The size.
     * @param string|null $content The content.
     * @param string|null $description The description.
     * @param string|null $class The class.
     * @return string Returns the Bootstrap heading.
     */
    protected function bootstrapHeading(?int $size, ?string $content, ?string $description, ?string $class): string {

        $sizes = [1, 2, 3, 4, 5, 6];

        $attributes = [
            "class" => [
                $class,
            ],
        ];

        $element   = "h" . (true === in_array($size, $sizes) ? $size : 1);
        $secondary = null !== $description ? " <small>" . $description . "</small>" : "";
        $innerHTML = (null !== $content ? $content : "") . $secondary;

        return static::h($element, $innerHTML, $attributes);
    }

    /**
     * Display a Bootstrap inserted text.
     *
     * @param string|null $content The content.
     * @return string  Returns the Bootstrap inserted text.
     */
    protected function bootstrapInserted(?string $content): string {
        return static::h("ins", $content);
    }

    /**
     * Display a Bootstrap italic text.
     *
     * @param string|null $content The content.
     * @return string  Returns the Bootstrap italic text.
     */
    protected function bootstrapItalic(?string $content): string {
        return static::h("em", $content);
    }

    /**
     * Display a Bootstrap marked text.
     *
     * @param string|null $content The content.
     * @return string  Returns the Bootstrap marked text.
     */
    protected function bootstrapMarked(?string $content): string {
        return static::h("mark", $content);
    }

    /**
     * Display a Bootstrap small text.
     *
     * @param string|null $content The content.
     * @return string  Returns the Bootstrap small text.
     */
    protected function bootstrapSmall(?string $content): string {
        return static::h("small", $content);
    }

    /**
     * Display a Bootstrap strike through text.
     *
     * @param string|null $content The content.
     * @return string  Returns the Bootstrap strike through text.
     */
    protected function bootstrapStrikeThrough(?string $content): string {
        return static::h("s", $content);
    }

    /**
     * Display a Bootstrap underlined text.
     *
     * @param string|null $content The content.
     * @return string  Returns the Bootstrap underlined text.
     */
    protected function bootstrapUnderlined(?string $content): string {
        return static::h("u", $content);
    }
}

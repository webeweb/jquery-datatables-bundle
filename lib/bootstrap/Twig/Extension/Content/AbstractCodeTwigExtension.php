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

namespace WBW\Bundle\BootstrapBundle\Twig\Extension\Content;

use WBW\Bundle\BootstrapBundle\Twig\Extension\AbstractTwigExtension;

/**
 * Abstract code Twig extension.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Twig\Extension\Content
 * @abstract
 */
abstract class AbstractCodeTwigExtension extends AbstractTwigExtension {

    /**
     * Render a Bootstrap basic block.
     *
     * @param string|null $content The content.
     * @return string  Returns the Bootstrap basic block.
     */
    protected function bootstrapBasicBlock(?string $content): string {
        return static::h("pre", $content);
    }

    /**
     * Render a Bootstrap inline.
     *
     * @param string|null $content The inline content.
     * @return string  Returns the Bootstrap inline.
     */
    protected function bootstrapInline(?string $content): string {
        return static::h("code", $content);
    }

    /**
     * Render a Bootstrap sample output.
     *
     * @param string|null $content The content.
     * @return string  Returns the Bootstrap sample output.
     */
    protected function bootstrapSampleOutput(?string $content): string {
        return static::h("samp", $content);
    }

    /**
     * Render a Bootstrap user input.
     *
     * @param string|null $content The content.
     * @return string  Returns the Bootstrap user input.
     */
    protected function bootstrapUserInput(?string $content): string {
        return static::h("kbd", $content);
    }

    /**
     * Render a Bootstrap variable.
     *
     * @param string|null $content The content.
     * @return string  Returns the Bootstrap variable.
     */
    protected function bootstrapVariable(?string $content): string {
        return static::h("var", $content);
    }
}

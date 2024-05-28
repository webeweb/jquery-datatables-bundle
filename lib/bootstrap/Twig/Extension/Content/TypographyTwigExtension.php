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

use Twig\TwigFunction;
use WBW\Library\Common\Helper\ArrayHelper;

/**
 * Typography Twig extension.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Twig\Extension\Content
 * @link https://getbootstrap.com/docs/3.3/css/#type
 */
class TypographyTwigExtension extends AbstractTypographyTwigExtension {

    /**
     * Service name.
     *
     * @var string
     */
    public const SERVICE_NAME = "wbw.bootstrap.twig.extension.content.typography";

    /**
     * Render a Bootstrap bold text.
     *
     * @param array<string,mixed> $args The arguments.
     * @return string Returns the Bootstrap bold text.
     */
    public function bootstrapBoldFunction(array $args = []): string {
        return $this->bootstrapBold(ArrayHelper::get($args, "content"));
    }

    /**
     * Render a Bootstrap deleted text.
     *
     * @param array<string,mixed> $args The arguments.
     * @return string Returns the Bootstrap deleted text.
     */
    public function bootstrapDeletedFunction(array $args = []): string {
        return $this->bootstrapDeleted(ArrayHelper::get($args, "content"));
    }

    /**
     * Render a Boostrap heading 1.
     *
     * @param array<string,mixed> $args The arguments.
     * @return string Returns the Bootstrap heading 1.
     */
    public function bootstrapHeading1Function(array $args = []): string {
        return $this->bootstrapHeading(1, ArrayHelper::get($args, "content"), ArrayHelper::get($args, "description"), ArrayHelper::get($args, "class"));
    }

    /**
     * Render a Bootstrap heading 2.
     *
     * @param array<string,mixed> $args The arguments.
     * @return string Returns the Bootstrap heading 2.
     */
    public function bootstrapHeading2Function(array $args = []): string {
        return $this->bootstrapHeading(2, ArrayHelper::get($args, "content"), ArrayHelper::get($args, "description"), ArrayHelper::get($args, "class"));
    }

    /**
     * Render a Bootstrap heading 3.
     *
     * @param array<string,mixed> $args The arguments.
     * @return string Returns the Bootstrap heading 3.
     */
    public function bootstrapHeading3Function(array $args = []): string {
        return $this->bootstrapHeading(3, ArrayHelper::get($args, "content"), ArrayHelper::get($args, "description"), ArrayHelper::get($args, "class"));
    }

    /**
     * Render a Bootstrap heading 4.
     *
     * @param array<string,mixed> $args The arguments.
     * @return string Returns the Bootstrap heading 4.
     */
    public function bootstrapHeading4Function(array $args = []): string {
        return $this->bootstrapHeading(4, ArrayHelper::get($args, "content"), ArrayHelper::get($args, "description"), ArrayHelper::get($args, "class"));
    }

    /**
     * Render a Bootstrap heading 5.
     *
     * @param array<string,mixed> $args The arguments.
     * @return string Returns the Bootstrap heading 5.
     */
    public function bootstrapHeading5Function(array $args = []): string {
        return $this->bootstrapHeading(5, ArrayHelper::get($args, "content"), ArrayHelper::get($args, "description"), ArrayHelper::get($args, "class"));
    }

    /**
     * Render a Bootstrap heading 6.
     *
     * @param array<string,mixed> $args The arguments.
     * @return string Returns the Bootstrap heading 6.
     */
    public function bootstrapHeading6Function(array $args = []): string {
        return $this->bootstrapHeading(6, ArrayHelper::get($args, "content"), ArrayHelper::get($args, "description"), ArrayHelper::get($args, "class"));
    }

    /**
     * Render a Bootstrap inserted text.
     *
     * @param array<string,mixed> $args The arguments.
     * @return string Returns the Bootstrap inserted text.
     */
    public function bootstrapInsertedFunction(array $args = []): string {
        return $this->bootstrapInserted(ArrayHelper::get($args, "content"));
    }

    /**
     * Render a Bootstrap italic text.
     *
     * @param array<string,mixed> $args The arguments.
     * @return string Returns the Bootstrap italic text.
     */
    public function bootstrapItalicFunction(array $args = []): string {
        return $this->bootstrapItalic(ArrayHelper::get($args, "content"));
    }

    /**
     * Render a Bootstrap marked text.
     *
     * @param array<string,mixed> $args The arguments.
     * @return string Returns the Bootstrap marked text.
     */
    public function bootstrapMarkedFunction(array $args = []): string {
        return $this->bootstrapMarked(ArrayHelper::get($args, "content"));
    }

    /**
     * Render a Bootstrap small text.
     *
     * @param array<string,mixed> $args The arguments.
     * @return string Returns the Bootstrap small text.
     */
    public function bootstrapSmallFunction(array $args = []): string {
        return $this->bootstrapSmall(ArrayHelper::get($args, "content"));
    }

    /**
     * Render a Bootstrap strike through text.
     *
     * @param array<string,mixed> $args The arguments.
     * @return string Returns the Bootstrap strike through text.
     */
    public function bootstrapStrikeThroughFunction(array $args = []): string {
        return $this->bootstrapStrikeThrough(ArrayHelper::get($args, "content"));
    }

    /**
     * Render a Bootstrap underlined text.
     *
     * @param array<string,mixed> $args The arguments.
     * @return string Returns the Bootstrap underlined text.
     */
    public function bootstrapUnderlinedFunction(array $args = []): string {
        return $this->bootstrapUnderlined(ArrayHelper::get($args, "content"));
    }

    /**
     * Get the Twig functions.
     *
     * @return TwigFunction[] Returns the Twig functions.
     */
    public function getFunctions(): array {

        return [
            new TwigFunction("bootstrapBold", [$this, "bootstrapBoldFunction"], ["is_safe" => ["html"]]),
            new TwigFunction("bsBold", [$this, "bootstrapBoldFunction"], ["is_safe" => ["html"]]),

            new TwigFunction("bootstrapDeleted", [$this, "bootstrapDeletedFunction"], ["is_safe" => ["html"]]),
            new TwigFunction("bsDeleted", [$this, "bootstrapDeletedFunction"], ["is_safe" => ["html"]]),

            new TwigFunction("bootstrapHeading1", [$this, "bootstrapHeading1Function"], ["is_safe" => ["html"]]),
            new TwigFunction("bsHeading1", [$this, "bootstrapHeading1Function"], ["is_safe" => ["html"]]),

            new TwigFunction("bootstrapHeading2", [$this, "bootstrapHeading2Function"], ["is_safe" => ["html"]]),
            new TwigFunction("bsHeading2", [$this, "bootstrapHeading2Function"], ["is_safe" => ["html"]]),

            new TwigFunction("bootstrapHeading3", [$this, "bootstrapHeading3Function"], ["is_safe" => ["html"]]),
            new TwigFunction("bsHeading3", [$this, "bootstrapHeading3Function"], ["is_safe" => ["html"]]),

            new TwigFunction("bootstrapHeading4", [$this, "bootstrapHeading4Function"], ["is_safe" => ["html"]]),
            new TwigFunction("bsHeading4", [$this, "bootstrapHeading4Function"], ["is_safe" => ["html"]]),

            new TwigFunction("bootstrapHeading5", [$this, "bootstrapHeading5Function"], ["is_safe" => ["html"]]),
            new TwigFunction("bsHeading5", [$this, "bootstrapHeading5Function"], ["is_safe" => ["html"]]),

            new TwigFunction("bootstrapHeading6", [$this, "bootstrapHeading6Function"], ["is_safe" => ["html"]]),
            new TwigFunction("bsHeading6", [$this, "bootstrapHeading6Function"], ["is_safe" => ["html"]]),

            new TwigFunction("bootstrapInserted", [$this, "bootstrapInsertedFunction"], ["is_safe" => ["html"]]),
            new TwigFunction("bsInserted", [$this, "bootstrapInsertedFunction"], ["is_safe" => ["html"]]),

            new TwigFunction("bootstrapItalic", [$this, "bootstrapItalicFunction"], ["is_safe" => ["html"]]),
            new TwigFunction("bsItalic", [$this, "bootstrapItalicFunction"], ["is_safe" => ["html"]]),

            new TwigFunction("bootstrapMarked", [$this, "bootstrapMarkedFunction"], ["is_safe" => ["html"]]),
            new TwigFunction("bsMarked", [$this, "bootstrapMarkedFunction"], ["is_safe" => ["html"]]),

            new TwigFunction("bootstrapSmall", [$this, "bootstrapSmallFunction"], ["is_safe" => ["html"]]),
            new TwigFunction("bsSmall", [$this, "bootstrapSmallFunction"], ["is_safe" => ["html"]]),

            new TwigFunction("bootstrapStrikethrough", [$this, "bootstrapStrikethroughFunction"], ["is_safe" => ["html"]]),
            new TwigFunction("bsStrikethrough", [$this, "bootstrapStrikethroughFunction"], ["is_safe" => ["html"]]),

            new TwigFunction("bootstrapUnderlined", [$this, "bootstrapUnderlinedFunction"], ["is_safe" => ["html"]]),
            new TwigFunction("bsUnderlined", [$this, "bootstrapUnderlinedFunction"], ["is_safe" => ["html"]]),
        ];
    }
}

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

/**
 * Glyphicon Twig extension trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Twig\Extension\Extend
 */
trait GlyphiconTwigExtensionTrait {

    /**
     * Glyphicon Twig extension.
     *
     * @var GlyphiconTwigExtension|null
     */
    private $glyphiconTwigExtension;

    /**
     * Get the glyphicon Twig extension.
     *
     * @return GlyphiconTwigExtension Returns the glyphicon Twig extension.
     */
    public function getGlyphiconTwigExtension(): ?GlyphiconTwigExtension {
        return $this->glyphiconTwigExtension;
    }

    /**
     * Set the glyphicon Twig extension.
     *
     * @param GlyphiconTwigExtension|null $glyphiconTwigExtension The glyphicon Twig extension.
     * @return self Returns this instance.
     */
    protected function setGlyphiconTwigExtension(?GlyphiconTwigExtension $glyphiconTwigExtension): self {
        $this->glyphiconTwigExtension = $glyphiconTwigExtension;
        return $this;
    }
}

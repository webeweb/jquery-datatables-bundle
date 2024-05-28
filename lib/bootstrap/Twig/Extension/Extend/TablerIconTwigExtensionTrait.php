<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\BootstrapBundle\Twig\Extension\Extend;

/**
 * Tabler icon Twig extension trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Twig\Extension\Extend
 */
trait TablerIconTwigExtensionTrait {

    /**
     * Tabler icon Twig extension.
     *
     * @var TablerIconTwigExtension|null
     */
    private $tablerIconTwigExtension;

    /**
     * Get the Tabler icon Twig extension.
     *
     * @return TablerIconTwigExtension Returns the Tabler icon Twig extension.
     */
    public function getTablerIconTwigExtension(): ?TablerIconTwigExtension {
        return $this->tablerIconTwigExtension;
    }

    /**
     * Set the Tabler icon Twig extension.
     *
     * @param TablerIconTwigExtension|null $tablerIconTwigExtension The Tabler icon Twig extension.
     * @return self Returns this instance.
     */
    protected function setTablerIconTwigExtension(?TablerIconTwigExtension $tablerIconTwigExtension): self {
        $this->tablerIconTwigExtension = $tablerIconTwigExtension;
        return $this;
    }
}

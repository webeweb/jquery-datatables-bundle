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

/**
 * Bootstrap icon Twig extension trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Twig\Extension\Extend
 */
trait IconTwigExtensionTrait {

    /**
     * Bootstrap icon Twig extension.
     *
     * @var IconTwigExtension|null
     */
    private $iconTwigExtension;

    /**
     * Get the Bootstrap icon Twig extension.
     *
     * @return IconTwigExtension Returns the Bootstrap icon Twig extension.
     */
    public function getIconTwigExtension(): ?IconTwigExtension {
        return $this->iconTwigExtension;
    }

    /**
     * Set the Bootstrap icon Twig extension.
     *
     * @param IconTwigExtension|null $iconTwigExtension The Bootstrap icon Twig extension.
     * @return self Returns this instance.
     */
    protected function setIconTwigExtension(?IconTwigExtension $iconTwigExtension): self {
        $this->iconTwigExtension = $iconTwigExtension;
        return $this;
    }
}

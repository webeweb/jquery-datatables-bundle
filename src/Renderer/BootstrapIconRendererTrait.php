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

namespace WBW\Bundle\DataTablesBundle\Renderer;

use Twig\Environment;
use WBW\Bundle\BootstrapBundle\Twig\Extension\AssetsTwigExtension;

/**
 * Bootstrap icon renderer trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Renderer
 */
trait BootstrapIconRendererTrait {

    /**
     * Get the Twig environment.
     *
     * @return Environment|null Returns the Twig environment.
     */
    abstract public function getTwigEnvironment(): ?Environment;

    /**
     * Render an icon.
     *
     * @param string|null $icon The icon.
     * @return string|null Returns the rendered icon.
     */
    protected function renderIcon(?string $icon): ?string {

        if (null === $this->getTwigEnvironment()) {
            return null;
        }

        return AssetsTwigExtension::renderIcon($this->getTwigEnvironment(), $icon);
    }
}

<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Renderer\Assets;

use Twig\Environment;
use WBW\Bundle\BootstrapBundle\Twig\Extension\RendererTwigExtension;

/**
 * Icon renderer trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Renderer\Assets
 */
trait IconRendererTrait {

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
     * @return string|null Returns the icon in case of success, null otherwise.
     */
    protected function renderIcon(?string $icon): string {

        if (null === $icon || "" === $icon || null === $this->getTwigEnvironment()) {
            return "";
        }

        return RendererTwigExtension::renderIcon($this->getTwigEnvironment(), $icon);
    }
}
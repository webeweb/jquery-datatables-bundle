<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\BootstrapBundle\Twig\Extension\Extend;

/**
 * Meteocons Twig extension trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Twig\Extension\Extend
 */
trait MeteoconsTwigExtensionTrait {

    /**
     * Meteocons Twig extension.
     *
     * @var MeteoconsTwigExtension|null
     */
    private $meteoconsTwigExtension;

    /**
     * Get the Meteocons Twig extension.
     *
     * @return MeteoconsTwigExtension|null Returns the Meteocons Twig extension.
     */
    public function getMeteoconsTwigExtension(): ?MeteoconsTwigExtension {
        return $this->meteoconsTwigExtension;
    }

    /**
     * Set the Meteocons Twig extension.
     *
     * @param MeteoconsTwigExtension|null $meteoconsTwigExtension The Meteocons Twig extension.
     * @return self Returns this instance.
     */
    protected function setMeteoconsTwigExtension(?MeteoconsTwigExtension $meteoconsTwigExtension): self {
        $this->meteoconsTwigExtension = $meteoconsTwigExtension;
        return $this;
    }
}

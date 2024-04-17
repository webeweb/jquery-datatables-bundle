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
 * Material Design Iconic font Twig extension trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Twig\Extension\Extend
 */
trait MaterialDesignIconicFontTwigExtensionTrait {

    /**
     * Material Design Iconic font Twig extension.
     *
     * @var MaterialDesignIconicFontTwigExtension|null
     */
    private $materialDesignIconicFontTwigExtension;

    /**
     * Get the Material Design Iconic font Twig extension.
     *
     * @return MaterialDesignIconicFontTwigExtension|null Returns the Material Design Iconic font Twig extension.
     */
    public function getMaterialDesignIconicFontTwigExtension(): ?MaterialDesignIconicFontTwigExtension {
        return $this->materialDesignIconicFontTwigExtension;
    }

    /**
     * Set the Material Design Iconic font Twig extension.
     *
     * @param MaterialDesignIconicFontTwigExtension|null $materialDesignIconicFontTwigExtension The Material Design Iconic font Twig extension.
     * @return self Returns this instance.
     */
    protected function setMaterialDesignIconicFontTwigExtension(?MaterialDesignIconicFontTwigExtension $materialDesignIconicFontTwigExtension): self {
        $this->materialDesignIconicFontTwigExtension = $materialDesignIconicFontTwigExtension;
        return $this;
    }
}

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

namespace WBW\Bundle\BootstrapBundle\Extend;

/**
 * Material Design iconic font icon trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Extend
 */
trait MaterialDesignIconicFontIconTrait {

    /**
     * Material Design iconic font icon.
     *
     * @var MaterialDesignIconicFontIconInterface|null
     */
    protected $materialDesignIconicFontIcon;

    /**
     * Get the Material Design iconic font icon.
     *
     * @return MaterialDesignIconicFontIconInterface|null Returns the Material Design iconic font icon.
     */
    public function getMaterialDesignIconicFontIcon(): ?MaterialDesignIconicFontIconInterface {
        return $this->materialDesignIconicFontIcon;
    }

    /**
     * Set the Material Design iconic font icon.
     *
     * @param MaterialDesignIconicFontIconInterface|null $materialDesignIconicFontIcon The Material Design iconic font icon.
     * @return self Returns this instance.
     */
    public function setMaterialDesignIconicFontIcon(?MaterialDesignIconicFontIconInterface $materialDesignIconicFontIcon): self {
        $this->materialDesignIconicFontIcon = $materialDesignIconicFontIcon;
        return $this;
    }
}

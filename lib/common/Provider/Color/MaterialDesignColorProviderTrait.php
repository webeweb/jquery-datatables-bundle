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

namespace WBW\Bundle\CommonBundle\Provider\Color;

/**
 * Material design color provider trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Provider\Color
 */
trait MaterialDesignColorProviderTrait {

    /**
     * Material design color provider.
     *
     * @var MaterialDesignColorProviderInterface|null
     */
    protected $materialDesignColorProvider;

    /**
     * Get the material design color provider.
     *
     * @return MaterialDesignColorProviderInterface|null Returns the material design color provider.
     */
    public function getMaterialDesignColorProvider(): ?MaterialDesignColorProviderInterface {
        return $this->materialDesignColorProvider;
    }

    /**
     * Set the material design color provider.
     *
     * @param MaterialDesignColorProviderInterface|null $materialDesignColorProvider The material design color provider.
     * @return self Returns this instance.
     */
    protected function setMaterialDesignColorProvider(?MaterialDesignColorProviderInterface $materialDesignColorProvider): self {
        $this->materialDesignColorProvider = $materialDesignColorProvider;
        return $this;
    }
}

<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\Manager;

/**
 * Color manager trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Manager
 */
trait ColorManagerTrait {

    /**
     * Color manager.
     *
     * @var ColorManagerInterface|null
     */
    private $colorManager;

    /**
     * Get the color manager.
     *
     * @return ColorManagerInterface|null Returns the color manager.
     */
    public function getColorManager(): ?ColorManagerInterface {
        return $this->colorManager;
    }

    /**
     * Set the color manager.
     *
     * @param ColorManagerInterface|null $colorManager The color manager.
     * @return self Returns this instance.
     */
    protected function setColorManager(?ColorManagerInterface $colorManager): self {
        $this->colorManager = $colorManager;
        return $this;
    }
}

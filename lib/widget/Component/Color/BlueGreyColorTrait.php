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

namespace WBW\Bundle\WidgetBundle\Component\Color;

/**
 * Blue grey color trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Component\Color
 */
trait BlueGreyColorTrait {

    /**
     * Blue grey color.
     *
     * @var BlueGreyColorInterface|null
     */
    private $blueGreyColor;

    /**
     * Get the blue grey color.
     *
     * @return BlueGreyColorInterface|null Returns the blue grey color.
     */
    public function getBlueGreyColor(): ?BlueGreyColorInterface {
        return $this->blueGreyColor;
    }

    /**
     * Set the blue grey color.
     *
     * @param BlueGreyColorInterface|null $blueGreyColor The blue grey color.
     * @return self Returns this instance.
     */
    protected function setBlueGreyColor(?BlueGreyColorInterface $blueGreyColor): self {
        $this->blueGreyColor = $blueGreyColor;
        return $this;
    }
}

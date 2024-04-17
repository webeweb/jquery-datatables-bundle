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
 * Light blue color trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Component\Color
 */
trait LightBlueColorTrait {

    /**
     * Light blue color.
     *
     * @var LightBlueColorInterface|null
     */
    private $lightBlueColor;

    /**
     * Get the light blue color.
     *
     * @return LightBlueColorInterface|null Returns the light blue color.
     */
    public function getLightBlueColor(): ?LightBlueColorInterface {
        return $this->lightBlueColor;
    }

    /**
     * Set the light blue color.
     *
     * @param LightBlueColorInterface|null $lightBlueColor The light blue color.
     * @return self Returns this instance.
     */
    protected function setLightBlueColor(?LightBlueColorInterface $lightBlueColor): self {
        $this->lightBlueColor = $lightBlueColor;
        return $this;
    }
}

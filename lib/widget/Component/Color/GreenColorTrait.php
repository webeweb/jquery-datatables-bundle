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
 * Green color trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Component\Color
 */
trait GreenColorTrait {

    /**
     * Green color.
     *
     * @var GreenColorInterface|null
     */
    private $greenColor;

    /**
     * Get the green color.
     *
     * @return GreenColorInterface|null Returns the green color.
     */
    public function getGreenColor(): ?GreenColorInterface {
        return $this->greenColor;
    }

    /**
     * Set the green color.
     *
     * @param GreenColorInterface|null $greenColor The green color.
     * @return self Returns this instance.
     */
    protected function setGreenColor(?GreenColorInterface $greenColor): self {
        $this->greenColor = $greenColor;
        return $this;
    }
}

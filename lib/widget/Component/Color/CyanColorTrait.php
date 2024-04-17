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
 * Cyan color trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Component\Color
 */
trait CyanColorTrait {

    /**
     * Cyan color.
     *
     * @var CyanColorInterface|null
     */
    private $cyanColor;

    /**
     * Get the cyan color.
     *
     * @return CyanColorInterface|null Returns the cyan color.
     */
    public function getCyanColor(): ?CyanColorInterface {
        return $this->cyanColor;
    }

    /**
     * Set the cyan color.
     *
     * @param CyanColorInterface|null $cyanColor The cyan color.
     * @return self Returns this instance.
     */
    protected function setCyanColor(?CyanColorInterface $cyanColor): self {
        $this->cyanColor = $cyanColor;
        return $this;
    }
}

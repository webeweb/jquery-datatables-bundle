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
 * Grey color trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Component\Color
 */
trait GreyColorTrait {

    /**
     * Grey color.
     *
     * @var GreyColorInterface|null
     */
    private $greyColor;

    /**
     * Get the grey color.
     *
     * @return GreyColorInterface|null Returns the grey color.
     */
    public function getGreyColor(): ?GreyColorInterface {
        return $this->greyColor;
    }

    /**
     * Set the grey color.
     *
     * @param GreyColorInterface|null $greyColor The grey color.
     * @return self Returns this instance.
     */
    protected function setGreyColor(?GreyColorInterface $greyColor): self {
        $this->greyColor = $greyColor;
        return $this;
    }
}

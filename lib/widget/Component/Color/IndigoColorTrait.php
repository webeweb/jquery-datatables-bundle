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
 * Indigo color trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Component\Color
 */
trait IndigoColorTrait {

    /**
     * Indigo color.
     *
     * @var IndigoColorInterface|null
     */
    private $indigoColor;

    /**
     * Get the indigo color.
     *
     * @return IndigoColorInterface|null Returns the indigo color.
     */
    public function getIndigoColor(): ?IndigoColorInterface {
        return $this->indigoColor;
    }

    /**
     * Set the indigo color.
     *
     * @param IndigoColorInterface|null $indigoColor The indigo color.
     * @return self Returns this instance.
     */
    protected function setIndigoColor(?IndigoColorInterface $indigoColor): self {
        $this->indigoColor = $indigoColor;
        return $this;
    }
}

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
 * White color trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Component\Color
 */
trait WhiteColorTrait {

    /**
     * White color.
     *
     * @var WhiteColorInterface|null
     */
    private $whiteColor;

    /**
     * Get the white color.
     *
     * @return WhiteColorInterface|null Returns the white color.
     */
    public function getWhiteColor(): ?WhiteColorInterface {
        return $this->whiteColor;
    }

    /**
     * Set the white color.
     *
     * @param WhiteColorInterface|null $whiteColor The white color.
     * @return self Returns this instance.
     */
    protected function setWhiteColor(?WhiteColorInterface $whiteColor): self {
        $this->whiteColor = $whiteColor;
        return $this;
    }
}

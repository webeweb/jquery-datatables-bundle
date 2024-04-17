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
 * Black color trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Component\Color
 */
trait BlackColorTrait {

    /**
     * Black color.
     *
     * @var BlackColorInterface|null
     */
    private $blackColor;

    /**
     * Get the black color.
     *
     * @return BlackColorInterface|null Returns the black color.
     */
    public function getBlackColor(): ?BlackColorInterface {
        return $this->blackColor;
    }

    /**
     * Set the black color.
     *
     * @param BlackColorInterface|null $blackColor The black color.
     * @return self Returns this instance.
     */
    protected function setBlackColor(?BlackColorInterface $blackColor): self {
        $this->blackColor = $blackColor;
        return $this;
    }
}

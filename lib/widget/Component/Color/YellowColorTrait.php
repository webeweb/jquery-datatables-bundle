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
 * Yellow color trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Component\Color
 */
trait YellowColorTrait {

    /**
     * Yellow color.
     *
     * @var YellowColorInterface|null
     */
    private $yellowColor;

    /**
     * Get the yellow color.
     *
     * @return YellowColorInterface|null Returns the yellow color.
     */
    public function getYellowColor(): ?YellowColorInterface {
        return $this->yellowColor;
    }

    /**
     * Set the yellow color.
     *
     * @param YellowColorInterface|null $yellowColor The yellow color.
     * @return self Returns this instance.
     */
    protected function setYellowColor(?YellowColorInterface $yellowColor): self {
        $this->yellowColor = $yellowColor;
        return $this;
    }
}

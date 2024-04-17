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
 * Purple color trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Component\Color
 */
trait PurpleColorTrait {

    /**
     * Purple color.
     *
     * @var PurpleColorInterface|null
     */
    private $purpleColor;

    /**
     * Get the purple color.
     *
     * @return PurpleColorInterface|null Returns the purple color.
     */
    public function getPurpleColor(): ?PurpleColorInterface {
        return $this->purpleColor;
    }

    /**
     * Set the purple color.
     *
     * @param PurpleColorInterface|null $purpleColor The purple color.
     * @return self Returns this instance.
     */
    protected function setPurpleColor(?PurpleColorInterface $purpleColor): self {
        $this->purpleColor = $purpleColor;
        return $this;
    }
}

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
 * Deep purple color trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Component\Color
 */
trait DeepPurpleColorTrait {

    /**
     * Deep purple color.
     *
     * @var DeepPurpleColorInterface|null
     */
    private $deepPurpleColor;

    /**
     * Get the deep purple color.
     *
     * @return DeepPurpleColorInterface|null Returns the deep purple color.
     */
    public function getDeepPurpleColor(): ?DeepPurpleColorInterface {
        return $this->deepPurpleColor;
    }

    /**
     * Set the deep purple color.
     *
     * @param DeepPurpleColorInterface|null $deepPurpleColor The deep purple color.
     * @return self Returns this instance.
     */
    protected function setDeepPurpleColor(?DeepPurpleColorInterface $deepPurpleColor): self {
        $this->deepPurpleColor = $deepPurpleColor;
        return $this;
    }
}

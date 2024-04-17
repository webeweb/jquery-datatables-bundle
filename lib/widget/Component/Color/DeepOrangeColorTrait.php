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
 * Deep orange color trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Component\Color
 */
trait DeepOrangeColorTrait {

    /**
     * Deep orange color.
     *
     * @var DeepOrangeColorInterface|null
     */
    private $deepOrangeColor;

    /**
     * Get the deep orange color.
     *
     * @return DeepOrangeColorInterface|null Returns the deep orange color.
     */
    public function getDeepOrangeColor(): ?DeepOrangeColorInterface {
        return $this->deepOrangeColor;
    }

    /**
     * Set the deep orange color.
     *
     * @param DeepOrangeColorInterface|null $deepOrangeColor The deep orange color.
     * @return self Returns this instance.
     */
    protected function setDeepOrangeColor(?DeepOrangeColorInterface $deepOrangeColor): self {
        $this->deepOrangeColor = $deepOrangeColor;
        return $this;
    }
}

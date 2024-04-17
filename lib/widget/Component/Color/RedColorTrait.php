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
 * Red color trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Component\Color
 */
trait RedColorTrait {

    /**
     * Red color.
     *
     * @var RedColorInterface|null
     */
    private $redColor;

    /**
     * Get the red color.
     *
     * @return RedColorInterface|null Returns the red color.
     */
    public function getRedColor(): ?RedColorInterface {
        return $this->redColor;
    }

    /**
     * Set the red color.
     *
     * @param RedColorInterface|null $redColor The red color.
     * @return self Returns this instance.
     */
    protected function setRedColor(?RedColorInterface $redColor): self {
        $this->redColor = $redColor;
        return $this;
    }
}

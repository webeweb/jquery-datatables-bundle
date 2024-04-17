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
 * Teal color trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Component\Color
 */
trait TealColorTrait {

    /**
     * Teal color.
     *
     * @var TealColorInterface|null
     */
    private $tealColor;

    /**
     * Get the teal color.
     *
     * @return TealColorInterface|null Returns the teal color.
     */
    public function getTealColor(): ?TealColorInterface {
        return $this->tealColor;
    }

    /**
     * Set the teal color.
     *
     * @param TealColorInterface|null $tealColor The teal color.
     * @return self Returns this instance.
     */
    protected function setTealColor(?TealColorInterface $tealColor): self {
        $this->tealColor = $tealColor;
        return $this;
    }
}

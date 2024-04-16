<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\WidgetBundle\Button;

/**
 * Button trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Button
 */
trait ButtonTrait {

    /**
     * Button.
     *
     * @var ButtonInterface|null
     */
    protected $button;

    /**
     * Get the button.
     *
     * @return ButtonInterface|null Returns the button.
     */
    public function getButton(): ?ButtonInterface {
        return $this->button;
    }

    /**
     * Set the button.
     *
     * @param ButtonInterface|null $button The button.
     * @return self Returns this instance.
     */
    protected function setButton(?ButtonInterface $button): self {
        $this->button = $button;
        return $this;
    }
}

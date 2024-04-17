<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\WidgetBundle\Component;

/**
 * Label trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Component
 */
trait LabelTrait {

    /**
     * Label.
     *
     * @var LabelInterface|null
     */
    protected $label;

    /**
     * Get the label.
     *
     * @return LabelInterface|null Returns the label.
     */
    public function getLabel(): ?LabelInterface {
        return $this->label;
    }

    /**
     * Set the label.
     *
     * @param LabelInterface|null $label The label.
     * @return self Returns this instance.
     */
    protected function setLabel(?LabelInterface $label): self {
        $this->label = $label;
        return $this;
    }
}

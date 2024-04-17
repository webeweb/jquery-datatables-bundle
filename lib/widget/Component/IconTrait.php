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

namespace WBW\Bundle\WidgetBundle\Component;

/**
 * Icon trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Component
 */
trait IconTrait {

    /**
     * Icon.
     *
     * @var IconInterface|null
     */
    protected $icon;

    /**
     * Get the icon.
     *
     * @return IconInterface|null Returns the icon.
     */
    public function getIcon(): ?IconInterface {
        return $this->icon;
    }

    /**
     * Set the icon.
     *
     * @param IconInterface|null $icon The icon.
     * @return self Returns this instance.
     */
    protected function setIcon(?IconInterface $icon): self {
        $this->icon = $icon;
        return $this;
    }
}
<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\BootstrapBundle\Component;

/**
 * Badge trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Component
 */
trait BadgeTrait {

    /**
     * Badge.
     *
     * @var BadgeInterface|null
     */
    protected $badge;

    /**
     * Get the badge.
     *
     * @return BadgeInterface|null Returns the badge.
     */
    public function getBadge(): ?BadgeInterface {
        return $this->badge;
    }

    /**
     * Set the badge.
     *
     * @param BadgeInterface|null $badge The badge.
     * @return self Returns this instance.
     */
    public function setBadge(?BadgeInterface $badge): self {
        $this->badge = $badge;
        return $this;
    }
}

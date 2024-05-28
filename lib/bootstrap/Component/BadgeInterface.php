<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\BootstrapBundle\Component;

use WBW\Bundle\BootstrapBundle\WBWBootstrapBundle;
use WBW\Library\Widget\Component\BadgeInterface as BaseBadgeInterface;

/**
 * Badge interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Component
 */
interface BadgeInterface extends BaseBadgeInterface {

    /**
     * Badge type "dark".
     *
     * @var string
     */
    public const BADGE_TYPE_DARK = WBWBootstrapBundle::BOOTSTRAP_TYPE_DARK;

    /**
     * Badge type "light".
     *
     * @var string
     */
    public const BADGE_TYPE_LIGHT = WBWBootstrapBundle::BOOTSTRAP_TYPE_LIGHT;

    /**
     * Badge type "primary".
     *
     * @var string
     */
    public const BADGE_TYPE_PRIMARY = WBWBootstrapBundle::BOOTSTRAP_TYPE_PRIMARY;

    /**
     * Badge type "secondary".
     *
     * @var string
     */
    public const BADGE_TYPE_SECONDARY = WBWBootstrapBundle::BOOTSTRAP_TYPE_SECONDARY;

    /**
     * Get the pill.
     *
     * @return bool|null Returns the pill.
     */
    public function getPill(): ?bool;

    /**
     * Get the prefix.
     *
     * @return string|null Returns the prefix.
     */
    public function getPrefix(): ?string;

    /**
     * Set the pill.
     *
     * @param bool|null $pill The pill.
     * @return BadgeInterface Returns this badge.
     */
    public function setPill(?bool $pill): BadgeInterface;
}

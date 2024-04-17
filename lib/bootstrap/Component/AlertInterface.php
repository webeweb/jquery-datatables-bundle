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

namespace WBW\Bundle\BootstrapBundle\Component;

use WBW\Bundle\BootstrapBundle\WBWBootstrapBundle;
use WBW\Bundle\WidgetBundle\Component\AlertInterface as BaseAlertInterface;

/**
 * Alert interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Component
 */
interface AlertInterface extends BaseAlertInterface {

    /**
     * Alert type "dark".
     *
     * @var string
     */
    public const ALERT_TYPE_DARK = WBWBootstrapBundle::BOOTSTRAP_TYPE_DARK;

    /**
     * Alert type "light".
     *
     * @var string
     */
    public const ALERT_TYPE_LIGHT = WBWBootstrapBundle::BOOTSTRAP_TYPE_LIGHT;

    /**
     * Alert type "primary".
     *
     * @var string
     */
    public const ALERT_TYPE_PRIMARY = WBWBootstrapBundle::BOOTSTRAP_TYPE_PRIMARY;

    /**
     * Alert type "secondary".
     *
     * @var string
     */
    public const ALERT_TYPE_SECONDARY = WBWBootstrapBundle::BOOTSTRAP_TYPE_SECONDARY;

    /**
     * Get the dismissible.
     *
     * @return bool|null Returns the dismissible.
     */
    public function getDismissible(): ?bool;

    /**
     * Get the prefix.
     *
     * @return string|null Returns the prefix.
     */
    public function getPrefix(): ?string;

    /**
     * Set the dismissible.
     *
     * @param bool|null $dismissible The dismissible.
     * @return AlertInterface Returns this alert.
     */
    public function setDismissible(?bool $dismissible): AlertInterface;
}

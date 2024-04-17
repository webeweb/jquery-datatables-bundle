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

namespace WBW\Bundle\BootstrapBundle\Renderer\Component;

use WBW\Bundle\BootstrapBundle\Component\AlertInterface;

/**
 * Alert renderer.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Renderer\Component
 */
class AlertRenderer {

    /**
     * Render a content.
     *
     * @param AlertInterface $alert The alert.
     * @return string Returns the rendered block.
     */
    public static function renderContent(AlertInterface $alert): string {
        return null !== $alert->getContent() ? $alert->getContent() : "";
    }

    /**
     * Render a dismissible.
     *
     * @param AlertInterface $alert The alert.
     * @return string|null Returns the rendered dismissible.
     */
    public static function renderDismissible(AlertInterface $alert): ?string {
        return true === $alert->getDismissible() ? "alert-dismissible" : null;
    }

    /**
     * Render a type.
     *
     * @param AlertInterface $alert The alert.
     * @return string|null Returns the rendered type.
     */
    public static function renderType(AlertInterface $alert): ?string {
        return null !== $alert->getType() ? $alert->getPrefix() . $alert->getType() : null;
    }
}

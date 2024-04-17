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

namespace WBW\Bundle\BootstrapBundle\Factory\Component;

use WBW\Library\Symfony\Assets\Navigation\BreadcrumbNode;
use WBW\Library\Symfony\Assets\NavigationNodeInterface;

/**
 * Breadcrumb factory.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Factory\Component
 */
class BreadcrumbFactory {

    /**
     * Create the breadcrumb items "FOSUser" with Font Awesome.
     *
     * @return BreadcrumbNode[] Returns the breadcrumb items.
     */
    public static function newBreadcrumbItemsFOSUserWithFontAwesome(): array {

        return [
            new BreadcrumbNode("label.edit_profile", "fa:user", "fos_user_profile_edit", NavigationNodeInterface::MATCHER_ROUTER),
            new BreadcrumbNode("label.show_profile", "fa:user", "fos_user_profile_show", NavigationNodeInterface::MATCHER_ROUTER),
            new BreadcrumbNode("label.change_password", "fa:lock", "fos_user_change_password", NavigationNodeInterface::MATCHER_ROUTER),
        ];
    }

    /**
     * Create the breadcrumb items "FOSUser" with Glyphicon.
     *
     * @return BreadcrumbNode[] Returns the breadcrumb items.
     */
    public static function newBreadcrumbItemsFOSUserWithGlyphicon(): array {

        return [
            new BreadcrumbNode("label.edit_profile", "g:user", "fos_user_profile_edit", NavigationNodeInterface::MATCHER_ROUTER),
            new BreadcrumbNode("label.show_profile", "g:user", "fos_user_profile_show", NavigationNodeInterface::MATCHER_ROUTER),
            new BreadcrumbNode("label.change_password", "g:lock", "fos_user_change_password", NavigationNodeInterface::MATCHER_ROUTER),
        ];
    }

    /**
     * Create the breadcrumb items "FOSUser" with Material Design Iconic font.
     *
     * @return BreadcrumbNode[] Returns the breadcrumb items.
     */
    public static function newBreadcrumbItemsFOSUserWithMaterialDesignIconicFont(): array {

        return [
            new BreadcrumbNode("label.edit_profile", "zmdi:account", "fos_user_profile_edit", NavigationNodeInterface::MATCHER_ROUTER),
            new BreadcrumbNode("label.show_profile", "zmdi:account", "fos_user_profile_show", NavigationNodeInterface::MATCHER_ROUTER),
            new BreadcrumbNode("label.change_password", "zmdi:lock", "fos_user_change_password", NavigationNodeInterface::MATCHER_ROUTER),
        ];
    }
}

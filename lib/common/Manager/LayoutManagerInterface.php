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

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\Manager;

use WBW\Bundle\CommonBundle\Provider\Layout\ApplicationLayoutProviderInterface;
use WBW\Bundle\CommonBundle\Provider\Layout\BreadcrumbsLayoutProviderInterface;
use WBW\Bundle\CommonBundle\Provider\Layout\FooterLayoutProviderInterface;
use WBW\Bundle\CommonBundle\Provider\Layout\HookDropdownLayoutProviderInterface;
use WBW\Bundle\CommonBundle\Provider\Layout\NavigationLayoutProviderInterface;
use WBW\Bundle\CommonBundle\Provider\Layout\NotificationsDropdownLayoutProviderInterface;
use WBW\Bundle\CommonBundle\Provider\Layout\SearchLayoutProviderInterface;
use WBW\Bundle\CommonBundle\Provider\Layout\TasksDropdownLayoutProviderInterface;
use WBW\Bundle\CommonBundle\Provider\Layout\UserInfoLayoutProviderInterface;

/**
 * Layout manager interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Manager
 */
interface LayoutManagerInterface extends ManagerInterface {

    /**
     * Get the application layout provider.
     *
     * @return ApplicationLayoutProviderInterface|null Returns the application layout provider.
     */
    public function getApplicationLayoutProvider(): ?ApplicationLayoutProviderInterface;

    /**
     * Get the breadcrumbs layout provider.
     *
     * @return BreadcrumbsLayoutProviderInterface|null Returns the breadcrumbs layout provider.
     */
    public function getBreadcrumbsLayoutProvider(): ?BreadcrumbsLayoutProviderInterface;

    /**
     * Get the footer layout provider.
     *
     * @return FooterLayoutProviderInterface|null Returns the footer layout provider.
     */
    public function getFooterLayoutProvider(): ?FooterLayoutProviderInterface;

    /**
     * Get the hook dropdown layout provider.
     *
     * @return HookDropdownLayoutProviderInterface|null Returns the hook dropdown layout provider.
     */
    public function getHookDropdownLayoutProvider(): ?HookDropdownLayoutProviderInterface;

    /**
     * Get the navigation layout provider.
     *
     * @return NavigationLayoutProviderInterface|null Returns the navigation layout provider.
     */
    public function getNavigationLayoutProvider(): ?NavigationLayoutProviderInterface;

    /**
     * Get the notifications dropdown layout provider.
     *
     * @return NotificationsDropdownLayoutProviderInterface|null Returns the notifications dropdown layout provider.
     */
    public function getNotificationsDropdownLayoutProvider(): ?NotificationsDropdownLayoutProviderInterface;

    /**
     * Get the search layout provider.
     *
     * @return SearchLayoutProviderInterface|null Returns the search layout provider.
     */
    public function getSearchLayoutProvider(): ?SearchLayoutProviderInterface;

    /**
     * Get the tasks dropdown layout provider.
     *
     * @return TasksDropdownLayoutProviderInterface|null Returns the tasks dropdown layout provider.
     */
    public function getTasksDropdownLayoutProvider(): ?TasksDropdownLayoutProviderInterface;

    /**
     * Get the user info layout provider.
     *
     * @return UserInfoLayoutProviderInterface|null Returns the user info layout provider.
     */
    public function getUserInfoLayoutProvider(): ?UserInfoLayoutProviderInterface;

    /**
     * Set the application layout provider.
     *
     * @param ApplicationLayoutProviderInterface|null $applicationLayoutProvider The application layout provider.
     * @return LayoutManagerInterface Returns this layout manager.
     */
    function setApplicationLayoutProvider(?ApplicationLayoutProviderInterface $applicationLayoutProvider);

    /**
     * Set the breadcrumbs layout provider.
     *
     * @param BreadcrumbsLayoutProviderInterface|null $breadcrumbsLayoutProvider The breadcrumbs layout provider.
     * @return LayoutManagerInterface Returns this layout manager.
     */
    function setBreadcrumbsLayoutProvider(?BreadcrumbsLayoutProviderInterface $breadcrumbsLayoutProvider);

    /**
     * Set the footer layout provider.
     *
     * @param FooterLayoutProviderInterface|null $footerLayoutProvider The footer layout provider.
     * @return LayoutManagerInterface Returns this layout manager.
     */
    function setFooterLayoutProvider(?FooterLayoutProviderInterface $footerLayoutProvider);

    /**
     * Set the hook dropdown layout provider.
     *
     * @param HookDropdownLayoutProviderInterface|null $hookDropdownLayoutProvider The hook dropdown layout provider.
     * @return LayoutManagerInterface Returns this layout manager.
     */
    function setHookDropdownLayoutProvider(?HookDropdownLayoutProviderInterface $hookDropdownLayoutProvider);

    /**
     * Set the navigation layout provider.
     *
     * @param NavigationLayoutProviderInterface|null $navigationLayoutProvider The navigation layout provider.
     * @return LayoutManagerInterface Returns this layout manager.
     */
    function setNavigationLayoutProvider(?NavigationLayoutProviderInterface $navigationLayoutProvider);

    /**
     * Set the notifications dropdown layout provider.
     *
     * @param NotificationsDropdownLayoutProviderInterface|null $notificationsDropdownLayoutProvider The notifications dropdown layout provider.
     * @return LayoutManagerInterface Returns this layout manager.
     */
    function setNotificationsDropdownLayoutProvider(?NotificationsDropdownLayoutProviderInterface $notificationsDropdownLayoutProvider);

    /**
     * Set the search layout provider.
     *
     * @param SearchLayoutProviderInterface|null $searchLayoutProvider The search layout provider.
     * @return LayoutManagerInterface Returns this layout manager.
     */
    function setSearchLayoutProvider(?SearchLayoutProviderInterface $searchLayoutProvider);

    /**
     * Set the tasks dropdown layout provider.
     *
     * @param TasksDropdownLayoutProviderInterface|null $tasksDropdownLayoutProvider The tasks dropdown layout provider.
     * @return LayoutManagerInterface Returns this layout manager.
     */
    function setTasksDropdownLayoutProvider(?TasksDropdownLayoutProviderInterface $tasksDropdownLayoutProvider);

    /**
     * Set the user info layout provider.
     *
     * @param UserInfoLayoutProviderInterface|null $userInfoLayoutProvider The user info layout provider.
     * @return LayoutManagerInterface Returns this layout manager.
     */
    function setUserInfoLayoutProvider(?UserInfoLayoutProviderInterface $userInfoLayoutProvider);
}

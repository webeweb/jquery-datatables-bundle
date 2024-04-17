<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Manager;

use Throwable;
use WBW\Library\Symfony\Manager\ManagerInterface;
use WBW\Library\Symfony\Provider\Theme\ApplicationThemeProviderInterface;
use WBW\Library\Symfony\Provider\Theme\BreadcrumbsThemeProviderInterface;
use WBW\Library\Symfony\Provider\Theme\FooterThemeProviderInterface;
use WBW\Library\Symfony\Provider\Theme\HookDropdownThemeProviderInterface;
use WBW\Library\Symfony\Provider\Theme\NavigationThemeProviderInterface;
use WBW\Library\Symfony\Provider\Theme\NotificationsDropdownThemeProviderInterface;
use WBW\Library\Symfony\Provider\Theme\SearchThemeProviderInterface;
use WBW\Library\Symfony\Provider\Theme\TasksDropdownThemeProviderInterface;
use WBW\Library\Symfony\Provider\Theme\UserInfoThemeProviderInterface;

/**
 * Theme manager.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Manager
 */
class ThemeManager extends AbstractThemeManager {

    /**
     * Service name.
     *
     * @var string
     */
    public const SERVICE_NAME = "wbw.common.manager.theme";

    /**
     * Get the application theme provider.
     *
     * @return ApplicationThemeProviderInterface|null Returns the application theme provider.
     */
    public function getApplicationThemeProvider(): ?ApplicationThemeProviderInterface {

        /** @var ApplicationThemeProviderInterface */
        return $this->getProvider(ApplicationThemeProviderInterface::class);
    }

    /**
     * Get the breadcrumbs theme provider.
     *
     * @return BreadcrumbsThemeProviderInterface|null Returns the breadcrumbs theme provider.
     */
    public function getBreadcrumbsThemeProvider(): ?BreadcrumbsThemeProviderInterface {

        /** @var BreadcrumbsThemeProviderInterface */
        return $this->getProvider(BreadcrumbsThemeProviderInterface::class);
    }

    /**
     * Get the footer theme provider.
     *
     * @return FooterThemeProviderInterface|null Returns the footer theme provider.
     */
    public function getFooterThemeProvider(): ?FooterThemeProviderInterface {

        /** @var FooterThemeProviderInterface */
        return $this->getProvider(FooterThemeProviderInterface::class);
    }

    /**
     * Get the hook drop down theme provider.
     *
     * @return HookDropdownThemeProviderInterface|null Returns the hook drop down theme provider.
     */
    public function getHookDropdownThemeProvider(): ?HookDropdownThemeProviderInterface {

        /** @var HookDropdownThemeProviderInterface */
        return $this->getProvider(HookDropdownThemeProviderInterface::class);
    }

    /**
     * Get the navigation theme provider.
     *
     * @return NavigationThemeProviderInterface|null Returns the navigation theme provider.
     */
    public function getNavigationThemeProvider(): ?NavigationThemeProviderInterface {

        /** @var NavigationThemeProviderInterface */
        return $this->getProvider(NavigationThemeProviderInterface::class);
    }

    /**
     * Get the notifications drop down theme provider.
     *
     * @return NotificationsDropdownThemeProviderInterface|null Returns the Notifications drop down theme provider.
     */
    public function getNotificationsDropdownThemeProvider(): ?NotificationsDropdownThemeProviderInterface {

        /** @var NotificationsDropdownThemeProviderInterface */
        return $this->getProvider(NotificationsDropdownThemeProviderInterface::class);
    }

    /**
     * Get the search theme provider.
     *
     * @return SearchThemeProviderInterface|null Returns the search theme provider.
     */
    public function getSearchThemeProvider(): ?SearchThemeProviderInterface {

        /** @var SearchThemeProviderInterface */
        return $this->getProvider(SearchThemeProviderInterface::class);
    }

    /**
     * Get the tasks drop down theme provider.
     *
     * @return TasksDropdownThemeProviderInterface|null Returns the tasks drop down theme provider.
     */
    public function getTasksDropdownThemeProvider(): ?TasksDropdownThemeProviderInterface {

        /** @var TasksDropdownThemeProviderInterface */
        return $this->getProvider(TasksDropdownThemeProviderInterface::class);
    }

    /**
     * Get the user info theme provider.
     *
     * @return UserInfoThemeProviderInterface|null Returns the user info theme provider.
     */
    public function getUserInfoThemeProvider(): ?UserInfoThemeProviderInterface {

        /** @var UserInfoThemeProviderInterface */
        return $this->getProvider(UserInfoThemeProviderInterface::class);
    }

    /**
     * {@inheritDoc}
     */
    protected function initIndex(): array {

        return [
            ApplicationThemeProviderInterface::class           => null,
            BreadcrumbsThemeProviderInterface::class           => null,
            FooterThemeProviderInterface::class                => null,
            HookDropdownThemeProviderInterface::class          => null,
            NavigationThemeProviderInterface::class            => null,
            NotificationsDropdownThemeProviderInterface::class => null,
            SearchThemeProviderInterface::class                => null,
            TasksDropdownThemeProviderInterface::class         => null,
            UserInfoThemeProviderInterface::class              => null,
        ];
    }

    /**
     * Set the application theme provider.
     *
     * @param ApplicationThemeProviderInterface $provider The application theme provider.
     * @return ManagerInterface Returns this manager.
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function setApplicationThemeProvider(ApplicationThemeProviderInterface $provider): ManagerInterface {
        $this->setProvider(ApplicationThemeProviderInterface::class, $provider);
        return $this;
    }

    /**
     * Set the breadcrumbs theme provider.
     *
     * @param BreadcrumbsThemeProviderInterface $provider The breadcrumbs theme provider.
     * @return ManagerInterface Returns this manager.
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function setBreadcrumbsThemeProvider(BreadcrumbsThemeProviderInterface $provider): ManagerInterface {
        $this->setProvider(BreadcrumbsThemeProviderInterface::class, $provider);
        return $this;
    }

    /**
     * Set the footer theme provider.
     *
     * @param FooterThemeProviderInterface $provider The footer theme provider.
     * @return ManagerInterface Returns this manager.
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function setFooterThemeProvider(FooterThemeProviderInterface $provider): ManagerInterface {
        $this->setProvider(FooterThemeProviderInterface::class, $provider);
        return $this;
    }

    /**
     * Set the hook drop down theme provider.
     *
     * @param HookDropdownThemeProviderInterface $provider The hook drop down theme provider.
     * @return ManagerInterface Returns this manager.
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function setHookDropdownThemeProvider(HookDropdownThemeProviderInterface $provider): ManagerInterface {
        $this->setProvider(HookDropdownThemeProviderInterface::class, $provider);
        return $this;
    }

    /**
     * Set the navigation theme provider.
     *
     * @param NavigationThemeProviderInterface $provider The navigation theme provider.
     * @return ManagerInterface Returns this manager.
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function setNavigationThemeProvider(NavigationThemeProviderInterface $provider): ManagerInterface {
        $this->setProvider(NavigationThemeProviderInterface::class, $provider);
        return $this;
    }

    /**
     * Set the notifications drop down theme provider.
     *
     * @param NotificationsDropdownThemeProviderInterface $provider The notifications drop down theme provider.
     * @return ManagerInterface Returns this manager.
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function setNotificationsDropdownThemeProvider(NotificationsDropdownThemeProviderInterface $provider): ManagerInterface {
        $this->setProvider(NotificationsDropdownThemeProviderInterface::class, $provider);
        return $this;
    }

    /**
     * Set the search theme provider.
     *
     * @param SearchThemeProviderInterface $provider The search theme provider.
     * @return ManagerInterface Returns this manager.
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function setSearchThemeProvider(SearchThemeProviderInterface $provider): ManagerInterface {
        $this->setProvider(SearchThemeProviderInterface::class, $provider);
        return $this;
    }

    /**
     * Set the tasks drop down theme provider.
     *
     * @param TasksDropdownThemeProviderInterface $provider The tasks drop down theme provider.
     * @return ManagerInterface Returns this manager.
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function setTasksDropdownThemeProvider(TasksDropdownThemeProviderInterface $provider): ManagerInterface {
        $this->setProvider(TasksDropdownThemeProviderInterface::class, $provider);
        return $this;
    }

    /**
     * Set the user info theme provider.
     *
     * @param UserInfoThemeProviderInterface $provider The user info theme provider.
     * @return ManagerInterface Returns this manager.
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function setUserInfoThemeProvider(UserInfoThemeProviderInterface $provider): ManagerInterface {
        $this->setProvider(UserInfoThemeProviderInterface::class, $provider);
        return $this;
    }
}

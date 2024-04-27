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

use Psr\Log\LoggerInterface;
use Twig\Environment;
use WBW\Bundle\CommonBundle\Provider\Layout\ApplicationLayoutProviderInterface;
use WBW\Bundle\CommonBundle\Provider\Layout\ApplicationLayoutProviderTrait;
use WBW\Bundle\CommonBundle\Provider\Layout\BreadcrumbsLayoutProviderInterface;
use WBW\Bundle\CommonBundle\Provider\Layout\BreadcrumbsLayoutProviderTrait;
use WBW\Bundle\CommonBundle\Provider\Layout\FooterLayoutProviderInterface;
use WBW\Bundle\CommonBundle\Provider\Layout\FooterLayoutProviderTrait;
use WBW\Bundle\CommonBundle\Provider\Layout\HookDropdownLayoutProviderInterface;
use WBW\Bundle\CommonBundle\Provider\Layout\HookDropdownLayoutProviderTrait;
use WBW\Bundle\CommonBundle\Provider\Layout\NavigationLayoutProviderInterface;
use WBW\Bundle\CommonBundle\Provider\Layout\NavigationLayoutProviderTrait;
use WBW\Bundle\CommonBundle\Provider\Layout\NotificationsDropdownLayoutProviderInterface;
use WBW\Bundle\CommonBundle\Provider\Layout\NotificationsDropdownLayoutProviderTrait;
use WBW\Bundle\CommonBundle\Provider\Layout\SearchLayoutProviderInterface;
use WBW\Bundle\CommonBundle\Provider\Layout\SearchLayoutProviderTrait;
use WBW\Bundle\CommonBundle\Provider\Layout\TasksDropdownLayoutProviderInterface;
use WBW\Bundle\CommonBundle\Provider\Layout\TasksDropdownLayoutProviderTrait;
use WBW\Bundle\CommonBundle\Provider\Layout\UserInfoLayoutProviderInterface;
use WBW\Bundle\CommonBundle\Provider\Layout\UserInfoLayoutProviderTrait;
use WBW\Bundle\CommonBundle\Provider\ProviderInterface;
use WBW\Bundle\CommonBundle\Twig\Environment\TwigEnvironmentTrait;

/**
 * Layout manager.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Manager
 */
class LayoutManager extends AbstractManager implements LayoutManagerInterface {

    use TwigEnvironmentTrait;

    use ApplicationLayoutProviderTrait {
        setApplicationLayoutProvider as public;
    }
    use BreadcrumbsLayoutProviderTrait {
        setBreadcrumbsLayoutProvider as public;
    }
    use FooterLayoutProviderTrait {
        setFooterLayoutProvider as public;
    }
    use HookDropdownLayoutProviderTrait {
        setHookDropdownLayoutProvider as public;
    }
    use NavigationLayoutProviderTrait {
        setNavigationLayoutProvider as public;
    }
    use NotificationsDropdownLayoutProviderTrait {
        setNotificationsDropdownLayoutProvider as public;
    }
    use SearchLayoutProviderTrait {
        setSearchLayoutProvider as public;
    }
    use TasksDropdownLayoutProviderTrait {
        setTasksDropdownLayoutProvider as public;
    }
    use UserInfoLayoutProviderTrait {
        setUserInfoLayoutProvider as public;
    }

    /**
     * Service name.
     *
     * @var string
     */
    public const SERVICE_NAME = "wbw.common.manager.layout";

    /**
     * Constructor.
     *
     * @param LoggerInterface $logger The logger.
     * @param Environment $twigEnvironment The Twig environment.
     */
    public function __construct(LoggerInterface $logger, Environment $twigEnvironment) {
        parent::__construct($logger);

        $this->setTwigEnvironment($twigEnvironment);
    }

    /**
     * {@inheritDoc}
     */
    public function addProvider(ProviderInterface $provider): ManagerInterface {
        return $this;
    }

    /**
     * Register the Twig globals.
     *
     * @return void
     */
    public function registerTwigGlobals(): void {

        $providers = [
            ApplicationLayoutProviderInterface::class           => $this->getApplicationLayoutProvider(),
            BreadcrumbsLayoutProviderInterface::class           => $this->getBreadcrumbsLayoutProvider(),
            FooterLayoutProviderInterface::class                => $this->getFooterLayoutProvider(),
            HookDropdownLayoutProviderInterface::class          => $this->getHookDropdownLayoutProvider(),
            NavigationLayoutProviderInterface::class            => $this->getNavigationLayoutProvider(),
            NotificationsDropdownLayoutProviderInterface::class => $this->getNotificationsDropdownLayoutProvider(),
            SearchLayoutProviderInterface::class                => $this->getSearchLayoutProvider(),
            TasksDropdownLayoutProviderInterface::class         => $this->getTasksDropdownLayoutProvider(),
            UserInfoLayoutProviderInterface::class              => $this->getUserInfoLayoutProvider(),
        ];

        foreach ($providers as $k => $v) {

            if (null === $v) {
                continue;
            }

            $path = explode("\\", $k);
            $name = str_replace("Interface", "", end($path));

            $this->getTwigEnvironment()->addGlobal(lcfirst($name), $v);
        }
    }
}

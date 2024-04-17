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

namespace WBW\Bundle\CommonBundle\Tests\Fixtures\Manager;

use Psr\Log\LoggerInterface;
use Twig\Environment;
use WBW\Bundle\CommonBundle\Manager\AbstractThemeManager;
use WBW\Library\Symfony\Manager\ManagerInterface;
use WBW\Library\Symfony\Provider\ThemeProviderInterface;

/**
 * Test abstract theme manager.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Fixtures\Manager
 */
class TestAbstractThemeManager extends AbstractThemeManager {

    /**
     * {@inheritDoc}.
     */
    public function __construct(LoggerInterface $logger, Environment $twigEnvironment) {
        parent::__construct($logger, $twigEnvironment);
    }

    /**
     * {@inheritDoc}
     */
    public function getProvider(string $name): ?ThemeProviderInterface {
        return parent::getProvider($name);
    }

    /**
     * {@inheritDoc}
     */
    protected function initIndex(): array {

        return [
            ThemeProviderInterface::class => null,
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function setProvider(string $name, ThemeProviderInterface $provider): ManagerInterface {
        return parent::setProvider($name, $provider);
    }
}

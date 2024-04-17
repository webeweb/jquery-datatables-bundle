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
use Throwable;
use Twig\Environment;
use WBW\Bundle\CommonBundle\Twig\Environment\TwigEnvironmentTrait;
use WBW\Library\Symfony\Manager\AbstractManager;
use WBW\Library\Symfony\Manager\ManagerInterface;
use WBW\Library\Symfony\Provider\ThemeProviderInterface;

/**
 * Abstract theme manager.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Manager
 * @abstract
 */
abstract class AbstractThemeManager extends AbstractManager {

    use TwigEnvironmentTrait;

    /**
     * Index.
     *
     * @var array<string,mixed>|null
     */
    private $index;

    /**
     * Constructor.
     *
     * @param LoggerInterface $logger The logger.
     * @param Environment $twigEnvironment The Twig environment.
     */
    public function __construct(LoggerInterface $logger, Environment $twigEnvironment) {
        parent::__construct($logger);

        $this->setIndex($this->initIndex());
        $this->setTwigEnvironment($twigEnvironment);
    }

    /**
     * Add the global.
     *
     * @return void
     */
    public function addGlobal(): void {

        foreach ($this->getIndex() as $k => $v) {

            if (null === $v) {
                continue;
            }

            $parts = explode("\\", $k);
            $this->getTwigEnvironment()->addGlobal(str_replace("Interface", "", end($parts)), $this->getProviders()[$v]);
        }
    }

    /**
     * Get the index.
     *
     * @return array<string,mixed> Returns the index.
     */
    protected function getIndex(): array {
        return $this->index;
    }

    /**
     * Get a provider.
     *
     * @param string $name The name.
     * @return ThemeProviderInterface|null Returns the theme provider in case of success, null otherwise.
     */
    protected function getProvider(string $name): ?ThemeProviderInterface {

        $v = $this->getIndex()[$name];
        if (null === $v) {
            return null;
        }

        /** @var ThemeProviderInterface */
        return $this->getProviders()[$v];
    }

    /**
     * Initialize the index.
     *
     * @return array<string,mixed> Returns the initialized index.
     */
    abstract protected function initIndex(): array;

    /**
     * Set the index.
     *
     * @param array<string,mixed> $index The index.
     * @return ManagerInterface Returns this manager.
     */
    protected function setIndex(array $index): ManagerInterface {
        $this->index = $index;
        return $this;
    }

    /**
     * Set a provider.
     *
     * @param string $name The name.
     * @param ThemeProviderInterface $provider The provider.
     * @return ManagerInterface Returns this manager.
     * @throws Throwable Throws an exception if an error occurs.
     */
    protected function setProvider(string $name, ThemeProviderInterface $provider): ManagerInterface {

        $v = $this->getIndex()[$name];
        if (null !== $v) {

            $this->getProviders()[$v] = $provider;
            return $this;
        }

        $this->index[$name] = count($this->getProviders());

        return $this->addProvider($provider);
    }
}

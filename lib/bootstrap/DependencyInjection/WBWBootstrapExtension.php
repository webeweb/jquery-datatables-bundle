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

namespace WBW\Bundle\BootstrapBundle\DependencyInjection;

use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Throwable;
use WBW\Bundle\CommonBundle\DependencyInjection\Container\ContainerHelper;
use WBW\Bundle\CommonBundle\DependencyInjection\WBWCommonExtension;

/**
 * Bootstrap extension.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\DependencyInjection
 */
class WBWBootstrapExtension extends Extension {

    /**
     * Extension alias.
     *
     * @var string
     */
    public const EXTENSION_ALIAS = "wbw_bootstrap";

    /**
     * {@inheritDoc}
     * @param array<string,mixed> $configs The configurations.
     * @param ContainerBuilder $container The container.
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function load(array $configs, ContainerBuilder $container): void {

        $path = __DIR__ . "/../Resources/config";

        $fileLocator = new FileLocator($path);

        $serviceLoader = new YamlFileLoader($container, $fileLocator);
        $serviceLoader->load("providers.yml");
        $serviceLoader->load("twig.yml");

        /** @var ConfigurationInterface $configuration */
        $configuration = $this->getConfiguration($configs, $container);

        $config = $this->processConfiguration($configuration, $configs);

        ContainerHelper::setParameter($container, $config, $this->getAlias(), "version");
        ContainerHelper::setParameter($container, $config, $this->getAlias(), "plugins");
        ContainerHelper::setParameter($container, $config, $this->getAlias(), "locales");

        $assets = WBWCommonExtension::loadYamlConfig($path, "assets");
        ContainerHelper::setParameters($container, $assets["assets"]);
    }
}

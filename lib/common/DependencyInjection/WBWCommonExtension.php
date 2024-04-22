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

namespace WBW\Bundle\CommonBundle\DependencyInjection;

use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Yaml\Yaml;
use Throwable;
use WBW\Bundle\CommonBundle\DependencyInjection\Container\ContainerHelper;

/**
 * Common extension.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\DependencyInjection
 */
class WBWCommonExtension extends Extension {

    /**
     * Extension alias.
     *
     * @var string
     */
    public const EXTENSION_ALIAS = "wbw_common";

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
        //$serviceLoader->load("colors.yml");
        $serviceLoader->load("commands.yml");
        //$serviceLoader->load("controllers.yml");
        $serviceLoader->load("event_listeners.yml");
        $serviceLoader->load("managers.yml");
        //$serviceLoader->load("providers.yml");
        $serviceLoader->load("services.yml");
        $serviceLoader->load("twig.yml");

        /** @var ConfigurationInterface $configuration */
        $configuration = $this->getConfiguration($configs, $container);

        $config = $this->processConfiguration($configuration, $configs);

        ContainerHelper::setParameter($container, $config, $this->getAlias(), "plugins");
        ContainerHelper::setParameter($container, $config, $this->getAlias(), "locales");
        ContainerHelper::setParameter($container, $config, $this->getAlias(), "themes");
        ContainerHelper::setParameter($container, $config, $this->getAlias(), "brushes");

        $assets = static::loadYamlConfig($path, "assets");
        ContainerHelper::setParameters($container, $assets["assets"]);
    }

    /**
     * Load a YAML configuration.
     *
     * @param string $path The path.
     * @param string $file The file.
     * @return array<string,mixed> Returns the YAML configuration.
     */
    public static function loadYamlConfig(string $path, string $file): array {

        $filename = realpath("$path/$file.yml");
        if (false === $filename) {
            return [];
        }

        $input = file_get_contents($filename);

        return Yaml::parse($input);
    }
}

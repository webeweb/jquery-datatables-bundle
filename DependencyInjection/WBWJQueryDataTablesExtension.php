<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\DependencyInjection;

use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Throwable;
use WBW\Bundle\CoreBundle\Config\ConfigurationHelper;

/**
 * jQuery DataTables extension.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\DataTablesBundle\DependencyInjection
 */
class WBWJQueryDataTablesExtension extends Extension {

    /**
     * Extension alias.
     *
     * @var string
     */
    const EXTENSION_ALIAS = "wbw_jquery_datatables";

    /**
     * {@inheritDoc}
     */
    public function getAlias(): string {
        return self::EXTENSION_ALIAS;
    }

    /**
     * {@inheritDoc}
     * @param array<string,mixed> $configs The configurations.
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function load(array $configs, ContainerBuilder $container): void {

        $fileLocator = new FileLocator(__DIR__ . "/../Resources/config");

        $serviceLoader = new YamlFileLoader($container, $fileLocator);
        $serviceLoader->load("commands.yml");
        $serviceLoader->load("controllers.yml");
        $serviceLoader->load("managers.yml");
        $serviceLoader->load("twig.yml");

        /** @var ConfigurationInterface $configuration */
        $configuration = $this->getConfiguration($configs, $container);

        $config = $this->processConfiguration($configuration, $configs);

        ConfigurationHelper::registerContainerParameter($container, $config, $this->getAlias(), "theme");
        ConfigurationHelper::registerContainerParameter($container, $config, $this->getAlias(), "plugins");

        $assets = ConfigurationHelper::loadYamlConfig(__DIR__, "assets");
        ConfigurationHelper::registerContainerParameters($container, $assets["assets"]);
    }
}

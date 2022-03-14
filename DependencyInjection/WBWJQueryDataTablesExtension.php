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
     */
    public function load(array $configs, ContainerBuilder $container): void {

        $fileLocator = new FileLocator(__DIR__ . "/../Resources/config");

        $serviceLoader = new YamlFileLoader($container, $fileLocator);
        $serviceLoader->load("services.yml");

        /** @var ConfigurationInterface $configuration */
        $configuration = $this->getConfiguration($configs, $container);

        $config = $this->processConfiguration($configuration, $configs);

        if (true === $config["command"]) {
            $serviceLoader->load("commands.yml");
        }

        if (true === $config["twig"]) {
            $serviceLoader->load("twig.yml");
        }

        ConfigurationHelper::registerContainerParameter($container, $config, $this->getAlias(), "command");
        ConfigurationHelper::registerContainerParameter($container, $config, $this->getAlias(), "twig");
        ConfigurationHelper::registerContainerParameter($container, $config, $this->getAlias(), "theme");
        ConfigurationHelper::registerContainerParameter($container, $config, $this->getAlias(), "plugins");

        $assets = ConfigurationHelper::loadYamlConfig(__DIR__, "assets");
        ConfigurationHelper::registerContainerParameters($container, $assets["assets"]);
    }
}

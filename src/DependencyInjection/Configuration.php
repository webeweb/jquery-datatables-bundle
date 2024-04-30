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

namespace WBW\Bundle\DataTablesBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use WBW\Bundle\CommonBundle\DependencyInjection\WBWCommonExtension;

/**
 * Configuration.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\DependencyInjection
 */
class Configuration implements ConfigurationInterface {

    /**
     * Add a section "plugins".
     *
     * @param ArrayNodeDefinition $node The node.
     * @param array<string,mixed> $assets The assets.
     * @return void
     * @formatter:off
     */
    private function addSectionPlugins(ArrayNodeDefinition $node, array $assets): void {

        $plugins = $assets["plugins"];

        $node
            ->children()
                ->arrayNode("plugins")->info("Use DataTables plug-ins")
                    ->prototype("scalar")
                        ->validate()
                            ->ifNotInArray(array_keys($plugins))
                            ->thenInvalid("The DataTables plug-in %s is not supported. Please choose one of " . json_encode(array_keys($plugins)))
                        ->end()
                    ->end()
                ->end()
            ->end();
    }

    /**
     * Add a section "theme".
     *
     * @param ArrayNodeDefinition $node The node.
     * @param array<string,mixed> $assets The assets.
     * @return void
     * @formatter:off
     */
    private function addSectionTheme(ArrayNodeDefinition $node, array $assets): void {

        $themes = $assets["themes"];

        $node
            ->children()
                ->variableNode("theme")->defaultValue("bootstrap")->info("DataTables theme")
                    ->validate()
                        ->ifNotInArray($themes)
                        ->thenInvalid("The DataTables theme %s is not supported. Please choose one of " . json_encode($themes))
                    ->end()
                ->end()
            ->end();
    }

    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder(): TreeBuilder {

        $assets = WBWCommonExtension::loadYamlConfig(__DIR__ . "/../Resources/config", "assets");

        $treeBuilder = new TreeBuilder(WBWDataTablesExtension::EXTENSION_ALIAS);

        /** @var ArrayNodeDefinition $rootNode */
        $rootNode = $treeBuilder->getRootNode();

        $this->addSectionTheme($rootNode, $assets["assets"]["wbw.datatables.assets"]);
        $this->addSectionPlugins($rootNode, $assets["assets"]["wbw.datatables.assets"]);

        return $treeBuilder;
    }
}

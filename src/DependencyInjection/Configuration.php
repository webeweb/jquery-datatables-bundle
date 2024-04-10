<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
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
     * Add a section "Bootstrap".
     *
     * @param ArrayNodeDefinition $node The node.
     * @param array<string,mixed> $assets The assets.
     * @return void
     */
    private function addSectionBootstrap(ArrayNodeDefinition $node, array $assets): void {

        $plugins = $assets["plugins"];

        $node
            ->children()
                ->integerNode("version")->defaultValue(4)->info("Version")->min(3)->max(5)->end()
                ->arrayNode("plugins")->info("Bootstrap plug-ins")
                    ->prototype("scalar")
                        ->validate()
                            ->ifNotInArray(array_keys($plugins))
                            ->thenInvalid("The Bootstrap plug-in %s is not supported. Please choose one of " . json_encode(array_keys($plugins)))
                        ->end()
                    ->end()
                ->end()
                ->arrayNode("locales")->info("Bootstrap locales")
                    ->children()
                        ->variableNode("bootstrap_datepicker")->defaultValue("en-GB")->info("Bootstrap Datepicker locale")
                            ->validate()
                                ->ifNotInArray($plugins["bootstrap_datepicker"]["locales"])
                                ->thenInvalid("The Bootstrap Datepicker locale %s is not supported. Please choose one of " . json_encode($plugins["bootstrap_datepicker"]["locales"]))
                            ->end()
                        ->end()
                        ->variableNode("bootstrap_markdown")->info("Bootstrap Markdown locale")
                            ->validate()
                                ->ifNotInArray($plugins["bootstrap_markdown"]["locales"])
                                ->thenInvalid("The Bootstrap Markdown locale %s is not supported. Please choose one of " . json_encode($plugins["bootstrap_markdown"]["locales"]))
                            ->end()
                        ->end()
                        ->variableNode("bootstrap_select")->defaultValue("en_US")->info("Bootstrap Select locale")
                            ->validate()
                                ->ifNotInArray($plugins["bootstrap_select"]["locales"])
                                ->thenInvalid("The Bootstrap Select locale %s is not supported. Please choose one of " . json_encode($plugins["bootstrap_select"]["locales"]))
                            ->end()
                        ->end()
                        ->variableNode("bootstrap_wysiwyg")->defaultValue("en-US")->info("Bootstrap WYSIWYG locale")
                            ->validate()
                                ->ifNotInArray($plugins["bootstrap_wysiwyg"]["locales"])
                                ->thenInvalid("The Bootstrap WYSIWYG locale %s is not supported. Please choose one of " . json_encode($plugins["bootstrap_wysiwyg"]["locales"]))
                            ->end()
                        ->end()
                        ->variableNode("summernote")->info("Summernote locale")
                            ->validate()
                                ->ifNotInArray($plugins["summernote"]["locales"])
                                ->thenInvalid("The Summernote locale %s is not supported. Please choose one of " . json_encode($plugins["summernote"]["locales"]))
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();
    }

    /**
     * Add a section "DataTables".
     *
     * @param ArrayNodeDefinition $node The node.
     * @param array<string,mixed> $assets The assets.
     * @return void
     */
    private function addSectionDataTables(ArrayNodeDefinition $node, array $assets): void {

        $plugins = $assets["plugins"];
        $themes  = $assets["themes"];

        $node
            ->children()
                ->variableNode("theme")->defaultValue("bootstrap")->info("DataTables theme")
                    ->validate()
                        ->ifNotInArray($themes)
                        ->thenInvalid("The DataTables theme %s is not supported. Please choose one of " . json_encode($themes))
                    ->end()
                ->end()
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
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder(): TreeBuilder {

        $assets  = WBWCommonExtension::loadYamlConfig(__DIR__ . "/../Resources/config", "assets");

        $treeBuilder = new TreeBuilder(WBWDataTablesExtension::EXTENSION_ALIAS);

        $rootNode = $treeBuilder->getRootNode();

        $dataTables = $rootNode->children()->arrayNode("datatables")->addDefaultsIfNotSet();
        $bootstrap = $rootNode->children()->arrayNode("bootstrap")->addDefaultsIfNotSet();

        $this->addSectionDataTables($dataTables, $assets["assets"]["wbw.datatables.assets"]);
        $this->addSectionBootstrap($bootstrap, $assets["assets"]["wbw.bootstrap.assets"]);

        return $treeBuilder;
    }
}

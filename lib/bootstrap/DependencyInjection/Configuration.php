<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\BootstrapBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use WBW\Bundle\CommonBundle\DependencyInjection\WBWCommonExtension;

/**
 * Configuration.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\DependencyInjection
 */
class Configuration implements ConfigurationInterface {

    /**
     * Add a section "locales".
     *
     * @param ArrayNodeDefinition $node The node.
     * @param array<string,mixed> $locales The locales.
     * @return void
     * @formatter:off
     */
    private function addSectionLocales(ArrayNodeDefinition $node, array $locales): void {

        $node
            ->children()
                ->arrayNode("locales")->addDefaultsIfNotSet()
                    ->children()
                        ->variableNode("bootstrap_datepicker")->defaultValue("en-GB")->info("Bootstrap Datepicker locale")
                            ->validate()
                                ->ifNotInArray($locales["bootstrap_datepicker"]["locales"])
                                ->thenInvalid("The Bootstrap Datepicker locale %s is not supported. Please choose one of " . json_encode($locales["bootstrap_datepicker"]["locales"]))
                            ->end()
                        ->end()
                        ->variableNode("bootstrap_markdown")->info("Bootstrap Markdown locale")
                            ->validate()
                                ->ifNotInArray($locales["bootstrap_markdown"]["locales"])
                                ->thenInvalid("The Bootstrap Markdown locale %s is not supported. Please choose one of " . json_encode($locales["bootstrap_markdown"]["locales"]))
                            ->end()
                        ->end()
                        ->variableNode("bootstrap_select")->defaultValue("en_US")->info("Bootstrap Select locale")
                            ->validate()
                                ->ifNotInArray($locales["bootstrap_select"]["locales"])
                                ->thenInvalid("The Bootstrap Select locale %s is not supported. Please choose one of " . json_encode($locales["bootstrap_select"]["locales"]))
                            ->end()
                        ->end()
                        ->variableNode("bootstrap_wysiwyg")->defaultValue("en-US")->info("Bootstrap WYSIWYG locale")
                            ->validate()
                                ->ifNotInArray($locales["bootstrap_wysiwyg"]["locales"])
                                ->thenInvalid("The Bootstrap WYSIWYG locale %s is not supported. Please choose one of " . json_encode($locales["bootstrap_wysiwyg"]["locales"]))
                            ->end()
                        ->end()
                        ->variableNode("summernote")->info("Summernote locale")
                            ->validate()
                                ->ifNotInArray($locales["summernote"]["locales"])
                                ->thenInvalid("The Summernote locale %s is not supported. Please choose one of " . json_encode($locales["summernote"]["locales"]))
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();
    }

    /**
     * Add a section "plugins".
     *
     * @param ArrayNodeDefinition $node The node.
     * @param string[] $plugins The plugins.
     * @return void
     * @formatter:off
     */
    private function addSectionPlugins(ArrayNodeDefinition $node, array $plugins): void {

        $node
            ->children()
                ->arrayNode("plugins")->info("Bootstrap plug-ins")
                    ->prototype("scalar")
                        ->validate()
                            ->ifNotInArray(array_keys($plugins))
                            ->thenInvalid("The Bootstrap plug-in %s is not supported. Please choose one of " . json_encode(array_keys($plugins)))
                        ->end()
                    ->end()
                ->end()
            ->end();
    }

    /**
     * Add a section "version".
     *
     * @param ArrayNodeDefinition $node The node.
     * @return void
     * @formatter:off
     */
    private function addSectionVersion(ArrayNodeDefinition $node): void {

        $node
            ->children()
                ->integerNode("version")->defaultValue(4)->info("Version")->min(3)->max(5)->end()
            ->end();
    }

    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder(): TreeBuilder {

        $assets = WBWCommonExtension::loadYamlConfig(__DIR__ . "/../Resources/config", "assets");

        $treeBuilder = new TreeBuilder(WBWBootstrapExtension::EXTENSION_ALIAS);

        /** @var ArrayNodeDefinition $rootNode */
        $rootNode = $treeBuilder->getRootNode();

        $this->addSectionVersion($rootNode);
        $this->addSectionPlugins($rootNode, $assets["assets"]["wbw.bootstrap.assets"]["plugins"]);
        $this->addSectionLocales($rootNode, $assets["assets"]["wbw.bootstrap.assets"]["plugins"]);

        return $treeBuilder;
    }
}

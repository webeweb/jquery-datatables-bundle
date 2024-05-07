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

namespace WBW\Bundle\CommonBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Configuration.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\DependencyInjection
 */
class Configuration implements ConfigurationInterface {

    /**
     * Add a section "brushes".
     *
     * @param ArrayNodeDefinition $node The node.
     * @param string[] $brushes The brushes.
     * @return void
     * @formatter:off
     */
    private function addSectionBrushes(ArrayNodeDefinition $node, array $brushes): void {

        $node
            ->children()
                ->arrayNode("brushes")->addDefaultsIfNotSet()
                    ->children()
                        ->arrayNode("syntax_highlighter")->info("SyntaxHighlighter brushes")
                            ->prototype("scalar")
                                ->validate()
                                    ->ifNotInArray($brushes)
                                    ->thenInvalid("The SyntaxHighlighter brush %s is not supported. Please choose one of " . json_encode($brushes))
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();
    }

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
                        ->variableNode("full_calendar")->defaultValue("en-gb")->info("FullCalendar locale")
                            ->validate()
                                ->ifNotInArray($locales["full_calendar"]["locales"])
                                ->thenInvalid("The FullCalendar locale %s is not supported. Please choose one of " . json_encode($locales["full_calendar"]["locales"]))
                            ->end()
                        ->end()
                        ->variableNode("jquery_select2")->defaultValue("en")->info("jQuery Select2 locale")
                            ->validate()
                                ->ifNotInArray($locales["jquery_select2"]["locales"])
                                ->thenInvalid("The jQuery Select2 locale %s is not supported. Please choose one of " . json_encode($locales["jquery_select2"]["locales"]))
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
                ->arrayNode("plugins")->info("Common plug-ins")
                    ->prototype("scalar")
                        ->validate()
                            ->ifNotInArray(array_keys($plugins))
                            ->thenInvalid("The common plug-in %s is not supported. Please choose one of " . json_encode(array_keys($plugins)))
                        ->end()
                    ->end()
                ->end()
            ->end();
    }

    /**
     * Add a section "quote".
     *
     * @param ArrayNodeDefinition $node The node.
     * @return void
     * @formatter:off
     */
    private function addSectionQuote(ArrayNodeDefinition $node): void {

        $node
            ->children()
                ->arrayNode("quote")->addDefaultsIfNotSet()
                    ->children()
                        ->booleanNode("worlds_wisdom")->defaultFalse()->info("Load World's wisdom")->end()
                    ->end()
                ->end()
            ->end();
    }

    /**
     * Add a section "security".
     *
     * @param ArrayNodeDefinition $node The node.
     * @return void
     * @formatter:off
     */
    private function addSectionSecurity(ArrayNodeDefinition $node): void {

        $node
            ->children()
                ->booleanNode("security")->defaultFalse()->info("Load security event listener")->end()
            ->end();
    }

    /**
     * Add a section "themes".
     *
     * @param ArrayNodeDefinition $node The node.
     * @param array<string,mixed> $themes The themes.
     * @return void
     * @formatter:off
     */
    private function addSectionThemes(ArrayNodeDefinition $node, array $themes): void {

        $node
            ->children()
                ->arrayNode("themes")->addDefaultsIfNotSet()
                    ->children()
                        ->variableNode("syntax_highlighter")->defaultValue("Default")->info("SyntaxHighlighter theme")
                            ->validate()
                                ->ifNotInArray($themes["syntax_highlighter"]["themes"])
                                ->thenInvalid("The SyntaxHighlighter theme %s is not supported. Please choose one of " . json_encode($themes["syntax_highlighter"]["themes"]))
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();
    }

    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder(): TreeBuilder {

        $assets = WBWCommonExtension::loadYamlConfig(__DIR__ . "/../Resources/config", "assets");

        $treeBuilder = new TreeBuilder(WBWCommonExtension::EXTENSION_ALIAS);

        /** @var ArrayNodeDefinition $rootNode */
        $rootNode = $treeBuilder->getRootNode();

        $this->addSectionPlugins($rootNode, $assets["assets"]["wbw.common.assets"]["plugins"]);
        $this->addSectionLocales($rootNode, $assets["assets"]["wbw.common.assets"]["plugins"]);
        $this->addSectionThemes($rootNode, $assets["assets"]["wbw.common.assets"]["plugins"]);
        $this->addSectionBrushes($rootNode, $assets["assets"]["wbw.common.assets"]["plugins"]["syntax_highlighter"]["brushes"]);

        $this->addSectionSecurity($rootNode);
        $this->addSectionQuote($rootNode);

        return $treeBuilder;
    }
}

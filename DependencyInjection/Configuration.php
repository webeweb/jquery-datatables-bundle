<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use WBW\Bundle\CoreBundle\Config\ConfigurationHelper;

/**
 * Configuration.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\DataTablesBundle\DependencyInjection
 */
class Configuration implements ConfigurationInterface {

    /**
     * {@inheritdoc}
     *
     * wbw_jquery_datatables:
     *      twig:  false
     *      theme: "bootstrap"
     *      plugins:
     *          - "buttons"
     *          - "responsive"
     */
    public function getConfigTreeBuilder(): TreeBuilder {

        $assets  = ConfigurationHelper::loadYamlConfig(__DIR__, "assets");
        $plugins = $assets["assets"]["wbw.jquery_datatables.asset.jquery_datatables"]["plugins"];
        $themes  = $assets["assets"]["wbw.jquery_datatables.asset.jquery_datatables"]["themes"];

        $treeBuilder = new TreeBuilder(WBWJQueryDataTablesExtension::EXTENSION_ALIAS);

        $rootNode = ConfigurationHelper::getRootNode($treeBuilder, WBWJQueryDataTablesExtension::EXTENSION_ALIAS);
        $rootNode
            ->children()
                ->booleanNode("command")->defaultTrue()->info("Load commands")->end()
                ->booleanNode("twig")->defaultTrue()->info("Load Twig extensions")->end()
                ->variableNode("theme")->defaultValue("bootstrap")->info("jQuery DataTables theme")
                    ->validate()
                        ->ifNotInArray($themes)
                        ->thenInvalid("The jQuery DataTables theme %s is not supported. Please choose one of " . json_encode($themes))
                    ->end()
                ->end()
                ->arrayNode("plugins")->info("Use jQuery DataTables plug-ins")
                    ->prototype("scalar")
                        ->validate()
                            ->ifNotInArray(array_keys($plugins))
                            ->thenInvalid("The jQuery DataTables plug-in %s is not supported. Please choose one of " . json_encode(array_keys($plugins)))
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}

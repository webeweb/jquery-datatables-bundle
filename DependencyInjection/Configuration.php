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

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use WBW\Bundle\CoreBundle\Config\ConfigurationHelper;

/**
 * Configuration.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\DependencyInjection
 */
class Configuration implements ConfigurationInterface {

    /**
     * {@inheritDoc}
     *
     * wbw_datatables:
     *      theme: "bootstrap"
     *      plugins:
     *          - "buttons"
     *          - "responsive"
     */
    public function getConfigTreeBuilder(): TreeBuilder {

        $assets  = ConfigurationHelper::loadYamlConfig(__DIR__, "assets");
        $plugins = $assets["assets"]["wbw.datatables.asset.datatables"]["plugins"];
        $themes  = $assets["assets"]["wbw.datatables.asset.datatables"]["themes"];

        $treeBuilder = new TreeBuilder(WBWDataTablesExtension::EXTENSION_ALIAS);

        $rootNode = ConfigurationHelper::getRootNode($treeBuilder, WBWDataTablesExtension::EXTENSION_ALIAS);
        $rootNode
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

        return $treeBuilder;
    }
}

<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use WBW\Bundle\JQuery\DataTablesBundle\Manager\DataTablesManager;
use WBW\Bundle\JQuery\DataTablesBundle\Provider\DataTablesProviderInterface;

/**
 * jQuery DataTables compiler pass.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\DependencyInjection\Compiler
 */
class JQueryDataTablesCompilerPass implements CompilerPassInterface {

    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container) {

        // Check if the DataTables manager is defined.
        if (false === $container->has(DataTablesManager::SERVICE_NAME)) {
            return;
        }

        // Get the DataTables manager.
        $manager = $container->findDefinition(DataTablesManager::SERVICE_NAME);

        // Find all service IDs with DataTables provider tag.
        $providers = $container->findTaggedServiceIds(DataTablesProviderInterface::TAG_NAME);

        // Register each provider.
        foreach ($providers as $id => $tag) {
            $manager->addMethodCall("registerProvider", [new Reference($id)]);
        }
    }

}

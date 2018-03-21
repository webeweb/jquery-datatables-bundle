<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DatatablesBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use WBW\Bundle\JQuery\DatatablesBundle\Manager\DataTablesManager;
use WBW\Bundle\JQuery\DatatablesBundle\Provider\DataTablesProviderInterface;

/**
 * jQuery DataTables compiler pass.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DatatablesBundle\DependencyInjection\Compiler
 * @final
 */
final class JQueryDataTablesCompilerPass implements CompilerPassInterface {

    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container) {

        // Check if the storage manager is defined.
        if (false === $container->has(DataTablesManager::SERVICE_NAME)) {
            return;
        }

        // Get the storage manager.
        $manager = $container->findDefinition(DataTablesManager::SERVICE_NAME);

        // Find all service IDs with DataTables provider tag.
        $providers = $container->findTaggedServiceIds(DataTablesProviderInterface::TAG_NAME);

        // Register each provider.
        foreach ($providers as $id => $tag) {
            $manager->addMethodCall("registerProvider", [new Reference($id)]);
        }
    }

}

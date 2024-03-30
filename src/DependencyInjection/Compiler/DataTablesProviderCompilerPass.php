<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use WBW\Bundle\DataTablesBundle\Manager\DataTablesManager;
use WBW\Bundle\DataTablesBundle\Provider\DataTablesProviderInterface;

/**
 * DataTables provider compiler pass.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\DependencyInjection\Compiler
 */
class DataTablesProviderCompilerPass implements CompilerPassInterface {

    /**
     * {@inheritDoc}
     */
    public function process(ContainerBuilder $container): void {

        if (false === $container->has(DataTablesManager::SERVICE_NAME)) {
            return;
        }

        $manager = $container->findDefinition(DataTablesManager::SERVICE_NAME);

        $providers = $container->findTaggedServiceIds(DataTablesProviderInterface::DATATABLES_TAG_NAME);
        foreach ($providers as $id => $tag) {
            $manager->addMethodCall("addProvider", [new Reference($id)]);
        }
    }
}

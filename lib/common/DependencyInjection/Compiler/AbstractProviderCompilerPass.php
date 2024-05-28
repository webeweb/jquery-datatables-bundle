<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2021 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Abstract provider compiler pass.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\DependencyInjection\Compiler
 * @abstract
 */
abstract class AbstractProviderCompilerPass implements CompilerPassInterface {

    /**
     * Processing.
     *
     * @param ContainerBuilder $container The container.
     * @param string $serviceName The service name.
     * @param string $tagName The tag name.
     * @return void
     */
    protected function processing(ContainerBuilder $container, string $serviceName, string $tagName): void {

        if (false === $container->has($serviceName)) {
            return;
        }

        $manager = $container->findDefinition($serviceName);

        $providers = $container->findTaggedServiceIds($tagName);
        foreach ($providers as $id => $tag) {
            $manager->addMethodCall("addProvider", [new Reference($id)]);
        }
    }
}

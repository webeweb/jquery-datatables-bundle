<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2017 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\DocumentBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Throwable;

/**
 * Document extension.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DocumentBundle\DependencyInjection
 */
class WBWDocumentExtension extends Extension {

    /**
     * Extension alias.
     *
     * @var string
     */
    public const EXTENSION_ALIAS = "wbw_document";

    /**
     * {@inheritDoc}
     */
    public function getAlias(): string {
        return self::EXTENSION_ALIAS;
    }

    /**
     * {@inheritDoc}
     * @param array<string,mixed> $configs The configurations.
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function load(array $configs, ContainerBuilder $container): void {

        $path = __DIR__ . "/../Resources/config";

        $fileLocator = new FileLocator($path);

        $serviceLoader = new YamlFileLoader($container, $fileLocator);
        $serviceLoader->load("commands.yml");
        $serviceLoader->load("controllers.yml");
        $serviceLoader->load("datatables.yml");
        $serviceLoader->load("event_listeners.yml");
        $serviceLoader->load("forms.yml");
        $serviceLoader->load("services.yml");
        $serviceLoader->load("twig.yml");
    }
}

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

namespace WBW\Bundle\CommonBundle\DependencyInjection\Container;

use Symfony\Component\DependencyInjection\ContainerInterface;
use WBW\Library\Types\Helper\ArrayHelper;

/**
 * Container helper.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\DependencyInjection\Container
 */
class ContainerHelper {

    /**
     * Set a container parameter.
     *
     * @param ContainerInterface $container The container.
     * @param array<string,mixed> $config The configuration.
     * @param string $alias The alias.
     * @param string $key The key.
     * @param bool $tree Tree ?
     * @return void
     */
    public static function setParameter(ContainerInterface $container, array $config, string $alias, string $key, bool $tree = true): void {

        if (false === array_key_exists($key, $config)) {
            return;
        }

        $item = $config[$key];
        $name = "$alias.$key";

        if (true === $tree || false === is_array($item) || false === ArrayHelper::isObject($item)) {
            $container->setParameter($name, $item);
            return;
        }

        foreach ($item as $k => $v) {
            static::setParameter($container, $item, $name, $k, $tree);
        }
    }

    /**
     * Set the container parameters.
     *
     * @param ContainerInterface $container The container.
     * @param array<string,mixed> $config The configuration.
     * @return void
     */
    public static function setParameters(ContainerInterface $container, array $config): void {

        foreach ($config as $k => $v) {
            $container->setParameter($k, $v);
        }
    }
}

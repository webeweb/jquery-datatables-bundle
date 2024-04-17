<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Tests;

use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Kernel;
use Throwable;

/**
 * Default kernel.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests
 * @abstract
 */
abstract class DefaultKernel extends Kernel {

    /**
     * {@inheritDoc}
     */
    public function getCacheDir(): string {
        return getcwd() . "/var/cache";
    }

    /**
     * {@inheritDoc}
     */
    public function getLogDir(): string {
        return getcwd() . "/var/log";
    }

    /**
     * {@inheritDoc}
     */
    public function getProjectDir(): string {
        return getcwd() . "/tests/Fixtures/app";
    }

    /**
     * {@inheritDoc}
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function registerContainerConfiguration(LoaderInterface $loader): void {
        $loader->load($this->getProjectDir() . "/config/config_test.yml");
    }
}

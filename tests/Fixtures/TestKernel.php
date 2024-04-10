<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Fixtures;

use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Bundle\BundleInterface;
use Symfony\Component\HttpKernel\Kernel;
use WBW\Bundle\CommonBundle\Tests\DefaultKernel;

/**
 * Test kernel.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Fixtures
 */
class TestKernel extends DefaultKernel {

    /**
     * {@inheritDoc}
     * @return BundleInterface[] Returns the registered bundles.
     */
    public function registerBundles(): array {

        return [
            new \Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new \Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new \Symfony\Bundle\MonologBundle\MonologBundle(),
            new \Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new \Symfony\Bundle\TwigBundle\TwigBundle(),
            new \WBW\Bundle\DataTablesBundle\WBWDataTablesBundle(),
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function registerContainerConfiguration(LoaderInterface $loader): void {

        // TODO: Remove when dropping support for Symfony 5
        if (Kernel::MAJOR_VERSION < 6) {
            $loader->load($this->getProjectDir() . "/config/config_test.old.yml");
            return;
        }

        parent::registerContainerConfiguration($loader);
    }
}

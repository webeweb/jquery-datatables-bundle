<?php

/**
 * This file is part of the edm-bundle package.
 *
 * (c) 2017 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Kernel;

/**
 * Test kernel.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DatatablesBundle\Tests\Fixtures\App
 * @final
 */
final class TestKernel extends Kernel {

    /**
     * {@inheritdoc}
     */
    public function registerBundles() {
        $bundles = [
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new WBW\Bundle\BootstrapBundle\BootstrapBundle(),
            new WBW\Bundle\JQuery\DatatablesBundle\JQueryDataTablesBundle(),
        ];
        return $bundles;
    }

    /**
     * {@inheritdoc}
     */
    public function registerContainerConfiguration(LoaderInterface $loader) {
        $loader->load(__DIR__ . "/config/config_test.yml");
    }

    /**
     * {@inheritdoc}
     */
    public function getCacheDir() {
        return __DIR__ . "/var/cache";
    }

    /**
     * {@inheritdoc}
     */
    public function getLogDir() {
        return __DIR__ . "/var/logs";
    }

}

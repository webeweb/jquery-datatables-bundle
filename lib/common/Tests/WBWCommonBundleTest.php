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

use Symfony\Component\DependencyInjection\ContainerBuilder;
use WBW\Bundle\CommonBundle\DependencyInjection\WBWCommonExtension;
use WBW\Bundle\CommonBundle\Provider\AssetsProviderInterface;
use WBW\Bundle\CommonBundle\WBWCommonBundle;

/**
 * Core bundle test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests
 */
class WBWCommonBundleTest extends AbstractTestCase {

    /**
     * Test build()
     *
     * @return void
     */
    public function testBuild(): void {

        // Set a Container builder mock.
        $containerBuilder = new ContainerBuilder();

        $obj = new WBWCommonBundle();

        $obj->build($containerBuilder);
        $this->assertNull(null);
    }

    /**
     * Test getAssetsRelativeDirectory()
     *
     * @return void
     */
    public function testGetAssetsRelativeDirectory(): void {

        $obj = new WBWCommonBundle();

        $this->assertEquals(AssetsProviderInterface::ASSETS_RELATIVE_DIRECTORY, $obj->getAssetsRelativeDirectory());
    }

    /**
     * Test getContainerExtension()
     *
     * @return void
     */
    public function testGetContainerExtension(): void {

        $obj = new WBWCommonBundle();

        $this->assertInstanceOf(WBWCommonExtension::class, $obj->getContainerExtension());
    }

    /**
     * Test getTranslationDomain()
     *
     * @return void
     */
    public function testGetTranslationDomain(): void {

        $this->assertEquals(WBWCommonBundle::TRANSLATION_DOMAIN, WBWCommonBundle::getTranslationDomain());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("WBWCommonBundle", WBWCommonBundle::TRANSLATION_DOMAIN);
    }
}

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

namespace WBW\Bundle\DocumentBundle\Tests;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Throwable;
use WBW\Bundle\CommonBundle\Provider\AssetsProviderInterface;
use WBW\Bundle\DocumentBundle\DependencyInjection\WBWDocumentExtension;
use WBW\Bundle\DocumentBundle\WBWDocumentBundle;
use WBW\Library\Widget\Helper\AssetsHelper;

/**
 * Document bundle test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DocumentBundle\Tests
 */
class WBWDocumentBundleTest extends AbstractTestCase {

    /**
     * Test assets.
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testAssets(): void {

        $assets = realpath(__DIR__ . "/../Resources/assets");

        $res = AssetsHelper::listAssets($assets);
        $this->assertCount(1, $res);

        $i = -1;

        $this->assertRegexp("/" . preg_quote("dropzone-5.9.3.zip") . "$/", $res[++$i]);
    }

    /**
     * Test build()
     *
     * @return void
     */
    public function testBuild(): void {

        // Set a Container builder mock.
        $containerBuilder = new ContainerBuilder();

        $obj = new WBWDocumentBundle();

        $obj->build($containerBuilder);
        $this->assertNull(null);
    }

    /**
     * Test getAssetsRelativeDirectory()
     *
     * @return void
     */
    public function testGetAssetsRelativeDirectory(): void {

        $obj = new WBWDocumentBundle();

        $this->assertEquals(AssetsProviderInterface::ASSETS_RELATIVE_DIRECTORY, $obj->getAssetsRelativeDirectory());
    }

    /**
     * Test getContainerExtension()
     *
     * @return void
     */
    public function testGetContainerExtension(): void {

        $obj = new WBWDocumentBundle();

        $this->assertInstanceOf(WBWDocumentExtension::class, $obj->getContainerExtension());
    }

    /**
     * Test getTranslationDomain()
     *
     * @return void
     */
    public function testGetTranslationDomain(): void {

        $this->assertEquals(WBWDocumentBundle::TRANSLATION_DOMAIN, WBWDocumentBundle::getTranslationDomain());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("WBWDocumentBundle", WBWDocumentBundle::TRANSLATION_DOMAIN);
    }
}

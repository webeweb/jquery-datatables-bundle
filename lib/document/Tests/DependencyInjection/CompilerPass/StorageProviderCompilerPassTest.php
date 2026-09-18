<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\DocumentBundle\Tests\DependencyInjection\CompilerPass;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use WBW\Bundle\DocumentBundle\DependencyInjection\Compiler\StorageProviderCompilerPass;
use WBW\Bundle\DocumentBundle\Manager\StorageManager;
use WBW\Bundle\DocumentBundle\Provider\StorageProviderInterface;
use WBW\Bundle\DocumentBundle\Tests\AbstractTestCase;

/**
 * Storage provider compiler pass test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DocumentBundle\Tests\DependencyInjection\CompilerPass
 */
class StorageProviderCompilerPassTest extends AbstractTestCase {

    /**
     * Test process()
     *
     * @return void
     */
    public function testProcess(): void {

        // Set a Container builder mock.
        $containerBuilder = new ContainerBuilder();

        $obj = new StorageProviderCompilerPass();

        $obj->process($containerBuilder);
        $this->assertFalse($containerBuilder->hasDefinition(StorageManager::SERVICE_NAME));

        $containerBuilder->register(StorageManager::SERVICE_NAME, StorageManager::class);
        $obj->process($containerBuilder);
        $this->assertTrue($containerBuilder->hasDefinition(StorageManager::SERVICE_NAME));
        $this->assertFalse($containerBuilder->getDefinition(StorageManager::SERVICE_NAME)->hasMethodCall("addProvider"));

        $containerBuilder->register("wbw.document.provider.test", StorageProviderInterface::class)->addTag(StorageProviderInterface::STORAGE_PROVIDER_TAG_NAME);
        $this->assertTrue($containerBuilder->hasDefinition(StorageManager::SERVICE_NAME));
        $this->assertFalse($containerBuilder->getDefinition(StorageManager::SERVICE_NAME)->hasMethodCall("addProvider"));
        $this->assertTrue($containerBuilder->hasDefinition("wbw.document.provider.test"));
        $this->assertTrue($containerBuilder->getDefinition("wbw.document.provider.test")->hasTag(StorageProviderInterface::STORAGE_PROVIDER_TAG_NAME));

        $obj->process($containerBuilder);
        $this->assertTrue($containerBuilder->hasDefinition(StorageManager::SERVICE_NAME));
        $this->assertTrue($containerBuilder->getDefinition(StorageManager::SERVICE_NAME)->hasMethodCall("addProvider"));
        $this->assertTrue($containerBuilder->hasDefinition("wbw.document.provider.test"));
        $this->assertTrue($containerBuilder->getDefinition("wbw.document.provider.test")->hasTag(StorageProviderInterface::STORAGE_PROVIDER_TAG_NAME));
    }
}

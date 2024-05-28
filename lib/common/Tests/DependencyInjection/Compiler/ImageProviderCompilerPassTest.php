<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\Tests\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use WBW\Bundle\CommonBundle\DependencyInjection\Compiler\ImageProviderCompilerPass;
use WBW\Bundle\CommonBundle\Manager\ImageManager;
use WBW\Bundle\CommonBundle\Provider\ImageProviderInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;

/**
 * Image provider compiler pass test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\DependencyInjection\Compiler
 */
class ImageProviderCompilerPassTest extends AbstractTestCase {

    /**
     * Test process()
     *
     * @return void
     */
    public function testProcess(): void {

        // Set a Container builder mock.
        $containerBuilder = new ContainerBuilder();

        $obj = new ImageProviderCompilerPass();

        $obj->process($containerBuilder);
        $this->assertFalse($containerBuilder->hasDefinition(ImageManager::SERVICE_NAME));

        $containerBuilder->register(ImageManager::SERVICE_NAME, ImageManager::class);
        $obj->process($containerBuilder);
        $this->assertTrue($containerBuilder->hasDefinition(ImageManager::SERVICE_NAME));
        $this->assertFalse($containerBuilder->getDefinition(ImageManager::SERVICE_NAME)->hasMethodCall("addProvider"));

        $containerBuilder->register("wbw.common.provider.image.test", ImageProviderInterface::class)->addTag(ImageProviderInterface::IMAGE_PROVIDER_TAG_NAME);
        $this->assertTrue($containerBuilder->hasDefinition(ImageManager::SERVICE_NAME));
        $this->assertFalse($containerBuilder->getDefinition(ImageManager::SERVICE_NAME)->hasMethodCall("addProvider"));
        $this->assertTrue($containerBuilder->hasDefinition("wbw.common.provider.image.test"));
        $this->assertTrue($containerBuilder->getDefinition("wbw.common.provider.image.test")->hasTag(ImageProviderInterface::IMAGE_PROVIDER_TAG_NAME));

        $obj->process($containerBuilder);
        $this->assertTrue($containerBuilder->hasDefinition(ImageManager::SERVICE_NAME));
        $this->assertTrue($containerBuilder->getDefinition(ImageManager::SERVICE_NAME)->hasMethodCall("addProvider"));
        $this->assertTrue($containerBuilder->hasDefinition("wbw.common.provider.image.test"));
        $this->assertTrue($containerBuilder->getDefinition("wbw.common.provider.image.test")->hasTag(ImageProviderInterface::IMAGE_PROVIDER_TAG_NAME));
    }
}

<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\Tests\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use WBW\Bundle\CommonBundle\DependencyInjection\Compiler\ColorProviderCompilerPass;
use WBW\Bundle\CommonBundle\Manager\ColorManager;
use WBW\Bundle\CommonBundle\Provider\ColorProviderInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;

/**
 * Color provider compiler pass test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\DependencyInjection\Compiler
 */
class ColorProviderCompilerPassTest extends AbstractTestCase {

    /**
     * Test process()
     *
     * @return void
     */
    public function testProcess(): void {

        // Set a Container builder mock.
        $containerBuilder = new ContainerBuilder();

        $obj = new ColorProviderCompilerPass();

        $obj->process($containerBuilder);
        $this->assertFalse($containerBuilder->hasDefinition(ColorManager::SERVICE_NAME));

        $containerBuilder->register(ColorManager::SERVICE_NAME, ColorManager::class);
        $obj->process($containerBuilder);
        $this->assertTrue($containerBuilder->hasDefinition(ColorManager::SERVICE_NAME));
        $this->assertFalse($containerBuilder->getDefinition(ColorManager::SERVICE_NAME)->hasMethodCall("addProvider"));

        $containerBuilder->register("wbw.common.provider.color.test", ColorProviderInterface::class)->addTag(ColorProviderInterface::COLOR_PROVIDER_TAG_NAME);
        $this->assertTrue($containerBuilder->hasDefinition(ColorManager::SERVICE_NAME));
        $this->assertFalse($containerBuilder->getDefinition(ColorManager::SERVICE_NAME)->hasMethodCall("addProvider"));
        $this->assertTrue($containerBuilder->hasDefinition("wbw.common.provider.color.test"));
        $this->assertTrue($containerBuilder->getDefinition("wbw.common.provider.color.test")->hasTag(ColorProviderInterface::COLOR_PROVIDER_TAG_NAME));

        $obj->process($containerBuilder);
        $this->assertTrue($containerBuilder->hasDefinition(ColorManager::SERVICE_NAME));
        $this->assertTrue($containerBuilder->getDefinition(ColorManager::SERVICE_NAME)->hasMethodCall("addProvider"));
        $this->assertTrue($containerBuilder->hasDefinition("wbw.common.provider.color.test"));
        $this->assertTrue($containerBuilder->getDefinition("wbw.common.provider.color.test")->hasTag(ColorProviderInterface::COLOR_PROVIDER_TAG_NAME));
    }
}

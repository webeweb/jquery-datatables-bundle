<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Tests\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use WBW\Bundle\CommonBundle\Manager\ManagerInterface;
use WBW\Bundle\CommonBundle\Provider\ProviderInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\DependencyInjection\Compiler\TestAbstractProviderCompilerPass;

/**
 * Abstract provider compiler pass test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\DependencyInjection\Compiler
 */
class AbstractProviderCompilerPassTest extends AbstractTestCase {

    /**
     * Test process()
     *
     * @return void
     */
    public function testProcess(): void {

        // Set a Container builder mock.
        $containerBuilder = new ContainerBuilder();

        $obj = new TestAbstractProviderCompilerPass();

        $obj->process($containerBuilder);
        $this->assertFalse($containerBuilder->hasDefinition("wbw.common.manager.test"));
        $this->assertFalse($containerBuilder->hasDefinition("wbw.common.provider.test"));

        // Register the Color manager mock.
        $containerBuilder->register("wbw.common.manager.test", ManagerInterface::class);

        $obj->process($containerBuilder);
        $this->assertTrue($containerBuilder->hasDefinition("wbw.common.manager.test"));
        $this->assertFalse($containerBuilder->hasDefinition("wbw.common.provider.test"));
        $this->assertFalse($containerBuilder->getDefinition("wbw.common.manager.test")->hasMethodCall("addProvider"));

        // Register the Color provider.
        $containerBuilder->register("wbw.common.provider.test", ProviderInterface::class)->addTag("wbw.common.provider.test");

        $this->assertTrue($containerBuilder->hasDefinition("wbw.common.manager.test"));
        $this->assertTrue($containerBuilder->hasDefinition("wbw.common.provider.test"));
        $this->assertFalse($containerBuilder->getDefinition("wbw.common.manager.test")->hasMethodCall("addProvider"));

        $obj->process($containerBuilder);
        $this->assertTrue($containerBuilder->hasDefinition("wbw.common.manager.test"));
        $this->assertTrue($containerBuilder->hasDefinition("wbw.common.provider.test"));
        $this->assertTrue($containerBuilder->getDefinition("wbw.common.manager.test")->hasMethodCall("addProvider"));
    }
}

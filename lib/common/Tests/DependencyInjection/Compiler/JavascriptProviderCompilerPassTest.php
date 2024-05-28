<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\Tests\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use WBW\Bundle\CommonBundle\DependencyInjection\Compiler\JavascriptProviderCompilerPass;
use WBW\Bundle\CommonBundle\Manager\JavascriptManager;
use WBW\Bundle\CommonBundle\Provider\JavascriptProviderInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;

/**
 * Javascript provider compiler pass test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\DependencyInjection\Compiler
 */
class JavascriptProviderCompilerPassTest extends AbstractTestCase {

    /**
     * Test process()
     *
     * @return void
     */
    public function testProcess(): void {

        // Set a Container builder mock.
        $containerBuilder = new ContainerBuilder();

        $obj = new JavascriptProviderCompilerPass();

        $obj->process($containerBuilder);
        $this->assertFalse($containerBuilder->hasDefinition(JavascriptManager::SERVICE_NAME));

        $containerBuilder->register(JavascriptManager::SERVICE_NAME, JavascriptManager::class);
        $obj->process($containerBuilder);
        $this->assertTrue($containerBuilder->hasDefinition(JavascriptManager::SERVICE_NAME));
        $this->assertFalse($containerBuilder->getDefinition(JavascriptManager::SERVICE_NAME)->hasMethodCall("addProvider"));

        $containerBuilder->register("wbw.common.provider.javascript.test", JavascriptProviderInterface::class)->addTag(JavascriptProviderInterface::JAVASCRIPT_PROVIDER_TAG_NAME);
        $this->assertTrue($containerBuilder->hasDefinition(JavascriptManager::SERVICE_NAME));
        $this->assertFalse($containerBuilder->getDefinition(JavascriptManager::SERVICE_NAME)->hasMethodCall("addProvider"));
        $this->assertTrue($containerBuilder->hasDefinition("wbw.common.provider.javascript.test"));
        $this->assertTrue($containerBuilder->getDefinition("wbw.common.provider.javascript.test")->hasTag(JavascriptProviderInterface::JAVASCRIPT_PROVIDER_TAG_NAME));

        $obj->process($containerBuilder);
        $this->assertTrue($containerBuilder->hasDefinition(JavascriptManager::SERVICE_NAME));
        $this->assertTrue($containerBuilder->getDefinition(JavascriptManager::SERVICE_NAME)->hasMethodCall("addProvider"));
        $this->assertTrue($containerBuilder->hasDefinition("wbw.common.provider.javascript.test"));
        $this->assertTrue($containerBuilder->getDefinition("wbw.common.provider.javascript.test")->hasTag(JavascriptProviderInterface::JAVASCRIPT_PROVIDER_TAG_NAME));
    }
}

<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Tests\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use WBW\Bundle\CommonBundle\DependencyInjection\Compiler\StylesheetProviderCompilerPass;
use WBW\Bundle\CommonBundle\Manager\StylesheetManager;
use WBW\Bundle\CommonBundle\Provider\StylesheetProviderInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;

/**
 * Stylesheet provider compiler pass test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\DependencyInjection\Compiler
 */
class StylesheetProviderCompilerPassTest extends AbstractTestCase {

    /**
     * Test process()
     *
     * @return void
     */
    public function testProcess(): void {

        // Set a Container builder mock.
        $containerBuilder = new ContainerBuilder();

        $obj = new StylesheetProviderCompilerPass();

        $obj->process($containerBuilder);
        $this->assertFalse($containerBuilder->hasDefinition(StylesheetManager::SERVICE_NAME));

        $containerBuilder->register(StylesheetManager::SERVICE_NAME, StylesheetManager::class);
        $obj->process($containerBuilder);
        $this->assertTrue($containerBuilder->hasDefinition(StylesheetManager::SERVICE_NAME));
        $this->assertFalse($containerBuilder->getDefinition(StylesheetManager::SERVICE_NAME)->hasMethodCall("addProvider"));

        $containerBuilder->register("wbw.common.provider.stylesheet.test", StylesheetProviderInterface::class)->addTag(StylesheetProviderInterface::STYLESHEET_PROVIDER_TAG_NAME);
        $this->assertTrue($containerBuilder->hasDefinition(StylesheetManager::SERVICE_NAME));
        $this->assertFalse($containerBuilder->getDefinition(StylesheetManager::SERVICE_NAME)->hasMethodCall("addProvider"));
        $this->assertTrue($containerBuilder->hasDefinition("wbw.common.provider.stylesheet.test"));
        $this->assertTrue($containerBuilder->getDefinition("wbw.common.provider.stylesheet.test")->hasTag(StylesheetProviderInterface::STYLESHEET_PROVIDER_TAG_NAME));

        $obj->process($containerBuilder);
        $this->assertTrue($containerBuilder->hasDefinition(StylesheetManager::SERVICE_NAME));
        $this->assertTrue($containerBuilder->getDefinition(StylesheetManager::SERVICE_NAME)->hasMethodCall("addProvider"));
        $this->assertTrue($containerBuilder->hasDefinition("wbw.common.provider.stylesheet.test"));
        $this->assertTrue($containerBuilder->getDefinition("wbw.common.provider.stylesheet.test")->hasTag(StylesheetProviderInterface::STYLESHEET_PROVIDER_TAG_NAME));
    }
}

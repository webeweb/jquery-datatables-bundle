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
use WBW\Bundle\CommonBundle\DependencyInjection\Compiler\QuoteProviderCompilerPass;
use WBW\Bundle\CommonBundle\Manager\QuoteManager;
use WBW\Bundle\CommonBundle\Provider\QuoteProviderInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;

/**
 * Quote provider compiler pass test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\DependencyInjection\Compiler
 */
class QuoteProviderCompilerPassTest extends AbstractTestCase {

    /**
     * Test process()
     *
     * @return void
     */
    public function testProcess(): void {

        // Set a Container builder mock.
        $containerBuilder = new ContainerBuilder();

        $obj = new QuoteProviderCompilerPass();

        $obj->process($containerBuilder);
        $this->assertFalse($containerBuilder->hasDefinition(QuoteManager::SERVICE_NAME));

        $containerBuilder->register(QuoteManager::SERVICE_NAME, QuoteManager::class);
        $obj->process($containerBuilder);
        $this->assertTrue($containerBuilder->hasDefinition(QuoteManager::SERVICE_NAME));
        $this->assertFalse($containerBuilder->getDefinition(QuoteManager::SERVICE_NAME)->hasMethodCall("addProvider"));

        $containerBuilder->register("wbw.common.provider.quote.test", QuoteProviderInterface::class)->addTag(QuoteProviderInterface::QUOTE_PROVIDER_TAG_NAME);
        $this->assertTrue($containerBuilder->hasDefinition(QuoteManager::SERVICE_NAME));
        $this->assertFalse($containerBuilder->getDefinition(QuoteManager::SERVICE_NAME)->hasMethodCall("addProvider"));
        $this->assertTrue($containerBuilder->hasDefinition("wbw.common.provider.quote.test"));
        $this->assertTrue($containerBuilder->getDefinition("wbw.common.provider.quote.test")->hasTag(QuoteProviderInterface::QUOTE_PROVIDER_TAG_NAME));

        $obj->process($containerBuilder);
        $this->assertTrue($containerBuilder->hasDefinition(QuoteManager::SERVICE_NAME));
        $this->assertTrue($containerBuilder->getDefinition(QuoteManager::SERVICE_NAME)->hasMethodCall("addProvider"));
        $this->assertTrue($containerBuilder->hasDefinition("wbw.common.provider.quote.test"));
        $this->assertTrue($containerBuilder->getDefinition("wbw.common.provider.quote.test")->hasTag(QuoteProviderInterface::QUOTE_PROVIDER_TAG_NAME));
    }
}

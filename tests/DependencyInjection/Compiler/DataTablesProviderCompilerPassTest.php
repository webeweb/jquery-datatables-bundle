<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use WBW\Bundle\DataTablesBundle\DependencyInjection\Compiler\DataTablesProviderCompilerPass;
use WBW\Bundle\DataTablesBundle\Manager\DataTablesManager;
use WBW\Bundle\DataTablesBundle\Provider\DataTablesProviderInterface;
use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;

/**
 * DataTables compiler pass test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\DependencyInjection\Compiler
 */
class DataTablesProviderCompilerPassTest extends AbstractTestCase {

    /**
     * DataTables manager.
     *
     * @var string|null
     */
    private $dataTablesManager;

    /**
     * DataTables provider.
     *
     * @var string|null
     */
    private $dataTablesProvider;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set a DataTables manager mock.
        $this->dataTablesManager = DataTablesManager::class;

        // Set a DataTables provider mock.
        $this->dataTablesProvider = DataTablesProviderInterface::class;
    }

    /**
     * Test process()
     *
     * @return void
     */
    public function testProcess(): void {

        // Set a Container builder mock.
        $containerBuilder = new ContainerBuilder();

        $obj = new DataTablesProviderCompilerPass();

        $obj->process($containerBuilder);
        $this->assertFalse($containerBuilder->hasDefinition(DataTablesManager::SERVICE_NAME));

        $containerBuilder->register(DataTablesManager::SERVICE_NAME, $this->dataTablesManager);
        $obj->process($containerBuilder);
        $this->assertTrue($containerBuilder->hasDefinition(DataTablesManager::SERVICE_NAME));
        $this->assertFalse($containerBuilder->getDefinition(DataTablesManager::SERVICE_NAME)->hasMethodCall("addProvider"));

        $containerBuilder->register("datatables.provider.test", $this->dataTablesProvider)->addTag(DataTablesProviderInterface::DATATABLES_TAG_NAME);
        $this->assertTrue($containerBuilder->hasDefinition(DataTablesManager::SERVICE_NAME));
        $this->assertFalse($containerBuilder->getDefinition(DataTablesManager::SERVICE_NAME)->hasMethodCall("addProvider"));
        $this->assertTrue($containerBuilder->hasDefinition("datatables.provider.test"));
        $this->assertTrue($containerBuilder->getDefinition("datatables.provider.test")->hasTag(DataTablesProviderInterface::DATATABLES_TAG_NAME));

        $obj->process($containerBuilder);
        $this->assertTrue($containerBuilder->hasDefinition(DataTablesManager::SERVICE_NAME));
        $this->assertTrue($containerBuilder->getDefinition(DataTablesManager::SERVICE_NAME)->hasMethodCall("addProvider"));
        $this->assertTrue($containerBuilder->hasDefinition("datatables.provider.test"));
        $this->assertTrue($containerBuilder->getDefinition("datatables.provider.test")->hasTag(DataTablesProviderInterface::DATATABLES_TAG_NAME));
    }
}

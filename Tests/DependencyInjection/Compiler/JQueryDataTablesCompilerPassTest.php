<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\DependencyInjection\Compiler;

use WBW\Bundle\JQuery\DataTablesBundle\DependencyInjection\Compiler\JQueryDataTablesCompilerPass;
use WBW\Bundle\JQuery\DataTablesBundle\Manager\DataTablesManager;
use WBW\Bundle\JQuery\DataTablesBundle\Provider\DataTablesProviderInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractTestCase;

/**
 * jQuery DataTables compiler pass test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\DependencyInjection\Compiler
 */
class JQueryDataTablesCompilerPassTest extends AbstractTestCase {

    /**
     * DataTables manager.
     *
     * @var DataTablesManager
     */
    private $dataTablesManager;

    /**
     * DataTables provider.
     *
     * @var DataTablesProviderInterface
     */
    private $dataTablesProvider;

    /**
     * {@inheritdoc}
     */
    protected function setUp() {
        parent::setUp();

        // Set a DataTables manager mock.
        $this->dataTablesManager = new DataTablesManager();

        // Set a DataTables provider mock.
        $this->dataTablesProvider = $this->getMockBuilder(DataTablesProviderInterface::class)->getMock();
        $this->dataTablesProvider->expects($this->any())->method("getName")->willReturn("name");
    }

    /**
     * Tests the process() method.
     *
     * @return void
     */
    public function testProcess() {

        $obj = new JQueryDataTablesCompilerPass();

        // ===
        $obj->process($this->containerBuilder);
        $this->assertFalse($this->containerBuilder->hasDefinition(DataTablesManager::SERVICE_NAME));

        // ===
        $this->containerBuilder->register(DataTablesManager::SERVICE_NAME, $this->dataTablesManager);
        $obj->process($this->containerBuilder);
        $this->assertTrue($this->containerBuilder->hasDefinition(DataTablesManager::SERVICE_NAME));
        $this->assertFalse($this->containerBuilder->getDefinition(DataTablesManager::SERVICE_NAME)->hasMethodCall("registerProvider"));

        // ===
        $this->containerBuilder->register("datatables.provider.test", $this->dataTablesProvider)->addTag(DataTablesProviderInterface::TAG_NAME);
        $this->assertTrue($this->containerBuilder->hasDefinition(DataTablesManager::SERVICE_NAME));
        $this->assertFalse($this->containerBuilder->getDefinition(DataTablesManager::SERVICE_NAME)->hasMethodCall("registerProvider"));
        $this->assertTrue($this->containerBuilder->hasDefinition("datatables.provider.test"));
        $this->assertTrue($this->containerBuilder->getDefinition("datatables.provider.test")->hasTag(DataTablesProviderInterface::TAG_NAME));

        // ===
        $obj->process($this->containerBuilder);
        $this->assertTrue($this->containerBuilder->hasDefinition(DataTablesManager::SERVICE_NAME));
        $this->assertTrue($this->containerBuilder->getDefinition(DataTablesManager::SERVICE_NAME)->hasMethodCall("registerProvider"));
        $this->assertTrue($this->containerBuilder->hasDefinition("datatables.provider.test"));
        $this->assertTrue($this->containerBuilder->getDefinition("datatables.provider.test")->hasTag(DataTablesProviderInterface::TAG_NAME));
    }

}

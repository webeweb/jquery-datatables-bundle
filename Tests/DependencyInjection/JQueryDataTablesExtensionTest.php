<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\DependencyInjection;

use WBW\Bundle\CoreBundle\Twig\Extension\RendererTwigExtension;
use WBW\Bundle\JQuery\DataTablesBundle\DependencyInjection\JQueryDataTablesExtension;
use WBW\Bundle\JQuery\DataTablesBundle\Manager\DataTablesManager;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\JQuery\DataTablesBundle\Twig\Extension\DataTablesTwigExtension;

/**
 * DataTables extension test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\DependencyInjection
 */
class DataTablesExtensionTest extends AbstractTestCase {

    /**
     * {@inheritdoc}
     */
    protected function setUp() {
        parent::setUp();

        // Set a Bootstrap renderer Twig extension mock
        $this->containerBuilder->set("webeweb.core.twig.extension.renderer", new RendererTwigExtension($this->twigEnvironment));
    }

    /**
     * Tests the load() method.
     *
     * @return void
     */
    public function testLoad() {

        $obj = new JQueryDataTablesExtension();

        $obj->load([], $this->containerBuilder);
        $this->assertInstanceOf(DataTablesManager::class, $this->containerBuilder->get(DataTablesManager::SERVICE_NAME));
        $this->assertInstanceOf(DataTablesTwigExtension::class, $this->containerBuilder->get(DataTablesTwigExtension::SERVICE_NAME));
    }

}

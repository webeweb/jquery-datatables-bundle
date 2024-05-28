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

namespace WBW\Bundle\DataTablesBundle\Tests\Provider;

use WBW\Bundle\DataTablesBundle\Provider\DataTablesRouterInterface;
use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\DataTablesBundle\Tests\Fixtures\Provider\TestDataTablesRouterTrait;

/**
 * DataTables router trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Provider
 */
class DataTablesRouterTraitTest extends AbstractTestCase {

    /**
     * Test setRouter()
     *
     * @return void
     */
    public function testSetRouter(): void {

        // Set a DataTables router mock.
        $router = $this->getMockBuilder(DataTablesRouterInterface::class)->getMock();

        $obj = new TestDataTablesRouterTrait();

        $obj->setRouter($router);
        $this->assertSame($router, $obj->getRouter());
    }
}

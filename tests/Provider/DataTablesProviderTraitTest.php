<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2021 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Provider;

use WBW\Bundle\DataTablesBundle\Provider\DataTablesProviderInterface;
use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\DataTablesBundle\Tests\Fixtures\Provider\TestDataTablesProviderTrait;

/**
 * DataTables provider trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Provider
 */
class DataTablesProviderTraitTest extends AbstractTestCase {

    /**
     * Test setProvider()
     *
     * @return void
     */
    public function testSetProvider(): void {

        // Set a DataTables provider mock.
        $provider = $this->getMockBuilder(DataTablesProviderInterface::class)->getMock();

        $obj = new TestDataTablesProviderTrait();

        $obj->setProvider($provider);
        $this->assertSame($provider, $obj->getProvider());
    }
}

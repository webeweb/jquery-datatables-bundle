<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2021 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Provider;

use WBW\Bundle\JQuery\DataTablesBundle\Provider\DataTablesProviderInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Provider\TestDataTablesProviderTrait;

/**
 * DataTables provider trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Provider
 */
class DataTablesProviderTraitTest extends AbstractTestCase {

    /**
     * Tests the setProvider() method.
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

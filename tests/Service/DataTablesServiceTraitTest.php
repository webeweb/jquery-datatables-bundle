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

namespace WBW\Bundle\DataTablesBundle\Tests\Service;

use WBW\Bundle\DataTablesBundle\Service\DataTablesServiceInterface;
use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\DataTablesBundle\Tests\Fixtures\Service\TestDataTablesServiceTrait;

/**
 * DataTables service trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Service
 */
class DataTablesServiceTraitTest extends AbstractTestCase {

    /**
     * Test setDataTablesService()
     *
     * @return void
     */
    public function testSetDataTablesService(): void {

        // Set a DataTables service mock.
        $dataTablesService = $this->getMockBuilder(DataTablesServiceInterface::class)->getMock();

        $obj = new TestDataTablesServiceTrait();

        $obj->setDataTablesService($dataTablesService);
        $this->assertSame($dataTablesService, $obj->getDataTablesService());
    }
}

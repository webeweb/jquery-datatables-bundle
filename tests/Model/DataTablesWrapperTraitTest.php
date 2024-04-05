<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Model;

use WBW\Bundle\DataTablesBundle\Model\DataTablesWrapperInterface;
use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\DataTablesBundle\Tests\Fixtures\Model\TestDataTablesWrapperTrait;

/**
 * DataTables wrapper trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Model
 */
class DataTablesWrapperTraitTest extends AbstractTestCase {

    /**
     * Test setWrapper()
     *
     * @return void
     */
    public function testSetWrapper(): void {

        // Set a DataTables wrapper mock.
        $wrapper = $this->getMockBuilder(DataTablesWrapperInterface::class)->getMock();

        $obj = new TestDataTablesWrapperTrait();

        $obj->setWrapper($wrapper);
        $this->assertSame($wrapper, $obj->getWrapper());
    }
}

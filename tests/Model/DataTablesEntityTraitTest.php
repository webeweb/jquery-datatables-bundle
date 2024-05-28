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

namespace WBW\Bundle\DataTablesBundle\Tests\Model;

use WBW\Bundle\DataTablesBundle\Model\DataTablesEntityInterface;
use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\DataTablesBundle\Tests\Fixtures\Model\TestDataTablesEntityTrait;

/**
 * DataTables entity trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Model
 */
class DataTablesEntityTraitTest extends AbstractTestCase {

    /**
     * Test setEntity()
     *
     * @return void
     */
    public function testSetEntity(): void {

        // Set a DataTables entity mock.
        $entity = $this->getMockBuilder(DataTablesEntityInterface::class)->getMock();

        $obj = new TestDataTablesEntityTrait();

        $obj->setEntity($entity);
        $this->assertSame($entity, $obj->getEntity());
    }
}

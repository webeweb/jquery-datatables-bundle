<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Helper;

use Exception;
use Symfony\Component\Serializer\Serializer;
use WBW\Bundle\JQuery\DataTablesBundle\Entity\DataTablesEntityInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Helper\DataTablesEntityHelper;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Entity\Employee;

/**
 * DataTables entity helper.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Helper
 */
class DataTablesEntityHelperTest extends AbstractTestCase {

    /**
     * Tests the indexEntities() method.
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testIndexEntities(): void {

        // Set the entities mock.
        $entities = [];
        for ($i = 57; 0 < $i; --$i) {

            $id = rand();

            $buffer = $this->getMockBuilder(DataTablesEntityInterface::class)->getMock();
            $buffer->expects($this->any())->method("getId")->willReturn($id);

            $entities[] = $buffer;
        }

        $res = DataTablesEntityHelper::indexEntities($entities);
        $this->assertCount(count($entities), $res);

        foreach ($entities as $current) {
            $this->assertSame($current, $res[$current->getId()]);
        }
    }

    /**
     * Tests the isCompatible() method.
     *
     * @return void
     */
    public function testIsCompatible(): void {

        // Set a DataTables entity mock.
        $dtEntity = $this->getMockBuilder(DataTablesEntityInterface::class)->getMock();

        $this->assertTrue(DataTablesEntityHelper::isCompatible($dtEntity));
        $this->assertTrue(DataTablesEntityHelper::isCompatible(new Employee()));
        $this->assertFalse(DataTablesEntityHelper::isCompatible($this));
    }

    /**
     * Tests the newSerializer() method.
     *
     * @return void
     */
    public function testNewSerializer(): void {

        $res = DataTablesEntityHelper::newSerializer();

        $this->assertInstanceOf(Serializer::class, $res);
    }
}

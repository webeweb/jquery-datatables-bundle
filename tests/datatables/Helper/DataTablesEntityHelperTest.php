<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Helper;

use InvalidArgumentException;
use Symfony\Component\Serializer\SerializerInterface;
use Throwable;
use WBW\Bundle\DataTablesBundle\Entity\DataTablesEntityInterface;
use WBW\Bundle\DataTablesBundle\Helper\DataTablesEntityHelper;
use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\DataTablesBundle\Tests\Fixtures\Entity\Employee;

/**
 * DataTables entity helper.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Helper
 */
class DataTablesEntityHelperTest extends AbstractTestCase {

    /**
     * Test indexEntities()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testIndexEntities(): void {

        $count = 57;

        // Set the entities mock.
        $entities = [];
        for ($i = $count; 0 < $i; --$i) {

            $id = rand();

            $buffer = $this->getMockBuilder(DataTablesEntityInterface::class)->getMock();
            $buffer->expects($this->any())->method("getId")->willReturn($id);

            $entities[] = $buffer;
        }

        $entities[] = $entities[$count - 1];

        $res = DataTablesEntityHelper::indexEntities($entities);
        $this->assertCount($count, $res);

        foreach ($entities as $current) {
            $this->assertSame($current, $res[$current->getId()]);
        }
    }

    /**
     * Test isCompatible()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testIsCompatible(): void {

        // Set a DataTables entity mock.
        $dtEntity = $this->getMockBuilder(DataTablesEntityInterface::class)->getMock();

        $this->assertTrue(DataTablesEntityHelper::isCompatible($dtEntity));
        $this->assertTrue(DataTablesEntityHelper::isCompatible(new Employee()));
        $this->assertFalse(DataTablesEntityHelper::isCompatible($this));
    }

    /**
     * Test isCompatible()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testIsCompatibleWithThrowException(): void {

        try {

            DataTablesEntityHelper::isCompatible($this, true);
        } catch (Throwable $ex) {

            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
            $this->assertEquals("The entity must implements DataTablesEntityInterface or declare a getId() method", $ex->getMessage());
        }
    }

    /**
     * Test jsonSerialize()
     *
     * @return void
     */
    public function testJsonSerialize(): void {

        $exp = '{"age":null,"name":null,"office":null,"position":null,"salary":null,"startDate":null,"id":null}';

        $res = DataTablesEntityHelper::jsonSerialize(new Employee());

        $this->assertEquals($exp, $res);
    }

    /**
     * Test jsonSerialize()
     *
     * @return void
     */
    public function testJsonSerializeWithNull(): void {

        $res = DataTablesEntityHelper::jsonSerialize(null);

        $this->assertEquals("[]", $res);
    }

    /**
     * Test newSerializer()
     *
     * @return void
     */
    public function testNewSerializer(): void {

        $res = DataTablesEntityHelper::newSerializer();

        $this->assertInstanceOf(SerializerInterface::class, $res);
    }
}

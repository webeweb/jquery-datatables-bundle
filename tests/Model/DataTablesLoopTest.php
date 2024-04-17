<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Model;

use WBW\Bundle\DataTablesBundle\Entity\DataTablesEntityInterface;
use WBW\Bundle\DataTablesBundle\Model\DataTablesLoop;
use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;

/**
 * DataTables loop test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Model
 */
class DataTablesLoopTest extends AbstractTestCase {

    /**
     * Entities.
     *
     * @var object[]|null
     */
    private $entities;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set an entities mock.
        $this->entities = [
            $this->getMockBuilder(DataTablesEntityInterface::class)->getMock(), // 0
            $this->getMockBuilder(DataTablesEntityInterface::class)->getMock(), // 1
            $this->getMockBuilder(DataTablesEntityInterface::class)->getMock(), // 2
            $this->getMockBuilder(DataTablesEntityInterface::class)->getMock(), // 3
            $this->getMockBuilder(DataTablesEntityInterface::class)->getMock(), // 4
            $this->getMockBuilder(DataTablesEntityInterface::class)->getMock(), // 5
            $this->getMockBuilder(DataTablesEntityInterface::class)->getMock(), // 6
            $this->getMockBuilder(DataTablesEntityInterface::class)->getMock(), // 7
            $this->getMockBuilder(DataTablesEntityInterface::class)->getMock(), // 8
        ];
    }

    /**
     * Test isFirst()
     *
     * @return void
     */
    public function testIsFirst(): void {

        $entities = array_slice($this->entities, 0, 2);

        $obj = new DataTablesLoop($entities);

        $this->assertTrue($obj->isFirst());
        $this->assertFalse($obj->isLast());
    }

    /**
     * Test isLast()
     *
     * @return void
     */
    public function testIsLast(): void {

        $entities = array_slice($this->entities, 0, 2);

        $obj = new DataTablesLoop($entities);
        $obj->next();

        $this->assertTrue($obj->isLast());
        $this->assertFalse($obj->isFirst());
    }

    /**
     * Test next()
     *
     * @return void
     */
    public function testNext(): void {

        $obj = new DataTablesLoop($this->entities);

        $obj->next();
        $this->assertEquals(2, $obj->getIndex());
        $this->assertEquals(1, $obj->getIndex0());
        $this->assertEquals(8, $obj->getRevIndex());
        $this->assertEquals(7, $obj->getRevIndex0());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new DataTablesLoop($this->entities);

        $this->assertEquals($this->entities, $obj->getEntities());
        $this->assertEquals(1, $obj->getIndex());
        $this->assertEquals(0, $obj->getIndex0());
        $this->assertEquals(9, $obj->getLength());
        $this->assertEquals(9, $obj->getRevIndex());
        $this->assertEquals(8, $obj->getRevIndex0());
    }
}

<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Helper;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\QueryBuilder;
use WBW\Bundle\JQuery\DataTablesBundle\Factory\DataTablesFactory;
use WBW\Bundle\JQuery\DataTablesBundle\Helper\DataTablesRepositoryHelper;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\TestFixtures;

/**
 * DataTables repository helper test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Helper
 */
class DataTablesRepositoryHelperTest extends AbstractTestCase {

    /**
     * Query builder.
     *
     * @var QueryBuilder
     */
    private $queryBuilder;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set an Entity manager mock.
        $this->entityManager = $this->getMockBuilder(EntityManagerInterface::class)->getMock();

        // Set a Query builder mock.
        $this->queryBuilder = new QueryBuilder($this->entityManager);
    }

    /**
     * Tests appendOrder()
     *
     * @return void
     */
    public function testAppendOrder(): void {

        // Get a wrapper.
        $wrapper = TestFixtures::getWrapper();
        DataTablesFactory::parseWrapper($wrapper, $this->request);

        $this->assertNull(DataTablesRepositoryHelper::appendOrder($this->queryBuilder, $wrapper));
    }

    /**
     * Tests appendWhere()
     *
     * @return void
     */
    public function testAppendWhere(): void {

        // Get a wrapper.
        $wrapper = TestFixtures::getWrapper();
        DataTablesFactory::parseWrapper($wrapper, $this->request);

        $this->assertNull(DataTablesRepositoryHelper::appendWhere($this->queryBuilder, $wrapper));
    }
}

<?php

/**
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
use Symfony\Component\HttpFoundation\Request;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesWrapper;
use WBW\Bundle\JQuery\DataTablesBundle\Helper\DataTablesRepositoryHelper;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractFrameworkTestCase;

/**
 * DataTables repository helper test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Helper
 */
final class DataTablesRepositoryHelperTest extends AbstractFrameworkTestCase {

    /**
     * Entity manager.
     *
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * Query builder.
     *
     * @var QueryBuilder
     */
    private $queryBuilder;

    /**
     * {@inheritdoc}
     */
    protected function setUp() {

        // Set an entity manager mock.
        $this->em = $this->getMockBuilder(EntityManagerInterface::class)->getMock();

        // Set a query builder mock.
        $this->queryBuilder = new QueryBuilder($this->em);
    }

    /**
     * Tests the appendOrder() method.
     *
     * @return void
     */
    public function testAppendOrder() {

        $arg = new DataTablesWrapper("POST", "url", "name");
        $arg->parse(new Request());

        DataTablesRepositoryHelper::appendOrder($this->queryBuilder, $arg);
    }

    /**
     * Tests the appendWhere() method.
     *
     * @return void
     */
    public function testAppendWhere() {

        $arg = new DataTablesWrapper("POST", "url", "name");
        $arg->parse(new Request());

        DataTablesRepositoryHelper::appendWhere($this->queryBuilder, $arg);
    }

}

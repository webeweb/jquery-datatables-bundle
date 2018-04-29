<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Repository;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\QueryBuilder;
use PHPUnit_Framework_TestCase;
use Symfony\Component\HttpFoundation\Request;
use WBW\Bundle\JQuery\DataTablesBundle\Repository\DefaultDataTablesRepository;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesWrapper;

/**
 * Default DataTables repository test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Repository
 * @final
 */
final class DefaultDataTablesRepositoryTest extends PHPUnit_Framework_TestCase {

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
     * Tests the appendDataTablesOrder() method.
     *
     * @return void
     */
    public function testAppendDataTablesOrder() {

        $arg = new DataTablesWrapper("prefix", "POST", "route");
        $arg->parse(new Request());

        DefaultDataTablesRepository::appendDataTablesOrder($this->queryBuilder, $arg);
    }

    /**
     * Tests the appendDataTablesWhere() method.
     *
     * @return void
     */
    public function testAppendDataTablesWhere() {

        $arg = new DataTablesWrapper("prefix", "POST", "route");
        $arg->parse(new Request());

        DefaultDataTablesRepository::appendDataTablesWhere($this->queryBuilder, $arg);
    }

}

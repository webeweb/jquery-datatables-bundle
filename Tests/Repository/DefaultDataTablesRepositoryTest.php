<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DatatablesBundle\Tests\Repository;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\QueryBuilder;
use PHPUnit_Framework_TestCase;
use Symfony\Component\HttpFoundation\Request;
use WBW\Bundle\JQuery\DatatablesBundle\Repository\DefaultDataTablesRepository;
use WBW\Bundle\JQuery\DatatablesBundle\Wrapper\DataTablesWrapper;

/**
 * Default DataTables repository test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DatatablesBundle\Tests\Repository
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
     * Tests the dataTablesOrder() method.
     *
     * @return void
     */
    public function testDataTablesOrder() {

        $arg = new DataTablesWrapper("prefix", "POST", "route");
        $arg->parse(new Request());

        DefaultDataTablesRepository::dataTablesOrder($this->queryBuilder, $arg);
    }

    /**
     * Tests the dataTablesWhere() method.
     *
     * @return void
     */
    public function testDataTablesWhere() {

        $arg = new DataTablesWrapper("prefix", "POST", "route");
        $arg->parse(new Request());

        DefaultDataTablesRepository::dataTablesWhere($this->queryBuilder, $arg);
    }

}

<?php

/*
 * Disclaimer: This source code is protected by copyright law and by
 * international conventions.
 *
 * Any reproduction or partial or total distribution of the source code, by any
 * means whatsoever, is strictly forbidden.
 *
 * Anyone not complying with these provisions will be guilty of the offense of
 * infringement and the penal sanctions provided for by law.
 *
 * © 2018 All rights reserved.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Helper;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\QueryBuilder;
use Symfony\Component\HttpFoundation\Request;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesWrapper;
use WBW\Bundle\JQuery\DataTablesBundle\Helper\DataTablesRepositoryHelper;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\Cases\AbstractJQueryDataTablesFrameworkTestCase;

/**
 * DataTables repository helper test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Helper
 */
final class DataTablesRepositoryHelperTest extends AbstractJQueryDataTablesFrameworkTestCase {

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

<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Helper;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\QueryBuilder;
use Symfony\Component\HttpFoundation\Request;
use WBW\Bundle\DataTablesBundle\Factory\DataTablesFactory;
use WBW\Bundle\DataTablesBundle\Helper\DataTablesRepositoryHelper;
use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\DataTablesBundle\Tests\Fixtures\TestFixtures;

/**
 * DataTables repository helper test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Helper
 */
class DataTablesRepositoryHelperTest extends AbstractTestCase {

    /**
     * Entity manager.
     *
     * @var EntityManagerInterface|null
     */
    private $entityManager;

    /**
     * Query builder.
     *
     * @var QueryBuilder|null
     */
    private $queryBuilder;

    /**
     * Request.
     *
     * @var Request|null
     */
    private $request;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set the POST data.
        $post = TestFixtures::getPostData();

        $post["search"]["value"] = "test";

        // Set an Entity manager mock.
        $this->entityManager = $this->getMockBuilder(EntityManagerInterface::class)->getMock();

        // Set a Query builder mock.
        $this->queryBuilder = new QueryBuilder($this->entityManager);

        // Set a DataTables request mock.
        $this->request = new Request([], $post, [], [], [], ["REQUEST_METHOD" => "POST"]);
    }

    /**
     * Test appendOrder()
     *
     * @return void
     */
    public function testAppendOrder(): void {

        // Get a wrapper.
        $wrapper = TestFixtures::getWrapper();
        DataTablesFactory::parseWrapper($wrapper, $this->request);

        DataTablesRepositoryHelper::appendOrder($this->queryBuilder, $wrapper);
        $this->assertNull(null);
    }

    /**
     * Test appendWhere()
     *
     * @return void
     */
    public function testAppendWhere(): void {

        // Get a wrapper.
        $wrapper = TestFixtures::getWrapper();
        DataTablesFactory::parseWrapper($wrapper, $this->request);

        DataTablesRepositoryHelper::appendWhere($this->queryBuilder, $wrapper);
        $this->assertNull(null);
    }
}

<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\Tests\Service;

use DateTime;
use Doctrine\DBAL\ParameterType;
use Doctrine\DBAL\Result;
use Doctrine\DBAL\Statement;
use Doctrine\ORM\EntityManagerInterface;
use InvalidArgumentException;
use Throwable;
use WBW\Bundle\CommonBundle\Service\StatementService;
use WBW\Bundle\CommonBundle\Service\StatementServiceInterface;
use WBW\Bundle\CommonBundle\Tests\DefaultWebTestCase as AbstractWebTestCase;

/**
 * Statement service test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Service
 */
class StatementServiceTest extends AbstractWebTestCase {

    /**
     * Statement service.
     *
     * @var StatementServiceInterface|null
     */
    private $statementService;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set a Statement service.
        $this->statementService = static::$kernel->getContainer()->get(StatementService::SERVICE_NAME . ".alias");
    }

    /**
     * {@inheritDoc}
     * @throws Throwable Throws an exception if an error occurs.
     */
    public static function setUpBeforeClass(): void {
        parent::setUpBeforeClass();
        parent::setUpSchemaTool();
    }

    /**
     * Test executeQueries()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testExecuteQueries(): void {

        // Set a filename mock.
        $filename = __DIR__ . "/../Fixtures/Service/StatementServiceTest.testExecuteQueriesFile.sql";

        $queries = $this->statementService->readStatementFile($filename);
        $values  = array_pad([], 2, [
            ":date" => [(new DateTime())->format("Y-m-d"), ParameterType::STRING],
        ]);

        $obj = $this->statementService;

        $res = $obj->executeQueries($queries, $values);
        $this->assertCount(2, $res);

        $this->assertInstanceOf(Result::class, $res[0]);
        $this->assertInstanceOf(Result::class, $res[1]);
    }

    /**
     * Test executeQueriesFile()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testExecuteQueriesFile(): void {

        $filename = __DIR__ . "/../Fixtures/Service/StatementServiceTest.testExecuteQueriesFile.sql";
        $values   = array_pad([], 2, [
            ":date" => [(new DateTime())->format("Y-m-d"), ParameterType::STRING],
        ]);

        $obj = $this->statementService;

        $res = $obj->executeQueriesFile($filename, $values);
        $this->assertCount(2, $res);

        $this->assertInstanceOf(Result::class, $res[0]);
        $this->assertInstanceOf(Result::class, $res[1]);
    }

    /**
     * Test executeQuery()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testExecuteQuery(): void {

        // Set a filename mock.
        $filename = __DIR__ . "/../Fixtures/Service/StatementServiceTest.testExecuteQueryFile.sql";

        $query  = $this->statementService->readStatementFile($filename);
        $values = [
            ":date" => [(new DateTime())->format("Y-m-d"), ParameterType::STRING],
        ];

        $obj = $this->statementService;

        $res = $obj->executeQuery($query, $values);
        $this->assertInstanceOf(Result::class, $res);
    }

    /**
     * Test executeQueryFile()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testExecuteQueryFile(): void {

        // Set a filename mock.
        $filename = __DIR__ . "/../Fixtures/Service/StatementServiceTest.testExecuteQueryFile.sql";
        $values   = [
            ":date" => [(new DateTime())->format("Y-m-d"), ParameterType::STRING],
        ];

        $obj = $this->statementService;

        $res = $obj->executeQueryFile($filename, $values);
        $this->assertInstanceOf(Result::class, $res);
    }

    /**
     * Test executeStatement()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testExecuteStatement(): void {

        // Set a filename mock.
        $filename = __DIR__ . "/../Fixtures/Service/StatementServiceTest.testExecuteStatementFile.sql";

        $query  = $this->statementService->readStatementFile($filename);
        $values = [
            ":id" => [1, ParameterType::INTEGER],
        ];

        $obj = $this->statementService;

        $res = $obj->executeStatement($query, $values);
        $this->assertEquals(0, $res);
    }

    /**
     * Test executeStatementFile()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testExecuteStatementFile(): void {

        $filename = __DIR__ . "/../Fixtures/Service/StatementServiceTest.testExecuteStatementFile.sql";
        $values   = [
            ":id" => [1, ParameterType::INTEGER],
        ];

        $obj = $this->statementService;

        $res = $obj->executeStatementFile($filename, $values);
        $this->assertEquals(0, $res);
    }

    /**
     * Test executeStatements()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testExecuteStatements(): void {

        // Set a filename mock.
        $filename = __DIR__ . "/../Fixtures/Service/StatementServiceTest.testExecuteStatementsFile.sql";

        $queries = $this->statementService->readStatementFile($filename);
        $values  = array_pad([], 2, [
            ":id" => [1, ParameterType::INTEGER],
        ]);

        $obj = $this->statementService;

        $res = $obj->executeStatements($queries, $values);
        $this->assertCount(2, $res);

        $this->assertEquals(0, $res[0]);
        $this->assertEquals(0, $res[1]);
    }

    /**
     * Test executeStatementsFile()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testExecuteStatementsFile(): void {

        $filename = __DIR__ . "/../Fixtures/Service/StatementServiceTest.testExecuteStatementsFile.sql";
        $values   = array_pad([], 2, [
            ":id" => [1, ParameterType::INTEGER],
        ]);

        $obj = $this->statementService;

        $res = $obj->executeStatementsFile($filename, $values);
        $this->assertCount(2, $res);

        $this->assertEquals(0, $res[0]);
        $this->assertEquals(0, $res[1]);
    }

    /**
     * Test prepareStatement()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testPrepareStatement(): void {

        $query  = "SELECT :date";
        $values = [
            ":date" => [(new DateTime())->format("Y-m-d"), ParameterType::STRING],
        ];

        $obj = $this->statementService;

        $res = $obj->prepareStatement($query, $values);
        $this->assertInstanceOf(Statement::class, $res);
    }

    /**
     * Test readStatementFile()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testReadStatementFile(): void {

        $obj = $this->statementService;

        $res = $obj->readStatementFile(__FILE__);
        $this->assertNotNull($res);
    }

    /**
     * Test readStatementFile()
     *
     * @return void
     */
    public function testReadStatementFileWithInvalidArgumentException(): void {

        // Set a filename mock.
        $filename = __FILE__ . "~";

        $obj = $this->statementService;

        try {
            $obj->readStatementFile($filename);
        } catch (Throwable $ex) {

            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
            $this->assertEquals('The file "' . $filename . '" was not found', $ex->getMessage());
        }
    }

    /**
     * Test splitStatements()
     *
     * @return void
     */
    public function testSplitStatements(): void {

        // Set a filename mock.
        $filename = __DIR__ . "/../Fixtures/Service/StatementServiceTest.testExecuteQueriesFile.sql";

        $queries = $this->statementService->readStatementFile($filename);

        $obj = $this->statementService;

        $res = $obj->splitStatements($queries);
        $this->assertCount(2, $res);

        $this->assertEquals("SELECT :date;", $res[0]);
        $this->assertEquals("SELECT :date;", $res[1]);
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        // Set an Entity manager mock.
        $entityManager = $this->getMockBuilder(EntityManagerInterface::class)->getMock();

        $this->assertEquals("wbw.common.service.statement", StatementService::SERVICE_NAME);

        $obj = new StatementService($entityManager);

        $this->assertInstanceOf(StatementServiceInterface::class, $obj);

        $this->assertSame($entityManager, $obj->getEntityManager());
    }
}

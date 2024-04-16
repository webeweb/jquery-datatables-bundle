<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Service;

use Doctrine\DBAL\Exception;
use Doctrine\DBAL\Result;
use Doctrine\DBAL\Statement;
use Doctrine\ORM\EntityManagerInterface;
use InvalidArgumentException;

/**
 * Statement service interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Service
 */
interface StatementServiceInterface {

    /**
     * Query separator.
     *
     * @var string
     */
    const QUERY_SEPARATOR = '/\n\-{2}\ =+\n/';

    /**
     * Execute the queries.
     *
     * @param string $sql The SQL.
     * @param array<int,mixed> $values The values.
     * @return Result[] Returns the results.
     * @throws Exception Throws a DBAL exception if an error occurs.
     * @throws \Doctrine\DBAL\Driver\Exception Throws a driver exception if an error occurs.
     */
    public function executeQueries(string $sql, array $values): array;

    /**
     * Execute the queries.
     *
     * @param string $filename The filename.
     * @param array<int,mixed> $values The values.
     * @return Result[] Returns the results.
     * @throws InvalidArgumentException Throws an invalid argument exception if the file was not found.
     * @throws Exception Throws a DBAL exception if an error occurs.
     * @throws \Doctrine\DBAL\Driver\Exception Throws a driver exception if an error occurs.
     */
    public function executeQueriesFile(string $filename, array $values): array;

    /**
     * Execute a query.
     *
     * @param string $sql The SQL.
     * @param array<string,mixed> $values The values.
     * @return Result Returns the result.
     * @throws Exception Throws a DBAL exception if an error occurs.
     * @throws \Doctrine\DBAL\Driver\Exception Throws a driver exception if an error occurs.
     */
    public function executeQuery(string $sql, array $values): Result;

    /**
     * Execute a query.
     *
     * @param string $filename The filename.
     * @param array<string,mixed> $values The values.
     * @return Result Returns the result.
     * @throws InvalidArgumentException Throws an invalid argument exception if the file was not found.
     * @throws Exception Throws a DBAL exception if an error occurs.
     * @throws \Doctrine\DBAL\Driver\Exception Throws a driver exception if an error occurs.
     */
    public function executeQueryFile(string $filename, array $values): Result;

    /**
     * Execute a statement.
     *
     * @param string $sql The SQL.
     * @param array<string,mixed> $values The values.
     * @return int Returns the affected rows.
     * @throws Exception Throws a DBAL exception if an error occurs.
     * @throws \Doctrine\DBAL\Driver\Exception Throws a driver exception if an error occurs.
     */
    public function executeStatement(string $sql, array $values): int;

    /**
     * Execute a statement.
     *
     * @param string $filename The filename.
     * @param array<string,mixed> $values The values.
     * @return int Returns the affected rows.
     * @throws InvalidArgumentException Throws an invalid argument exception if the file was not found.
     * @throws Exception Throws a DBAL exception if an error occurs.
     * @throws \Doctrine\DBAL\Driver\Exception Throws a driver exception if an error occurs.
     */
    public function executeStatementFile(string $filename, array $values): int;

    /**
     * Execute the statements.
     *
     * @param string $sql The SQL.
     * @param array<int,mixed> $values The values.
     * @return int[] Returns the affected rows.
     * @throws Exception Throws a DBAL exception if an error occurs.
     * @throws \Doctrine\DBAL\Driver\Exception Throws a driver exception if an error occurs.
     */
    public function executeStatements(string $sql, array $values): array;

    /**
     * Execute the statements.
     *
     * @param string $filename The filename.
     * @param array<int,mixed> $values The values.
     * @return int[] Returns the affected rows.
     * @throws InvalidArgumentException Throws an invalid argument exception if the file was not found.
     * @throws Exception Throws a DBAL exception if an error occurs.
     * @throws \Doctrine\DBAL\Driver\Exception Throws a driver exception if an error occurs.
     */
    public function executeStatementsFile(string $filename, array $values): array;

    /**
     * Get the entity manager.
     *
     * @return EntityManagerInterface|null Returns the entity manager.
     */
    public function getEntityManager(): ?EntityManagerInterface;

    /**
     * Prepare a statement.
     *
     * @param string $sql The SQL.
     * @param array<string,mixed> $values The values.
     * @return Statement Returns the statement.
     * @throws Exception Throws a DBAL exception if an error occurs.
     */
    public function prepareStatement(string $sql, array $values): Statement;

    /**
     * Read a statement file.
     *
     * @param string $filename The filename.
     * @return string Returns the statement.
     * @throws InvalidArgumentException Throws an invalid argument exception if the file was not found.
     */
    public function readStatementFile(string $filename): string;

    /**
     * Split statements.
     *
     * @param string $sql The SQL.
     * @return string[] Returns the statements.
     */
    public function splitStatements(string $sql): array;
}

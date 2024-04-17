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

namespace WBW\Bundle\CommonBundle\Service;

use Doctrine\DBAL\Result;
use Doctrine\DBAL\Statement;
use Doctrine\ORM\EntityManagerInterface;
use InvalidArgumentException;
use WBW\Bundle\CommonBundle\Doctrine\ORM\EntityManagerTrait;

/**
 * Statement service.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Service
 */
class StatementService implements StatementServiceInterface {

    use EntityManagerTrait;

    /**
     * Service name.
     *
     * @var string
     */
    public const SERVICE_NAME = "wbw.common.service.statement";

    /**
     * Constructor.
     *
     * @param EntityManagerInterface $em The entity manager.
     */
    public function __construct(EntityManagerInterface $em) {
        $this->setEntityManager($em);
    }

    /**
     * {@inheritDoc}
     */
    public function executeQueries(string $sql, array $values): array {

        $results = [];

        $queries = $this->splitStatements($sql);
        for ($i = 0; $i < count($queries); ++$i) {
            $results[] = $this->executeQuery($queries[$i], $values[$i]);
        }

        return $results;
    }

    /**
     * {@inheritDoc}
     */
    public function executeQueriesFile(string $filename, array $values): array {
        return $this->executeQueries($this->readStatementFile($filename), $values);
    }

    /**
     * {@inheritDoc}
     */
    public function executeQuery(string $sql, array $values): Result {
        return $this->prepareStatement($sql, $values)->executeQuery();
    }

    /**
     * {@inheritDoc}
     */
    public function executeQueryFile(string $filename, array $values): Result {
        return $this->executeQuery($this->readStatementFile($filename), $values);
    }

    /**
     * {@inheritDoc}
     */
    public function executeStatement(string $sql, array $values): int {
        return $this->prepareStatement($sql, $values)->executeStatement();
    }

    /**
     * {@inheritDoc}
     */
    public function executeStatementFile(string $filename, array $values): int {
        return $this->executeStatement($this->readStatementFile($filename), $values);
    }

    /**
     * {@inheritDoc}
     */
    public function executeStatements(string $sql, array $values): array {

        $results = [];

        $queries = $this->splitStatements($sql);
        for ($i = 0; $i < count($queries); ++$i) {
            $results[] = $this->executeStatement($queries[$i], $values[$i]);
        }

        return $results;
    }

    /**
     * {@inheritDoc}
     */
    public function executeStatementsFile(string $filename, array $values): array {
        return $this->executeStatements($this->readStatementFile($filename), $values);
    }

    /**
     * {@inheritDoc}
     */
    public function prepareStatement(string $sql, array $values): Statement {

        $stmt = $this->getEntityManager()->getConnection()->prepare($sql);

        foreach ($values as $k => $v) {
            $stmt->bindValue($k, $v[0], $v[1]);
        }

        return $stmt;
    }

    /**
     * {@inheritDoc}
     */
    public function readStatementFile(string $filename): string {

        if (true === file_exists($filename)) {
            return file_get_contents(realpath($filename));
        }

        throw new InvalidArgumentException(sprintf('The file "%s" was not found', $filename));
    }

    /**
     * {@inheritDoc}
     */
    public function splitStatements(string $sql): array {

        $queries = preg_split(self::QUERY_SEPARATOR, $sql);
        if (false === $queries) {
            return [];
        }

        return array_map(function($query) {
            return trim($query);
        }, $queries);
    }
}

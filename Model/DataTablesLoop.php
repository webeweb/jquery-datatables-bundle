<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Model;

use WBW\Bundle\JQuery\DataTablesBundle\Api\DataTablesLoopInterface;

/**
 * DataTables loop.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Model
 */
class DataTablesLoop implements DataTablesLoopInterface {

    /**
     * Entities.
     *
     * @var object[]
     */
    private $entities;

    /**
     * Index.
     *
     * @var int
     */
    private $index;

    /**
     * Constructor.
     *
     * @param object[] $entities The entities.
     */
    public function __construct(array $entities) {
        $this->setEntities($entities);
        $this->setIndex(1);
    }

    /**
     * {@inheritDoc}
     */
    public function getEntities(): array {
        return $this->entities;
    }

    /**
     * {@inheritDoc}
     */
    public function getIndex(): int {
        return $this->index;
    }

    /**
     * {@inheritDoc}
     */
    public function getIndex0(): int {
        return $this->index - 1;
    }

    /**
     * {@inheritDoc}
     */
    public function getLength(): int {
        return count($this->entities);
    }

    /**
     * {@inheritDoc}
     */
    public function getRevIndex(): int {
        return $this->getLength() - $this->getIndex() + 1;
    }

    /**
     * {@inheritDoc}
     */
    public function getRevIndex0(): int {
        return $this->getRevIndex() - 1;
    }

    /**
     * {@inheritDoc}
     */
    public function isFirst(): bool {
        return 1 === $this->getIndex();
    }

    /**
     * {@inheritDoc}
     */
    public function isLast(): bool {
        return $this->getLength() === $this->getIndex();
    }

    /**
     * Iterates.
     *
     * @return DataTablesLoop Returns this loop.
     */
    public function next(): DataTablesLoop {
        ++$this->index;
        return $this;
    }

    /**
     * Set the entities.
     *
     * @param object[] $entities The entities.
     * @return DataTablesLoop Returns this loop.
     */
    protected function setEntities(array $entities): DataTablesLoop {
        $this->entities = $entities;
        return $this;
    }

    /**
     * Set the index.
     *
     * @param int $index The index.
     * @return DataTablesLoop Returns this loop.
     */
    protected function setIndex(int $index): DataTablesLoop {
        $this->index = $index;
        return $this;
    }
}
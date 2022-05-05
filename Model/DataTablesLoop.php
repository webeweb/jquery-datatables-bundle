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
use WBW\Bundle\JQuery\DataTablesBundle\Model\Attribute\ArrayEntitiesTrait;

/**
 * DataTables loop.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Model
 */
class DataTablesLoop implements DataTablesLoopInterface {

    use ArrayEntitiesTrait;

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
     * {@inheritdoc}
     */
    public function getIndex(): int {
        return $this->index;
    }

    /**
     * {@inheritdoc}
     */
    public function getIndex0(): int {
        return $this->index - 1;
    }

    /**
     * {@inheritdoc}
     */
    public function getLength(): int {
        return count($this->entities);
    }

    /**
     * {@inheritdoc}
     */
    public function getRevIndex(): int {
        return $this->getLength() - $this->getIndex() + 1;
    }

    /**
     * {@inheritdoc}
     */
    public function getRevIndex0(): int {
        return $this->getRevIndex() - 1;
    }

    /**
     * {@inheritdoc}
     */
    public function isFirst(): bool {
        return 1 === $this->getIndex();
    }

    /**
     * {@inheritdoc}
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

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
     * Index.
     *
     * @var int
     */
    private $index;

    /**
     * Length.
     *
     * @var int
     */
    private $length;

    /**
     * Constructor.
     */
    public function __construct(int $length) {
        $this->setIndex(1);
        $this->setLength($length);
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
        return $this->length;
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
     * Set the index.
     *
     * @param int $index The index.
     * @return DataTablesLoop Returns this loop.
     */
    protected function setIndex(int $index): DataTablesLoop {
        $this->index = $index;
        return $this;
    }

    /**
     * Set the length.
     *
     * @param int $length The length.
     * @return DataTablesLoop Returns this loop.
     */
    protected function setLength(int $length): DataTablesLoop {
        $this->length = $length;
        return $this;
    }
}
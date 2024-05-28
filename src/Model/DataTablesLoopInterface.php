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

namespace WBW\Bundle\DataTablesBundle\Model;

/**
 * DataTables loop interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Api
 */
interface DataTablesLoopInterface {

    /**
     * Get the entities.
     *
     * @return object[]
     */
    public function getEntities(): array;

    /**
     * Get the index (1 indexed).
     *
     * @return int Returns the index (1 indexed).
     */
    public function getIndex(): int;

    /**
     * Get the index (0 indexed).
     *
     * @return int Returns the index (0 indexed).
     */
    public function getIndex0(): int;

    /**
     * Get the length.
     *
     * @return int Returns the length.
     */
    public function getLength(): int;

    /**
     * Get the reverse index (1 indexed).
     *
     * @return int Returns the reverse index (1 indexed).
     */
    public function getRevIndex(): int;

    /**
     * Get the reverse index (0 indexed).
     *
     * @return int Returns the reverse index (0 indexed).
     */
    public function getRevIndex0(): int;

    /**
     * Determine if this is the first iteration.
     *
     * @return bool Returns true in cas of success, false otherwise.
     */
    public function isFirst(): bool;

    /**
     * Determine if this is the last iteration.
     *
     * @return bool Returns true in cas of success, false otherwise.
     */
    public function isLast(): bool;
}

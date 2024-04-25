<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Model;

use WBW\Library\Common\Exception\StringArgumentException;

/**
 * DataTables options interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Api
 */
interface DataTablesOptionsInterface {

    /**
     * Add an option.
     *
     * @param string $name The name.
     * @param mixed $value The value.
     * @return DataTablesOptionsInterface Returns this options.
     */
    public function addOption(string $name, $value): DataTablesOptionsInterface;

    /**
     * Get an option.
     *
     * @param string $name The name.
     * @return mixed|null Returns the option in case of success, null otherwise.
     */
    public function getOption(string $name);

    /**
     * Get the options.
     *
     * @return array<string,mixed> Returns the options.
     */
    public function getOptions(): array;

    /**
     * Determine if an option exists.
     *
     * @param string $name The name.
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasOption(string $name): bool;

    /**
     * Remove an option.
     *
     * @param string $name The name.
     * @return DataTablesOptionsInterface Returns this option.
     */
    public function removeOption(string $name): DataTablesOptionsInterface;

    /**
     * Set an option.
     *
     * @param string $name The name.
     * @param mixed $value The value.
     * @return DataTablesOptionsInterface Returns this options.
     * @throws StringArgumentException Throws a string argument exception if the argument is not a string.
     */
    public function setOption(string $name, $value): DataTablesOptionsInterface;
}

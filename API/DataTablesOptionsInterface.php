<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\API;

use WBW\Library\Core\Exception\Argument\StringArgumentException;

/**
 * DataTables options interface.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\API
 */
interface DataTablesOptionsInterface {

    /**
     * Add an option.
     *
     * @param string $name The name.
     * @param mixed $value The value.
     * @return DataTablesOptionsInterface Returns this options.
     * @throws StringArgumentException Throws a string argument exception if the argument is not a string.
     */
    public function addOption($name, $value);

    /**
     * Get an option.
     *
     * @param string $name The name.
     * @return mixed|null Returns the option in case of success, null otherwise.
     */
    public function getOption($name);

    /**
     * Get the options.
     *
     * @return array Returns the options.
     */
    public function getOptions();

    /**
     * Determines if an option exists.
     *
     * @param string $name The name.
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasOption($name);

    /**
     * Remove an option.
     *
     * @param string $name The name.
     * @return DataTablesOptionsInterface Returns this option.
     */
    public function removeOption($name);

    /**
     * Set an option.
     *
     * @param string $name The name.
     * @param mixed $value The value.
     * @return DataTablesOptionsInterface Returns this options.
     * @throws StringArgumentException Throws a string argument exception if the argument is not a string.
     */
    public function setOption($name, $value);
}

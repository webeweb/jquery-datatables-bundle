<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\API;

use WBW\Library\Core\Argument\ArgumentHelper;
use WBW\Library\Core\Exception\Argument\StringArgumentException;

/**
 * DataTables options.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\API
 */
class DataTablesOptions {

    /**
     * Options.
     *
     * @var array
     */
    private $options;

    /**
     * Constructor.
     */
    public function __construct() {
        $this->setOptions([]);
    }

    /**
     * Ad an option.
     *
     * @param string $name The name.
     * @param mixed $value The value.
     * @return DataTablesOptions Returns this options.
     * @throws StringArgumentException Throws a string argument exception if the argument is not a string.
     */
    public function addOption($name, $value) {
        ArgumentHelper::isTypeOf($name, ArgumentHelper::ARGUMENT_STRING);
        if (false === array_key_exists($name, $this->options)) {
            $this->options[$name] = $value;
        }
        return $this;
    }

    /**
     * Get an option.
     *
     * @param string $name The name.
     * @return mixed Returns the option in case of success, null otherwise.
     */
    public function getOption($name) {
        if (true === array_key_exists($name, $this->options)) {
            return $this->options[$name];
        }
        return null;
    }

    /**
     * Get the options.
     *
     * @return array Returns the options.
     */
    public function getOptions() {
        return $this->options;
    }

    /**
     * Determines if an option exists.
     *
     * @param string $name The name.
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasOption($name) {
        return array_key_exists($name, $this->options);
    }

    /**
     * Remove an option.
     *
     * @param string $name The name.
     * @return DataTablesOptions Returns this option.
     */
    public function removeOption($name) {
        if (true === array_key_exists($name, $this->options)) {
            unset($this->options[$name]);
        }
        return $this;
    }

    /**
     * Set an option.
     *
     * @param string $name The name.
     * @param mixed $value The value.
     * @return DataTablesOptions Returns this options.
     * @throws StringArgumentException Throws a string argument exception if the argument is not a string.
     */
    public function setOption($name, $value) {
        ArgumentHelper::isTypeOf($name, ArgumentHelper::ARGUMENT_STRING);
        $this->options[$name] = $value;
        return $this;
    }

    /**
     * Set the options.
     *
     * @param array $options Thhe options.
     * @return DataTablesOptions Returns this options.
     */
    protected function setOptions(array $options) {
        $this->options = $options;
        return $this;
    }

}

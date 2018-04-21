<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DatatablesBundle\API;

/**
 * DataTables search.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DatatablesBundle\API
 */
class DataTablesSearch {

    /**
     * Regex.
     *
     * @var boolean
     */
    private $regex;

    /**
     * Value.
     *
     * @var string
     */
    private $value;

    /**
     * Constructor.
     */
    public function __construct() {
        // NOTHING TO DO.
    }

    /**
     * Get the regex.
     *
     * @return boolean Returns the regex.
     */
    public function getRegex() {
        return $this->regex;
    }

    /**
     * Get the value.
     *
     * @return string Returns the value.
     */
    public function getValue() {
        return $this->value;
    }

    /**
     * Set the regex.
     *
     * @param boolean $regex The regex.
     * @return DataTablesSearch Returns this DataTables search.
     */
    public function setRegex($regex) {
        $this->regex = $regex;
        return $this;
    }

    /**
     * Set the value.
     *
     * @param string $value The value.
     * @return DataTablesSearch Returns this DataTables search.
     */
    public function setValue($value) {
        $this->value = $value;
        return $this;
    }

}

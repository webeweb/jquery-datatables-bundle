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

use WBW\Library\Core\Helper\Argument\BooleanHelper;

/**
 * DataTables search.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\API
 */
class DataTablesSearch implements DataTablesSearchInterface {

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
    protected function __construct() {
        $this->setRegex(false);
        $this->setValue("");
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
     * Parse a raw search array.
     *
     * @param array $rawSearch The raw search array.
     * @return DataTablesSearch Returns the DataTables search.
     */
    public static function parse(array $rawSearch) {

        // Initialize a DataTable search.
        $dtSearch = new DataTablesSearch();

        // Determines if the raw search is valid.
        if (false === array_key_exists(self::DATATABLES_PARAMETER_REGEX, $rawSearch)) {
            return $dtSearch;
        }
        if (false === array_key_exists(self::DATATABLES_PARAMETER_VALUE, $rawSearch)) {
            return $dtSearch;
        }

        // Set the DataTables search.
        $dtSearch->setRegex(BooleanHelper::parseString($rawSearch[self::DATATABLES_PARAMETER_REGEX]));
        $dtSearch->setValue($rawSearch[self::DATATABLES_PARAMETER_VALUE]);

        // Return the DataTables search.
        return $dtSearch;
    }

    /**
     * Set the regex.
     *
     * @param boolean $regex The regex.
     * @return DataTablesSearch Returns this DataTables search.
     */
    protected function setRegex($regex) {
        $this->regex = $regex;
        return $this;
    }

    /**
     * Set the value.
     *
     * @param string $value The value.
     * @return DataTablesSearch Returns this DataTables search.
     */
    protected function setValue($value) {
        $this->value = $value;
        return $this;
    }

}

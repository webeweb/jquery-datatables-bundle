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
     * @var bool
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
        $this->setRegex(false);
        $this->setValue("");
    }

    /**
     * {@inheritdoc}
     */
    public function getRegex() {
        return $this->regex;
    }

    /**
     * {@inheritdoc}
     */
    public function getValue() {
        return $this->value;
    }

    /**
     * Set the regex.
     *
     * @param bool $regex The regex.
     * @return DataTablesSearchInterface Returns this search.
     */
    public function setRegex($regex) {
        $this->regex = $regex;
        return $this;
    }

    /**
     * Set the value.
     *
     * @param string $value The value.
     * @return DataTablesSearchInterface Returns this search.
     */
    public function setValue($value) {
        $this->value = $value;
        return $this;
    }

}

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

namespace WBW\Bundle\JQuery\DataTablesBundle\Model;

use WBW\Bundle\JQuery\DataTablesBundle\Api\DataTablesSearchInterface;

/**
 * DataTables search.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Api
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
     * {@inheritDoc}
     */
    public function getRegex(): bool {
        return $this->regex;
    }

    /**
     * {@inheritDoc}
     */
    public function getValue(): string {
        return $this->value;
    }

    /**
     * Set the regex.
     *
     * @param bool $regex The regex.
     * @return DataTablesSearchInterface Returns this search.
     */
    public function setRegex(bool $regex): DataTablesSearchInterface {
        $this->regex = $regex;
        return $this;
    }

    /**
     * Set the value.
     *
     * @param string $value The value.
     * @return DataTablesSearchInterface Returns this search.
     */
    public function setValue(string $value): DataTablesSearchInterface {
        $this->value = $value;
        return $this;
    }
}

<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Model;

use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesOptionsInterface;

/**
 * DataTables options.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Model
 */
class DataTablesOptions implements DataTablesOptionsInterface {

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
     * {@inheritDoc}
     */
    public function addOption(string $name, $value): DataTablesOptionsInterface {
        if (false === array_key_exists($name, $this->options)) {
            $this->options[$name] = $value;
        }
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getOption(string $name) {
        if (true === array_key_exists($name, $this->options)) {
            return $this->options[$name];
        }
        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function getOptions(): array {
        return $this->options;
    }

    /**
     * {@inheritDoc}
     */
    public function hasOption(string $name): bool {
        return array_key_exists($name, $this->options);
    }

    /**
     * {@inheritDoc}
     */
    public function removeOption(string $name): DataTablesOptionsInterface {
        if (true === array_key_exists($name, $this->options)) {
            unset($this->options[$name]);
        }
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setOption(string $name, $value): DataTablesOptionsInterface {
        $this->options[$name] = $value;
        return $this;
    }

    /**
     * Set the options.
     *
     * @param array $options The options.
     * @return DataTablesOptionsInterface Returns this options.
     */
    protected function setOptions(array $options): DataTablesOptionsInterface {
        $this->options = $options;
        return $this;
    }
}

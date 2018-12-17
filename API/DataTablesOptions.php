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

use WBW\Library\Core\Argument\ArgumentHelper;

/**
 * DataTables options.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\API
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
     * {@inheritdoc}
     */
    public function addOption($name, $value) {
        ArgumentHelper::isTypeOf($name, ArgumentHelper::ARGUMENT_STRING);
        if (false === array_key_exists($name, $this->options)) {
            $this->options[$name] = $value;
        }
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getOption($name) {
        if (true === array_key_exists($name, $this->options)) {
            return $this->options[$name];
        }
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getOptions() {
        return $this->options;
    }

    /**
     * {@inheritdoc}
     */
    public function hasOption($name) {
        return array_key_exists($name, $this->options);
    }

    /**
     * {@inheritdoc}
     */
    public function removeOption($name) {
        if (true === array_key_exists($name, $this->options)) {
            unset($this->options[$name]);
        }
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setOption($name, $value) {
        ArgumentHelper::isTypeOf($name, ArgumentHelper::ARGUMENT_STRING);
        $this->options[$name] = $value;
        return $this;
    }

    /**
     * Set the options.
     *
     * @param array $options The options.
     * @return DataTablesOptionsInterface Returns this options.
     */
    protected function setOptions(array $options) {
        $this->options = $options;
        return $this;
    }

}

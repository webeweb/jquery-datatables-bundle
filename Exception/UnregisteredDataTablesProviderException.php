<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Exception;

/**
 * Unregistered DataTables provider exception.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Exception
 */
class UnregisteredDataTablesProviderException extends AbstractDataTablesException {

    /**
     * Constructor.
     *
     * @param string $name The name.
     */
    public function __construct($name) {
        $format = "None DataTables provider registered with name \"%s\"";
        parent::__construct(sprintf($format, $name));
    }
}

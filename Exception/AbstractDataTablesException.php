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

use Exception;

/**
 * Abstract DataTables exception.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Exception
 * @abstract
 */
abstract class AbstractDataTablesException extends Exception {

    /**
     * Constructor.
     *
     * @param string $message The message.
     */
    public function __construct(string $message) {
        parent::__construct($message, 500);
    }
}

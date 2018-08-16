<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Exception;

use WBW\Library\Core\Exception\AbstractCoreException;

/**
 * Abstract DataTables exception.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Exception
 * @abstract
 */
abstract class AbstractDataTablesException extends AbstractCoreException {

    /**
     * Constructor.
     *
     * @param string $message The message.
     */
    public function __construct($message) {
        parent::__construct($message);
    }

}

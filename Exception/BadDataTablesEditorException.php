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

use WBW\Library\Core\Argument\ObjectHelper;

/**
 * BadDataTables editor exception.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Exception
 */
class BadDataTablesEditorException extends AbstractDataTablesException {

    /**
     * Constructor.
     *
     * @param mixed $object The exporter.
     */
    public function __construct($object) {
        $message = "The DataTables editor is null";
        if (null !== $object) {
            $message = sprintf("The DataTables editor \"%s\" must implement DataTablesEditorInterface", ObjectHelper::getName($object));
        }
        parent::__construct($message);
    }
}

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

use ReflectionException;
use WBW\Library\Core\Argument\ObjectHelper;

/**
 * Bad DataTables repository exception.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Exception
 */
class BadDataTablesRepositoryException extends AbstractDataTablesException {

    /**
     * Constructor.
     *
     * @param mixed $object The repository.
     * @throws ReflectionException Throws a reflection exception if the $object class does not exists.
     */
    public function __construct($object) {
        parent::__construct(sprintf("The DataTables repository \"%s\" must implement DataTablesRepositoryInterface", ObjectHelper::getName($object)));
    }
}

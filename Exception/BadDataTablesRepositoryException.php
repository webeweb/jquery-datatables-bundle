<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DatatablesBundle\Exception;

/**
 * Bad DataTables repository exception.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DatatablesBundle\Exception
 * @final
 */
final class BadDataTablesRepositoryException extends AbstractDataTablesException {

    /**
     * Constructor.
     *
     * @param string $repository The repository.
     */
    public function __construct($repository) {
        parent::__construct(sprintf("The DataTables repository \"%s\" must implement DataTablesRepositoryInterface", $repository));
    }

}

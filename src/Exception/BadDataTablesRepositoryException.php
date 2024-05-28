<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\DataTablesBundle\Exception;

use WBW\Bundle\DataTablesBundle\Repository\DataTablesRepositoryInterface;

/**
 * Bad DataTables repository exception.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Exception
 */
class BadDataTablesRepositoryException extends AbstractDataTablesException {

    /**
     * Constructor.
     *
     * @param object $object The repository.
     */
    public function __construct($object) {
        $format = 'The DataTables repository "%s" must implement ' . DataTablesRepositoryInterface::class;
        parent::__construct(sprintf($format, get_class($object)));
    }
}

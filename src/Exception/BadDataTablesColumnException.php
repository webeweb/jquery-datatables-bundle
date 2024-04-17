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

namespace WBW\Bundle\DataTablesBundle\Exception;

/**
 * Bad DataTables column exception.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Exception
 */
class BadDataTablesColumnException extends AbstractDataTablesException {

    /**
     * Constructor.
     *
     * @param string $name The column name.
     */
    public function __construct(string $name) {
        $format = 'The DataTables column with name "%s" does not exist';
        parent::__construct(sprintf($format, $name));
    }
}

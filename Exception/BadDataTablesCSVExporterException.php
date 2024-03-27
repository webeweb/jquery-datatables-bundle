<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Exception;

use WBW\Bundle\DataTablesBundle\Provider\DataTablesCSVExporterInterface;

/**
 * Bad DataTables CSV exporter exception.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Exception
 */
class BadDataTablesCSVExporterException extends AbstractDataTablesException {

    /**
     * Constructor.
     *
     * @param object|null $object The exporter.
     */
    public function __construct($object) {

        $message = "The DataTables CSV exporter is null";

        if (null !== $object) {
            $format  = 'The DataTables CSV exporter "%s" must implement ' . DataTablesCSVExporterInterface::class;
            $message = sprintf($format, get_class($object));
        }

        parent::__construct($message);
    }
}

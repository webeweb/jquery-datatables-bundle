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

use WBW\Library\Core\Argument\ObjectHelper;

/**
 * Bad DataTables CSV exporter exception.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Exception
 */
class BadDataTablesCSVExporterException extends AbstractDataTablesException {

    /**
     * Constructor.
     *
     * @param mixed $provider The provider.
     */
    public function __construct($provider) {
        parent::__construct(sprintf("The DataTables provider \"%s\" must implement DataTablesCSVExporterInterface", ObjectHelper::getName($provider)));
    }

}

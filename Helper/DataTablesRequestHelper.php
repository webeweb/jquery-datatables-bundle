<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Helper;

use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesRequestInterface;

/**
 * DataTables request helper.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Helper
 */
class DataTablesRequestHelper {

    /**
     * DataTables parameters.
     *
     * @return array Returns the parameters.
     */
    public static function dtParameters() {
        return [
            DataTablesRequestInterface::DATATABLES_PARAMETER_COLUMNS,
            DataTablesRequestInterface::DATATABLES_PARAMETER_DRAW,
            DataTablesRequestInterface::DATATABLES_PARAMETER_LENGTH,
            DataTablesRequestInterface::DATATABLES_PARAMETER_ORDER,
            DataTablesRequestInterface::DATATABLES_PARAMETER_SEARCH,
            DataTablesRequestInterface::DATATABLES_PARAMETER_START,
        ];
    }

}

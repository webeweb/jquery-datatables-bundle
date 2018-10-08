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

use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesResponseInterface;

/**
 * DataTables response helper.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Helper
 */
class DataTablesResponseHelper {

    /**
     * DataTables rows.
     *
     * @return array Returns the rows.
     */
    public static function dtRows() {
        return [
            DataTablesResponseInterface::DATATABLES_ROW_ATTR,
            DataTablesResponseInterface::DATATABLES_ROW_CLASS,
            DataTablesResponseInterface::DATATABLES_ROW_DATA,
            DataTablesResponseInterface::DATATABLES_ROW_ID,
        ];
    }

}

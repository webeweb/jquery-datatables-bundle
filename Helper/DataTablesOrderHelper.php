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

use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesOrderInterface;

/**
 * DataTables order helper.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Helper
 */
class DataTablesOrderHelper {

    /**
     * DataTables dirs.
     *
     * @return array Returns the dirs.
     */
    public static function dtDirs() {
        return [
            DataTablesOrderInterface::DATATABLES_DIR_ASC,
            DataTablesOrderInterface::DATATABLES_DIR_DESC,
        ];
    }

}

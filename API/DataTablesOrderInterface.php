<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\API;

/**
 * DataTables order interface.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\API
 */
interface DataTablesOrderInterface {

    /**
     * Dir "asc".
     *
     * @var string
     */
    const DATATABLES_DIR_ASC = "asc";

    /**
     * Dir "desc".
     *
     * @var string
     */
    const DATATABLES_DIR_DESC = "desc";

    /**
     * Parameter "column".
     *
     * @var string
     */
    const DATATABLES_PARAMETER_COLUMN = "column";

    /**
     * Parameter "dir".
     *
     * @var string
     */
    const DATATABLES_PARAMETER_DIR = "dir";

    /**
     * Get the column.
     *
     * @return int Returns the column.
     */
    public function getColumn();

    /**
     * Get the dir.
     *
     * @return string Returns the dir.
     */
    public function getDir();
}

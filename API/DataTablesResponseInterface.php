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
 * DataTables response interface.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\API
 */
interface DataTablesResponseInterface {

    /**
     * DataTables row attr.
     *
     * @var string
     */
    const DATATABLES_ROW_ATTR = "DT_RowAttr";

    /**
     * DataTables row class.
     *
     * @var string
     */
    const DATATABLES_ROW_CLASS = "DT_RowClass";

    /**
     * DataTables row data.
     *
     * @var string
     */
    const DATATABLES_ROW_DATA = "DT_RowData";

    /**
     * DataTables row ID.
     *
     * @var string
     */
    const DATATABLES_ROW_ID = "DT_RowId";

}

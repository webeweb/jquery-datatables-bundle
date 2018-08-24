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
 * DataTables request interface.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\API
 */
interface DataTablesRequestInterface {

    /**
     * Parameter "columns".
     *
     * @var string
     */
    const DATATABLES_PARAMETER_COLUMNS = "columns";

    /**
     * Parameter "draw".
     *
     * @var string
     */
    const DATATABLES_PARAMETER_DRAW = "draw";

    /**
     * Parameter "length".
     *
     * @var string
     */
    const DATATABLES_PARAMETER_LENGTH = "length";

    /**
     * Parameter "order".
     *
     * @var string
     */
    const DATATABLES_PARAMETER_ORDER = "order";

    /**
     * Parameter "search".
     *
     * @var string
     */
    const DATATABLES_PARAMETER_SEARCH = "search";

    /**
     * Parameter "search".
     *
     * @var string
     */
    const DATATABLES_PARAMETER_START = "start";

}

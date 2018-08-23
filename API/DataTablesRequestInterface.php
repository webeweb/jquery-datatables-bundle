<?php

/*
 * Disclaimer: This source code is protected by copyright law and by
 * international conventions.
 *
 * Any reproduction or partial or total distribution of the source code, by any
 * means whatsoever, is strictly forbidden.
 *
 * Anyone not complying with these provisions will be guilty of the offense of
 * infringement and the penal sanctions provided for by law.
 *
 * © 2018 All rights reserved.
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

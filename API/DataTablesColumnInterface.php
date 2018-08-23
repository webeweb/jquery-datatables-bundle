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
 * DataTables column interface.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\API
 */
interface DataTablesColumnInterface {

    /**
     * Cell type "td".
     *
     * @var string
     */
    const DATATABLES_CELL_TYPE_TD = "td";

    /**
     * Cell type "th".
     *
     * @var string
     */
    const DATATABLES_CELL_TYPE_TH = "th";

    /**
     * Order sequence "asc".
     *
     * @var string
     */
    const DATATABLES_ORDER_SEQUENCE_ASC = "asc";

    /**
     * Order sequence "desc".
     *
     * @var string
     */
    const DATATABLES_ORDER_SEQUENCE_DESC = "desc";

    /**
     * Parameter "data".
     *
     * @var string
     */
    const DATATABLES_PARAMETER_DATA = "data";

    /**
     * Parameter "name".
     *
     * @var string
     */
    const DATATABLES_PARAMETER_NAME = "name";

    /**
     * Parameter "search".
     *
     * @var string
     */
    const DATATABLES_PARAMETER_SEARCH = "search";

    /**
     * Type "date".
     *
     * @var string
     */
    const DATATABLES_TYPE_DATE = "date";

    /**
     * Type "html".
     *
     * @var string
     */
    const DATATABLES_TYPE_HTML = "html";

    /**
     * Type "html-num".
     *
     * @var string
     */
    const DATATABLES_TYPE_HTML_NUM = "html-num";

    /**
     * Type "num".
     *
     * @var string
     */
    const DATATABLES_TYPE_NUM = "num";

    /**
     * Type "num-fmt".
     *
     * @var string
     */
    const DATATABLES_TYPE_NUM_FMT = "num-fmt";

    /**
     * Type "string".
     *
     * @var string
     */
    const DATATABLES_TYPE_STRING = "string";

}

<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle;

/**
 * jQuery DataTables events.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle
 */
class WBWJQueryDataTablesEvents {

    /**
     * DataTables "post delete".
     *
     * @var string
     */
    const DATATABLES_POST_DELETE = "wbw.jquery.datatables.event.post_delete";

    /**
     * DataTables "post edit".
     *
     * @var string
     */
    const DATATABLES_POST_EDIT = "wbw.jquery.datatables.event.post_edit";

    /**
     * DataTables "post export".
     *
     * @var string
     */
    const DATATABLES_POST_EXPORT = "wbw.jquery.datatables.event.post_export";

    /**
     * DataTables "post show".
     *
     * @var string
     */
    const DATATABLES_POST_INDEX = "wbw.jquery.datatables.event.post_index";

    /**
     * DataTables "pre delete".
     *
     * @var string
     */
    const DATATABLES_PRE_DELETE = "wbw.jquery.datatables.event.pre_delete";

    /**
     * DataTables "pre edit".
     *
     * @var string
     */
    const DATATABLES_PRE_EDIT = "wbw.jquery.datatables.event.pre_edit";

    /**
     * DataTables "pre export".
     *
     * @var string
     */
    const DATATABLES_PRE_EXPORT = "wbw.jquery.datatables.event.pre_export";

    /**
     * DataTables "pre index".
     *
     * @var string
     */
    const DATATABLES_PRE_INDEX = "wbw.jquery.datatables.event.pre_index";

    /**
     * DataTables "pre show".
     *
     * @var string
     */
    const DATATABLES_PRE_SHOW = "wbw.jquery.datatables.event.pre_show";
}

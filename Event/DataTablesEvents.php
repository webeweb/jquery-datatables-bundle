<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Event;

/**
 * DataTables events.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Event
 */
class DataTablesEvents {

    /**
     * DataTables "Pre delete".
     *
     * @var string
     */
    const DATATABLES_PRE_DELETE = "webeweb.jquerydatatables.event.pre_delete";

    /**
     * DataTables "Pre edit".
     *
     * @var string
     */
    const DATATABLES_PRE_EDIT = "webeweb.jquerydatatables.event.pre_edit";

    /**
     * DataTables "Pre export".
     *
     * @var string
     */
    const DATATABLES_PRE_EXPORT = "webeweb.jquerydatatables.event.pre_export";

    /**
     * DataTables "Pre index".
     *
     * @var string
     */
    const DATATABLES_PRE_INDEX = "webeweb.jquerydatatables.event.pre_index";

    /**
     * DataTables "Pre show".
     *
     * @var string
     */
    const DATATABLES_PRE_SHOW = "webeweb.jquerydatatables.event.pre_show";

    /**
     * DataTables "Post delete".
     *
     * @var string
     */
    const DATATABLES_POST_DELETE = "webeweb.jquerydatatables.event.post_delete";

    /**
     * DataTables "Post edit".
     *
     * @var string
     */
    const DATATABLES_POST_EDIT = "webeweb.jquerydatatables.event.post_edit";

    /**
     * DataTables "Post export".
     *
     * @var string
     */
    const DATATABLES_POST_EXPORT = "webeweb.jquerydatatables.event.post_export";

    /**
     * DataTables "Post show".
     *
     * @var string
     */
    const DATATABLES_POST_INDEX = "webeweb.jquerydatatables.event.post_index";

}

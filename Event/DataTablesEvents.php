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

use WBW\Bundle\JQuery\DataTablesBundle\WBWJQueryDataTablesEvents;

/**
 * DataTables events.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Event
 * @deprecated since 3.4.0 use "WBW\Bundle\JQuery\DataTablesBundle\WBWJQueryDataTablesEvents" instead.
 */
class DataTablesEvents {

    /**
     * DataTables "post delete".
     *
     * @var string
     */
    const DATATABLES_POST_DELETE = WBWJQueryDataTablesEvents::DATATABLES_POST_DELETE;

    /**
     * DataTables "post edit".
     *
     * @var string
     */
    const DATATABLES_POST_EDIT = WBWJQueryDataTablesEvents::DATATABLES_POST_EDIT;

    /**
     * DataTables "post export".
     *
     * @var string
     */
    const DATATABLES_POST_EXPORT = WBWJQueryDataTablesEvents::DATATABLES_POST_EXPORT;

    /**
     * DataTables "post show".
     *
     * @var string
     */
    const DATATABLES_POST_INDEX = WBWJQueryDataTablesEvents::DATATABLES_POST_INDEX;

    /**
     * DataTables "pre delete".
     *
     * @var string
     */
    const DATATABLES_PRE_DELETE = WBWJQueryDataTablesEvents::DATATABLES_PRE_DELETE;

    /**
     * DataTables "pre edit".
     *
     * @var string
     */
    const DATATABLES_PRE_EDIT = WBWJQueryDataTablesEvents::DATATABLES_PRE_EDIT;

    /**
     * DataTables "pre export".
     *
     * @var string
     */
    const DATATABLES_PRE_EXPORT = WBWJQueryDataTablesEvents::DATATABLES_PRE_EXPORT;

    /**
     * DataTables "pre index".
     *
     * @var string
     */
    const DATATABLES_PRE_INDEX = WBWJQueryDataTablesEvents::DATATABLES_PRE_INDEX;

    /**
     * DataTables "pre show".
     *
     * @var string
     */
    const DATATABLES_PRE_SHOW = WBWJQueryDataTablesEvents::DATATABLES_PRE_SHOW;

}

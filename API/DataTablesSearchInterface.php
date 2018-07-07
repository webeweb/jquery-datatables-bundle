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
 * DataTables search interface.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\API
 */
interface DataTablesSearchInterface {

    /**
     * DataTables parameter "regex".
     *
     * @var string
     */
    const DATATABLES_PARAMETER_REGEX = "regex";

    /**
     * DataTables parameter "value".
     *
     * @var string
     */
    const DATATABLES_PARAMETER_VALUE = "value";

}

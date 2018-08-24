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
 * DataTables search interface.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\API
 */
interface DataTablesSearchInterface {

    /**
     * Parameter "regex".
     *
     * @var string
     */
    const DATATABLES_PARAMETER_REGEX = "regex";

    /**
     * Parameter "value".
     *
     * @var string
     */
    const DATATABLES_PARAMETER_VALUE = "value";

}

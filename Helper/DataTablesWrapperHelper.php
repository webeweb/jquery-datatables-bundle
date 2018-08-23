<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Helper;

use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesWrapper;
use WBW\Library\Core\Argument\StringHelper;

/**
 * DataTables wrapper helper.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Helper
 */
class DataTablesWrapperHelper {

    /**
     * Get a name.
     *
     * @param DataTablesWrapper $dtWrapper The wrapper.
     * @return string Returns the name.
     */
    public static function getName(DataTablesWrapper $dtWrapper) {
        return "dt" . preg_replace("/[^A-Za-z0-9]/", "", $dtWrapper->getName());
    }

    /**
     * Get a options.
     *
     * @param DataTablesWrapper $dtWrapper The wrapper.
     * @return array Returns the options.
     */
    public static function getOptions(DataTablesWrapper $dtWrapper) {

        // Initialize the output.
        $output = [];

        $output["ajax"]           = [];
        $output["ajax"]["method"] = $dtWrapper->getMethod();
        $output["ajax"]["url"]    = $dtWrapper->getUrl();
        $output["columns"]        = [];

        foreach ($dtWrapper->getColumns() as $current) {
            $output["columns"][] = $current->toArray();
        }

        $output["order"] = [];

        foreach ($dtWrapper->getOrder() as $current) {
            $output["order"][] = $current->toArray();
        }

        $output["processing"] = StringHelper::parseBoolean($dtWrapper->getProcessing());
        $output["serverSide"] = StringHelper::parseBoolean($dtWrapper->getServerSide());

        // Return the output.
        return $output;
    }

}
